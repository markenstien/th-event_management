<?php
	use Services\ReportService;
	load(['ReportService'], SERVICES);

	class ReportController extends Controller
	{	

		public function __construct()
		{

			$this->model = model('ReportModel');
			$this->reportService = new ReportService();
		}

		public function create()
		{	

			$data = [];

			if (isset($_GET['report_create'])) {
				$request = request()->inputs();
				$reports = $this->reportService->generate($request['start_date'], $request['end_date']);
				$summary = $this->reportService->summarize($reports);

				$data = [
					'reports' => $reports,
					'summary' => $summary
				];
			}
			
			return $this->view('report/index' , $data);
		}

		public function createReports()
		{

		}
	}