<!-- Modal password change -->
<div id="myModalStatus" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Status</h4>
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
                                            <label>Write your status here</label>
                                              <textarea class="form-control" placeholder="Write your status here" id="name" required data-validation-required-message="Please enter your status." maxlength="255" name="new_status"></textarea>

                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <br>
                                    <div id="success"></div>
                                    <button type="submit" name="submit_post_status" class="btn btn-default">Update</button>

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
