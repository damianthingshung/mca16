<div id="myModalName" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Name</h4>
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
                                      <label>New Name</label>
                                      <input type="text" class="form-control" placeholder="Enter New Name" id="name" required data-validation-required-message="Please enter your new name." maxlength="50" name = "new_name">
                                      <p class="help-block text-danger"></p>
                                  </div>
                              </div>

                              <div class="row control-group">
                                  <div class="form-group col-xs-12 floating-label-form-group controls">
                                      <label>Confirm New Name</label>
                                      <input type="text" class="form-control" placeholder="Confirm New Name" id="name" required data-validation-required-message="Please re-enter your new name." maxlength="50" name = "confirm_new_name">
                                      <p class="help-block text-danger"></p>
                                  </div>
                              </div>

                              <br>
                              <div id="success"></div>
                              <button type="submit" name="submit_post_username" class="btn btn-default">Change</button>

                            </form>

                          </div>
                        </div>
            </div>
      </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                    </div>
                    </div>

                    </div>
</div>
