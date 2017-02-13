<?php  
	/**
	* 
	*/
	class Admin_controller extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			echo "index";
			print_r($this->session->userdata());
			echo anchor('admin_controller/logout', 'Logout');
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('/');
		}
	}