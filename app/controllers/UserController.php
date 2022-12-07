<?php
	load(['UserForm'] , APPROOT.DS.'form');
	use Form\UserForm;

	class UserController extends Controller
	{
		private $_form;


		public function __construct()
		{
			$this->_form = new UserForm('form_user');
			$this->model = model('UserModel');
			$this->appointment = model('AppointmentModel');
		}

		public function verification($user_id_sealed)
		{
			$user_id = unseal($user_id_sealed);

			$res = $this->model->verification($user_id);

			if($res) {
				Flash::set( $this->model->getMessageString() );
				return redirect( $this->model->redirect_to );
			}

			Flash::set( $this->model->getErrorString() , 'danger');
			return redirect( _route('user:register') );
		}

		public function register()
		{		

			if( isSubmitted() )
			{
				$post = request()->posts();

				$res = $this->model->register($post , 'profile');

				Flash::set( $this->model->getMessageString().  " Please Check your email '{$post['username']}' and verify your account. ");

				if(!$res) {
					Flash::set( $this->model->getErrorString() , 'danger');
					return request()->return();
				}

				return redirect(_route('auth:login'));
			}

			$this->_form->init([
				'url' => _route('user:register')
			]);

			$this->_form->setValue('submit' , 'Register');
			$this->_form->remove('user_type');
			$this->_form->add([
				'type' => 'hidden',
				'value' => 'patient',
				'name'  => 'user_type'
			]);
			
			$data = [
				'title' => 'User Registration',
				'form'  => $this->_form
			];

			return $this->view('user/register' , $data);
		}

		public function index()
		{

			$data = [
				'users' => $this->model->getAll(),
				'title' => 'Users'
			];

			return $this->view('user/index' , $data);
		}

		public function create()
		{

			if( isSubmitted() )
			{
				$post = request()->posts();

				$post['is_verified'] = true;
				$res = $this->model->create($post , 'profile');

				Flash::set( $this->model->getMessageString());

				if(!$res) {
					Flash::set( $this->model->getErrorString() , 'danger');
					return request()->return();
				}

				return redirect(_route('user:index'));
			}

			$this->_form_address->remove('submit');


			$data = [
				'title' => 'Create User',
				'form'  => $this->_form,
				'form_address' => $this->_form_address
			];

			return $this->view('user/create_edit' , $data);
		}


		public function edit($id)
		{

			if( isSubmitted() )
			{
				$post = request()->posts();
				$res = $this->model->save($post , $id);

				if($res) {
					Flash::set( "User updated !");
					return redirect( _route('user:edit' , $id));
				}else{
					Flash::set( $this->model->getErrorString() );
				}
			}

			$user = $this->model->get($id);

			$this->_form->setUrl(_route('user:edit' , $id));

			$this->_form->addId($id);
			$this->_form->setValueObject($user);
			
			$data = [
				'title' => 'Create User',
				'form'  => $this->_form,
				'user'   => $user,
			];

			return $this->view('user/create_edit' , $data);
		}

		public function profile()
		{
			return $this->show( whoIs('id') );
		}

		public function show($id)
		{
			$user = $this->model->get($id);

			if(!$user){
				Flash::set("Doctor not found" , 'danger');
				return request()->return();
			}
			$data = [
				'user' => $user
			];

			switch( strtolower($user->user_type) )
			{
				case 'doctor':

				$doctor_model = model('DoctorModel');

				$doctor_specialization = model('DoctorSpecializationModel');

				$prefix = $user->gender == 'male' ? 'DR.' : 'DRA';

				$data['title']  = $prefix.'. '.$user->first_name . ' '.$user->last_name;

				$data['doctor'] = $doctor_model->getByUser($user->id);


				$data['doctor_specializations'] = $doctor_specialization->getByUser($user->id);

				$data['sessions'] = $this->session->getAll([
					'where' => [
						'doctor_id' => $user->id
					]
				]);
				

				return $this->view('user/doctor_view' , $data);
				break;

				case 'patient':
				
				$data['appointments'] = $this->appointment->getDesc('id' , ['user_id' => $user->id]);
				
				$data['sessions'] = $this->session->getAll([
					'where' => [
						'user_id' => $user->id
					]
				]);

				$this->view('user/patient_view' , $data);
				break;

				default:
					//admin
				$this->view('user/admin_view' , $data);
				break;
			}
		}

		public function sendAuth()
		{
			if( isSubmitted() )
			{
				$post = request()->posts();


				$user = $this->model->get( $post['user_id'] );

				$recipients = explode(',' , $post['recipients']);

				$content = pull_view('tmp/emails/user_auth_email_view_tmp' , [
					'user' => $user,
					'system_name' => COMPANY_NAME
				]);

				_mail($recipients , "User Auth" , $content);

				_notify_operations("Account details has been sent, recipients {$post['recipients']} ");

				Flash::set("Auth has been sent");

				return request()->return();
			}
		}
			
	}