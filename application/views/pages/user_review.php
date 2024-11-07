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
                                <td align="right">
                                    <a href="" class="btn btn-success btn-sm text-white addReviews" data-coreui-toggle="modal" data-coreui-target="#EditReviews">New Comments/Reviews</a>                                               
                                </td>
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
                                    <th>Comments/Reviews</th>                                                                        
                                    <th class="text-center">Date & Time</th>                                    
                                    <th class="text-center">Action</th>                                    
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $x=1;
                                    foreach($items as $item){                                        
                                        $comments=str_replace('uck','***',$item['comments']);
                                        $comments=str_replace('gago','g***',$comments);
                                        $comments=str_replace('yawa','y***',$comments);
                                        $comments=str_replace('puta','p***',$comments);
                                        $comments=str_replace('shit','s***',$comments);


                                        echo "<tr>";
                                            echo "<td>$x.</td>";
                                            echo "<td>$comments</td>";                                                                                        
                                            echo "<td align='center'>".date('m/d/Y',strtotime($item['datearray']))." ".date('h:i A',strtotime($item['timearray']))."</td>";                                            
                                            ?>
                                            <td align="center">
                                                <a href="#" class="btn btn-warning btn-sm editReviews" data-coreui-toggle="modal" data-coreui-target="#EditReviews" data-id="<?=$item['id'];?>_<?=$item['comments'];?>">Edit</a>
                                                <a href="<?=base_url();?>remove_comments/<?=$item['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you wish to remove this comment?');return false;">Remove</a>
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
      </div>