<?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<?php
//code for google tracking after payment done
if(isset($_GET['P']))
{
?>
<script>
$(document).ready(function(){
	 var price = "<?php echo $_GET['P'];?>"; 
	_gaq.push(['_trackEvent', 'Form', 'Purchase', 'Complete', price]);
});
</script>
<?php	
}
?>
<?php
//Code for generating signature
//I tried $path1 url in path but it return same as use $path

//$path1 = 'https://storage101.ord1.clouddrive.com/v1/MossoCloudFS_7c076e1c-be11-40e6-888d-748c44fdc43b/media';
$time = time() . rand(1, 100);
$filename_prefix = $request_id.'-'. $time.'-';
$path = '/v1/MossoCloudFS_7c076e1c-be11-40e6-888d-748c44fdc43b/printingupload-files/'.$filename_prefix;
//$redirect = "http://panel.511central.com/product/upload_proofing/$request_id";
$redirect = Router::url(array('controller'=>'products','action'=>'upload_proofing',$request_id),true);
$max_file_size = 5368709120;
$max_file_count = 25;
$expires = (time() + 36000);
$key = '8c2a0c4773a9b16dcfef9eefbc2b02dd';
$hmac_body = sprintf("%s\n%s\n%s\n%s\n%s", $path, $redirect, $max_file_size, $max_file_count, $expires);
$signature =  hash_hmac('sha1', $hmac_body, $key);
?>
<style>
#wrapper{width:750px; margin:0px auto;}
a {color:#DD1F27;}
a:hover {text-deocration:none;}
.footer {width:750px; margin:0px auto; padding-top:0px;}
</style>

<div id="wrapper">
	<?php echo $this->Session->flash(); ?>
<?php 
	if(!empty($request_id)) {
		//echo $this->Form->create('PrintingUpload', array('type' => 'file', 'url' => array('controller' => 'product', 'action' => 'upload_proofing', $request_id, $design)));
?>
<form id="PrintingUploadUploadProofingForm" accept-charset="utf-8" action="https://storage101.ord1.clouddrive.com/v1/MossoCloudFS_7c076e1c-be11-40e6-888d-748c44fdc43b/printingupload-files/<?php echo $filename_prefix; ?>" method="POST" enctype="multipart/form-data">

			<div style="width:750px;margin:0 auto;">
			<h1 style="font-size:48px;line-height:40px;letter-spacing:-1px;">Welcome to the PrintNinja<br /> File Upload System</h1>
           <p style="padding-bottom:20px;">Greetings! We know you're eager to get started uploading your files, <br /> but please take a few moments to read through the notes on this page. <br />We promise it's not a lot and it's all designed to help make your project go as smoothly as possible!</p>
           <div style="background:#FFF;padding:10px 30px 20px 30px;">
           <h2 style="font-size:28px;letter-spacing:-1px;">Before You Upload</h2>
           	<p>Please ensure that you have reviewed all your files to verify that they are print-ready, including reviewing PrintNinja's <a href="/printing-resource-center/file-setup" target="_blank" onClick="_gaq.push(['_trackEvent', 'Proofing', 'Upload Proof', 'artwork setup guides']);">artwork setup guides</a></p>
           	<p>Once you upload your files, we will generate an <a href="/printing-resource-center/book-printing-options/proofing-options" target="_blank" onClick="_gaq.push(['_trackEvent', 'Proofing', 'Upload Proof', 'Electronic proof']);">electronic proof</a> for your review the following business day. </p>
           	<p>Please Note: Submitting a file with a dpi higher than 400 may delay your electronic proof, as it takes longer for our prepress reps to download files of that size. Higher dpi files do not improve print quality. Choose your preferred program and scroll down to the exporting section for a <a href="/printing-resource-center/file-setup/book-guidelines/creating-your-interior-pages" target="_blank" onClick="_gaq.push(['_trackEvent', 'Proofing', 'Upload Proof', 'DPI conversion']);">dpi converting tutorial</a>.</p>
            <p>If you need to upload new files after reviewing your electronic proof, it may take us up to one additional business day to generate each successive proof.</p>
           	<p>Also, please remove spaces and special characters from your filenames, as this causes issues with our uploading system.</p>
			<?php /* ?>
			<p>Please ensure that you have reviewed all your text and design, including reviewing our <a href="/resources/printing-checklist/checklist" target="_blank">printing checklist</a> and <a href="/resources/proofreading/checklist" target="_blank">proofreading checklist</a>. Once you upload your files, we will generate a <a href="/resources/proofs" target="_blank">proof</a>, which is not designed to be used for proofreading. The files you upload here should be as close to final as possible. Of course, we can still correct errors that slip through, but multiple rounds of corrections will delay your project.</p><p>Also, please remove spaces and special characters from your filenames, as this sometimes causes issues with uploading files.</p><p>If your files haven’t been proofread and checked for layout issues, <br />please double check your files and then return to this page to upload.</p>
			<?php */ ?>
			</div>
           <h2 style="font-size:28px;letter-spacing:-1px;">What You Can Upload</h2>
           <p>Our preferred format is PDF, but we can also accept a wide variety of other formats.</p>
           <h2 style="font-size:28px;letter-spacing:-1px;">Got a Bunch of Files?</h2>
           <p>If you need to upload more than five files at once, you may want to combine them into a single ZIP file and upload that file instead. You can also upload your first five files, return to this page and repeat as needed.</p>
           <h2 style="font-size:28px;letter-spacing:-1px;">Got Big Files?</h2>
           <p>You can upload files up to 2GB each using this page. <br /><br />If you have a file that’s larger than this, please make sure your dpi isn’t higher than 400. Resolution higher than 400dpi does not increase quality. Lowering dpi is an easy way to get your file size down. Choose your preferred program and scroll down to the exporting section for a <a href="/printing-resource-center/file-setup/book-guidelines/creating-your-interior-pages" target="_blank" onClick="_gaq.push(['_trackEvent', 'Proofing', 'Upload Proof', 'DPI conversion tutorial']);">dpi converting tutorial</a>.</p>
           <p>If you’ve checked both the above possible issues and you’re still having trouble, please <a href="/about/contact/" target="_blank" onClick="_gaq.push(['_trackEvent', 'Proofing', 'Upload Proof', 'Contact Us']);">contact us</a> for alternate options.</p>
           <h2 style="font-size:28px;letter-spacing:-1px;">Patience, Please</h2>
           <p>If your files are very large, it may take a long time (perhaps hours or even the better part of a day) to upload your files. Although our system doesn’t include a progress bar, some browsers display a percentage status in the lower part of the window. Do not close this page until you see a confirmation message or your file upload will fail and you will need to start over.</p>
           <h2 style="font-size:36px;letter-spacing:-1px;">Upload Your Files Here</h2>
           <p>Click the "Choose File" button and then navigate to the location the file you want to upload is stored on your computer. Double click the filename or click "Open." Repeat for up to four additional files. Then click "Upload" and wait until you receive a confirmation message.</p>
			<div class="file_upload">
				<table>
					<tbody>
						<?php 
							if(isset($onlyStore)) {
								$options = array(
												'customerservice' => "Unknown/None", 'hmelnick' => "Heather Melnick", 'driordan' => "Dan Riordan", 
												'ldaloise' => "Lisa D'Aloise", 'bmazzaferri' => "Brian Mazzaferri", 'samborn' => "Samantha Amborn"
											);
						?>
						<tr>
							<td>Your Name</td>
							<td>
								<?php 
									echo $this->Form->input('name', array('label' => false, 'class' => 'required'));
								?>
							</td>
						</tr>
						<tr>
							<td>Your Email</td>
							<td>
								<?php 
									echo $this->Form->input('email', array('label' => false, 'class' => 'required email'));
									echo $this->Form->hidden('account_owner', array('value'=>true));
								?>
							</td>
						</tr>
	
						<?php		
							} 
						?>
						<tr>
							<td>File 1</td>
							<td>
							<input type="hidden" name="redirect" value="<?php echo $redirect ?>">
							<input type="hidden" value="5368709120" name="max_file_size" />
							<input type="hidden" value="25" name="max_file_count">
							<input type="hidden" value="<?php echo $expires;?>" name="expires" id="rack_expire">
							<input type="hidden" value="<?php echo $signature;?>" name="signature" id="rack_signature">
								<input id="PrintingUploadFile1" type="file" name="file_1">
							</td>
						</tr>
						<tr>
							<td>File 2</td>
							<td>
								<input id="PrintingUploadFile2" type="file" name="file_2">
							</td>
						</tr>
						<tr>
							<td>File 3</td>
							<td>
								<input id="PrintingUploadFile3" type="file" name="file_3">
							</td>
						</tr>
						<tr>
							<td>File 4</td>
							<td>
								<input id="PrintingUploadFile4" type="file" name="file_4">
							</td>
						</tr>
						<tr>
							<td>File 5</td>
							<td>
								<input id="PrintingUploadFile5" type="file" name="file_5">
							</td>
						</tr>
					</tbody>
				</table>		
			</div></
			<?php 
				echo $this->Form->submit('Upload', array('id' => 'uploadFilesBtn'));
			?>
		
		</form>
        <p style="font-size: 14px; color: #666;">Uploads subject to our <a href="/about/privacy/" target="_blank" style="color:#666;">privacy policy</a> and <a href="/about/terms/" target="_blank" style="color:#666;">terms and conditions</a>.
        </p>
        <div style="color:#666;font-size: 12px;padding: 100px 0 0 0;">
        Having trouble? <a href="https://www.wetransfer.com/?to=prepress@printninja.com&msg=<?php echo $request_id;?>" target="_blank" rel="nofollow" style="color:#666;">Click here</a> to use an alternate method</a>
        </div>
        </div>
<?php 
		//echo $this->Form->end();
	}
?>
</div>
<script>
function closeIt()
{
	return "Warning: Navigating away from this page will cancel your file upload. Please keep this window open until you see a confirmation message.";
}
	$(document).ready(function(){
		 
		$('#uploadFilesBtn').click(function(){
			var account_owner = uname = email = '';
			if($('#account_owner').val())
			{
				account_owner = $('#account_owner').val();
			}
			if($('#name').val())
			{
				 uname = $('#name').val();
			}

			if($('#account_owner').val())
			{
				email = $('#email').val();
			}
			
			$(this).val('Please wait...processing');
			$(this).attr('disabled', true);
			var file_name_array  = [];
			$.each($('input[type=file]'), function(k,v){
			var filename = $(v).val(); 
			
	        if(filename!='') 
     		{
				filename = filename.split('\\').pop(); 
				file_name_array.push(filename);
			}
				// filename = "blahblah.jpg", without path
			});
			  window.onbeforeunload = '';
			jQuery.ajax({
				url: "<?php echo Router::url(array('controller'=>'products','action'=>'create_container',$request_id),true); ?>",
				type : 'POST',
				data : 'files_array='+file_name_array+'&request_id=<?php echo $request_id;?>&account_owner='+account_owner+'&name='+uname+'&email='+email,
				success: function(data){
					var obj=jQuery.parseJSON(data);
					if(obj.success){
						$('#PrintingUploadUploadProofingForm').attr('action', obj.action);
						$('#rack_expire').val(obj.expire);
						$('#rack_signature').val(obj.signature);
						$('#PrintingUploadUploadProofingForm').submit();
						setTimeout( "window.onbeforeunload = closeIt;",5000 );			
					}else if(obj.error){
						 $("input[type=file],input[type=text]").val("");
						$('#uploadFilesBtn').val('Upload');
						$('#uploadFilesBtn').attr('disabled', false);
						alert(obj.error);
					}
				}
			});
			return false;
		});
		<?php if(!empty($redirect_url)) { ?>
			//window.top.location.href = "<?php echo $redirect_url; ?>"; 
		<?php } ?>
		$('#uploadFilesBtn').click(function (){
			$(this).val('Please wait...processing');
			$(this).attr('disabled', true);
			return false;
		});
		


		$('input[type="file"]').change(function () {
			//var ext = this.value.match(/\.(.+)$/)[1];
			var ext = this.value.substr((~-this.value.lastIndexOf(".") >>> 0) + 2);
			
			switch (ext) {
				case 'pdf':
				case 'PDF':
				case 'png':
				case 'tif':
				case 'jpg':
				case 'eps':
				case 'ai':
				case 'idd':
				case 'pub':
				case 'doc':
				case 'docx':
				case 'zip':
				case 'tar':
				case 'ppt':
				case 'pptx':
					$('#uploadFilesBtn').attr('disabled', false);
					break;
				default:
					alert('This is not an allowed file type.');
					this.value = '';
			}
		});

		$("#PrintingUploadUploadProofingForm").validate();

	});
</script>

