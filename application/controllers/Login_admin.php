<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
	/**
	* 
	*/
	class Login_admin extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$this->page('login_user', array('title' => 'Login User'));
		}

		public function page($page, $data)
		{  
			if (!file_exists(APPPATH.'views/pages/login_user/'.$page.'.php'))
				show_404();

	        $this->load->view('templates/login_user/header', $data);
	        $this->load->view('pages/login_user/'.$page, $data);
	        $this->load->view('templates/login_user/footer', $data);
	    }
	}