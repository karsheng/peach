<!-- Modal -->
  <div class="modal fade" id="upload-selfie" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Step 1: Upload Selfies</h4>
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" href="#user-info">Next</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="user-info" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Step 2: Tell us a little about yourself..</h4>
        </div>
        <div class="modal-body">
            <form action="questionaire.php" method="post">
                Measurements
            </form>
        </div>
        <div class="modal-footer">
            <div style="float:left">
                <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" href="#upload-selfie">Back</button>
            </div>
            <div style="float:right">
                <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" href="#questionaire">Next</button>
            </div>
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
          <h4 class="modal-title">Step 3: Tell us what you want..</h4>
        </div>
        <div class="modal-body">
            <form action="questionaire.php" method="post">
                    <label>What are you looking for?</label>        
                    <div class="checkbox">
                      <label><input type="checkbox" value="">Dress</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" value="">Skirts</label>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" value="">Pants</label>
                    </div>
                    <div class="form-group">        
                        <input autocomplete="off" autofocus class="form-control" name="needs" placeholder="Anything else?" type="text"/>
                    </div>
                    <label>How much would you pay for a dress?</label>
                    <div class="form-group">        
                        <input autocomplete="off" autofocus class="form-control" name="will_to_pay" placeholder="e.g. RM 50" type="text"/>
                    </div>
                    <div class="form-group">        
                        <b>RM 10</b><input id="ex15" type="text" data-slider-value="50"/><b>No Specific Budget</b>
                    </div>
            </form>
        </div>
        <div class="modal-footer">
            <div style="float:left">
                <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" href="#user-info">Back</button>
            </div>
            <div style="float:right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Done</button>
            </div>
        </div>
      </div>
      
    </div>
  </div>  
  
  