<div class="modal fade" id="admin_logout">
    <div class="modal-dialog">
        <div class="modal-content">        
            <input type="hidden" name="refno" id="rrno">
            <div class="modal-header">
              <h4 class="modal-title">Going anywhere?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">                            
              <h3>Do you wish to logout?</h3>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary" data-dismiss="modal">No, I'll stay!</button>
              <a href="<?=base_url();?>admin_logout" class="btn btn-danger">Yes, I will</a>
            </div>            
        </div>
    </div>
</div>
<div class="modal fade" id="manageInstructor">
    <div class="modal-dialog">
        <div class="modal-content">
        <?=form_open(base_url()."save_instructor");?>          
            <input type="hidden" name="id" id="instructor_id">
            <div class="modal-header">
              <h4 class="modal-title">Manage Instructor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">                            
              <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control" name="fullname" id="instructor_name">
              </div>              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>
<div class="modal fade" id="manageInstructorImage">
    <div class="modal-dialog">
        <div class="modal-content">
        <?=form_open(base_url()."save_instructor_image",array('enctype' => 'multipart/form-data'));?>          
            <input type="hidden" name="id" id="instructor_image_id">
            <div class="modal-header">
              <h4 class="modal-title">Manage Instructor Image</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">                            
              <div class="form-group">
                <label>Image File</label>
                <input type="file" class="form-control" name="file" id="instructor_image">
              </div>              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>

<div class="modal fade" id="manageCar">
    <div class="modal-dialog">
        <div class="modal-content">
        <?=form_open(base_url()."save_car");?>          
            <input type="hidden" name="id" id="car_id">
            <div class="modal-header">
              <h4 class="modal-title">Manage Car Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">                            
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3" id="car_description"></textarea>
              </div>
              <?php
              $brand=array('TOYOTA','MITSUBISHI','SUZUKI','HYUNDAI','KIA','NISSAN');
              ?>
              <div class="form-group">
                <label>Brand</label>
                <select name="brand" class="form-control" id="car_brand">
                    <option value="">Select Brand</option>
                    <?php
                    foreach($brand as $item){
                        echo "<option value='$item'>$item</option>";
                    }
                    ?>
                </select>
              </div>
              <div class="form-group">
                <label>Model</label>
                <input type="text" name="model" class="form-control" id="car_model">
              </div>
              <div class="form-group">
                <label>Transmission</label>
                <select name="transtype" class="form-control" id="car_transtype">
                    <option value="">Select Transmission Type</option>
                    <option value="Manual">Manual</option>
                    <option value="Automatic">Automatic</option>
                </select>
              </div>
              <div class="form-group">
                <label>Vehicle Type</label>
                <select name="vehicletype" class="form-control" id="car_vehicletype">
                    <option value="">Select Vehicle Type</option>
                    <option value="Sedan">Sedan</option>
                    <option value="SUV">SUV</option>
                    <option value="Van">Van</option>
                    <option value="Pick up">Pick up</option>
                </select>
              </div>
              <div class="form-group">
                <label>Fuel Type</label>
                <select name="gastype" class="form-control" id="car_gastype">
                    <option value="">Select Fuel Type</option>
                    <option value="Gasoline">Gasoline</option>
                    <option value="Diesel">Diesel</option>                    
                </select>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>
<div class="modal fade" id="manageCarImage">
    <div class="modal-dialog">
        <div class="modal-content">
        <?=form_open(base_url()."save_car_image",array('enctype' => 'multipart/form-data'));?>          
            <input type="hidden" name="id" id="car_image_id">
            <div class="modal-header">
              <h4 class="modal-title">Manage Car Image</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">                            
              <div class="form-group">
                <label>Image File</label>
                <input type="file" class="form-control" name="file" id="car_image">
              </div>              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>

<div class="modal fade" id="ProgressReport">
    <div class="modal-dialog">
        <div class="modal-content">
        <?=form_open(base_url()."save_remarks");?>          
            <input type="hidden" name="session_id" id="rep_id">
            <input type="hidden" name="regno" id="rep_regno">
            <div class="modal-header">
              <h4 class="modal-title">Manage Performance Remarks</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">                            
              <div class="form-group">
                <label>Remarks</label>
                <textarea name="remarks" class="form-control" rows="4" id="rep_remarks"></textarea>
              </div>              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>