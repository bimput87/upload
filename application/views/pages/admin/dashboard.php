<body class="hold-transition skin-red sidebar-mini">
	<div class="wrapper">

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Welcome
					<small><?php echo $this->session->userdata('first_name') ?></small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url() ?>administrator"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- Info boxes -->
				<div class="row">
					<div class="col-md-4">
						<div class="info-box bg-aqua">
							<span class="info-box-icon"><i class="ion ion-ios-people"></i></span>

							<div class="info-box-content">
							<span class="info-box-text">Members</span>
								<span class="info-box-number"><?php echo $m_sum ?> Registered</span>

								<div class="progress">
									<div class="progress-bar" style="width: 100%"></div>
								</div>
								<span class="progress-description">
									<?php echo $city_sum ?> Different cities
								</span>
							</div>
							<!-- /.info-box-content -->
						</div>
					</div>
					<!-- /.col -->

					<div class="col-md-4">
						<div class="info-box bg-green">
							<span class="info-box-icon"><i class="ion ion-briefcase"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Orders</span>
								<span class="info-box-number"><?php echo $or_compl ?> Completed</span>

								<div class="progress">
									<div class="progress-bar" style="width: <?php echo $or_perc ?>%"></div>
								</div>
								<span class="progress-description">
									<?php echo $or_sum ?> Total orders (<?php echo $or_perc ?> %)
								</span>
							</div>
							<!-- /.info-box-content -->
						</div>
					</div>
					<!-- /.col -->

					<div class="col-md-4">
						<div class="info-box bg-red">
							<span class="info-box-icon"><i class="ion ion-key"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">APIs</span>
								<span class="info-box-number"><?php echo $api_act ?> Activated</span>

								<div class="progress">
									<div class="progress-bar" style="width: <?php echo $api_perc ?>%"></div>
								</div>
								<span class="progress-description">
									<?php echo $api_sum ?> Total APIs (<?php echo $api_perc ?> %)
								</span>
							</div>
							<!-- /.info-box-content -->
						</div>
					</div>
					<!-- /.col -->

				</div>
				<!-- /.row -->

				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<!-- USERS LIST -->
								<div class="box box-danger">
									<div class="box-header with-border">
										<h3 class="box-title">Latest Login Members</h3>
										<div class="box-tools pull-right">
											<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
											</button>
											<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
											</button>
										</div>
									</div>
									<!-- /.box-header -->
									<div class="box-body no-padding">
										<ul class="users-list clearfix">
											<?php $i=0; foreach ($lat_mem as $value): ?>
												<?php $str = $lat_mem[$i]['first_name']; ?>
												<li>
													<img src="<?php echo site_url().'public/assets/img/'.ucfirst($str[0]).'.png' ?>" alt="User Image">
													<a class="users-list-name" href="#"><?php echo $str ?></a>
													<span class="users-list-date"><?php echo $lat_mem[$i]['last_login'] ?></span>
												</li>
											<?php $i++; endforeach ?>
										</ul>
										<!-- /.users-list -->
									</div>
									<!-- /.box-body -->
									<div class="box-footer text-center">
										<a href="javascript:void(0)" class="uppercase">View All Users</a>
									</div>
									<!-- /.box-footer -->
								</div>
								<!--/.box -->
							</div>
							<!-- /.col -->
							<div class="col-md-8">
								<!-- TABLE: LATEST ORDERS -->
								<div class="box box-info">
									<div class="box-header with-border">
										<h3 class="box-title">Latest Generated APIs</h3>

										<div class="box-tools pull-right">
											<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
											</button>
											<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
										</div>
									</div>
									<!-- /.box-header -->
									<div class="box-body">
										<div class="table-responsive">
											<table class="table no-margin">
												<thead>
													<tr>
														<th>Order ID</th>
														<th>Item</th>
														<th>Status</th>
														<th>Popularity</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><a href="pages/examples/invoice.html">OR9842</a></td>
														<td>Call of Duty IV</td>
														<td><span class="label label-success">Shipped</span></td>
														<td>
															<div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
														</td>
													</tr>
													<tr>
														<td><a href="pages/examples/invoice.html">OR1848</a></td>
														<td>Samsung Smart TV</td>
														<td><span class="label label-warning">Pending</span></td>
														<td>
															<div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
														</td>
													</tr>
													<tr>
														<td><a href="pages/examples/invoice.html">OR7429</a></td>
														<td>iPhone 6 Plus</td>
														<td><span class="label label-danger">Delivered</span></td>
														<td>
															<div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
														</td>
													</tr>
													<tr>
														<td><a href="pages/examples/invoice.html">OR7429</a></td>
														<td>Samsung Smart TV</td>
														<td><span class="label label-info">Processing</span></td>
														<td>
															<div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
														</td>
													</tr>
													<tr>
														<td><a href="pages/examples/invoice.html">OR1848</a></td>
														<td>Samsung Smart TV</td>
														<td><span class="label label-warning">Pending</span></td>
														<td>
															<div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
										<!-- /.table-responsive -->
									</div>
									<!-- /.box-body -->
									<div class="box-footer text-center">
										<div class="box-footer text-center">
											<a href="javascript:void(0)" class="uppercase">View All API</a>
										</div>
									</div>
									<!-- /.box-footer -->
								</div>
								<!-- /.box -->
							</div>
						</div>
						<!-- /.row -->

					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 1.0
			</div>
			<strong>Copyright &copy; 2017 <a href="http://ubig.co.id">UBIG</a>.</strong> All rights
			reserved | Developed by <strong>ndasoft</strong>
		</footer>

	</div>
	<!-- ./wrapper -->