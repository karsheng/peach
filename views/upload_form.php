<!-- Modal -->
<div class="modal fade" id="upload-selfie" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Step 1: Upload Selfies and Personal Info</h4>
			</div>
			<div class="modal-body">
				<form id=imageUploadForm action="" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<h4 class=text-center>Front</h4>
							<div class="uld" id="uld1">
								<?php 
									$img1 = "img/".$_SESSION["username"]."-1.jpg";
									$img2 = "img/".$_SESSION["username"]."-2.jpg";
									$user_img1= (file_exists($img1)) ? $img1:"img/logo.png";
									$user_img2= (file_exists($img2)) ? $img2:"img/logo.png";
									?>
								<img class="uld-img" height="400px" width="250px" src="<?=$user_img1?>"/>
								<input type="file" name="userprofile_picture"  id="filePhoto" />    
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<h4 class="text-center">Side</h4>
							<div class="uld" id="uld2">
								<img class="uld-img" height="400px" width="250px" src="<?=$user_img2?>"/>
								<input type="file" name="userprofile_picture2"  id="filePhoto2" />
							</div>
						</div>
					</div>
				</form>
				</br>
				<p class="text-center">Tap picture to upload.</p>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<table id="m-table">
							<tr>
								<td>
									<label>Height:&nbsp;</label>
								</td>
								<td>
									<select style="width:75px;" class="form-control user-measurement" id="uHeight">
										<option>SELECT</option>
										<?php for ($i=130; $i < 250; $i++): ?>
										<?php $height = (intval($measurement["height"])==$i) ? "selected": "" ?>
										<option <?=$height?>><?=$i?></option>
										<?php endfor ?>
									</select>
								</td>
								<td>cm</td>
							</tr>
							<tr>
								<td>
									<label>Bust / Chest:&nbsp;</label>                                
								</td>
								<td>
									<select style="width:75px;" class="form-control user-measurement" id="uChest">
										<option>SELECT</option>
										<?php for ($i=20; $i < 61; $i++): ?>
										<?php $chest = (intval($measurement["chest"])==$i) ? "selected": "" ?>
										<option <?=$chest?>><?=$i?></option>
										<?php endfor ?>
									</select>
								</td>
								<td>inch</td>
							</tr>
							<tr>
								<td>
									<label>Waist:&nbsp;</label>                                
								</td>
								<td>
									<select style="width:75px;" class="form-control user-measurement" id="uWaist">
										<option>SELECT</option>
										<?php for ($i=10; $i < 61; $i++): ?>
										<?php $waist = (intval($measurement["waist"])==$i) ? "selected": "" ?>
										<option <?=$waist?>><?=$i?></option>
										<?php endfor ?>
									</select>
								</td>
								<td>inch</td>
							</tr>
							<tr>
								<td>
									<label>Hips:&nbsp;</label>                                
								</td>
								<td>
									<select style="width:75px;" class="form-control user-measurement" id="uHips">
										<option>SELECT</option>
										<?php for ($i=20; $i < 61; $i++): ?>
										<?php $hips = (intval($measurement["hips"])==$i) ? "selected": "" ?>
										<option <?=$hips?>><?=$i?></option>
										<?php endfor ?>
									</select>
								</td>
								<td>inch</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="mSubmitBtn" class="btn btn-default" data-dismiss="modal" data-toggle="modal" href="#questionaire">Next</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="questionaire" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Step 2: Tell us what you want..</h4>
			</div>
			<div class="modal-body">
				<?php 
					$women = ["Skirt", "Blazers", "Scarf", "Shirt", "Jeans"];
					$men = ["Shirt", "Jeans", "Pants", "T-Shirt", "Shirt", "Jeans", "Pants", "T-Shirt", "Khakis"];                    
					
					?> 
				<table id="q-table">
					<tr>
						<td><label>What are you looking for?</label></td>
						<td><label>How much would you pay?</label></td>
						<td><label>Any details (Color, brand etc.)?</label></td>
					</tr>
					<?php foreach($women as $w): ?>
					<tr>
						<td>
							<div class="checkbox"><label><input type="checkbox" value=""><?=$w?></label></div>
						</td>
						<td>
							<form class="form-inline">
								<div class="form-group"><input type="text" name="" value="" class="form-control"></div>
							</form>
						</td>
						<td>
							<textarea class="form-control" placeholder="" rows="3"></textarea>						
						</td>
					</tr>
					<?php endforeach ?>
				</table>
				<label>Any special request?</label>
				<textarea class="form-control" placeholder="Let us know here!" rows="5"></textarea>
				</br>
				<!--
					<div class="form-group">        
						<label>How much would you pay for a dress?</label>
						</br>
						</br>
						</br>
						<b>RM 10&nbsp;</b><input id="ex15" type="text" data-slider-value="50" data-slider-tooltip="always"/><b>&nbsp;No Specific Budget</b>
					</div>
					-->
			</div>
			<div class="modal-footer">
				<div style="float:left">
					<button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" href="#upload-selfie">Back</button>
				</div>
				<div style="float:right">
					<button type="button" class="btn btn-default" data-dismiss="modal">Done</button>
				</div>
			</div>
		</div>
	</div>
</div>