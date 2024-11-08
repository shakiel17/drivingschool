<div class="main-panel">
          <div class="content-wrapper">                              
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">List of Instructor</h4>
                      <a href="#" data-toggle="modal" data-target="#manageInstructor" class="text-dark ml-auto mb-3 mb-sm-0 btn btn-warning btn-sm addInstructor" style="border-radius:20px;"> Add Instructor</a>
                    </div>
                    <div class="table-responsive">
                      <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th class="font-weight-bold" width="5%">No.</th>
                            <th class="font-weight-bold">Image</th>
                            <th class="font-weight-bold">Name</th>                            
                            <th class="font-weight-bold">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $x=1;
                                foreach($instructors as $item){
                                    if($item['image']==""){
                                        $image="<a href='#' data-toggle='modal' data-target='#manageInstructorImage' data-id='$item[id]' class='addInstructorImage'>Add Image</a>";
                                    }else{
                                        $image="<a href='#' data-toggle='modal' data-target='#manageInstructorImage' data-id='$item[id]' class='addInstructImage'><img src='data:image/jpg;charset=utf8;base64,".base64_encode($item['image'])."' width='80'></a>";
                                    }
                                    echo "<tr>";
                                        echo "<td>$x.</td>";
                                        echo "<td align='center' width='80'>$image</td>";
                                        echo "<td>$item[fullname]</td>";                                        
                                        echo "<td align='center'>";                                        
                                        ?>
                                        <a href="#" class="btn btn-primary btn-sm editInstructor" data-toggle="modal" data-target="#manageInstructor" data-id="<?=$item['id'];?>_<?=$item['fullname'];?>">Edit</a>
                                        <a href="<?=base_url();?>delete_instructor/<?=$item['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you wish to delete this item?');return false;">Delete</a>
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
            </div>
          </div>
          <!-- content-wrapper ends -->