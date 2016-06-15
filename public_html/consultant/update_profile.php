<?php

    // configuration
    require(__DIR__ . "/../../includes/config.php");
    
    // query database for user
    $query = "UPDATE consultants SET profile = '".$_POST['profile']."' WHERE id = ".$_SESSION['con_id'];
    $results = mysqli_query($link, $query);
    
    // output results as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($results, JSON_PRETTY_PRINT));
    
    redirect("profile.php")
    
  
?>