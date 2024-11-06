<div class="header-divider"></div>
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
              <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><a href="<?=base_url();?>user_main" style="text-decoration:none;color:black;"><span>Home</span></a>
              </li>
              <li class="breadcrumb-item"><a href="<?=base_url();?>user_enrollment" style="text-decoration:none;color:black;"><span>Enrollment History</span></a></li>
              <li class="breadcrumb-item active"><span>Session List</span></li>
            </ol>
          </nav>
        </div>
      </header>      
      <div class="body flex-grow-1 px-3">        
        <div class="container-lg">
            <?php
            if($this->session->success){                
            ?>
                <div class="alert alert-success"><?=$this->session->success;?></div>
            <?php
            }
            ?>
            <?php
            if($this->session->failed){                
            ?>
                <div class="alert alert-danger"><?=$this->session->failed;?></div>
            <?php
            }
            ?>
          <div class="row">
            <div class="col-sm-12 col-lg-12">                      
                    <div class="card mb-4">
                      <div class="card-header">
                        <table width="100%" border="0">
                            <tr>
                                <td><b>Session List (<?=$regno;?>)</b></td>
                                <td align="right"><a href="#" class="btn btn-success btn-sm text-white newSession" data-coreui-toggle="modal" data-coreui-target="#NewSession" data-id="<?=$regno;?>">New Session</a></td>
                            </tr>
                        </table>
                        
                    </div>
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                              <table class="table border mb-4 mt-4">
                                <thead class="table-light fw-semibold">
                                  <tr class="align-middle">
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
                                    foreach($items as $item){                                        
                                        $car=$this->School_model->getSingleCarDetails($item['car_id']);
                                        $teach=$this->School_model->getSingleInstructorDetails($item['instructor_id']);
                                        $view="";
                                        if($item['status']=="ongoing" || $item['status']=="completed"){
                                            $view="style='display:none;'";
                                        }
                                        echo "<tr>";
                                            echo "<td>$x.</td>";
                                            echo "<td>$car[description] ($car[trans_type])</td>";
                                            echo "<td>$teach[fullname]</td>";                                            
                                            echo "<td align='center'>".date('m/d/Y',strtotime($item['datearray']))."</td>";
                                            echo "<td align='center'>".date('h:i A',strtotime($item['starttime']))." - ".date('h:i A',strtotime($item['endtime']))."</td>";
                                            echo "<td align='center'>$item[status]</td>";
                                            ?>
                                            <td align="center"><a href="<?=base_url();?>remove_session/<?=$item['id'];?>/<?=$regno;?>" class="btn btn-danger btn-sm text-white" onclick="return confirm('Do you wish to remove this session?');return false;" <?=$view;?>>Remove</a></td>
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
      </div>