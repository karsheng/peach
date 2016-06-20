<?php

    // configuration
    require("../../includes/config.php"); 
    
    // query database for user
    $query = "DELETE FROM saved_recs WHERE id=".$_GET["savedID"];
    $results = mysqli_query($link, $query);
    
        
    // output results as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($results, JSON_PRETTY_PRINT));
    
?>

