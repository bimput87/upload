<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
	/**
	* class login admin
	*/
	class Login_admin extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('admin_model', 'mdl', TRUE);
		}

		public function index()
		{
			if ($this->session->userdata('role') == 'admin')
				redirect(site_url().'administrator');
			else
				$this->do_login();	
		}

		/**
		 * [do_login description]
		 * Login action do here
		 * @return [action] [redirect member page / login]
		 */
		public function do_login()
		{
			
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == FALSE)
				$this->page('login_admin', array('title' => 'Admin Login')); 
			else{
				$post = $this->input->post();
				$clean = $this->security->xss_clean($post);

				$user_info = $this->mdl->check_login($clean);
				
				if (!$user_info) {
					$this->session->set_flashdata('flash_messsage', 'The login was unsuccessful');
					redirect('admin');
				}

				foreach ($user_info as $key => $value) 
					$this->session->set_userdata($key, $value);

				redirect(site_url().'administrator');
			}
		}

		public function page($page, $data)
		{  
	        $this->load->view('templates/login/header', $data);
	        $this->load->view('pages/login_admin/'.$page, $data);
	        $this->load->view('templates/login/footer', $data);
	    }

	    public function get_ip()
	    {
	    	$ipaddress = '';
	        if (isset($_SERVER['HTTP_CLIENT_IP']))
	            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	        else if(isset($_SERVER['HTTP_X_FORWARDED']))
	            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
	            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	        else if(isset($_SERVER['HTTP_FORWARDED']))
	            $ipaddress = $_SERVER['HTTP_FORWARDED'];
	        else if(isset($_SERVER['REMOTE_ADDR']))
	            $ipaddress = $_SERVER['REMOTE_ADDR'];
	        else
	            $ipaddress = 'UNKNOWN';

	        echo $ipaddress;
	    }

	}