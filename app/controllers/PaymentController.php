<?php 

	class PaymentController extends Controller
	{	
		public function __construct()
		{
			$this->payment = model('PaymentModel');
			$this->appointment = model('AppointmentModel');
		}

		public function index()
		{
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