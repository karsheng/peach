<!--consultant-->
<?php

    // configuration
    require("../../includes/config.php");


    // else if user reached page via POST (as by submitting a form via POST)
    $target_dir = "../consultant_photos/";
    $target_file1 = $target_dir . basename($_FILES["conProfilePic"]["name"]);
    $uploadOk = 1;
    $imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["conProfilePic"]["tmp_name"]);
        if($check !== false) {
            echo("File(s) is/are an image - " . $check["mime"]) ;
            $uploadOk = 1;
        } else {
            echo("File(s) is/are not an image.");
            $uploadOk = 0;
        }
    }
    
    // Check file size
    if ($_FILES["conProfilePic"]["size"] > 10000000) {
        echo("Sorry, your file is too large.");
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
    && $imageFileType1 != "gif" ) {
        echo("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        $uploadOk = 0;
    }
       
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo("Sorry, your file was not uploaded.");
    // if everything is ok, try to upload file
    } else {
        
        if (!move_uploaded_file($_FILES["conProfilePic"]["tmp_name"],$target_dir.$_SESSION["con_name"]."_1.jpeg" )) {
            
            echo("Sorry, there was an error uploading your file.");
        }
        
    }
?> 