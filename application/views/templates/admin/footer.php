<?php  
	$array_js = array(
		'bootstrap.min.js',
		'fastclick.js',
		'app.min.js',
		'jquery.sparkline.min.js',
		'jquery-jvectormap-1.2.2.min.js',
		'jquery-jvectormap-world-mill-en.js',
		'jquery.slimscroll.min.js',
		'Chart.min.js',
		'demo.js',
		'jquery.dataTables.min.js',
		'dataTables.bootstrap.min.js',
		'nprogress.js'
	);

	echo "\n\t";

	foreach($array_js as $val)
		echo js_asset('', $val);
?>
<script type="text/javascript">
  	$('body').show();
    NProgress.start();
    setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1500);
</script>

</body>
</html>