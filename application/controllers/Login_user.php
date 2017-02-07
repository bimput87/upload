<?php  
	/**
	* Login class
	*/
	class Login_user extends CI_Controller
	{
		public $status;
		public $roles;

		function __construct()
		{
			parent::__construct();
			$this->load->model('user_model', 'usr_mdl', TRUE);
			$this->load->library(array('form_validation', 'bcrypt'));
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

		public function do_login()
		{
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == FALSE) 
				redirect('/');
			else{
				$post = $this->input->post();
				$clean = $this->security->xss_clean($post);

				$user_info = $this->usr_mdl->check_login($clean);

				if (!$user_info) {
					$_SESSION['flash_messsage'] = 'The login was unsuccessful';
					$this->session->mark_as_temp('flash_messsage', 60); // Expire in 1 minutes
					redirect(site_url().'login_user/do_login');
				}
				foreach ($user_info as $key => $value) 
					$this->session->set_userdata($key, $value);

				echo "Sukses login";
			}
		}

		public function reset_password()
		{
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			if($this->form_validation->run() == FALSE)
				$this->load->view('login/forgot');
			else{
				$email = $this->input->post('email');
				$clean = $this->security->xss_clean($email);
				$user_info = $this->usr_mdl->get_user_info($clean);

				if (!$user_info) {
					$this->session->set_flashdata('flash_messsage', 'We can\'t find your email address');
					redirect('/');
				} else {
					$email = $this->input->post('email');
					$clean = $this->security->xss_clean($email);
					$user_info = $this->usr_mdl->get_user_info_by_email($clean);

					if (!$user_info) {
						$this->session->set_flashdata('flash_messsage', 'We can\'t find find your email address');
						redirect('/');
					}

					if ($user_info->status != $this->status[1]) {
						$this->session->set_flashdata('flash_messsage', 'Your account is not in approved status');
						redirect('/');
					}	

					/*build token*/

					$token = $this->usr_mdl->insert_token($user_info->id);
					$qstring = $this->base64url_encode($token);
					$url = site_url().'login/reset_password';
					$link = '<a href=" '.$url.' ">'. $url .'</a>';

					$message = '';
					$message .= '<strong>A password reset has been requested for this email account</strong></br>';
					$message .= '<strong>Please click: </strong>'.$link;
					echo $message;
					exit;									
				}
			}
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
					redirect('/');
				} else {
					$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
					$id = $this->usr_mdl->insert_user($clean);
					$token = $this->usr_mdl->insert_token($id);

					$qstring = $this->base64url_encode($token);
					$url = site_url().'login_user/complete/token/'.$qstring;
					$link = '<a href="'.$url.'">'.$url.'</a>';

					$message = '';
					$message .= '<strong>You have signed up</strong></br>';
					$message .= '<strong>Please click </strong>'.$link;
					echo $message;
					
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
			 	redirect('/');
		 	} 

		 	$data = array(
		 		'first_name' => $user_info->first_name, 
		 		'email'		 => $user_info->email,
		 		'user_id'	 => $user_info->id,
		 		'token'		 => $this->base64url_encode($token)	
	 		);

	 		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
	 		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

	 		if ($this->form_validation->run() == FALSE) 
	 			$this->load->view('login/complete', $data);
	 		else{
	 			$post = $this->input->post(NULL, TRUE);
	 			$clean_post = $this->security->xss_clean($post);
	 			$hashed = $this->bcrypt->hash_password($clean_post['password']);
	 			$clean_post['password'] = $hashed;
	 			unset($clean_post['passconf']);
	 			$usr_info = $this->usr_mdl->update_user_info($clean_post);
	 			// print_r($clean_post);
	 			if (!$usr_info) {
	 				$this->session->set_flashdata('flash_messsage', 'There was a problem while updating data');
	 				redirect('/');
	 			}
	 			unset($usr_info->password);
	 			foreach ($usr_info as $key => $value) 
	 				$this->session->set_userdata($key, $value);

	 			redirect('/');
	 			
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