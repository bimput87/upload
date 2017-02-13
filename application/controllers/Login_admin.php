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
			$this->page('login_admin', array('title' => 'Admin Login'));
		}

		public function page($page, $data)
		{  
	        $this->load->view('templates/login/header', $data);
	        $this->load->view('pages/login_admin/'.$page, $data);
	        $this->load->view('templates/login/footer', $data);
	    }

	    public function login()
	    {
	    	echo "You have logged in as admin</br>";
	    	print_r($this->input->post(NULL, TRUE));
	    }
	}