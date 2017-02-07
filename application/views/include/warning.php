<?php
	$arr = $this->session->flashdata(); 
	if(!empty($arr['flash_message'])){
		$html = '<div class="alert alert-danger alert-dismissible">';
		$html .= $arr['flash_message']; 
		$html .= '</div>';
		echo $html;
	}
?>