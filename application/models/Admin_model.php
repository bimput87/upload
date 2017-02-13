<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
	/**
	* This model is derived from Login model core
	*/
	class Admin_model extends CI_Model
	{	
		private $table_name;

		public function __construct()
		{
			parent::__construct();
			$this->table_name = 'admins';
			$this->load->library('bcrypt');
			date_default_timezone_set("Asia/Jakarta");
		}

		/**
		 * [check_login description]
		 * Function used for login, and after successfull login
		 * last login field is updated
		 * @param  [array] $post [array user detail param]
		 * @return [stdClass]       [row user detail]
		 */
		public function check_login($post)
		{
			$this->db->where('email', $post['email']);
			$query = $this->db->get($this->table_name);
			$user_info = $query->row();

			if (!$this->bcrypt->check_password($post['password'], $user_info->password)) {
				error_log('Unsuccessful login attempt ('.$post['password'].')');
				return FALSE;
			}
			
			$this->update_login_time($user_info->id);

			unset($user_info->password);

			return $user_info;
		}

		/**
		 * [update_login_time description]
		 * Function used for update last login field
		 * @param  [int] $id [user_id param]
		 * @return [void / nothing]     [just some stuff tricks :)]
		 */
		public function update_login_time($id)
		{
			$this->db->where('id', $id);
			$this->db->update($this->table_name, array('last_login' => date('Y-m-d h:i:s A')));

			return;
		}
	}