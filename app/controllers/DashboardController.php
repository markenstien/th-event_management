<?php 

	class DashboardController extends Controller
	{

		public function __construct()
		{
			$this->calendar_model = model('CalendarModel');
		}

		public function index()
		{
			return $this->view('tmp/maintenance');
		}
	}