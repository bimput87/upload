<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
	/**
	* class Member 
	*/
	class Member extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			if (empty($this->session->userdata('email'))){
				$_SESSION['flash_messsage'] = 'You are not allowed to access';
				$this->session->mark_as_temp('flash_messsage', 1);
				redirect(site_url().'login_user');
			} 
		}

		public function index()
		{
			$this->load->view('pages/member/dashboard');
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('login_user');
		}

		public function page($page)
		{  
			if (!file_exists(APPPATH.'views/pages/member/'.$page.'.php'))
				show_404();

	        $data['title'] = ucfirst($page);

	        $this->load->view('templates/member/header', $data);
	        $this->load->view('pages/member/'.$page, $data);
	        $this->load->view('templates/member/footer', $data);
	    }
}