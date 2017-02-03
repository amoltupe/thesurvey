<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $page_title;?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Question Type</label>
                                <select class="form-control">
                                    <option value="radio">Radio</option>
                                    <option value="checkbox">Checkbox</option>
                                    <option value="text">Text</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Survey Question</label>
                                <input required class="form-control" name="mobile_no" type="text" value="<?php echo isset($edit_user)? $edit_user['mobile_no']:'' ?>" <?php echo isset($edit_user)? 'readonly':'';?>>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input required  class="form-control" name="EmailID" type="email" value="<?php echo isset($edit_user)? $edit_user['email_id']:'' ?>">
                            </div>
                            <div class="form-group">
                                <label>DOB</label>
                                <input class="form-control" name="DateOfBirth" type="date" value="<?php echo isset($edit_user)? $edit_user['dateofbirth']:'' ?>">
                                <p class="help-block">YYY/MM/DD</p>
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <input class="form-control" name="Location" type="text" value="<?php echo isset($edit_user)? $edit_user['location']:'' ?>">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input required class="form-control" name="Password" type="text" autocomplete="off">
                            </div>
                            <button type="submit" class="btn btn-default btn-primary">Add User</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-6">
                        
                        
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->