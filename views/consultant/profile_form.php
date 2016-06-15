<!--consultant-->
<!-- Modal -->
<div class="modal fade" id="cEditProfile" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update Profile</h4>
			</div>
			<form id=cProfileUpdateForm action="update_profile.php" method="POST" enctype="multipart/form-data">
			<div class="modal-body">
					<div class="form-group">
						<label for="description">Description:</label>
						<textarea name="profile" class="form-control" rows="10" id="description"><?=$con['profile']?></textarea>
					</div>
				
			</div>
			<div class="modal-footer">
				<button id="cProfileSubmitBtn" type="submit" class="btn btn-default">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>
