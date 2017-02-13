<?php  
	/**
	* class admin controller
	*/
	class Admin_controller extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			if (empty($this->session->userdata('email')) && $this->session->userdata('role') != 'admin'){
				$_SESSION['flash_messsage'] = 'You are not allowed to access !';
				$this->session->mark_as_temp('flash_messsage', 1);
				redirect('/');
			} 
			$this->load->model('admin_model', 'mdl', TRUE);
		}

		public function index()
		{
			$data = array(
				'title' 	=> 'Dasboard Admin',
				'm_sum'		=> $this->mdl->count('members'),
				'city_sum'	=> $this->mdl->distinct('city', 'members'),
				'or_sum'		=> $this->mdl->count('orders')
			);
			$this->page('dashboard',$data);
		}

		public function new_members()
		{
			$date = date('Y-m-d');

		}

		public function page($page, $data)
		{  
			if (!file_exists(APPPATH.'views/pages/admin/'.$page.'.php'))
				show_404();

	        $this->load->view('templates/admin/header', $data);
	        $this->load->view('templates/admin/menubar', $data);
	        $this->load->view('templates/admin/sidebar', $data);
	        $this->load->view('pages/admin/'.$page, $data);
	        $this->load->view('templates/admin/footer', $data);
	    }

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('/');
		}
	}