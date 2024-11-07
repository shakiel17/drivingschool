<div class="header-divider"></div>
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
              <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><a href="<?=base_url();?>user_main" style="text-decoration:none;color:black;"><span>Home</span></a>
              </li>
              <li class="breadcrumb-item active"><span>Chat Support</span></li>
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
                                <td><b>Live Chat</b></td>
                                <td align="right">
                                                                 
                                </td>
                            </tr>
                        </table>
                        
                    </div>
                      <div class="card-body">
                        <div class="d-flex table-responsive">
                            <div class="col-lg-3 col-sm-12 text-center">
                                
                            </div>
                            <div class="col-lg-6 col-sm-12 text-center">
                                <div style="overflow:scroll; height:400px;">
                                <table width="100%" border="0" cellspacing="0"> 
                                    <?php
                                    if(count($items)==0){
                                        echo "<tr>";
                                            echo "<td>&nbsp;</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td>&nbsp;</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td>Start a conversation now</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td>&nbsp;</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td>&nbsp;</td>";
                                        echo "</tr>";
                                    }
                                    foreach($items as $item){
                                        $username=$this->session->username;
                                        if($username==$item['sender']){
                                            $align="align='right'";
                                            $sender=$item['sender'];
                                            $color="green";
                                            echo "<tr>";
                                                echo "<td $align><b>$sender</b><br><div style='border:1px solid $color; width:50%;padding:10px;border-radius:20px; text-align:left;'>$item[message]</div><small>".date('m/d/Y',strtotime($item['datearray']))." ".date('h:i A',strtotime($item['timearray']))."</small></td>";
                                            echo "</tr>";
                                        }else{
                                            $align="align='left'";
                                            $sender=$item['receiver'];
                                            $color="blue";
                                            echo "<tr>";
                                                echo "<td $align><b>$sender</b><br><div style='border:1px solid $color; width:50%;padding:10px;border-radius:20px; text-align:left;'>$item[message]</div><small>".date('m/d/Y',strtotime($item['datearray']))." ".date('h:i A',strtotime($item['timearray']))."</small></td>";
                                            echo "</tr>";
                                        }
                                        
                                    }
                                    if(count($items)==1){
                                        echo "<tr>";
                                            echo "<td>&nbsp;</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td>&nbsp;</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td>&nbsp;</td>";
                                        echo "</tr>";                                        
                                    }                                    
                                    ?>
                                    </table>
                                </div>
                                <br>
                                    <table width="100%" border="0">
                                    <?=form_open(base_url()."save_chat");?>
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
                            <div class="col-lg-3 col-sm-12">
                                
                            </div>  
                        </div>                            
                      </div>
                    </div>
                    </div>                               
                  </div>                  
                  </div>                   
        </div>
      </div>