<?php  
/**
* 
*/
class User_model extends CI_Model
{
	public $roles;
	public $status;

	function __construct()
	{
		parent::__construct();
		$this->roles = $this->config->item('roles');
		$this->status = $this->config->item('status');
	}

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

	public function is_duplicate($email)
	{
		$this->db->get_where('users', array('email' => $email));
		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}

	public function insert_token($user_id)
	{
		$token = substr(sha1(rand()), 0, 30);
		$date = date('Y-m-d');

		$string_array = array(
			'token' 	=> $token,
			'user_id'	=> $user_id,
			'date'		=> $date
		);

		$query = $this->db->insert_string('tokens', $string_array);
		$this->db->query($query);
		return $token.$user_id;
	}

	public function FunctionName($value='')
	{
		# code...
	}
}


/*
							'users' 
+------------+--------------+------+-----+---------+----------------+
| Field      | Type         | Null | Key | Default | Extra          |
+------------+--------------+------+-----+---------+----------------+
| id         | int(10)      | NO   | PRI | NULL    | auto_increment |
| email      | varchar(100) | NO   |     | NULL    |                |
| first_name | varchar(100) | NO   |     | NULL    |                |
| last_name  | varchar(100) | NO   |     | NULL    |                |
| country    | varchar(20)  | NO   |     | NULL    |                |
| phone      | int(15)      | NO   |     | NULL    |                |
| role       | varchar(10)  | NO   |     | NULL    |                |
| password   | text         | NO   |     | NULL    |                |
| last_login | varchar(100) | NO   |     | NULL    |                |
| status     | varchar(100) | NO   |     | NULL    |                |
+------------+--------------+------+-----+---------+----------------+
10 rows in set (0.06 sec)
*/