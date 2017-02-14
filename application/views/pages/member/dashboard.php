    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               ORDERS OVERVIEW
                            </h2>
                        </div>
                        <div class="body">
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
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>
                                        <td>$170,750</td>
                                    </tr>
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
                            <h2>
                                AVAILABLE API
                            </h2>
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