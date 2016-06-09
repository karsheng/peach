<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("upload_form.php", ["title" => "Upload"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $target_dir = "img/";
        $target_file1 = $target_dir . basename($_FILES["userprofile_picture"]["name"]);
        $target_file2 = $target_dir . basename($_FILES["userprofile_picture2"]["name"]);
        $uploadOk = 1;
        $imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
        $imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
        
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["userprofile_picture"]["tmp_name"]);
            $check2 = getimagesize($_FILES["userprofile_picture2"]["tmp_name"]);
            if($check !== false && $check2 !== false) {
                echo "File(s) is/are an image - " . $check["mime"] . ".File is an image - " . $check2["mime"] . "." ;
                $uploadOk = 1;
            } else {
                echo "File(s) is/are not an image.";
                $uploadOk = 0;
            }
        }
        
        // Check file size
        if ($_FILES["userprofile_picture"]["size"] > 10000000 || $_FILES["userprofile_picture2"]["size"] > 500000) {
            apologize("Sorry, your file is too large.");
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
        && $imageFileType1 != "gif" ) {
            apologize("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            $uploadOk = 0;
        }
        if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
        && $imageFileType2 != "gif" ) {
            apologize("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            $uploadOk = 0;
        }        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            apologize("Sorry, your file was not uploaded.");
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["userprofile_picture"]["tmp_name"],$target_dir.$_SESSION["username"]."-1.jpg" )) {
                
                if (move_uploaded_file($_FILES["userprofile_picture2"]["tmp_name"], $target_dir.$_SESSION["username"]."-2.jpg" )) {
                    
                }
                else
                {
                    apologize("Sorry, there was an error uploading your file.");
                }
            } else {
                apologize("Sorry, there was an error uploading your file.");
            }
}
        
    }
?> 