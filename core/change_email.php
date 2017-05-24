
<!-- Modal Email change -->
<div id="myModalEmail" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Email</h4>
      </div>
      <div class="modal-body">
        <div class="panel panel-default post">
          <div class="panel-body">
            <div class="panel-heading">
              <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">

              <form action="profile.php" method="POST">

                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>New Email Address</label>
                          <input type="email" class="form-control" placeholder="New Email Address" id="email" required data-validation-required-message="Please enter your new email address." maxlength="50" name="new_email">
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>

                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Confirm New Email Address</label>
                          <input type="email" class="form-control" placeholder="Confirm New Email Address" id="email" required data-validation-required-message="Please confirm your new email address." maxlength="50" name="confirm_new_email">
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>

                  <br>
                  <div id="success"></div>
                  <div class="row">
                      <div class="form-group col-xs-12">
                        <button type="submit" name="submit_post_email" class="btn btn-default">Change</button>
                      </div>
                  </div>
              </form>

            </div><!--panel body-->
          </div>
        </div>
      </div><!--modal body-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
