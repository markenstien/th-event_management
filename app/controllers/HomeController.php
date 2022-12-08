<?php
	
	load(['DoctorForm'], APPROOT.DS.'form');

	use Form\DoctorForm;

	class HomeController extends Controller
	{
		public function __construct()
		{
			parent::__construct();

			$this->metaModel = model('MetaModel');
			$this->appointmentModel = model('AppointmentModel');
		}
		public function index()
		{	
			return view('home/index');
		}

		public function bookEvent() {
			$req = request()->inputs();
			
			if(isSubmitted()) {
				$stateId = state('event_booking_key');
				$this->data['post'] = request()->posts();
				
				if(!$stateId) {
					$searchKey = random_letter(12);
					state('event_booking_key', $searchKey);
				}
				$maxDish = GLOBAL_VAR['package_group']['catering']['main_dish']['rules'][$req['package_id']];
				if(isset($req['inclusion']['main_dish'])) {
					$totalDish = count($req['inclusion']['main_dish']);
					if($totalDish > $maxDish) {
						Flash::set("Max of {$maxDish} for MAIN-DISH {$req['package_id']} Package",'danger','dish');
						return request()->return();
					}
				} else {
					Flash::set("Must select Main-Dish", 'danger', 'dish');
					return request()->return();
				}

				if (isset($req['inclusion']['vegetable_dish'])) {
					$totalDish = count($req['inclusion']['vegetable_dish']);
					$maxDish = GLOBAL_VAR['package_group']['catering']['vegetable_dish']['rules'][$req['package_id']];
					if($totalDish > $maxDish) {
						Flash::set("Max of {$maxDish} for VEGETABLE DISH {$req['package_id']} Package",'danger','dish');
						return request()->return();
					}
				} else {
					Flash::set("Must select Vegetable-Dish", 'danger','dish');
					return request()->return();
				}

				if(isset($req['inclusion']['desert_dish'])) {
					$totalDish = count($req['inclusion']['desert_dish']);
					$maxDish = GLOBAL_VAR['package_group']['secondary']['desert_dish']['rules'][$req['package_id']];
					if($totalDish > $maxDish) {
						Flash::set("Max of {$maxDish} for DESERT DISH {$req['package_id']} Package",'danger','dish');
						return request()->return();
					}
				}

				$isCreated = $this->metaModel->createOrUpdate([
					'meta_value' => $req,
					'search_key' => state('event_booking_key'),
					'meta_key' => 'BOOKING_SESSION'
				], $stateId);
			}

			if(isset($req['event_id'])) 
			{
				$event = GLOBAL_VAR['events'][$req['event_id']];
				$this->data['event_id'] = $req['event_id'];
				$this->data['event'] = $event;
				
				$booked = $this->metaModel->getComplete(state('event_booking_key'));
				if ($booked) {
					$this->data['selection'] = $booked->meta_value;
				}

				$this->data['booked'] = $booked;

				return $this->view('booking/show_event', $this->data);
			}

			return $this->view('home/book_event');
		}

		public function checkoutEvent() {
			$req = request()->inputs();

			if (isSubmitted()) {
				$errors = [];
				$payment = null;
				//checkis 

				if(!empty($req['amount_paid'])){
					if(upload_empty('payment')) {
						$errors[] = "You must have a payment proof, if you have paid for downpayment";
					}
					if(empty($req['payment_reference'])) {
						$errors[] = "You must enter the payment reference of your down payment.";
					}

					if(!empty($errors)) {
						Flash::set(implode(",", $errors), 'warning');
						return request()->return();
					}

					$payment = [
						'amount' => str_to_number($req['amount_paid']),
						'method' => 'ONLINE',
						'external_reference' => $req['payment_reference'],
						'file_name' => 'payment'
					];
				}

				$appointment = $this->appointmentModel->createFromMeta([
					'event' => $req['event_id'],
					'package' => $req['package_id'],
					'name' => $req['firstname'] . ' ' .$req['lastname'],
					'email' => $req['email'],
					'phone_number' => $req['phone_number'],
					'date' => $req['date'],
					'time' => $req['time'],
					'address' => $req['address'],
					'description' => $req['notes'],
					'initial_amount' => $req['amount'],
					'remaning_balance' => $req['amount'],
					'num_of_attendees' => $req['attendees'] ?? null
				], $req['event_code'], $payment);

				state_delete('event_booking_key');

				if ($appointment) {
					Flash::set("Appointment successful");
					return redirectRaw($this->appointmentModel->retVal['bookingHref']);
				} else {
					Flash::set("Appointment failed", 'danger');
				}
				return redirect(_route('home:index'));
			}
			if (!isset($req['event_code'])) {
				//throw an erorr
				return false;
			}

			$booked = $this->metaModel->getComplete(state('event_booking_key'));
			$this->data['booked'] = $booked;

			if ($booked) {
				$this->data['selection'] = $booked->meta_value;
				$this->data['event']  = GLOBAL_VAR['events'][$booked->meta_value->event_id];
				$this->data['package'] = GLOBAL_VAR['packages'][$booked->meta_value->package_id];
			}

			return $this->view('booking/checkout_event', $this->data);
		}

		public function showBooking() {
			$req = request()->inputs();
			$bookingId = unseal($req['bookingID']);
			$this->data['booking'] = $this->appointmentModel->getComplete($bookingId);
		
			return $this->view('booking/show', $this->data);
		}

		public function about() {

		}

		public function portfolio() {

		}

		public function contact() {
			
		}
	}