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
			                <div class="box-header with-border">
			                    <h3 class="box-title">Price</h3>
			                </div>
                            <!-- /.box-header -->
			                <!-- form start -->
			                <?php echo form_open(site_url().'administrator/setting', array('role' => 'form')) ?>
			                	<div style="display:none">
			                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
			                    </div>
			                    <div class="box-body">
		                            <div class="form-group">
			                            <label for="InputPrice">Price</label>
			                            <div class="input-group">
			                                <span class="input-group-addon">Rp</span>
			                                <input type="text" class="form-control" id="input_price" placeholder="Enter price here" name="price" value="<?= $price ?>" required>
			                                <span class="input-group-addon">.00</span>
			                            </div>
		                            </div>
		                        </div>
			                    <div class="box-footer">
			                        <button type="submit" class="btn btn-danger">Save</button>
			                    </div>
			                <?php echo form_close() ?>
			            </div>
			            <!-- /.box -->
			        </div>
			    </div>
	        </section>
	        <!-- /.content -->
	    </div>
	</div>