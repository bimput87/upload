		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 1.0
			</div>
			<strong>Copyright &copy; 2017 <a href="http://ubig.co.id">UBIG</a>.</strong> All rights
			reserved | Developed by <strong>ndasoft</strong>
		</footer>

	</div>
	<!-- ./wrapper -->

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
		'bootstrap-formhelpers.js', 
		'nprogress.js'
	);

	echo "\n\t";

	foreach($array_js as $val)
		echo js_asset('', $val);
?>

<?php 
	if($this->uri->segment(2) == 'members'){
		?>
	<script type="text/javascript">
	  	$('#example2').DataTable({
	      	autoWidth		: true,
	      	responsive		: true,
	      	lengthMenu		: [5, 10, 15, 20]
		});
	</script>
		<?php
	} 
?>

	<script type="text/javascript">
	  	$('body').show();
	    NProgress.start();
	    setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 400);
	</script>

</body>
</html>