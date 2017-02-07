<?php  
	print_r($this->session->userdata());
	echo anchor('member/logout/', 'Logout');
?>