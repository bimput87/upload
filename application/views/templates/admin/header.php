<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminUBIG | <?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php  
  	$array_css = array(
  		'bootstrap.min.css',
  		'AdminLTE.min.css',
  		'skin-red.min.css',
  		'jquery-jvectormap-1.2.2.css',
  		'dataTables.bootstrap.css',
      'bootstrap-formhelpers.css',
  		'nprogress.css'
	);
	
	echo "\n\t";

	foreach ($array_css as $value) 
		echo css_asset('', $value);
  ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  	<link rel="shortcut icon" href="<?php echo base_url() ?>favicon.ico" type="img/x-icon">
    <?php echo js_asset('', 'jquery-2.2.3.min.js') ?>
</head>

