<?php  
	/**
	* class admin controller
	*/
	class Admin_controller extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			if ($this->session->userdata('role') != 'admin'){
				$_SESSION['flash_messsage'] = 'You are not allowed to access !';
				$this->session->mark_as_temp('flash_messsage', 1);
				redirect('/');
			} 
			$this->load->model('admin_model', 'mdl', TRUE);
		}

		public function index()
		{
			/*orders*/
			$or_sum = $this->mdl->count('orders', '');
			$completed = $this->mdl->count('orders', array('status' => 1));
			$percent_completed =  ceil(($completed/$or_sum)*100);

			/*api*/
			$api_sum = $this->mdl->count('api_keys', '');
			$api_completed = $this->mdl->count('api_keys', array('active' => 1));
			$api_perc = ceil(($api_completed/$api_sum)*100);

			$data = array(
				'title' 	=> 'Dasboard Admin',
				'm_sum'		=> $this->mdl->count('members', ''),
				'city_sum'	=> $this->mdl->distinct('city', 'members'),
				'or_sum'	=> $or_sum,
				'or_compl'	=> $completed,
				'or_perc'	=> $percent_completed,
				'api_sum'	=> $api_sum,
				'api_act'	=> $api_completed,
				'api_perc'	=> $api_perc,
				'col_name'	=> array('domain', 'key', 'updated_at', 'active'),
				'lat_mem'	=> $this->mdl->select(array('first_name', 'last_login'), 4, 'members', 'last_login' ,'desc')->result_array(),
				'api_show'	=> $this->mdl->select(array('domain', 'key', 'updated_at', 'active'), 5, 'api_keys', 'updated_at', 'desc')->result_array()
			);
			$this->page('dashboard',$data);
		}

		public function members()
		{
			$id = $this->session->userdata('id');
			$sel = array(
				'm.id AS "id"', 
				'm.first_name AS "first_name"', 
				'm.email AS "email"', 
				'm.phone AS "phone"', 
				'm.country AS "country"', 
				'm.city AS "city"', 
				'COUNT(o.user_id) AS "orders"'
			);
			$col = array('id', 'first_name', 'email', 'phone', 'country', 'city', 'orders');
			$data = array(
				'title'		=> 'Show Members',
				'col_name'	=> $col,
				'list_member'	=> $this->mdl->select_spec($sel, 'members m, orders o', 'm.id', 'm.id = o.user_id')->result_array()
			);
			$this->page('members', $data);

		}

		public function page($page, $data)
		{  
			if (!file_exists(APPPATH.'views/pages/admin/'.$page.'.php'))
				show_404();

	        $this->load->view('templates/admin/header', $data);
	        $this->load->view('templates/admin/menubar', $data);
	        $this->load->view('templates/admin/sidebar', $data);
	        $this->load->view('pages/admin/'.$page, $data);
	        $this->load->view('templates/admin/footer', $data);
	    }

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('/');
		}
	}