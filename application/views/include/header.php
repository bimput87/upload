<?php  
	$array_css = array(
		'bootstrap.min.css',
		'AdminLTE.min.css',
		'bootstrap-formhelpers.css'
	);

	echo "\n\t";
	
	foreach ($array_css as  $value) 
		echo css_asset('', $value);

?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  	<link rel="shortcut icon" href="<?php echo base_url() ?>favicon.ico" type="img/x-icon">

