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
			$this->insert_log('Admin '.$post['email'].' logged in ');

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
			$this->db->update($this->table_name, array('last_login' => date('Y-m-d H:i:s')));

			return;
		}

		public function distinct($col, $table)
		{
			$this->db->select($col);
			$this->db->distinct();
			$this->db->get($table);
			return $this->db->affected_rows();
		}

		public function select_col($table, $col, $lim)
		{
			$this->db->select($col);
			
			if (!empty($lim)) 
				$this->db->limit($lim);

			return $this->db->get($table);
		}

		public function count($table, $where)
		{
			if (!empty($where))
				$this->db->where($where);

			return $this->db->count_all_results($table);
		}

		public function select($col, $lim, $table, $order_by_col, $order_type)
		{
			$this->db->select($col);
			$this->db->from($table);

			if($lim > 0)
				$this->db->limit($lim);

			$this->db->order_by($order_by_col, $order_type);

			return $this->db->get();
		}

		public function select_spec($col, $from, $group_by, $where)
		{
			$this->db->select($col);

			$this->db->from($from);

			$this->db->group_by($group_by);

			$this->db->where($where);

			return $this->db->get();
		}

		public function update_col($key, $value, $table)
		{
			$this->db->where('key', $key);
			$this->db->update($table, array('value' => $value));

			return $this->db->affected_rows();
		}

		public function show_orders($col, $table1, $table2, $table3, $on1, $on2, $type)
		{
			$this->db->select($col);

			$this->db->from($table1);

			$this->db->join($table2, $on1, $type);

			$this->db->join($table3, $on2, $type);

			return $this->db->get();
		}

		public function insert_log($log_name)
		{	
			$data = array(
				'time' 	=> date('Y-m-d H:i:s'),
				'logs'	=> $log_name,
				/*temp ip*/
				'ip'	=> gethostbyname($this->get_client_ip_server())
			);
			return $this->db->insert('logs', $data);
		}

		// Function to get the client ip address
		function get_client_ip_server() {
		    $ipaddress = '';
			try {
				if ($_SERVER['HTTP_HOST'])
			        $ipaddress = $_SERVER['HTTP_HOST'];
			    elseif ($_SERVER['HTTP_CLIENT_IP'])
			        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
			    elseif($_SERVER['HTTP_X_FORWARDED_FOR'])
			        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
			    elseif($_SERVER['HTTP_X_FORWARDED'])
			        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
			    elseif($_SERVER['HTTP_FORWARDED_FOR'])
			        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
			    elseif($_SERVER['HTTP_FORWARDED'])
			        $ipaddress = $_SERVER['HTTP_FORWARDED'];
			    elseif($_SERVER['REMOTE_ADDR'])
			        $ipaddress = $_SERVER['REMOTE_ADDR'];
			} catch (Exception $e) {
		        $ipaddress = 'UNKNOWN';
			}
		 
		    return $ipaddress;
		}
	}