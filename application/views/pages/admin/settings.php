<body class="hold-transition skin-red sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
	        <section class="content-header">
	            <h1>
	                Settings
	            </h1>
	            <ol class="breadcrumb">
	                <li>
	                	<a href="<?php echo site_url() ?>administrator"><i class="fa fa-dashboard"></i> Home</a>
            		</li>
                    <li class="active">Settings</li>
                </ol>
	        </section>

	        <!-- Main content -->
	        <section class="content">
                <div class="row">
			        <div class="col-md-5">
			            <!-- general form elements -->
			            <div class="box box-danger">
			            	 <?php
				                if(!empty($_SESSION['flash_messsage_success'])){
				                    $html = '<div class="alert bg-green">';
				                    $html .= $_SESSION['flash_messsage_success']; 
				                    $html .= '</div>';
				                    echo $html;
				                }elseif(!empty($_SESSION['flash_messsage_failed'])){
				                    $html = '<div class="alert bg-red">';
				                    $html .= $_SESSION['flash_messsage_failed']; 
				                    $html .= '</div>';
				                    echo $html;
				                }
				            ?>
			                <div class="box-header with-border">
			                    <h3 class="box-title">Price Setting</h3>
			                </div>
                            <!-- /.box-header -->
			                <!-- form start -->
			                <?php echo form_open(site_url().'administrator/setting', array('role' => 'form')) ?>
			                	<div style="display:none">
			                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
			                    </div>
			                    <div class="box-body">
		                            <div class="form-group">
			                            <div class="input-group">
			                                <span class="input-group-addon">Rp</span>
			                                <input type="text" class="form-control" id="input_price" placeholder="Enter price here" name="input_price" value="<?= $price ?>" required>
			                                <span class="input-group-addon">.00</span>
			                            </div>
		                                <?php echo form_error('input_price') ?>
		                            </div>
		                        </div>
			                    <div class="box-footer">
			                        <button type="submit" class="btn btn-danger">Save</button>
			                    </div>
			                <?php echo form_close() ?>
			            </div>
			            <!-- /.box -->
			        </div>
				    <div class="col-xs-7">
							<div class="box">
								<!-- /.box-header -->
								<div class="box-body">
									<table id="example2" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Time</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
								<!-- /.box-body -->
							</div>
							<!-- /.box -->
						</div>
			    </div>
	        </section>
	        <!-- /.content -->
	    </div>
	</div>
