<div class="main-panel">
          <div class="content-wrapper">                              
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0"><a href="<?=base_url();?>manage_user_session/<?=$regno;?>" class="btn btn-primary">< Back</a> Session Details</h4>                      
                    </div>
                    <?php
                    $qry=$this->School_model->db->query("SELECT * FROM cars WHERE id='$session[car_id]'");
                    $car=$qry->row_array();
                    $qry1=$this->School_model->db->query("SELECT * FROM instructor WHERE id='$session[instructor_id]'");
                    $inst=$qry1->row_array();
                    ?>
                    <?=form_open(base_url()."update_session");?>
                    <input type="hidden" name="sid" value="<?=$sid;?>">
                    <input type="hidden" name="regno" value="<?=$regno;?>">
                    <div class="table-responsive">
                        <table width="100%" border="0">
                            <tr>
                                <td>Car Details</td>
                                <td>
                                    <select name="car" class="form-control" required>
                                        <option value="<?=$car['id'];?>"><?=$car['description'];?> (<?=$car['trans_type'];?>)</option>
                                        <?php
                                        $query=$this->School_model->getAllCars();
                                        foreach($query as $row){
                                            echo "<option value='$row[id]'>$row[description] ($row[trans_type])</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Instructor</td>
                                <td>
                                    <select name="instructor" class="form-control" required>
                                        <option value="<?=$inst['id'];?>"><?=$inst['fullname'];?></option>
                                        <?php
                                        $query=$this->School_model->getAllInstructors();
                                        foreach($query as $row){
                                            echo "<option value='$row[id]'>$row[fullname]</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td>
                                    <input type="date" name="datearray" class="form-control" value="<?=$session['datearray'];?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Start Time</td>
                                <td>
                                    <input type="time" name="starttime" class="form-control" value="<?=date('H:i',strtotime($session['starttime']));?>">
                                </td>
                            </tr>
                            <tr>
                                <td>End Time</td>
                                <td>
                                    <input type="time" name="endtime" class="form-control" value="<?=date('H:i',strtotime($session['endtime']));?>">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </td>
                            </tr>
                        </table>
                    </div>                    
                  </div>
                  <?=form_close();?>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->