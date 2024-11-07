<div class="header-divider"></div>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><a href="<?=base_url();?>user_main" style="text-decoration:none;color:black;"><span>Home</span></a>
                </li>
                <li class="breadcrumb-item"><a href="<?=base_url();?>user_enrollment" style="text-decoration:none;color:black;"><span>Enrollment History</span></a></li>
                <li class="breadcrumb-item active"><span>Payment History</span></li>
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
            <div class="col-sm-12 col-lg-9">                      
                    <div class="card mb-4">
                      <div class="card-header">
                        <table width="100%" border="0">
                            <tr>
                                <td><b>Payment History (<?=$regno;?>)</b></td>
                                <td align="right"></td>
                            </tr>
                        </table>
                        
                    </div>
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                              <table class="table border mb-4 mt-4">
                                <thead class="table-light fw-semibold">
                                  <tr class="align-middle">                                    
                                    <th>Invoice #</th>
                                    <th>Amount</th>                                                                        
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Remarks</th>
                                    <th class="text-center">Date & Time</th>
                                    <th class="text-center">Action</th>                                    
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $x=1;
                                    foreach($items as $item){                                                                                
                                        $view="style='display:none;'";
                                        $paid="style='display:none;'";
                                        if($item['status']=="pending"){
                                            $view="";
                                        }
                                        if($item['status']=="paid"){
                                            $paid="";
                                        }
                                        echo "<tr>";                                            
                                            echo "<td>$item[invno]</td>";
                                            echo "<td>".number_format($item['amount'],2)."</td>";                                            
                                            echo "<td align='center'>$item[status]</td>";
                                            echo "<td>$item[remarks]</td>";   
                                            echo "<td align='center'>".date('m/d/Y',strtotime($item['datearray']))." ".date('h:i A',strtotime($item['timearray']))."</td>";                                            
                                            ?>
                                            <td align="center"><a href="<?=base_url();?>print_invoice/<?=$item['invno'];?>" class="btn btn-info btn-sm text-white" target="_blank" <?=$paid;?>>Invoice</a> <a href="<?=base_url();?>remove_payment/<?=$item['id'];?>/<?=$regno;?>" class="btn btn-danger btn-sm text-white" onclick="return confirm('Do you wish to remove this payment?');return false;" <?=$view;?>>Remove</a></td>
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
                <div class="col-sm-12 col-lg-3">
                    <div class="card mb-4">
                      <div class="card-header">
                        <table width="100%" border="0">
                            <tr>
                                <td><b>New Payment</b></td>
                                <td align="right"></td>
                            </tr>
                        </table>                        
                    </div>
                    <?=form_open_multipart(base_url()."user_payment_save");?>
                    <input type="hidden" name="regno" value="<?=$regno;?>">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <table width="100%" border="0" cellspacing="1">
                                <tr>
                                    <td>Ref #</td>
                                    <td><input type="text" name="invno" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td>Amount</td>
                                    <td><input type="text" name="amount" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td>Remarks</td>
                                    <td><textarea name="remarks" class="form-control" rows="3"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Proof of Payment</td>
                                    <td><input type="file" name="file" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" class="btn btn-primary" value="Submit"></td>                                    
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?=form_close();?>
                </div>
            </div>                   
        </div>
    </div>