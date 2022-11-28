<?php 

	class PaymentController extends Controller
	{	
		public function __construct()
		{
			$this->payment = model('PaymentModel');
			$this->appointment = model('AppointmentModel');
		}

		public function create() {
			// $req = request()->inputs();
			// if(isSubmitted()) {
			// 	$post = request()->posts();
			// 	$isOk = $this->payment->create($post);

			// 	if($isOk) {
			// 		$post['file_name'] = 'payment';
			// 		$this->appointment->addPayment($post['parent_id'], $post);
			// 	}
			// 	if(isset($req['redirectTo'])) {
			// 		return redirect(unseal($req['redirectTo']));
			// 	}
			// }
		}
		public function index()
		{	
			$auth = auth();


			$payments = $this->payment->getDesc('id');
			$data = [
				'title' => 'Payments',
				'payments' => $payments
			];

			return $this->view('payment/index' , $data);
		}

		public function show($id)
		{
			$payment = $this->payment->get($id);

			$data = [
				'title' => 'Payment-Overview',
				'payment' => $payment
			];
			
			return $this->view('payment/show' , $data);
		}

		public function confirmation()
		{
			echo ' payment-confirmed ';
		}


		public function approve($id) {
			$this->payment->approve($id);
			return request()->return();
		}

		public function decline($id) {
			$this->payment->decline($id);
			return request()->return();
		}
	}