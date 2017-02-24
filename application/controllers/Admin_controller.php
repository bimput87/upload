<?php  
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
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
				'CONCAT(m.first_name, " ", m.last_name) AS "name"', 
				'm.email AS "email"', 
				'm.phone AS "phone"', 
				'm.country AS "country"', 
				'm.city AS "city"', 
				'COUNT(o.user_id) AS "orders"'
			);
			$col = array('id', 'name', 'email', 'phone', 'country', 'city', 'orders');
			$data = array(
				'title'		=> 'Show Members',
				'col_name'	=> $col,
				'list_member'	=> $this->mdl->select_spec($sel, 'members m, orders o', 'm.id', 'm.id = o.user_id')->result_array()
			);
			$this->page('members', $data);

		}

		public function orders()
		{
			$sum 		= $this->mdl->count('orders', '');
			$completed 	= $this->mdl->count('orders', array('status' => 1));
			$pending 	= $this->mdl->count('orders', array('status' => 0));
			$expired 	= $this->mdl->count('orders', array('status' => 2));

			$col_select = array(
				'o.id AS "order_id"',
				'CONCAT(m.first_name, " ", m.last_name) AS "name"',
				'o.domain AS "domain"',
				'a.key AS "api_key"',
				'a.created_at AS "date"',
				'o.price AS "price"',
				'o.status AS "status"'
			);

			$data = array(
				'title' 	=> 'Orders API',
				'sum'		=> $sum,
				'completed'	=> $completed,
				'pending'	=> $pending,
				'expired'	=> $expired,
				'perc_comp'	=> ceil(($completed/$sum)*100),
				'perc_pend'	=> ceil(($pending/$sum)*100),
				'perc_exp'	=> ceil(($expired/$sum)*100),
				'column'	=> array('order_id', 'name', 'domain', 'api_key', 'date', 'price', 'status'),
				'data_order'=> $this->mdl->show_orders($col_select, 'orders o', 'api_keys a', 'members m', 'o.id = a.order_id', 'o.user_id = m.id', 'left')->result_array()		
			);
			
			$this->page('orders', $data);
		}

		public function api()
		{
			$sum = $this->mdl->count('api_keys', '');
			$completed = $this->mdl->count('api_keys', array('active' => 1));
			$non_active = $this->mdl->count('api_keys', array('active' => 0));

			$col_select = array(
				'a.order_id AS "id"',
				'CONCAT(m.first_name, " ", m.last_name) AS "name"',
				'a.domain AS "domain"',
				'a.key AS "key"',
				'a.active AS "status"'
			);

			$data = array(
				'title' => 'API Keys',
				'sum'	=> $sum,
				'comp'	=> $completed,
				'perc'	=> ceil(($completed/$sum)*100),
				'non'	=> $non_active,
				'pern'	=> ceil(($non_active/$sum)*100),
				'col'	=> array('id', 'name', 'domain', 'key', 'status'),
				'data'	=> $this->mdl->show_orders($col_select, 'api_keys a', 'orders o', 'members m', 'a.order_id = o.id ', 'o.user_id = m.id', 'left')->result_array()
			);

			$this->page('api', $data);
		}

		public function setting()
		{
			$data = array(
				'title'	=> 'Setting page',
				'price'	=> $this->mdl->select_col('options', array('value'), '')->result_array()[0]['value']
			);

			$this->page('settings', $data);
		}

		public function admin()
		{
			$this->page('admin', array('title' => 'Admin user'));
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