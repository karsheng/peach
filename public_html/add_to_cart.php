<?php

    // configuration
    require(__DIR__ . "/../includes/config.php");
    
    // query database for user
    $query = "UPDATE recommendations SET cart = cart + ".$_GET['cart'].", sd_size = '".$_GET['sd_size']."' WHERE id = ".$_GET['rec_id'];
    $results = mysqli_query($link, $query);
    
    // output results as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($results, JSON_PRETTY_PRINT));
    
  
?>