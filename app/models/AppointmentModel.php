<?php 
	use Services\UserService;
	load(['UserService'], SERVICES);

	class AppointmentModel extends Model
	{

		public $table = 'appointments';

		public $_fillables = [
			'package',
			'event',
			'reference',
			'name',
			'description',
			'date',
			'start_time',
			'num_of_days',
			'address',
			'num_of_attendees',
			'type',
			'status',
			'user_id',
			'selections',
			'is_paid',
			'initial_amount',
			'remaning_balance'
		];

		/**
		 * accepted params
		 * payments, 
		 */
		public function createFromMeta($formData, $searchKey, $payment = null) {
			if(!isset($this->metaModel)) {
				$this->metaModel = model('MetaModel');
			}
			$tmpBooking = $this->metaModel->get($searchKey);
			$downPayment = 0;
			if(!$tmpBooking) {
				$this->addError("Invalid request!");
				return false;
			}

			$formData['selections'] = json_encode($tmpBooking);

			$eventName = GLOBAL_VAR['events'][$formData['event']]['name'];
			$packageName = GLOBAL_VAR['packages'][$formData['package']]['name'];

			$appointmentId = $this->save($formData);
			$bookingHref = URL.'/HomeController/showBooking?bookingID='.seal($appointmentId).'&token='.$this->reference;
			
			$emailBody = "<h3>Thank you for your Booking your event.</h3>";
			$emailBody .= "<h4>Booking Rereference : #{$this->reference}</h4>";
			$emailBody .= "<p>Keep this email so you will have reference.</p>";
			$emailBody .= "<p><a href='{$bookingHref}'>Booking details</a></p>";

			$this->retVal['bookingHref'] = $bookingHref;

			if(!is_null($payment)) {
				$downPayment = $payment['amount'];
			}
			$emailBody .= <<<EOF
				<table>
					<tr>
						<td>Reference : </td>
						<td>{$this->reference}</td>
					</tr>
					<tr>
						<td>Event : </td>
						<td>{$eventName}</td>
					</tr>
					<tr>
						<td>Package : </td>
						<td>{$packageName}</td>
					</tr>
					<tr>
						<td colspan='2'>Customer Details</td>
					</tr>
					<tr>
						<td>Name : </td>
						<td>{$formData['name']}</td>
					</tr>

					<tr>
						<td>Event Price : </td>
						<td>{$formData['initial_amount']}</td>
					</tr>

					<tr>
						<td>Down Payment : </td>
						<td>{$downPayment}</td>
					</tr>
				</table>
			EOF;
			$emailBody .= "</table>";

			// $emailBody = wEmailComplete($emailBody);
			if(!$appointmentId) {
				$this->addError("Unable to create appointment");
				return false;
			}

			if(!is_null($payment)) {
				$this->addPayment($appointmentId, $payment);	
			}

			//check if account is created by email other wise create new

			if(!isset($this->userModel)) {
				$this->userModel = model('UserModel');
			}

			$userData = $this->userModel->single([
				'email' => $formData['email'],
			]);
			//create an account
			if (!$userData) {
				$fullName = explode(' ', $formData['name']);

				$lastName = end($fullName);
				unset($fullName[count($fullName) - 1]);
				$firstName = implode(' ', $fullName);
				$username = strtoupper($lastName.=random_number(3));
				$password = 'bigdays';

				$userId = $this->userModel->create([
					'first_name' => $firstName,
					'last_name'  => $lastName,
					'email' => $formData['email'],
					'username' => $username,
					'password' => $password,
					'user_type' => UserService::CUSTOMER
				]);

				if($userId) {
					$loginHREF = URL.DS.'AuthController/login';
					$emailBody .= "<h3 style='margin-top:15px'> An Account is created for your </h3>";
					$emailBody .= "<h4> Account Details</h4>";
					$emailBody .= <<<EOF
						<ul>
							<li>Username : {$username}</li>
							<li>Password : {$password}</li>
						</ul>
						<small>You can change your password upon login, <a href='{$loginHREF}'>login here</a></small>
					EOF;

					$userData = $this->userModel->get($userId);
				}
			}

			//update event info
			parent::update([
				'user_id' => $userData->id
			], $appointmentId);

			$emailData = wEmailComplete($emailBody);
			// _mail($formData['email'], COMPANY_NAME.'EVENT - BOOKING', $emailData);

			return $appointmentId;
		}

		public function addPayment($appointmentId, $paymentData) {
			if (!isset($this->paymentModel)) {
				$this->paymentModel = model('PaymentModel');
			}

			$paymentReference = $this->paymentModel->getReference();
			$paymentId = $this->paymentModel->create([
				'parent_id' => $appointmentId,
				'meta_key'  => 'RESERVATION',
				'reference' => $paymentReference,
				'amount'   => $paymentData['amount'],
				'method'   => $paymentData['method'],
				'external_reference' => $paymentData['external_reference']
			]);

			if ($paymentId) {

				//upload image
				$uploadedImage = upload_image($paymentData['file_name'], PATH_UPLOAD.DS.'payments');
				if (isEqual($uploadedImage['status'], 'success')) {
					if(!isset($this->metaModel)) {
						$this->metaModel = model('MetaModel');
					}
					//attach image
					$this->metaModel->createOrUpdate([
						'meta_key'  => 'PAYMENT',
						'meta_id'   => $paymentId,
						'meta_value' => $uploadedImage['result'],
						'search_key' => 'PAYMENT_'.$paymentReference,
					]);
				}
				//upload photo
			}
		}

		public function updateBalance($id, $paymentId) {
			if (!isset($this->paymentModel)) {
				$this->paymentModel = model('PaymentModel');
			}
			$payment = $this->paymentModel->get($paymentId);

			if(!$payment) {
				$this->addError("Payment does not exists");
				return false;
			}

			if (isEqual($payment->status, 'pending')) {
				$this->db->query(
					"UPDATE {$this->table}
						SET remaning_balance = (remaning_balance - {$payment->amount})
					WHERE id = '{$id}'"
				);
				$isOkay = $this->db->execute();

				if($isOkay) {
					$this->paymentModel->approve($paymentId);
				}
				return $isOkay;
			}
			$this->addError("Unable to update balance");
			return false;
		}
		
		public function save($appointment_data , $id = null)
		{
			$fillable_datas = $this->getFillablesOnly($appointment_data);

			if( !is_null($id) ){
				return parent::update($fillable_datas , $id);
			}else
			{
				return $this->create($fillable_datas);
			}
		}
		
		public function create($appointment_data)
		{	
			$reference =  $this->generateRefence();

			$appointment_data['reference'] = $reference;
			$appointment_data['user_id'] = $user_id ?? '';
			$appointment_data['type'] = $type ?? 'online';
			$appointment_data['remark'] = $remark ?? '';
			$appointment_data['status'] = $status ?? 'pending';

			$_fillables = $this->getFillablesOnly($appointment_data);
			$this->reference = $reference;
			$appointment_id = parent::store($_fillables);

			$appointment_link = _route('appointment:show' , $appointment_id);

			// if( $appointment_id )
			// {
			// 	if( !is_null($user_id) )
			// 	{

			// 		$user_model = model('UserModel');

			// 		$user = $user_model->single(['id' => $user_id]);

			// 		$email = $user->email;
			// 		$user_mobile_number = $user->phone_number;
					
			// 		_notify_include_email("Appointment to vitalcare is submitted .#{$reference} appointment reference",[$user_id],[$email] , ['href' => $appointment_link ]);

			// 		send_sms("Appointment to vitalcare is submitted .#{$reference} appointment reference" , [$user_mobile_number]);
			// 	}
				
			// 	_notify_operations("Appointment to vitalcare is submitted .#{$reference} appointment reference" , ['href' => $appointment_link]);
			// }

			return $appointment_id;
		}

		public function createWithBill ( $appointment_data )
		{
			$this->bill_model = model('BillModel');

			$cart_items = $this->bill_model->getCartItems();

			if(!$cart_items){
				$this->addError("Unable to save apointment no services selected ");
				return false;
			}

			//check item firsts
			$appointment_id = $this->create($appointment_data);

			if(!$appointment_id)
				return false;

			$this->bill_model = model('BillModel');

			$bill_data = [
				'user_id' => $appointment_data['user_id'] ?? '',
				'payment_status' => $appointment_data['payment_status'] ?? 'unpaid',
				'payment_method' => $appointment_data['payment_method'] ?? 'na',
				'bill_to_name'  => $appointment_data['guest_name'],
				'bill_to_email'  => $appointment_data['guest_email'],
				'bill_to_phone'  => $appointment_data['guest_phone'],
				'appointment_id' => $appointment_id,
				'discount' => $appointment_data['discount']
			];

			$this->bill_id = $this->bill_model->createPullServiceCartItems( $bill_data );

			return $appointment_id;
		}

		public function generateRefence()
		{
			return strtoupper('APT-'.get_token_random_char(7));
		}

		public function getComplete( $id )
		{
			$appointment = parent::get($id);
			if(!$appointment){
				$this->addError("appointment not found");
				return false;
			}
			return $appointment;
		}



		public function getBill($id)
		{
			$bill_model = model('BillModel');
			$bill = $bill_model->getByAppointment($id);

			return $bill;
		}

		public function updateStatus($id , $status)
		{
			$update_payment_status = parent::update([
				'status' => $status
			], $id);

			//create notification

			return $update_payment_status;
		}

		public function getTotalAppointmentByDate($date)
		{
			$this->db->query(
				"SELECT sum(id) as total 
					FROM {$this->table}
					WHERE date = '{$date}' 
					AND status not in ('pending' , 'cancelled')
					AND type = 'online'
					GROUP BY date"
			);

			return $this->db->single()->total ?? 0;
		}

		public function checkAvailability($date)
		{
			$schedule_model = model('ScheduleModel');

			$total_person_reserved = $this->getTotalAppointmentByDate($date);

			$day_name = date('l' , strtotime($date));

			$date_by_name = $schedule_model->getByAppointmentByDay($day_name);

			if( $date_by_name->max_visitor_count <= $total_person_reserved ){
				$this->addError("Date {$date}($day_name) is already full , please schedule another day");
				return false;
			}else{
				$this->addMessage("Date is available");
				return true;
			}
		}
	}