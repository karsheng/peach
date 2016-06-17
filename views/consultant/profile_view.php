<!--consultant-->

<div class="center-content" style="max-width:640px;">
<div class="row">
    <div class="col-md-12">
    <div class="modal-dialog modal-lg" style="max-width:640px;">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div style="min-height:150px;" class="col-md-4 col-sm-4 col-xs-4">
                        
                        <a role='button' data-toggle="modal" data-target="#upload-picture"><img id="conPhoto" style='max-width:50%; height:auto; width:auto' class="img-circle centered" src="<?=$con['img']?>"/></a>
                    </div>
                    <div style="min-height:150px;" class="col-md-8 col-sm-8 col-xs-8">
                        <h3><?=$con["con_name"]?></h3>
                        <p id="cProfileDesc" style="text-align:justify;"><?=$con["profile"]?></p>
                        </br>
                        <p><button data-toggle="modal" data-target="#cEditProfile" class="btn btn-default">Edit Profile</button></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php 
    require('upload_form.php');
    require('profile_form.php');
?>

<?php if(isset($result)): ?>
<div id="cInstagram">
    <h3><?=$con['con_name']?>'s Instagram</h3>
    
        
    <div class="row">
           <div class="col-md-12 col-sm-12 col-xs-12"> 
            <ul class="nav nav-tabs">
            <li style="margin-right:0; text-align:center; width:50%;" class="active">
            <a style="border:none; margin-right:0;" data-toggle="tab" href="#tn-view" data-toggle="tab">
               <h5><span class="glyphicon glyphicon-th"></span></h5>
            </a>
            </li>
            <li style="margin-right:0; text-align:center; width:50%;" class="">
            <a style="border:none; margin-right:0;" data-toggle="tab" href="#list-view" data-toggle="tab">
               <h5><span class="glyphicon glyphicon-list"></span></h5>
            </a>
            </li>
        </ul>
        <div class="tab-content">
            <?php
           
            // display all user likes
            $tnContent="";
            $listContent="";
            foreach ((array) $result->data as $media) {
                $tnContent .= '<div class="col-md-4 col-sm-4 col-xs-4" style="padding:0">';    
                $listContent .= '<div class="col-md-12 col-sm-12 col-xs-12" style="padding:0">';
                // output media
                if ($media->type === 'video') {
                    // video
                    $poster = $media->images->low_resolution->url;
                    $source = $media->videos->standard_resolution->url;
                    $tnContent .= "<video class=\"media video-js vjs-default-skin\" width=\"250\" height=\"250\" poster=\"{$poster}\"
                           data-setup='{\"controls\":true, \"preload\": \"auto\"}'>
                             <source src=\"{$source}\" type=\"video/mp4\" />
                           </video>";
                    $listContent .= "<video class=\"media video-js vjs-default-skin\" width=\"250\" height=\"250\" poster=\"{$poster}\"
                           data-setup='{\"controls\":true, \"preload\": \"auto\"}'>
                             <source src=\"{$source}\" type=\"video/mp4\" />
                           </video>";    
                } else {
                    // image
                    $image_low = $media->images->low_resolution->url;
                    $image_std = $media->images->standard_resolution->url;
                    $tnContent .= "<img style='max-width:100%; height:auto; width:auto' class=\"media\" src=\"{$image_low}\"/>";
                
                    $listContent .= "<img style='max-width:100%; height:auto; width:auto' class=\"media\" src=\"{$image_std}\"/>";
                }
                // create meta section
                $username = $media->user->username;
                $comment = (empty($media->caption)) ? "":$media->caption->text;
                $listContent .= "<div class=\"content\">
                           <div class=\"insta_comment\"><p style='padding:20px;'><strong>{$comment}</strong></p></div>
                         </div>";
                
                         
                // output media {$comment}
                $tnContent .= '</div>';
                $listContent .= '</div>';
                
                
            }
                echo "<div id='tn-view' class='tab-pane active'>".$tnContent."</div>";
                echo "<div id='list-view' class='tab-pane'>".$listContent."</div>";
            
            ?>
        </div>
        </div>
    </div>
</div>
</div>
<?php else: ?>
    <?php
        if(strpos($_SERVER['REQUEST_URI'],"consultant"))
        {
            require("profile_instalogin.php");
        }
    ?>
    
<?php endif ?>