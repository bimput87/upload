    <section class="content">
    <div class="container-fluid">
      <!-- Basic Examples -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <!-- Main content -->
            <section id="print" class="invoice">
              <!-- title row -->
             <div class="row">
                  <div class="col-xs-12" align="center">
                    <h2 class="page-header">
                      <i class="ion-android-globe"></i> UBIG.CO.ID.
                      <small class="pull-right">Date: <?= date('d-m-Y') ?></small>
                    </h2>
                  </div>
                  <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                      uBig.co.id - PT Universal Big Data<br>
                      Jambe No. 13 Kalpataru, Jl. Mawar, East Java<br>
                      Malang, East Java, Indonesia<br>
                      Phone: (0341) 493 567<br>
                      Email: info@ubig.co.id<br>  
                    </address>
                  </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                      <?php echo $this->session->userdata('first_name')." ".$this->session->userdata('last_name') ?><br>
                      <?php echo $this->session->userdata('city') ?><br>
                      <?php echo 'Phone : '.$this->session->userdata('phone') ?><br>
                      <?php echo 'Email : '.$this->session->userdata('email') ?><br>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice </b><br>
                  <br>
                  <b>Order ID:</b> ORD-<?= $this->uri->segment(3) ?><br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>ID Account:</b>USR - <?= $this->session->userdata('id') ?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

        			<!-- Table row -->
        			<div class="row">
						<div class="col-xs-12 table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Domain</th>
										<th>API Key</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody>
									<?php
										echo '<tr>'; 
										for ($j=0; $j < sizeof($col3)-1; $j++) {
											if($j == 1 && $hasil3[0][$col3[$j]] == '')
												echo '<td>Will shown after payment</td>';
											else{
                        if($j == 2)
                          echo '<td> IDR '.$hasil3[0][$col3[$j]].'</td>';
                        else
  												echo '<td>'.$hasil3[0][$col3[$j]].'</td>';
                      } 
										}
										echo '</tr>';
									?>
								</tbody>
							</table>
						</div>
						<!-- /.col -->
					</div>
        			<!-- /.row -->

        			<!-- this row will not appear when printing -->
        			<div class="row no-print">
        				<div class="col-xs-12">
        					<td>
        						<button type="button" onclick="print()" class="btn btn-default"> 
        												Print
        						</button>  
        					</td>
        					<td>
        						<a class="btn btn-default" href="<?php echo site_url() ?>member">Back</a>
        						<!-- meski samean seneng e opel2 tapi ayu kok-->  
        					</td>
        				</div>
        			</div>
        		</section>
		<!-- /.content -->
		</div>
      