<div class="main-panel">
          <div class="content-wrapper">                              
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Messages</h4>                      
                    </div>
                    <div class="table-responsive">
                      <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th class="font-weight-bold" width="5%">No.</th>
                            <th class="font-weight-bold">Name</th>
                            <th class="font-weight-bold">Messages</th>
                            <th class="font-weight-bold">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $x=1;
                                foreach($messages as $item){
                                    $qry=$this->School_model->db->query("SELECT c.* FROM customer c INNER JOIN user u ON u.customer_no=c.customer_no WHERE u.username='$item[sender]'");
                                    $rs=$qry->row_array();                                    
                                    $qry1=$this->School_model->db->query("SELECT * FROM chat WHERE sender='$item[sender]' AND `status`='pending'");
                                    $rs1=$qry1->result_array();
                                    echo "<tr>";
                                        echo "<td>$x.</td>";                                        
                                        echo "<td>$rs[firstname] $rs[lastname]</td>";                                        
                                        echo "<td>".count($rs1)."</td>";
                                        echo "<td align='center'>";                                        
                                        ?>                                        
                                        <a href="<?=base_url();?>view_chat/<?=$item['sender'];?>" class="btn btn-success btn-sm">View</a>
                                        <?php
                                        echo "</td>";
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
              <?php
                if($sender <> ""){
              ?>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Live Chat</h4>                      
                    </div>
                    <div class="table-responsive">
                        <div style="overflow:scroll; height:400px;">
                        <table width="100%" border="0" cellspacing="0"> 
                                    <?php
                                    $items=$this->School_model->getAllAdminChat();
                                    foreach($items as $item){
                                        $username="admin";
                                        if($username==$item['sender']){
                                            $align="align='right'";
                                            $sender1=$item['sender'];
                                            $color="green";
                                            echo "<tr>";
                                                echo "<td $align><b>$sender1</b><br><div style='border:1px solid $color; width:50%;padding:10px;border-radius:20px; text-align:left;'>$item[message]</div><small>".date('m/d/Y',strtotime($item['datearray']))." ".date('h:i A',strtotime($item['timearray']))."</small></td>";
                                            echo "</tr>";
                                        }else{
                                            $align="align='left'";
                                            $sender1=$item['sender'];
                                            $color="blue";
                                            echo "<tr>";
                                                echo "<td $align><b>$sender1</b><br><div style='border:1px solid $color; width:50%;padding:10px;border-radius:20px; text-align:left;'>$item[message]</div><small>".date('m/d/Y',strtotime($item['datearray']))." ".date('h:i A',strtotime($item['timearray']))."</small></td>";
                                            echo "</tr>";
                                        }
                                        
                                    }
                                                                      
                                    ?>
                                    </table>
                                </div>
                                <br>
                                    <table width="100%" border="0">
                                    <?=form_open(base_url()."save_chat_admin");?>
                                    <input type="hidden" name="receiver" value="<?=$sender;?>">
                                    <tr>
                                        <td>
                                            <textarea name="message" class="form-control" rows="2"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><br>
                                            <input type="submit" class="btn btn-success" value="Send">
                                        </td>
                                    </tr>
                                    <?=form_close();?>
                                </table>
                    </div>                    
                  </div>
                </div>
              </div>
              <?php
                }
                ?>
            </div>
          </div>
          <!-- content-wrapper ends -->