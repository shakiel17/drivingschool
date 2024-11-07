<div class="main-panel">
          <div class="content-wrapper">                              
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0"><a href="<?=base_url();?>manage_enrollee" class="btn btn-primary">< Back</a> User Session (<?=$regno;?>)</h4>                      
                    </div>
                    <div class="table-responsive">
                      <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                          <th class="text-center">
                                      #
                                    </th>
                                    <th>Car Details</th>
                                    <th>Instructor</th>                                    
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                                    <?php
                                    $x=1;
                                    foreach($sessions as $item){                                        
                                        $car=$this->School_model->getSingleCarDetails($item['car_id']);
                                        $teach=$this->School_model->getSingleInstructorDetails($item['instructor_id']);
                                        $view="";
                                        $complete="style='display:none;'";
                                        if($item['status']=="ongoing" || $item['status']=="complete"){
                                            $view="style='display:none;'";
                                            $complete="";
                                        }
                                        if($item['status']=="complete"){
                                          $complete="style='display:none;'";
                                        }
                                        echo "<tr>";
                                            echo "<td>$x.</td>";
                                            echo "<td>$car[description] ($car[trans_type])</td>";
                                            echo "<td>$teach[fullname]</td>";                                            
                                            echo "<td align='center'>".date('m/d/Y',strtotime($item['datearray']))."</td>";
                                            echo "<td align='center'>".date('h:i A',strtotime($item['starttime']))." - ".date('h:i A',strtotime($item['endtime']))."</td>";
                                            echo "<td align='center'>$item[status]</td>";
                                            ?>
                                            <td align="center">
                                                <a href="<?=base_url();?>edit_session/<?=$item['id'];?>/<?=$regno;?>" class="btn btn-warning btn-sm" <?=$view;?>>Edit</a>
                                                <a href="<?=base_url();?>update_session_status/<?=$item['id'];?>/<?=$regno;?>/complete" class="btn btn-info btn-sm" <?=$complete;?>>Complete Session</a>
                                                <a href="<?=base_url();?>remove_session_admin/<?=$item['id'];?>/<?=$regno;?>" class="btn btn-danger btn-sm text-white" onclick="return confirm('Do you wish to remove this session?');return false;" <?=$view;?>>Remove</a>
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