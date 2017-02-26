<body class="hold-transition skin-red sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
		<!-- Content Header (Page header) -->
	        <section class="content-header">
	            <h1>
	                API Keys
	            </h1>
	            <ol class="breadcrumb">
	                <li>
	                	<a href="<?php echo site_url() ?>administrator">
	                		<i class="fa fa-dashboard"></i> Home
	            		</a></li>
	                <li class="active">API Keys</li>
	            </ol>
	        </section>

	        <!-- Main content -->
	        <section class="content">
	            <div class="row">
			        <div class="col-md-4">
			            <div class="info-box">
			                <div class="col-md-12">
			                    <p class="text-center">
			                        <strong>Notes</strong>
			                    </p>
			                    <div class="col-lg-12">
			                        <span class="label label-success col-md-4" style="margin-right: 10px">Activated</span>
			                        <p><strong>Already Used <span class="hidden-md">in Plugin</span></strong></p>
			                    </div>
			                    <div class="col-lg-12">
			                        <span class="label label-danger col-md-4" style="margin-right: 10px">Non Active</span>
			                        <p><strong>Never Used <span class="hidden-md">in Plugin</span></strong></p>
			                    </div>
			                </div>
			            </div>
			        </div>
			        <!-- /.col -->
			        <div class="col-md-4">
			            <div class="info-box bg-green">
			                <span class="info-box-icon"><i class="fa fa-shopping-basket"></i></span>

			                <div class="info-box-content">
			                    <span class="info-box-text">Activated</span>
			                    <span class="info-box-number"><?= $comp ?> activated</span>

			                    <div class="progress">
			                        <div class="progress-bar" style="width: <?= $perc ?>%"></div>
			                    </div>
			                    <span class="progress-description"><?= $sum ?> Total APIs</span>
			                </div>
			                <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			        </div>
			        <!-- /.col -->
			        <div class="col-md-4">
			            <div class="info-box bg-red">
			                <span class="info-box-icon"><i class="fa fa-diamond"></i></span>

			                <div class="info-box-content">
			                    <span class="info-box-text">NON ACTIVE</span>
			                    <span class="info-box-number"><?= $non ?> non active</span>

			                    <div class="progress">
			                        <div class="progress-bar" style="width: <?= $pern ?>%"></div>
			                    </div>
			                    <span class="progress-description"><?= $sum ?> Total APIs</span>
			                </div>
			                <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			        </div>
			        <!-- /.col -->
			    </div>
			    <div class="row">
			        <div class="col-xs-12">
			            <div class="box box-danger">
			                <div class="box-header">

			                </div>
			                <!-- /.box-header -->
			                <div class="box-body">
			                    <table id="data_api" class="table table-bordered table-hover">
			                        <thead>
			                        <tr>
			                            <th>Order ID</th>
			                            <th>Customers Name</th>
			                            <th>Domain</th>
			                            <th>API Key</th>
			                            <th style="width: 10%">Status</th>
			                        </tr>
			                        </thead>
			                        <tbody>
			                        	<?php
			                        		for ($i=0; $i < sizeof($data); $i++) { 
			                        			echo '<tr>';
			                        			for ($j=0; $j < sizeof($data[$i]); $j++) {
			                        				if($j == 0)
				                        				echo '<td> ORD-'.$data[$i][$col[$j]].'</td>';
			                        				elseif ($j == 4){
			                        					$val = $data[$i][$col[$j]];
			                        					if($val == 1)
											 				echo '<td><span class="label label-success">Activated</span></td>';
											 			elseif($val == 0)
											 				echo '<td><span class="label label-danger">Non-Activated</span></td>';
			                        				} 
			                        				else 
				                        				echo '<td>'.$data[$i][$col[$j]].'</td>';
			                        			}
			                        			echo '</tr>';
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
	        </section>
	        <!-- /.content -->
	    </div>
	    <!-- /.content-wrapper -->