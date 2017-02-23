<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
			 Orders
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url() ?>administrator"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Orders</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-6">
		            <div class="box box-danger">
		                <div class="box-header with-border">
		                    <h3 class="box-title">Legend</h3>
		                    <div class="box-tools pull-right">
		                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		                    </div>
		                    <!-- /.box-tools -->
		                </div>
		                <!-- /.box-header -->
		                <div class="box-body">
		                    <div class="col-md-12" style="margin-bottom: 10px">
                                <div class="progress-group">
		                            <span class="progress-text">Complete Purchase</span>
		                            <span class="label label-success col-md-4" style="margin-right: 10px">Verified</span>
		                        </div>
		                    </div>
		                    <div class="col-md-12" style="margin-bottom: 10px">
                                <div class="progress-group">
		                            <span class="progress-text">Pending Approval</span>
		                            <span class="label label-warning col-md-4" style="margin-right: 10px">Pending</span>
		                        </div>
		                    </div>
		                    <div class="col-md-12" style="margin-bottom: 10px">
                                <div class="progress-group">
		                            <span class="progress-text">Expired Request</span>
		                            <span class="label label-danger col-md-4" style="margin-right: 10px">Expired</span>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <button type="button" class="btn btn-block btn-success" id="massConfirm"><i class="fa fa-check"></i> Confirm order</button>
		        </div>
		        <div class="col-md-6">
		            <div class="box box-danger">
		                <div class="box-header with-border">
		                    <h3 class="box-title">Summary</h3>
		                    <div class="box-tools pull-right">
		                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		                    </div>
		                    <!-- /.box-tools -->
		                </div>
		                <!-- /.box-header -->
		                <div class="box-body">
		                    <div class="col-md-12">
		                        <div class="progress-group">
		                            <span class="progress-text">Complete Purchase</span>
		                            <span class="progress-number"><b><?= $completed ?></b>/<?= $sum ?></span>

		                            <div class="progress sm">
		                                <div class="progress-bar progress-bar-green" style="width: <?= $perc_comp ?>%"></div>
		                            </div>
		                        </div>
		                        <div class="progress-group">
		                            <span class="progress-text">Pending Approval</span>
		                            <span class="progress-number"><b><?= $pending ?></b>/<?= $sum ?></span>

		                            <div class="progress sm">
		                                <div class="progress-bar progress-bar-yellow" style="width: <?= $perc_pend ?>%"></div>
		                            </div>
		                        </div>
		                        <div class="progress-group">
		                            <span class="progress-text">Expired Request</span>
		                            <span class="progress-number"><b><?= $expired ?></b>/<?= $sum ?></span>

		                            <div class="progress sm">
		                                <div class="progress-bar progress-bar-red" style="width: <?= $perc_exp ?>%"></div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
				<div class="col-xs-12">
					<div class="box box-danger">
						<!-- /.box-header -->
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th><input type="checkbox" class="flat-red all"></th>
			                            <th>ID Order</th>
			                            <th>Customers Name</th>
			                            <th>Domain</th>
			                            <th>API Key</th>
			                            <th>Date</th>
			                            <th>Price</th>
			                            <th style="width: 10%">Status</th>
			                            <th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										for ($i=0; $i < sizeof($data_order); $i++) { 
											echo '<tr><td></td>';
										 	for ($j=0; $j < sizeof($data_order[$i]); $j++) { 
										 		echo '<td>'.$data_order[$i][$column[$j]].'</td>';
										 	}
											echo '<td></td></tr>';
										 } 
									?>
								</tbody>
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
<!-- ./wrapper -->

<script>
	$(document).ready(function() {
		$("#example1").DataTable({
			
		});
	});

</script>
