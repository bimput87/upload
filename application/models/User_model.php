<?php  
/**
* Models for user authentication(login, reset_password & signup)
*/
class User_model extends CI_Model
{	
	/**
	 * [$roles description]
	 * Global var array stored roles
	 * @var [array]
	 */
	public $roles;
	/**
	 * [$status description]
	 * Global var array stored status
	 * @var [array]
	 */
	public $status;

	/**
	 * [__construct description]
	 * Initialize everything here
	 * 1. Fill the roles and status variable
	 * 2. Load library bcrypt encryption
	 */
	function __construct()
	{
		parent::__construct();
		$this->roles = $this->config->item('roles');
		$this->status = $this->config->item('status');
		$this->load->library('bcrypt');
		date_default_timezone_set("Asia/Jakarta");
	}

	/**
	 * [insert_user description]
	 * Function used for inserting new user onto the database
	 * @param  [array] $post [array post]
	 * @return [int]       [user_id]
	 */
	public function insert_user($post)
	{
		$string_array = array(
			'first_name'=> $post['first_name'],
			'last_name' => $post['last_name'],
			'email'		=> $post['email'],
			'phone'		=> $post['phone'],
			'country'	=> $post['country'],
			'role'		=> $this->roles[0],
			'status'	=> $this->status[0]
		);

		$q = $this->db->insert_string('users', $string_array);
		$this->db->query($q);
		return $this->db->insert_id();
	}

	/**
	 * [is_duplicate description]
	 * Function used for checking is there any email while user input 
	 * an email 
	 * @param  [String]  $email [email param]
	 * @return boolean        [is there are affected rows or not ?]
	 */
	public function is_duplicate($email)
	{
		$this->db->get_where('users', array('email' => $email));
		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}

	/**
	 * [get_user_info_by_email description]
	 * Function used for get user detail based on email
	 * @param  [String] $email [email param]
	 * @return [stdClass / boolean]        [return stdClass if success otherwise FALSE]
	 */
	public function get_user_info_by_email($email)
	{
		$q = $this->db->get_where('users', array('email' => $email,), 1);
		if($this->db->affected_rows() > 0){
			$row = $q->row();
			return $row;
		}else{
			error_log('No user found get user info ('.$email.')');
			return FALSE;
		}
	}

	/**
	 * [update_password description]
	 * Function used for update user password
	 * while a user requested reset their password
	 * @param  [array] $post [array user detail param]
	 * @return [boolean]       [success or not]
	 */
	public function update_password($post)
	{
		$this->db->where('id', $post['user_id']);
		$this->db->update('users', array('password' => $post['password']));
		$success = $this->db->affected_rows();

		if (!$success) {
			error_log('Unable to update password('.$post['user_id'].')');
			return FALSE;
		}
		return TRUE;
	}

	/**
	 * [get_user_info description]
	 * Function used for get detail user info by email
	 * @param  [int] $id [user id param]
	 * @return [stdClass / boolean]     [return stdClass if success otherwise FALSE]
	 */
	public function get_user_info($id)
	{
		$q = $this->db->get_where('users', array('id' => $id));
		if ($this->db->affected_rows() > 0) {
			$row = $q->row();
			return $row;
		}else{
			error_log('no user found  by id ('.$id.')');
			return FALSE;
		}
	}

	/**
	 * [insert_token description]
	 * Function used for insert a token, token used for security reasons while
	 * user reset their password or there're new register request
	 * @param  [int] $user_id [user id param]
	 * @return [varchar]          [combination between token & user_id]
	 */
	public function insert_token($user_id)
	{
		$token = substr(sha1(rand()), 0, 30);
		$date = date('Y-m-d');

		$string_array = array(
			'token' 		=> $token,
			'user_id'	=> $user_id,
			'created'	=> $date
		);

		$query = $this->db->insert_string('tokens', $string_array);
		$this->db->query($query);
		return $token.$user_id;
	}

	/**
	 * [is_token_valid description]
	 * Function used for checking if a token is valid or not
	 * @param  [varchar]  $token [token]
	 * @return boolean/stdClass        [stdClass while success otherwise FALSE]
	 */
	public function is_token_valid($token)
	{
		$tkn = substr($token, 0, 30);
		$uid = substr($token, 30);

		$q = $this->db->get_where('tokens', array(
				'tokens.token'	=> $tkn,
				'tokens.user_id'=> $uid
			),
			1
		);

		if ($this->db->affected_rows() > 0) {
			$row = $q->row();

			$created = $row->created;
			$created_ts = strtotime($created);
			$today = date('Y-m-d');
			$today_ts = strtotime($today);

			if($created_ts != $today_ts)
				return FALSE;

			$user_info = $this->get_user_info($row->user_id);

			return $user_info;
		}else
			return FALSE;
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
		$query = $this->db->get('users');
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
		$this->db->update('users', array('last_login' => date('Y-m-d h:i:s A')));

		return;
	}

	/**
	 * [update_user_info description]
	 * Function used for update user info after completing their registration 
	 * process
	 * @param  [array] $post [array param]
	 * @return [stdClass / boolean]       [stdClass if success otherwise is not]
	 */
	public function update_user_info($post)
	{
		$data = array(
			'password' 	=> $post['password'], 
			'last_login'=> date('Y-m-d h:i:s A'),
			'status'	=> $this->status[1] 
		);

		$this->db->where('id', $post['user_id']);
		$this->db->update('users', $data);
		$success = $this->db->affected_rows();

		if(!$success){
			error_log('Unable to update user info ('.$post['user_id'].')');
			return FALSE;
		}

		$user_info = $this->get_user_info($post['user_id']);

		return $user_info;
	}


}