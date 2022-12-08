<?php 
	
	load(['UserForm'] , APPROOT.DS.'form');

	use Form\UserForm;

	class AuthController extends Controller
	{	

		public function __construct()
		{
			$this->user = model('UserModel');
			$this->_form = new UserForm();
		}

		public function index()
		{
			return $this->login();
		}

		public function login()
		{
			if(whoIs()) {
				return redirect('/DashboardController');
			}
			if( isSubmitted() )
			{
				$post = request()->posts();

				$res = $this->user->authenticate($post['username'] , $post['password']);

				if(!$res) {
					Flash::set( $this->user->getErrorString() , 'danger');
					return request()->return();
				}else
				{
					Flash::set( "Welcome Back !" . auth('first_name'));
				}
				
				if(isEqual(whoIs('user_type'),'customer')) {
					return redirect(_route('appointment:index'));
				}
				return redirect('DashboardController');
			}

			$form = $this->_form;

			$form->init([
				'url' => _route('auth:login')
			]);

			$form->customSubmit('Login' , 'submit' , [
				'class' => 'btn btn-primary'
			]);

			$data = [
				'title' => 'Login Page',
				'form'  => $form
			];

			return $this->view('auth/login' , $data);
		}

		public function register() {
			
		}

		public function logout()
		{
			session_destroy();
			
			Flash::set("Successfully logged-out");
			return redirect( _route('home:index') );
		}
	}