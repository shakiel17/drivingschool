<div class="main-panel">
          <div class="content-wrapper">                              
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0"><a href="<?=base_url();?>manage_enrollee" class="btn btn-primary">< Back</a> User Session Payment (<?=$regno;?>)</h4>                      
                        &nbsp;&nbsp;&nbsp;<a href="<?=base_url();?>print_invoice_summary/<?=$regno;?>" class="btn btn-info btn-sm" target="_blank">Invoice Summary</a>
                    </div>
                    <div class="table-responsive">
                      <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">                        
                      <thead>                          
                          <tr class="align-middle">                                    
                                    <th>Reference #</th>
                                    <th>Amount</th>                                                                        
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Remarks</th>
                                    <th class="text-center">Date & Time</th>
                                    <th class="text-center">Proof of Payment</th>
                                    <th class="text-center">Action</th>                                    
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $x=1;
                                    foreach($sessions as $item){                                                                                
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
                                            <td align="center"><a href="<?=base_url();?>view_proof_payment/<?=$item['invno'];?>" class="btn btn-outline-primary btn-sm" target="_blank">View Proof of Payment</a></td>
                                            <td align="center">
                                                <a href="<?=base_url();?>update_payment_status/<?=$item['invno'];?>/<?=$regno;?>" class="btn btn-warning btn-sm" onclick="return confirm('Do you wish to confirm this payment details?');return false;" <?=$view;?>>Comfirm</a>                                                 
                                                <a href="<?=base_url();?>print_invoice/<?=$item['invno'];?>" class="btn btn-info btn-sm text-white" target="_blank" <?=$paid;?>>Invoice</a> <a href="<?=base_url();?>remove_payment/<?=$item['id'];?>/<?=$regno;?>" class="btn btn-danger btn-sm text-white" onclick="return confirm('Do you wish to remove this payment?');return false;" <?=$view;?>>Remove</a>
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