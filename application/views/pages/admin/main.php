<div class="main-panel">
          <div class="content-wrapper">           
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5 class="font-weight-semibold">Statistics</h5> <span class="ml-auto">Updated Dashboard</span> <a class="btn btn-icons border-0 p-2" href="<?=base_url();?>admin_main"><i class="icon-refresh"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">ENROLLEES</span>
                          <h4><?=count($enrollees);?></h4>                          
                        </div>
                        <div class="inner-card-icon bg-success">
                          <i class="icon-people"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">INSTRUCTORS</span>
                          <h4><?=count($instructors);?></h4>                          
                        </div>
                        <div class="inner-card-icon bg-danger">
                          <i class="icon-graduation"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">CARS</span>
                          <h4><?=count($cars);?></h4>                          
                        </div>
                        <div class="inner-card-icon bg-warning">
                          <i class="icon-plane"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">CUSTOMERS</span>
                          <h4><?=count($customers);?></h4>                          
                        </div>
                        <div class="inner-card-icon bg-primary">
                          <i class="icon-people"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>           
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Recent Enrollees</h4>
                      <a href="<?=base_url();?>manage_enrollee" class="text-dark ml-auto mb-3 mb-sm-0"> View all Enrollees</a>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">No.</th>
                            <th class="font-weight-bold">Registration No.</th>
                            <th class="font-weight-bold">Enrollee Name</th>
                            <th class="font-weight-bold">Payment Type</th>                            
                            <th class="font-weight-bold">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $x=1;
                                foreach($recent_enrollee as $item){
                                    echo "<tr>";
                                        echo "<td>$x.</td>";
                                        echo "<td>$item[regno]</td>";
                                        echo "<td>$item[lastname], $item[firstname]</td>";
                                        echo "<td>$item[payment_type]</td>";
                                        echo "<td>$item[status]</td>";
                                    echo "</tr>";
                                    $x++;
                                }
                            ?>
                        </tbody>
                      </table>
                    </div>                    
                  </div>
                </div>
              </div>
            </div>




            <div class="row">
              <div class="col-sm-12 col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Comments/Reviews</h4>                      
                    </div>
                    <div class="table-responsive" >
                    <div style="overflow:scroll; height:500px;">
                      <table border="0" cellspacing="0" cellpadding="1" width="100%">
                        <?php
                        foreach($reviews as $item){
                          echo "<tr>";
                            echo "<td><small>$item[firstname] $item[lastname]<br><b>@$item[username]</b></small><br>$item[comments]<br><small>".date('m/d/Y',strtotime($item['datearray']))." ".date('h:i A',strtotime($item['timearray']))."</small></td>";
                          echo "</tr>";
                        }
                        ?>                          
                      </table>
                      </div>
                    </div>                    
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- content-wrapper ends -->