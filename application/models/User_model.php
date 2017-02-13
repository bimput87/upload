<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
	/**
	* This model is derived from Login model core
	*/
	class User_model extends MY_Login_model
	{	
		public function __construct()
		{
			$this->table_name = 'users';
		}
	}