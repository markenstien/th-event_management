<?php 	
	use Form\AppointmentForm;
	use Services\UserService;

	load(['AppointmentForm'] , APPROOT.DS.'form');
	load(['UserService'] , SERVICES);

	class AppointmentController extends Controller
	{

		public function __construct()
		{
			$this->model = model('AppointmentModel');

			$this->service = model('ServiceModel');
			$this->service_bundle = model('ServiceBundleModel');
			$this->category = model('CategoryModel');
			$this->messageModel = model('MessageModel');
			$this->service_cart_model = model('ServiceCartModel');
			$this->payment_model = model('PaymentModel');
			$this->userModel = model('UserModel');

			$this->_form = new AppointmentForm();
		}

		public function index()
		{
			$auth = whoIs();

			if(isEqual($auth->user_type, UserService::CUSTOMER)) {
				$events = $this->model->all([
					'user_id' => $auth->id
				], 'id desc');
			} else {
				$events = $this->model->all(null, 'id desc');
			}

			$data = [
				'title' => 'Events',
				'events' => $events
			];

			return $this->view('appointment/index' , $data);
		}


		public function approve($id) {
			$this->model->approve($id);
			Flash::set("Appointment Cancelled");
			return request()->return();
		}

		public function cancel($id) {
			$this->model->cancel($id);
			Flash::set("Appointment Cancelled");
			return request()->return();
		}

		public function createWithBill()
		{
			if( isSubmitted() )
			{
				$post = request()->posts();

				$res = $this->model->createWithBill( $post );

				if(!$res) 
				{
					Flash::set( $this->model->getErrorString() , 'danger') ;
					return request()->return();
				}

				//kill reservation

				$this->service_cart_model->destroyCart();

				Flash::set("Appointment Created");

				$auth = auth();

				if( !$auth) 
					return redirect( _route('bill:show' , $res) );

				if( isEqual($post['type'] , 'walk-in') )
					return redirect( _route('appointment:show' , $res) );
				
				return redirect( _route('appointment:show' , $res) );	
			}
		}

		public function create()
		{	
			if( isset($_GET['btn_filter']) )
			{	
				$rq  = request()->inputs();

				if( empty($rq['key_word']) && !isset($rq['categories']) )
				{
					Flash::set("Filter failed" , 'danger');
					return request()->return();
				}

				$services = $this->service->getByFilter( $rq );

				$service_bundles = $this->service_bundle->getByFilter($rq);

			}elseif(isset($_GET['category']))
			{
				$services = $this->service->getAll([
					'where' => [
						'category' => $_GET['category']
					]
				]);

				$service_bundles = $this->service_bundle->getAll([
					'where' => [
						'category' => $_GET['category']
					]
				]);
			}else
			{

				$services = $this->service->getAll([
					'where' => [
						'is_visible' => true
					]
				]);

				$service_bundles = $this->service_bundle->getAll([
					'where' => [
						'is_visible' => true
					]
				]);
			}

			$categories = $this->category->getAll([
				'cat_key' => 'SERVICES'
			]);

			$cart_summary = $this->service_cart_model->getCartSummary();

			$data = [
				'title' => 'Create An Appointment',
				'categories' => $categories,
				'service_bundles' => $service_bundles,
				'services'   => $services,
				'service_cart_model' => $this->service_cart_model,
				'cart_summary'  => $cart_summary
			];

			return $this->view('appointment/create' , $data);
		}


		public function edit($id)
		{
			if( isSubmitted() )
			{
				$post = request()->posts();

				$res = $this->model->save($post , $post['id']);

				if(!$res){
					Flash::set( $this->model->getErrorString() , 'danger');
				}else{
					Flash::set("Appointment updated!");
				}

				return request()->return();
			}

			$appointment = $this->model->get($id);
	
			$form = $this->_form;

			$form->init([
				'url' => _route('appointment:edit' , $id)
			]);

			$form->setValueObject( $appointment );

			$form->addId($id);
			$form->customSubmit('Save Changes' , 'submit');

			$data = [
				'title' => 'Update Appointment',
				'form'  => $form,
				'appointment' => $appointment,
				'bill'  => $this->model->getBill($id)
			];

			return $this->view('appointment/edit' , $data);
		}

		public function show($id)
		{
			$page = request()->input('page') ?? 'overview';

			$appointment = $this->model->getComplete($id);
			
			$this->data['appointment'] = $appointment;
			$this->data['title'] = '#'.$appointment->reference. ' | Appointment';
			$this->data['payments'] = $this->payment_model->getByBill($id);
			$this->data['page'] = $page;
			$this->data['id'] = $id;

			$this->data['user'] = $this->userModel->get($appointment->user_id);
			
			$this->data['messages'] = $this->messageModel->all([
				'parent_id' => $id
			], 'timesent asc');
			
			return $this->view('appointment/show' , $this->data);
		}

		public function addPayment() {
			$req = request()->inputs();
			if(isSubmitted()) {
				$post = request()->posts();
				$post['file_name'] = 'payment';
				
				$addPayment = $this->model->addPayment($post['parent_id'], $post);

				if($addPayment) {
					Flash::set("Payment added");
				}
				if(isset($req['redirectTo'])) {
					return redirect(unseal($req['redirectTo']));
				}
			}
		}

		public function updatePayment() {
			$req = request()->inputs();
			switch($req['action']) {
				case 'approve':
					$isOk = $this->model->updateBalance($req['appointment_id'], $req['payment_id']);
					if($isOk) {
						Flash::set("Payment approved");
					}else{
						Flash::set($this->model->getErrorString(), 'danger');
					}
				break;

				case 'cancel':
					$this->payment_model->decline($req['payment_id']);
					Flash::set("Payment has been declined");
				break;
			}

			if(isset($req['redirectTo'])) {
				return redirect(unseal($req['redirectTo']));
			}

			return request()->return();
		}
	}