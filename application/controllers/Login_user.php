<?php  
	/**
	* 
	*/
	class Login_user extends CI_Controller
	{
		public $status;
		public $roles;

		function __construct()
		{
			parent::__construct();
			$this->load->model('user_model', 'usr_mdl', TRUE);
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">', '</div>');
			$this->status = $this->config->item('status');
			$this->roles = $this->config->item('roles');
		}

		public function index()
		{
			$this->load->view('login/login_user');
		}

		public function register_view()
		{
			$this->load->view('login/register_user');
		}

		public function register()
		{
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('phone', 'Phone', 'required|max_length[15]|is_natural');

			if ($this->form_validation->run() == FALSE) 
				$this->register_view();
			else {
				if ($this->usr_mdl->is_duplicate($this->input->post('email'))) {
					$this->session->set_flashdata('flash_messsage', 'User email already exists');
					redirect('login');
				} else {
					$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
					$id = $this->usr_mdl->insert_user($clean);
					$token = $this->usr_mdl->insert_token($id);

					$qstring = $this->base64url_encode($token);
					$url = site_url().'login/complete/token/'.$qstring;
					$link = '<a href="'.$url.'">'.$url.'</a>';

					$message = '';
					$message .= '<strong>You have signed up</strong>';
					$message .= '<strong>Please click </strong>'.$link;
					exit;
				}
			}
		}

		public function complete()
		{
			$token = $this->base64url_decode($this->uri->segment(4));
			$clean_token = $this->security->xss_clean($token);

			// either null or an array
			$user_info = $this->usr_mdl->is_token_valid($clean_token);

			if (!$user_info) {
			 	$this->session->set_flashdata('flash_messsage', 'Token is invalid or expired');
			 	redirect('login');
		 	} 

		 	$data = array(
		 		'first_name' => $user_info['first_name'], 
		 		'email'		 => $user_info['email'],
		 		'user_id'	 => $user_info['user_id'],
		 		'token'		 => $this->base64url_encode($token)	
	 		);

	 		$this->form_validation->set_rules('password', 'Password', required|min_length[6]);
	 		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

	 		if ($this->form_validation->run == FALSE) 
	 			$this->load->view('login/complete');
	 		else{
	 			
	 		}
		}

		public function base64url_encode($data) 
		{ 
		    return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
		} 

		public function base64url_decode($data) 
		{ 
		    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
		}       
	}