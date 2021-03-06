<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
	/**
	* This user login class is derived from login core controllers
	*/
	class Login_user extends CI_Controller
	{
		
		/**
		 * [$roles description]
		 * Global var array stored roles
		 * @var [array]
		 */
		private $roles;
		/**
		 * [$status description]
		 * Global var array stored status
		 * @var [array]
		 */
		private $status;

		function __construct()
		{
			parent::__construct();
			$this->load->library(array('email', 'form_validation', 'bcrypt'));
			$this->load->model('member_model', 'mdl', TRUE);
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">', '</div>');
			$this->status = $this->config->item('status');
			$this->roles = $this->config->item('roles');
		}

		/**
		 * [index description]
		 * Render index page
		 * @return [view] [dashboard / login page]
		 */
		public function index()
		{
			if ($this->session->userdata('rememberme') == 'on' || $this->session->userdata('session_member') == 'true')
				redirect('member');
			else
				$this->do_login();	
		}

		/**
		 * [register_view description]
		 * Render register page
		 * @return [view] [register user]
		 */
		public function register_view()
		{
			$this->page('register_user', array('title' => 'Register Form'));
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
				$this->page('login_user', array('title' => 'User Login')); 
			else{
				$post = $this->input->post();
				$clean = $this->security->xss_clean($post);

				$user_info = $this->mdl->check_login($clean);
				
				if (!$user_info) {
					$this->session->set_flashdata('flash_messsage', 'The login was unsuccessful');
					redirect('/');
				}

				foreach ($user_info as $key => $value) 
					$this->session->set_userdata($key, $value);

				if(!empty($clean['rememberme']) && $clean['rememberme'] == 'on')
					$this->session->set_userdata('rememberme', 'on');

				$this->session->set_userdata('session_member', 'true');
				redirect('member');
			}
		}

		public function page($page, $data)
		{  
			if (!file_exists(APPPATH.'views/pages/login_user/'.$page.'.php'))
				show_404();

	        $this->load->view('templates/login/header', $data);
	        $this->load->view('pages/login_user/'.$page, $data);
	        $this->load->view('templates/login/footer', $data);
	    }

		/**
		 * [forgot description]
		 * Reset password page
		 * @return [redirect] [login page & send an email to user]
		 */
		public function forgot()
		{
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			if($this->form_validation->run() == FALSE)
				$this->page('forgot', array('title' => 'Forgot Password'));
			else{
				$email = $this->input->post('email');
				$clean = $this->security->xss_clean($email);
				$user_info = $this->mdl->get_user_info_by_email($clean);
				if (!$user_info) {
					$this->session->set_flashdata('flash_messsage', 'We can\'t find your email address');
					redirect(site_url().'forgot');
				} else {
					$email = $this->input->post('email');
					$clean = $this->security->xss_clean($email);
					$user_info = $this->mdl->get_user_info_by_email($clean);

					if (!$user_info) {
						$this->session->set_flashdata('flash_messsage', 'We can\'t find find your email address');
						redirect('/');
					}

					if ($user_info->status != $this->status[1]) {
						$this->session->set_flashdata('flash_messsage', 'Your account is not in approved status');
						redirect('/');
					}	

					/*build token*/
					$token = $this->mdl->insert_token($user_info->id);
					$qstring = $this->base64url_encode($token);
					$url = site_url().'login_user/reset_password/token/'.$qstring;
					$link = '<a href="'.$url.'">'.$url.'</a>';

					/*Send Email*/
					$message = '';
					$message .= '<strong>A password reset has been requested for this email account</strong></br>';
					$message .= '<strong>Please click: </strong>'.$link;

					$sendmail = array(
						'from'		=> "'rezapahlevi056@gmail.com', 'Reza Pahlevi'",
						'to' 		=> $user_info->email,
						'subject' 	=> 'Reset Password - UBIG',
						'message'	=> $message
					);

/*					$this->email_conf = $sendmail;
					
					$res = $this->sendmail($this->email_conf);
					
					$this->session->set_flashdata('flash_messsage', 'Check your email for reset your password');
					redirect('/');				
*/					echo $message;
				}
			}
		}

		/**
		 * [sendmail description]
		 * @param  array  $email [mail description]
		 * @return [debug / boolean]        [debug messsage or success sented]
		 */
		public function sendmail($m = array())
		{
		 	$config['protocol']    	= 'smtp';
           	$config['smtp_host']    = 'smtp.gmail.com';
           	$config['smtp_port']    = '465';
           	$config['smtp_timeout'] = '7';
           	$config['smtp_user']    = 'mailuser';
           	$config['smtp_pass']    = 'mailpassword#';
           	$config['charset']    	= 'utf-8';
           	$config['smtp_crypto'] 	= 'ssl';
           	$config['newline']    	= "\r\n";
           	$config['mailtype'] 	= 'html'; // or html
           	$config['validation'] 	= TRUE; // bool whether to validate email or not      
           	$this->email->initialize($config);

			/*Send email there*/
			$this->email->from($m['from']);
			$this->email->to($m['to']);
			$this->email->subject($m['subject']);
			$this->email->message($m['message']);

			if($this->email->send())
				return TRUE;
			else
				return $this->email->print_debugger();
		}

		/**
		 * [reset_password description]
		 * Checking for password input from reset password page and storing on the database
		 * @return [redirect] [description]
		 */
		public function reset_password()
		{
			$token = $this->base64url_decode($this->uri->segment(4));
			$clean_token = $this->security->xss_clean($token);

			/*either false or an array*/
			$user_info = $this->mdl->is_token_valid($clean_token);	
			
			if (empty($user_info) && $user_info != FALSE) {
				$this->session->set_flashdata('flash_messsage', 'Token is invalid or expired');
				redirect('/');
			}
			
			/*Prepare Data*/
			$array = json_decode(json_encode($user_info), TRUE);
			$first_name = $array['first_name'];
			$email = $array['email'];
			$id = $array['id'];

			$data = array(
				'first_name' 	=> $first_name,
				'email' 		=> $email,
				'user_id'		=> $id,
				'token'			=> $this->base64url_encode($token),
				'title'			=> 'New Password'
			);

			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

			if ($this->form_validation->run() == FALSE) 
				$this->page('reset_password', $data);
			else{
				$post = $this->input->post(NULL, TRUE);
				$clean_post = $this->security->xss_clean($post);
	 			$hashed = $this->bcrypt->hash_password($clean_post['password']);
				$clean_post['password'] = $hashed;
				
				unset($clean_post['passconf']);
				
				if (!$this->mdl->update_password($clean_post)) 
					$this->session->set_flashdata('flash_messsage', 'There was a problem while updating your password');
				else 
					$this->session->set_flashdata('flash_messsage', 'Your password has been updated. You may now login');
				
				redirect('/');
			}

		}

		/**
		 * [register description]
		 * Showing form register
		 * @return [view / send email] 
		 */
		public function register()
		{
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('phone', 'Phone', 'required|max_length[15]|is_natural');
			$this->form_validation->set_rules('city', 'City', 'required');

			if ($this->form_validation->run() == FALSE) 
				$this->register_view();
			else {
				if ($this->mdl->is_duplicate($this->input->post('email'))) {
					$this->session->set_flashdata('flash_messsage', 'User email already exists');
					redirect('/');
				} else {
					$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
					$id = $this->mdl->insert_user($clean);
					$token = $this->mdl->insert_token($id);

					$qstring = $this->base64url_encode($token);
					$url = site_url().'login_user/complete/token/'.$qstring;
					$link = '<a href="'.$url.'">'.$url.'</a>';

					/*Send Email*/
					$message = '';
					$message .= '<strong>You have signed up</strong></br>';
					$message .= '<strong>Please click </strong>'.$link;
					// echo $message;
					$sendmail = array(
						'from'		=> "'rezapahlevi056@gmail.com', 'Reza Pahlevi'",
						'to' 		=> $clean['email'],
						'subject' 	=> 'Complete Registration - UBIG',
						'message'	=> $message
					);

/*					$this->email_conf = $sendmail;
					
					$res = $this->sendmail($this->email_conf);
					
					$this->session->set_flashdata('flash_messsage', 'Check your email for complete registration');
					redirect('/');
*/					echo $message;
				}
			}
		}

		/**
		 * [complete description]
		 * After clicking link on the email confirmation showing complete password
		 * dialog
		 * @return [view] [member dashboard]
		 */
		public function complete()
		{
			$token = $this->base64url_decode($this->uri->segment(4));
			$clean_token = $this->security->xss_clean($token);

			// either null or an array
			$user_info = $this->mdl->is_token_valid($clean_token);

			if (!$user_info) {
			 	$this->session->set_flashdata('flash_messsage', 'Token is invalid or expired');
			 	redirect('/');
		 	} 

		 	$data = array(
		 		'first_name' => $user_info->first_name, 
		 		'email'		 => $user_info->email,
		 		'user_id'	 => $user_info->id,
		 		'token'		 => $this->base64url_encode($token),
		 		'title'		 => 'Complete Registration'	
	 		);

	 		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
	 		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

	 		if ($this->form_validation->run() == FALSE) 
	 			$this->page('complete', $data);
	 		else{
	 			$post = $this->input->post(NULL, TRUE);
	 			$clean_post = $this->security->xss_clean($post);
	 			$hashed = $this->bcrypt->hash_password($clean_post['password']);
	 			$clean_post['password'] = $hashed;
	 			unset($clean_post['passconf']);
	 			$usr_info = $this->mdl->update_user_info($clean_post);
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

		/*
		Some stuff function
		 */
		public function base64url_encode($data) 
		{ 
		    return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
		} 

		public function base64url_decode($data) 
		{ 
		    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
		}  
	}