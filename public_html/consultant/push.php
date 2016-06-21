<!--consultant-->
<?php

// configuration
    require("../../includes/config.php"); 
    
    // query database for user
    $query = "SELECT * FROM saved_recs WHERE user_id = ".$_GET['userID']." AND con_id = ".$_SESSION['con_id'];
    $results = mysqli_query($link, $query);
    if (mysqli_num_rows($results) > 0)
    {
        while($row = mysqli_fetch_array($results))
        {
            $q = "INSERT INTO recommendations (con_id, user_id, img_id, comments, rec_size, fav, cart) VALUES('".$row['con_id']."','".$row['user_id']."','".$row['img_id']."','".$row['comments']."','".$row['rec_size']."','0','0')";
            $r = mysqli_query($link, $q);
        }
        
        $q2 = "DELETE FROM saved_recs WHERE user_id = ".$_GET['userID']." AND con_id = ".$_SESSION['con_id'];
        $r2 = mysqli_query($link, $q2);
    }    

    // output results as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($results, JSON_PRETTY_PRINT));
    
?>
