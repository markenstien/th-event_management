<?php
	use Services\ReportService;
	load(['ReportService'], SERVICES);
	class DashboardController extends Controller
	{

		public function __construct()
		{
			$this->appointment_model = model('AppointmentModel');
			$this->payment_model = model('PaymentModel');
			$this->user_model = model('UserModel');
			$this->reportService = new ReportService();
			
			if(isEqual(whoIs('user_type'),'customer')) {
				return redirect(_route('appointment:index'));
			}
		}

		public function index()
		{
			$this->data['event'] = [
				'total' => $this->appointment_model->total(),
				'totalEarning' => $this->payment_model->amountTotal(),
				'most-booked-event' => 0,
				'most-selected-package'
			];
			$this->data['totalUser'] = $this->user_model->total();

			$reports = $this->appointment_model->all([
				'status' => 'arrived'
			]);
			$summary = $this->reportService->summarize($reports);

			$this->data['summary'] = $summary;
			return $this->view('tmp/maintenance', $this->data);
		}
	}