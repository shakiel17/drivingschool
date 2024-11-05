<div class="header-divider"></div>
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
              <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><a href="<?=base_url();?>user_main" style="text-decoration:none;color:black;"><span>Home</span></a>
              </li>
              <li class="breadcrumb-item active"><span>Enrollment History</span></li>
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
                                <td><b>Enrollment History</b></td>
                                <td align="right"><a href="<?=base_url();?>new_enrollment" class="btn btn-success btn-sm text-white" data-coreui-toggle="modal" data-coreui-target="#NewEnrollment">New Enrollment</a></td>
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
                                    <th>Enrollment ID</th>
                                    <th>Payment Type</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Total Amount Paid</th>
                                    <th class="text-center">Date & Time</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>                                    
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $x=1;
                                    foreach($items as $item){
                                        $query=$this->School_model->getPayment($item['regno']);
                                        $totalpayment=0;
                                        foreach($query as $row){
                                            $totalpayment += $row['amount'];
                                        }
                                        if($item['payment_type']=="full"){
                                            $type="Full Payment";
                                        }else{
                                            $type="Per Session";
                                        }
                                        echo "<tr>";
                                            echo "<td>$x.</td>";
                                            echo "<td>$item[regno]</td>";
                                            echo "<td>$type</td>";
                                            echo "<td align='right'>".number_format($item['amount'],2)."</td>";
                                            echo "<td align='right'>".number_format($totalpayment,2)."</td>";
                                            echo "<td align='center'>".date('m/d/Y',strtotime($item['datearray']))." ".date('h:i A',strtotime($item['timearray']))."</td>";
                                            echo "<td align='center'>$item[status]</td>";
                                            ?>
                                            <td align="center"><a href="" class="btn btn-primary btn-sm">Payment</a> <a href="<?=base_url();?>user_session/<?=$item['regno'];?>" class="btn btn-info btn-sm text-white">Session</a></td>
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