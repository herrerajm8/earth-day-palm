<?php
class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('index.php');
	}

	public function homepage()
	{
		$this->load->view('homepage.php');
	}

	public function enrollment()
	{
		$this->load->model('usermodel');
		$data['stud'] = $this->usermodel->getStud();
		$data['info'] = $this->usermodel->getInfo();



		$this->load->view('enrollment.php' ,$data);
	}

	public function all_classes()
	{
		$this->load->model('usermodel');
		$data['subj'] = $this->usermodel->getSubj();
		$data['stud'] = $this->usermodel->getStud();

		$this->load->view('all_classes.php', $data);
	}

	public function studyLoad()
	{
		$this->load->model('usermodel');
		$data['stud'] = $this->usermodel->getStud();
		$data['info'] = $this->usermodel->getInfo();

		$this->load->view('studyLoad.php',$data);
	}

	public function viewGrades()
	{
		$this->load->model('usermodel');
		$data['subj'] = $this->usermodel->getSubj();
		$data['stud'] = $this->usermodel->getStud();
		$this->load->view('viewGrades.php',$data);
	}

	public function admin()
	{
		$this->load->model('usermodel');
		$data['teacher'] = $this->usermodel->getTeacher();
		$this->load->view('admin/admin.php',$data);

	}
	public function management()
	{
		$this->load->model('usermodel');
		$data['teach'] = $this->usermodel->getTeacher();
		$data['tea'] = $this->usermodel->teacher_getInfo();
		$this->load->view('management.php',$data);

	}
	public function changePass()
	{
		$this->load->view('management.php');

	}
	public function classManagement()
	{
		$this->load->model('usermodel');
		$data['teach'] = $this->usermodel->getTeacher();
		$data['tea'] = $this->usermodel->teacher_getInfo();
		$this->load->view('Cmanagement.php',$data);

	}
	public function adminClasses()
	{
		$this->load->model('usermodel');
		$data['subj'] = $this->usermodel->getSubj();
		$data['teach'] = $this->usermodel->getTeacher();
		$this->load->view('admin/adminClasses.php',$data);

	}

	public function register(){
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->load->model('usermodel');
			$this->usermodel->register($_POST);
		}
		$this->load->view('index');
	}

	public function student_login_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('loginemail','Username','Required');
		$this->form_validation->set_rules('passLogin','Password','Required');

		if($this->form_validation->run())
		{
				$email = $this->input->post('loginemail');
				$password = $this->input->post('passLogin');
				$this->load->model('usermodel');
				if($this->usermodel->can_login($email,$password))
				{
					$session_data = array(
						'loginemail' => $email
					);
					//$this->session->set_userdata($session_data);
					$this->load->view('homepage');
				}
				else
				{
					redirect('welcome');
				}
			}
			else
			{
				redirect('welcome');
			}
		}

		public function teacher_register(){
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$this->load->model('usermodel');
				$this->usermodel->teacher_register($_POST);
			}
			redirect('welcome');
		}

		public function makeClass(){
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
			$this->load->model('usermodel');
			$this->usermodel->makeclass($_POST);
			}
		redirect('welcome');
		}





	}
