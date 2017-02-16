   <section class="content">
   	<div class="container-fluid">
   		<!-- Basic Examples -->
   		<div class="row clearfix">
   			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   				<div class="card">
   					<div class="header">
   						<h1><center>ORDERS OVERVIEW</center></h1>
   					</div>
   					<div class="body">
   						<button data-color="red" type="button" class="btn bg-red waves-effect m-r-20" data-toggle="modal" data-target="#myModal">Order!</button>

   						<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
   							<thead>
   								<tr>
   									<th>Id Order</th>
   									<th>Domain</th>
   									<th>API Key</th>
   									<th>Date</th>
   									<th>Price</th>
   									<th>Status</th>
   								</tr>
   							</thead>
   							<tfoot>
   								<tr>
   									<th>Id Order</th>
   									<th>Domain</th>
   									<th>API Key</th>
   									<th>Date</th>
   									<th>Price</th>
   									<th>Status</th>
   								</tr>
   							</tfoot>
   							<tbody>
                                 <!--    <?php  
                                        for ($i=0; $i < sizeof($hasil2); $i++) {
                                            echo '<tr>'; 
                                            for ($j=0; $j < sizeof($col2); $j++) {
                                                echo '<td>'.$hasil2[$i][$col2[$j]].'</td>';
                                            }
                                            echo '</tr>';
                                        }
                                        ?> -->
                                        <?php  
                                        for ($i=0; $i < sizeof($hasil2); $i++) {
                                        	echo '<tr>'; 
                                        	for ($j=0; $j < sizeof($col2); $j++) {
                                        		if ($j == 0) 
                                        			echo '<td> <span style = "color:#2196F3" data-toggle="modal" data-target="#modalInv">ORD-'.$hasil2[$i][$col2[$j]].'</span></td>';
                                                    // echo '<td> <span data-toggle="modal" data-target="#myModal">ORD-'.$hasil2[$i][$col2[$j]].'</span></td>';
                                        		elseif ($j==2 && $hasil2[$i][$col2[$j]] =='') 
                                        			echo "<td>While shown after payment</td>";

                                        		else{
                                        			if($j == sizeof($col2)-1){
                                        				if ($hasil2[$i][$col2[$j]] == 1) 
                                        					echo '<td><span style = "color:#2196F3" class="label bg-green">Verified</span></td>';
                                        				elseif($hasil2[$i][$col2[$j]] == 0)  
                                        					echo '<td><span style = "color:#2196F3" class="label bg-yellow">Pending</span></td>';               
                                        			}
                                        			else
                                        				echo '<td>'.$hasil2[$i][$col2[$j]].'</td>';
                                        		}
                                        	}
                                        	echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Basic Examples -->
                <!-- Exportable Table -->
                <div class="row clearfix">
                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                		<div class="card">
                			<div class="header">
                				<h1><center>AVAILABLE API</center></h1>
                			</div>
                			<div class="body">
                				<table class="table table-bordered table-striped table-hover dataTable js-exportable">
                					<thead>
                						<tr>
                							<th>Id Order</th>
                							<th>Owner</th>
                							<th>Domain</th>
                							<th>API Key</th>
                							<th>Last Used</th>
                							<th>Last IP</th>
                							<th>Status</th>
                						</tr>
                					</thead>
                					<tbody>
                						<?php  
                						for ($i=0; $i < sizeof($hasil); $i++) {
                							echo '<tr>'; 
                							for ($j=0; $j < sizeof($col); $j++) {
                								if ($j == 0) 
                									echo '<td> <a target="_blank" href="http://ubig.co.id">ORD-'.$hasil[$i][$col[$j]].'</a></td>';
                								else{
                									if($j == sizeof($col)-1)
                										echo '<td><span class="label bg-blue">Ready</span></td>';
                									else
                										echo '<td>'.$hasil[$i][$col[$j]].'</td>';
                								}
                							}
                							echo '</tr>';
                						}
                						?>
                					</tbody>
                					<tfoot>
                						<tr>
                							<th>Id Order</th>
                							<th>Owner</th>
                							<th>Domain</th>
                							<th>API Key</th>
                							<th>Last Used</th>
                							<th>Last IP</th>
                							<th>Status</th>
                						</tr>
                					</tfoot>
                				</table>
                			</div>
                		</div>
                	</div>
                </div>
                <!-- #END# Exportable Table -->
            </div>
        </section>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
        	<div class="modal-dialog">
        		<?php echo form_open('member/submit_form', array('id' => 'form', 'role' => 'form')) ?>
        		<div style="display:none">
        			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        		</div>
        		<!-- Modal content-->
        		<div class="modal-content">
        			<div class="modal-header">
        				<h3><center>Request new API for your site</center></h3>
        			</div>
        			<div class="modal-body">
        				<div class="form-group">
        					<div class="form-line">
        						<input type="text" name="input_domain" class="form-control" placeholder="Your domain name">
        					</div>
        				</div>
        			</div>
        			<div class="modal-footer">
        				<button type="button" class="btn btn-default" data-dismiss="modal">
        					Close
        				</button>
        				<button id="btnSave" type="submit" class="btn btn-primary">
        					Save 
        				</button>
        			</div>
        		</div> 
        		<?php echo form_close() ?>

        	</div>
        </div>

        <div class="modal fade" id="modalInv" role="dialog">
        	<div class="modal-dialog modal-lg">
        		<div class="modal-content">
        			<div class="modal-body">
        				<section class="invoice">
        					<!-- title row -->
        					<div class="row">
        						<div class="col-xs-12">
        							<h2 class="page-header">
        								<i class="fa fa-globe"></i> AdminLTE, Inc.
        								<small class="pull-right">Date: 2/10/2014</small>
        							</h2>
        						</div>
        						<!-- /.col -->
        					</div>
        					<!-- info row -->
        					<div class="row invoice-info">
        						<div class="col-sm-4 invoice-col">
        							From
        							<address>
        								<strong>Admin, Inc.</strong><br>
        								795 Folsom Ave, Suite 600<br>
        								San Francisco, CA 94107<br>
        								Phone: (804) 123-5432<br>
        								Email: info@almasaeedstudio.com
        							</address>
        						</div>
        						<!-- /.col -->
        						<div class="col-sm-4 invoice-col">
        							To
        							<address>
        								<strong>John Doe</strong><br>
        								795 Folsom Ave, Suite 600<br>
        								San Francisco, CA 94107<br>
        								Phone: (555) 539-1037<br>
        								Email: john.doe@example.com
        							</address>
        						</div>
        						<!-- /.col -->
        						<div class="col-sm-4 invoice-col">
        							<b>Invoice #007612</b><br>
        							<br>
        							<b>Order ID:</b> 4F3S8J<br>
        							<b>Payment Due:</b> 2/22/2014<br>
        							<b>Account:</b> 968-34567
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
        										<th>Qty</th>
        										<th>Product</th>
        										<th>Serial #</th>
        										<th>Description</th>
        										<th>Subtotal</th>
        									</tr>
        								</thead>
        								<tbody>
        									<tr>
        										<td>1</td>
        										<td>Call of Duty</td>
        										<td>455-981-221</td>
        										<td>El snort testosterone trophy driving gloves handsome</td>
        										<td>$64.50</td>
        									</tr>
        									<tr>
        										<td>1</td>
        										<td>Need for Speed IV</td>
        										<td>247-925-726</td>
        										<td>Wes Anderson umami biodiesel</td>
        										<td>$50.00</td>
        									</tr>
        									<tr>
        										<td>1</td>
        										<td>Monsters DVD</td>
        										<td>735-845-642</td>
        										<td>Terry Richardson helvetica tousled street art master</td>
        										<td>$10.70</td>
        									</tr>
        									<tr>
        										<td>1</td>
        										<td>Grown Ups Blue Ray</td>
        										<td>422-568-642</td>
        										<td>Tousled lomo letterpress</td>
        										<td>$25.99</td>
        									</tr>
        								</tbody>
        							</table>
        						</div>
        						<!-- /.col -->
        					</div>
        					<!-- /.row -->

        					<div class="row">
        						<!-- accepted payments column -->
        						<div class="col-xs-6">
        							<p class="lead">Payment Methods:</p>
        							<img src="../../dist/img/credit/visa.png" alt="Visa">
        							<img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
        							<img src="../../dist/img/credit/american-express.png" alt="American Express">
        							<img src="../../dist/img/credit/paypal2.png" alt="Paypal">

        							<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
        								Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
        								dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        							</p>
        						</div>
        						<!-- /.col -->
        						<div class="col-xs-6">
        							<p class="lead">Amount Due 2/22/2014</p>

        							<div class="table-responsive">
        								<table class="table">
        									<tr>
        										<th style="width:50%">Subtotal:</th>
        										<td>$250.30</td>
        									</tr>
        									<tr>
        										<th>Tax (9.3%)</th>
        										<td>$10.34</td>
        									</tr>
        									<tr>
        										<th>Shipping:</th>
        										<td>$5.80</td>
        									</tr>
        									<tr>
        										<th>Total:</th>
        										<td>$265.24</td>
        									</tr>
        								</table>
        							</div>
        						</div>
        						<!-- /.col -->
        					</div>
        					<!-- /.row -->

        					<!-- this row will not appear when printing -->
        					<div class="row no-print">
        						<div class="col-xs-12">
        							<td>
	        							<button type="button" onclick="window.print();" class="btn btn-default pull-right"> 
	        								Print
	        							</button>        								
        							</td>
        							<td>
	        							<button type="button" class="btn btn-default pull-right" data-dismiss="modal">
	        								Close
	        							</button>
        							</td>
        						</div>
        					</div>
        				</section>
        				<!-- /.content -->
        			</div>
        		</div> 
        	</div>
        </div>