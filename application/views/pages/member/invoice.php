   <section class="content">
    <div class="container-fluid">
      <!-- Basic Examples -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
     <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="ion-android-globe"></i> UBIG.CO.ID.
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
                      <th>Domain</th>
                      <th>API Key</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Domain</th>
                      <th>API Key</th>
                      <th>Price</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    for ($i=0; $i < sizeof($hasil3); $i++) { 
                      echo '<tr>'; 
                      for ($j=0; $j < sizeof($col3); $j++) { 
                        echo '<td>'.$hasil3[$i][$col3[$j]].'</td>';
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
          <button type="button" onclick="window.print();" class="btn btn-default"> 
                      Print
          </button>  
        </td>
          <td>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
          </td>
          <td>
            <button type="button" class="btn btn-default" data-dismiss="modal" ><a href="dashboard.php"></a>
                        Back
            </button> 
          </td>
        </div>
      </div>
    </section>
    <!-- /.content -->