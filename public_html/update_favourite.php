<?php

    // configuration
    require(__DIR__ . "/../includes/config.php");
    
    // query database for user
    $query = "UPDATE recommendations SET fav = ".$_GET['fav']." WHERE id = ".$_GET['rec_id'];
    $results = mysqli_query($link, $query);


    

    // output as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($results, JSON_PRETTY_PRINT));
    
  

?>