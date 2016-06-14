<?php
    // configuration
    require("../includes/config.php"); 
    require("src/Instagram.php");
    use MetzWeb\Instagram\Instagram;
        
    // query database for user
    $con_name = mysqli_real_escape_string($link, $_GET['c']);
    $query = "SELECT * FROM consultants WHERE con_name = '".$con_name."'";
    $results = mysqli_query($link, $query);
    $con = [];
    
   if (mysqli_num_rows($results) > 0)
    {
        while($row = mysqli_fetch_array($results))
        {
            $con = [
                
                'profile'  => $row['profile'],
                'email'    => $row['email'],
                'con_name'  =>  $row['con_name'],
                'insta_AT'  => $row['insta_AT'],
                'img'       => "consultant_photos/".$row['con_name']."_1.jpeg"
            ]; 
        }
    }
    
    $instagram = new Instagram(array(
    'apiKey' => '9ff8a9c069ee449f95bd09150ed410cd',
    'apiSecret' => '0968643abe63466cbabc57b63026e37c',
    'apiCallback' => 'https://peach-karsheng88.c9users.io/public_html/consultant/profile.php'
    ));    
    
    //if no access token
    if(strlen($con['insta_AT']) > 0){
        
        $instagram->setAccessToken($con['insta_AT']);
        // now you have access to all authenticated user methods
        $result = $instagram->getUserMedia();
        render("consultant/profile_view.php", ["measurement"=>$_SESSION['measurement'],"itemInCart"=>$_SESSION['cart'],"instagram" => $instagram, "result" => $result, "con" => $con,"title" => "Profile"]);    
    }
    else
    {
        render("consultant/profile_view.php", ["measurement"=>$_SESSION['measurement'],"itemInCart"=>$_SESSION['cart'],"instagram" => $instagram, "con" => $con,"title" => "Profile"]);    
    }

?>
