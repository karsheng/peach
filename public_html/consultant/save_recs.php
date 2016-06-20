<?php

    // configuration
    require("../../includes/config.php"); 
    
    // query database for user
    $comments = mysqli_real_escape_string($link, $_GET['comments']);
    
    $query = "INSERT INTO saved_recs (con_id, user_id, img_id, comments, rec_size) VALUES('".$_SESSION['con_id']."','".$_GET['userID']."','".$_GET['imgID']."','".$_GET['comments']."','".$_GET['recSize']."') ON DUPLICATE KEY UPDATE comments='".$comments."', rec_size='".$_GET['recSize']."'";
    echo $query;
    $results = mysqli_query($link, $query);
        
    // output results as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($results, JSON_PRETTY_PRINT));
    
?>

