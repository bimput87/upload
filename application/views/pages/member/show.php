<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Available API
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url() ?>member"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">API</a></li>
        <li class="active">Available API</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Order</th>
                  <th>Domain</th>
                  <th>API Key</th>
                  <th>Last used</th>
                  <th>Last IP</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                 <th>ID Order</th>
                  <th>Domain</th>
                  <th>API Key</th>
                  <th>Last used</th>
                  <th>Last IP</th>
                  <th>Status</th>
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
  <?php require_once FOOT ?>
  <!-- /.content-wrapper -->
<!-- ./wrapper -->

<script>
  $(document).ready(function() {
    $("#example1").DataTable();
  });

</script>