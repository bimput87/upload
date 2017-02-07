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
<script type="text/javascript">
	setTimeout(function() {
		$('.alert').fadeOut(1000);
		},
		1000
	);
</script>