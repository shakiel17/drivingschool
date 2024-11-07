<div class="main-panel">
          <div class="content-wrapper">                              
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">List of Active Enrollees</h4>                      
                    </div>
                    <div class="table-responsive">
                      <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th class="font-weight-bold">No.</th>
                            <th class="font-weight-bold">Registration No.</th>
                            <th class="font-weight-bold">Enrollee Name</th>
                            <th class="font-weight-bold">Payment Type</th>                            
                            <th class="font-weight-bold">Status</th>
                            <th class="font-weight-bold">Session</th>
                            <th class="font-weight-bold">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $x=1;
                                foreach($enrollees as $item){
                                    $query=$this->School_model->db->query("SELECT * FROM schedule WHERE regno='$item[regno]' AND (`status`='pending' OR `status`='ongoing')");
                                    $res=$query->result_array();
                                    $sess=count($res);
                                    if($item['payment_type']=="full"){
                                        $payment="Full Payment";
                                    }else{
                                        $payment="Per Session";
                                    }
                                    echo "<tr>";
                                        echo "<td>$x.</td>";
                                        echo "<td>$item[regno]</td>";
                                        echo "<td>$item[lastname], $item[firstname]</td>";
                                        echo "<td>$payment</td>";
                                        echo "<td>$item[status]</td>";
                                        echo "<td align='center'><a href='".base_url()."manage_user_session/$item[regno]' class='btn btn-info btn-sm'>$sess remaining</a></td>";
                                        ?>
                                        <td>                                            
                                            <a href="<?=base_url();?>manage_user_payment/<?=$item['regno'];?>" class="btn btn-success btn-sm">Payment</a>
                                        </td>
                                        <?php
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
          </div>
          <!-- content-wrapper ends -->