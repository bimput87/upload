<?php  
	$array_js = array(
		'jquery-2.2.3.min.js',
		'bootstrap.min.js',
		'bootstrap-formhelpers.js' 
	);

	echo "\n\t";

	foreach ($array_js as $value) 
		echo js_asset('',$value);
		
?>