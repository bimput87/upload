<?php  
	$array_js = array(
		'jquery-2.2.3.min.js',
		'bootstrap.min.js',
		'waves.js',
		'admin.js',
		'bootstrap-formhelpers.js' 
	);

	echo "\n\t";

	foreach($array_js as $val)
		echo js_asset('', $val);
?>    
<script type="text/javascript">
	setTimeout(function() {
		$('.alert').fadeOut(1000);
		},
		1000
	);
	</script>

</body>
</html>