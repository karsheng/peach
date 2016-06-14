<!--consultant-->
<?php
    // configuration
    require("../../includes/config.php"); 
    require("../src/Instagram.php");
    use MetzWeb\Instagram\Instagram;
    
    // query database for user
    $con_id = mysqli_real_escape_string($link, $_SESSION['con_id']);
    $query = "SELECT * FROM consultants WHERE id = ".$con_id;
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
                'img'       => "../consultant_photos/".$row['con_name']."_1.jpeg"
            ]; 
        }
    }
    
    $instagram = new Instagram(array(
    'apiKey' => '9ff8a9c069ee449f95bd09150ed410cd',
    'apiSecret' => '0968643abe63466cbabc57b63026e37c',
    'apiCallback' => 'https://peach-karsheng88.c9users.io/public_html/consultant/profile.php'
    ));    
    $loginUrl = $instagram->getLoginUrl();
    //if no access token
    if(strlen($con['insta_AT']) > 0)
    {
            
        $instagram->setAccessToken($con['insta_AT']);
        // now you have access to all authenticated user methods
        $result = $instagram->getUserMedia();
        //unable to get data due to invalid token
        if(empty($result->data))
        {
            $query2 = "UPDATE consultants SET insta_AT = NULL WHERE id = ".$con_id;
            $results2 = mysqli_query($link, $query2);
            conrender("profile_view.php", ["loginUrl" => $loginUrl,"instagram" => $instagram, "con" => $con,"title" => "Profile"]);        
        }
        else
        {
            conrender("profile_view.php", ["result" => $result, "instagram" => $instagram, "con" => $con,"title" => "Profile"]);        
        }
        
        
    }
    
    // check whether the user has granted access
    if (isset($_GET['code'])) {

        $code = $_GET['code'];
        // receive OAuth token object
        $data = $instagram->getOAuthToken($code);
        $username = $data->user->username;
        // store user access token
        $instagram->setAccessToken($data);
        // now you have access to all authenticated user methods
        $result = $instagram->getUserMedia();
        $at = $instagram->getAccessToken();
        $query2 = "UPDATE consultants SET insta_AT = '".$at."' WHERE id = ".$con_id;
        $results2 = mysqli_query($link, $query2);
            // render profile
            
        conrender("profile_view.php", ["instagram" => $instagram, "result" => $result, "con" => $con,"title" => "Profile"]);    
    } 
    else 
    {
        // check whether an error occurred
        if (isset($_GET['error'])) {
            echo 'An error occurred: ' . $_GET['error_description'];
        }
        
        conrender("profile_view.php",["con"=>$con, "loginUrl" => $loginUrl, "title"=>"Profile"]);
    }     




  
    

?>
