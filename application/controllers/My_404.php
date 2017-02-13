<?php  
	/**
	* 
	*/
	class My_404 extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$this->output->set_status_header('404');
			$data['title'] = '404';
	        $this->load->view('templates/member/header', $data);
			$this->load->view('index', $data);
		}
	}