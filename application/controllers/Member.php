<?php  
	/**
	* 
	*/
	class Member extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$this->load->view('member/dashboard');
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('login_user');
		}
	}