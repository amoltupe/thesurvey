
    <div class="row" style="padding: 10px;">
        <div class="col-lg-12">
            <h1 class="page-header">Survey</h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="row">
		    <div class="col-lg-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                <?php echo $page_title;?>
		            </div>
		            <div class="panel-body">
		                <div class="row">
		                    <div class="col-lg-12">
		                        <form role="form" method="POST" enctype="multipart/form-data">
		                            <div class="form-group">
		                            		<input type="hidden" name="question_id" value="<?php echo $questions['id'];?>">
			                                <label><?php echo $questions['question'];?></label>
			                                <div>
			                                <?php for($i=1; $i<=4; $i++){
			                                	if(!empty($questions['option'.$i])){
			                                		$option = $questions['option'.$i];?>
			                                		<div class="checkbox">
						                                <label>
						                                    <input name="option" class="survey-option" type="radio" value="<?php echo 'option'.$i;?>"><?php echo $option;?>
						                                </label>
						                            </div>

			                                	<!-- <div><label><input class="form-control radio radio_survey" name="option" 
			                                		value="<?php echo 'option'.$i;?>" type="radio" value=""><?php echo $option;?></label></div> -->
			                                <?php }}?>
			                            </div>
		                            </div>
		                            <button type="submit" class="btn btn-default btn-primary survey-submit-btn">Submit Survey</button>
		                            
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
    </div>
    <!-- /.row -->
    