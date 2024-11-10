<div class="header-divider"></div>
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
              <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><a href="<?=base_url();?>user_main" style="text-decoration:none;color:black;"><span>Home</span></a>
              </li>
              <li class="breadcrumb-item"><a href="<?=base_url();?>user_enrollment" style="text-decoration:none;color:black;"><span>Enrollment History</span></a></li>
              <li class="breadcrumb-item"><a href="<?=base_url();?>user_session/<?=$regno;?>/<?=$session_no;?>" style="text-decoration:none;color:black;"><span>Session List</span></a></li>
              <li class="breadcrumb-item active"><span>Session Details</span></li>
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
            $teach=$this->School_model->getSingleInstructorDetails($instructor);
            ?>
          <div class="row">
            <div class="col-sm-12 col-lg-12">                      
                    <div class="card mb-4">
                      <div class="card-header">
                        <table width="100%" border="0">
                            <tr>
                                <td><b>Session Details (<?=$regno;?>)</b></td>
                                <td align="right"></td>
                            </tr>
                        </table>
                        
                    </div>
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <table width="100%" border="0">
                                <tr>
                                    <td width="10%"><b>Instructor:</b></td>
                                    <td><?=$teach['fullname'];?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?=form_open(base_url()."select_car_session");?>
                                <input type="hidden" name="regno" value="<?=$regno;?>">
                                <input type="hidden" name="session_no" value="<?=$session_no;?>">
                                <input type="hidden" name="trans_type" value="<?=$trans_type;?>">
                                <input type="hidden" name="instructor" value="<?=$instructor;?>">
                                <tr>
                                    <td width="15%"><b>Transmission Type:</b></td>
                                    <td><?=$trans_type;?></td>
                                    <td>
                                        <select name="car" class="form-select" required>
                                            <option value="">Select Car</option>
                                            <?php
                                            foreach($items as $item){
                                                echo "<option value='$item[id]'>$item[description]</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td><input type="submit" class="btn btn-primary" value="Select"></td>
                                </tr>
                                <?=form_close();?>
                                <tr>
                                    <td><b>Car: </b></td>
                                    <td><b><?php if($car_id <> ""){ echo $car['description']; }?></b></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                      </div>                        
                    </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">                                
                               <table width="100%" border="0">
                               <?=form_open(base_url()."select_session_datetime");?>
                               <input type="hidden" name="regno" value="<?=$regno;?>">
                               <input type="hidden" name="session_no" value="<?=$session_no;?>">
                                <input type="hidden" name="trans_type" value="<?=$trans_type;?>">
                                <input type="hidden" name="instructor" value="<?=$instructor;?>">
                                <input type="hidden" name="car" value="<?=$car_id;?>">
                                    <tr>
                                        <td width="15%"><b>Select Month & Year</b></td>
                                        <td width="15%">
                                            <select name="month" class="form-select" required>
                                                <option value="">Select Month</option>
                                                <?php
                                                for($i=1;$i<=12;$i++){
                                                    echo "<option value='$i'>".date('F',strtotime(date("Y-$i")))."</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td width="15%">
                                            <select name="year" class="form-select" required>
                                                <option value="">Select Year</option>
                                                <?php
                                                for($i=date('Y')+1;$i>=date('Y');$i--){
                                                    echo "<option value='$i'>$i</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td><input type="submit" class="btn btn-primary" value="Select"></td>
                                    </tr>
                                    <?=form_close();?>
                                </table>                                                                  
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                            <?php
                                if($datetime <> ""){
                                ?>
                                <table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
                                    <tr>
                                        <td colspan="7" align="center"><b><?=date('F Y',strtotime($datetime));?></b></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>Sunday</b></td>
                                        <td align="center"><b>Monday</b></td>
                                        <td align="center"><b>Tuesday</b></td>
                                        <td align="center"><b>Wednesday</b></td>
                                        <td align="center"><b>Thursday</b></td>
                                        <td align="center"><b>Friday</b></td>
                                        <td align="center"><b>Saturday</b></td>
                                    </tr>
                                    <tr>
                                        <?php
                                        $w=0;
                                        for($i=1;$i<=date('t',strtotime($datetime));$i++){
                                            echo form_open(base_url()."select_session_datetime"); 
                                            echo '<input type="hidden" name="regno" value="'.$regno.'">';
                                            echo '<input type="hidden" name="session_no" value="'.$session_no.'">';
                                            echo '<input type="hidden" name="trans_type" value="'.$trans_type.'">';
                                            echo '<input type="hidden" name="instructor" value="'.$instructor.'">';
                                            echo '<input type="hidden" name="car" value="'.$car_id.'">';                                            
                                            $date=date('Y-m-d',strtotime($datetime."-".$i));
                                            echo "<input type='hidden' name='datearray' value='$date'>";
                                            echo "<input type='hidden' name='month' value='".date('m',strtotime($datetime))."'>";
                                            echo "<input type='hidden' name='year' value='".date('Y',strtotime($datetime))."'>";
                                            $am="<input type='submit' class='btn btn-success btn-sm text-white' name='am_session' value='AM SESSION (8-9:30)'>";
                                            $pm="<input type='submit' class='btn btn-warning btn-sm text-white' name='pm_session' value='PM SESSION (2-4:30)'>";
                                            $count=$this->School_model->db->query("SELECT * FROM schedule WHERE regno='$regno'");
                                            $rcount=$count->result_array();
                                            if(count($rcount) >= $session_no){
                                                $am="<font color='orange'>Session Limit Reached!</font>";
                                                $pm="<font color='orange'>Session Limit Reached!</font>";
                                            }
                                            $check=$this->School_model->db->query("SELECT * FROM schedule WHERE datearray='$date' AND instructor_id='$instructor'");
                                            if($check->num_rows() > 0){
                                                $rescheck=$check->result_array();
                                                foreach($rescheck as $r){
                                                    if($r['starttime']=="08:00:00"){
                                                        if($r['regno']==$regno){
                                                            $am="<font color='green'>You already selected AM session.</font>";
                                                        }else{
                                                            $am="<font color='red'>AM Session NOT Available.</font>";
                                                        }
                                                    }
                                                    if($r['starttime']=="14:00:00"){
                                                        if($r['regno']==$regno){
                                                            $pm="<font color='green'>You already selected PM session.</font>";
                                                        }else{
                                                            $pm="<font color='red'>PM Session NOT Available.</font>";
                                                        }                                                        
                                                    }
                                                }
                                            }                                            
                                            if($date <= date('Y-m-d')){
                                                $am="NOT AVAILABLE!";
                                                $pm="NOT AVAILABLE!";
                                            }                                            
                                            if($i==1){
                                                for($x=0;$x<7;$x++){
                                                    if(date('w',strtotime($date))==$x){
                                                        echo "<td style='width:14.285%; height: 100px;'><b>$i</b><br>$am<br>$pm</td>"; 
                                                        $w++;
                                                        break;                                                                                                                                                     
                                                    }else{
                                                        echo "<td>&nbsp;</td>";
                                                        $w++;
                                                    }
                                                   
                                               }
                                            }else{
                                                echo "<td style='width:14.285%; height: 100px;'><b>$i</b><br>$am<br>$pm</td>"; 
                                                $w++;
                                            }
                                                                                       
                                           
                                            if($w > 6){
                                                $w=0;
                                                echo "</tr>";
                                            }
                                            echo form_close();
                                        }
                                        ?>
                                    </tr>
                                </table>
                                <?php
                                }
                                ?>
                            </div>
                            </div>
                    </div>                               
                  </div>                  
                  </div>                   
        </div>
      </div>