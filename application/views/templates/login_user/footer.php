<?php  
	$array_js = array(
		'jquery-2.2.3.min.js',
		'bootstrap.min.js',
		'waves.js',
		'admin.js'
	);

	echo "\n\t";

	foreach($array_js as $val)
		echo js_asset('', $val);
?>    

</body>
</html>