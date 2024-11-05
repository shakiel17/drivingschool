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