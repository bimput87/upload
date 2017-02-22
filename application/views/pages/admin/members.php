<body class="hold-transition skin-red sidebar-mini">
	<div class="wrapper">

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">

				<h1>
					Members
				</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url() ?>members"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Members</li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<!-- /.box-header -->
							<div class="box-body">
								<table id="example2" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>E-Mail</th>
											<th>Contact</th>
											<th>Country</th>
											<th>City</th>
											<th>Orders</th>
										</tr>
									</thead>
									<tbody>
										<?php  
										for ($i=0; $i < sizeof($list_member); $i++) {
											echo '<tr>'; 
											for ($j=0; $j < sizeof($list_member[$i]); $j++) {
												if($j == 0) 
													echo '<td>USR-'.(($list_member[$i][$col_name[$j]])-1).'</td>';
												elseif($j == 4)
													echo '<td> <span class="bfh-countries" data-country="'.$list_member[$i][$col_name[$j]].'" data-flags="true"></span> </td>';
												else
													echo '<td>'.$list_member[$i][$col_name[$j]].'</td>';
											}
											echo '</tr>';
										}
										?>
									</tbody>
									<tfoot>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>E-Mail</th>
											<th>Contact</th>
											<th>Country</th>
											<th>City</th>
											<th>Orders</th>
										</tr>
									</tfoot>
								</table>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</section>
			<!-- /.content -->
		</div>
  <!-- /.content-wrapper -->