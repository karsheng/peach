<!--consultant-->
<!-- Modal -->
<div class="modal fade" id="upload-picture" role="dialog">
	<div class="modal-dialog modal-sm">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Change Profile Picture</h4>
			</div>
			<div class="modal-body">
				<form id=cimageUploadForm action="" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="culd" id="culd1">
								<?php 
									$img = "../consultant_photos/".$_SESSION["con_name"]."_1.jpeg";
									$con_img= (file_exists($img)) ? $img:"../img/logo.png";
									?>
								<img class="culd-img" src="<?=$con_img?>"/>
								<input type="file" name="conProfilePic" id="cfilePhoto" />    
							</div>
						</div>
					</div>
				</form>
				</br>
				<p class="text-center">Tap picture to upload.</p>
			</div>
			<div class="modal-footer">
				<button id="cSubmitBtn" data-dismiss="modal" class="btn btn-default">Save</button>
			</div>
		</div>
	</div>
</div>