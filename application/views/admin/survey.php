<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Manage Users
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="manage-users">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Survey Question</th>
                                <th>Type</th>
                                <th>Answers</th>
                                <th>Created Date</th>
                                <th>Status</th>
                                <th>Total Submitted</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($surveys)){
                            	$cnt = 1;
                                foreach ($surveys as $survey){?>
                            <tr class="odd gradeX">
                                <td><?php echo $cnt++;?></td>
                                    <td><?php echo $survey['question'];?></td>
                                    <td>Radio</td>
                                    <td><?php 
                                    	for ($i=1; $i <= 4; $i++) { 
                                    		if($survey['option'.$i] != '')
                                    			echo str_replace(' ', '&nbsp;', $survey['option'.$i]).'<br>';
                                    	}
                                    ?></td>
                                    <td><?php echo get_user_date($survey['created_date'], DATE_YMD);?></td>
                                    <td><?php echo $survey['status'];?></td>
                                    <td> 11 </td>
                                    
                                    <td class="center" style="width: 150px;">
                                        <a class="btn btn-primary " href="<?php echo BASE_URL . C_ADMIN .'edit_user/' .$survey['id']; ?>"><i class="glyphicon glyphicon-edit "></i>Edit</a>
                                        <a class="btn btn-danger " onclick="return confirm('Are you sure that, you want to delete this user?')" href="<?php echo BASE_URL . C_ADMIN .'delete_user/' . $survey['id']; ?>"><i class="glyphicon glyphicon-remove "></i>Delete</a>
                                    </td>
                            </tr>
                            <?php }}?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>