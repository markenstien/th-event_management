<?php
	
	load(['DoctorForm'], APPROOT.DS.'form');

	use Form\DoctorForm;

	class HomeController extends Controller
	{
		public function index()
		{	
			return view('home/index');
		}

		public function bookEvent() {
			$req = request()->inputs();
			
			if(isset($req['package'])) {
				return $this->view('home/book_event_basic');
			}

			return $this->view('home/book_event');
		}
		public function about() {

		}

		public function portfolio() {

		}

		public function contact() {
			
		}
	}