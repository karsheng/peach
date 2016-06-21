<!--consultant-->
<?php

    // configuration
    require("../../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // query database for user
        $user_id = mysqli_real_escape_string($link, $_GET['u']);
        $query = "SELECT * FROM users WHERE id = ".$user_id;
        $results = mysqli_query($link, $query);
        $user = [];
        
        if (mysqli_num_rows($results) > 0)
        {
            while($row = mysqli_fetch_array($results))
            {
                $user = [
                    'user_id'  => $row['id'],
                    'username'    => $row['username'],
                    'height'    => $row['height'],
                    'chest'    => $row['chest'],
                    'waist'    => $row['waist'],
                    'hips'    => $row['hips'],
                    'needs' => explode(",",$row['needs']),
                    'will_to_pay' => explode("#",$row['will_to_pay']),
                    'details' => explode("#$%*",$row['details']),
                    'special_request'   =>  $row['special_request']
                ]; 
                
                
            }
        }
        
        $query2 = "SELECT * FROM saved_recs WHERE con_id = ".$_SESSION['con_id']." AND user_id = ".$user_id;
        $results2 = mysqli_query($link, $query2);
        $saved_recs = [];
        
        if (mysqli_num_rows($results2) > 0)
        {
            while($row = mysqli_fetch_array($results2))
            {
                $saved_recs [] = [
                    'saved_rec_id' => $row['id'],
                    'img_id'    =>  $row['img_id']
                    
                ]; 
                
                
            }
        }
        
        conrender("user_profile.php", ["saved_recs" => $saved_recs, "user" => $user, "title" => $user['username']]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       
    }

?>
