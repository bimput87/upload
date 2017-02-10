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
				$_SESSION['flash_messsage'] = 'You are not allowed to access or your session has been expired';
				$this->session->mark_as_temp('flash_messsage', 1);
				redirect(site_url().'login_user');
			} 

			$this->load->model('Member_model', 'mdl', TRUE);
		}

		public function index()
		{
			$data = array('title' => 'Dasboard User');
			$this->page('dashboard',$data);
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect(site_url().'login_user');
		}

		public function page($page, $data)
		{  
			if (!file_exists(APPPATH.'views/pages/member/'.$page.'.php'))
				show_404();

	        $this->load->view('templates/member/header', $data);
	        $this->load->view('templates/member/menubar', $data);
	        $this->load->view('templates/member/sidebar', $data);
	        $this->load->view('pages/member/'.$page, $data);
	        $this->load->view('templates/member/footer', $data);
	    }

	    public function show_api()
	    {
	    	$data = array('title' => 'Show API');
	    	$this->page('show', $data);
	    }

	    public function api_data_json()
	    {
	    	// $list = $this->mdl
	    }
}