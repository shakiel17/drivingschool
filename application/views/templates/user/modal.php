<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3>Do you wish to logout?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">No</button>
        <a href="<?=base_url();?>user_logout" class="btn btn-primary">Yes</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="NewEnrollment" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLiveLabel">Enrollment Details</h5>
          <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <?=form_open(base_url()."save_enrollment");?>
      <div class="modal-body">
        <div class="mb-4">
          <label class="col-form-label">Payment Type</label>
          <select name="payment_type" class="form-control" required>
            <option value="">Select Payment Type</option>
            <option value="full">Full Payment</option>
            <option value="partial">Per Session</option>
          </select>
        </div>        
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit">Submit</button>
       </div>
       <?=form_close();?>
    </div>
  </div>
</div>

<div class="modal fade" id="NewSession" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLiveLabel">Session Details</h5>
          <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <?=form_open(base_url()."new_session");?>
        <input type="hidden" name="regno" value="<?=$regno;?>">
      <div class="modal-body">
        <div class="mb-4">
          <label class="col-form-label">Transmission</label>
          <select name="trans_type" class="form-control" required>
            <option value="">Select Transmission Type</option> 
            <option value="Automatic">Automatic</option>
            <option value="Manual">Manual</option>
          </select>          
        </div>  
        <div class="mb-4">
          <label class="col-form-label">Instructor</label>
          <select name="instructor" class="form-control" required>
            <option value="">Select Instructor</option> 
            <?php
            foreach($teach as $item){
              echo "<option value='$item[id]'>$item[fullname]</option>";
            }
            ?>
          </select>
        </div>        
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit">Submit</button>
       </div>
       <?=form_close();?>
    </div>
  </div>
</div>

            <?php
            $username=$this->session->username;
            $query=$this->School_model->db->query("SELECT c.*,u.* FROM customer c INNER JOIN user u ON u.customer_no=c.customer_no WHERE u.username='$username'");
            $profile=$query->row_array();
            ?>
      <div class="modal fade" id="UserProfile" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLiveLabel">User Profile</h5>
                <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
              </div>
              <?=form_open(base_url()."update_user_profile");?> 
              <input type="hidden" name="customer_no" value="<?=$profile['customer_no'];?>">             
            <div class="modal-body">
              <div class="mb-2">
                <label class="col-form-label">Last Name</label>
                <input type="text" name="lastname" class="form-control" value="<?=$profile['lastname'];?>">
              </div>
              <div class="mb-2">
                <label class="col-form-label">First Name</label>
                <input type="text" name="firstname" class="form-control" value="<?=$profile['firstname'];?>">
              </div>        
              <div class="mb-2">
                <label class="col-form-label">Middle Name</label>
                <input type="text" name="middlename" class="form-control" value="<?=$profile['middlename'];?>">
              </div>
              <div class="mb-2">
                <label class="col-form-label">Gender</label>
                <select name="gender" class="form-select">
                  <option value="<?=$profile['gender'];?>"><?=$profile['gender'];?></option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="mb-2">
                <label class="col-form-label">Date of Birth</label>
                <input type="date" name="birthdate" class="form-control" value="<?=$profile['birthdate'];?>">
              </div>
              <div class="mb-2">
                <label class="col-form-label">Address</label>
                <textarea name="address" class="form-control" rows="3"><?=$profile['address'];?></textarea>
              </div>
              <div class="mb-2">
                <label class="col-form-label">Email</label>
                <input type="text" name="email" class="form-control" value="<?=$profile['email'];?>">
              </div>
              <div class="mb-2">
                <label class="col-form-label">Contact No.</label>
                <input type="text" name="contactno" class="form-control" value="<?=$profile['contactno'];?>">
              </div>
              <div class="mb-2">
                <label class="col-form-label">Username</label>
                <input type="text" name="username" class="form-control" value="<?=$profile['username'];?>">
              </div>
              <div class="mb-2">
                <label class="col-form-label">Password</label>
                <input type="password" name="password" class="form-control" value="<?=$profile['password'];?>">
              </div>
            </div>            
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
              <button class="btn btn-primary" type="submit">Update</button>
            </div>
            <?=form_close();?>
          </div>
        </div>
      </div>