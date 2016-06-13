<?php

    // configuration
    require(__DIR__ . "/../includes/config.php");
    
    // query database for user
    $query = "UPDATE recommendations SET cart = cart + ".$_GET['cart'].", sd_size = '".$_GET['sd_size']."' WHERE id = ".$_GET['rec_id'];
    $results = mysqli_query($link, $query);
    
    $_SESSION['cart'] += intval($_GET['cart']);
    
    /*
    echo("SESSION['cart'] is ".gettype($_SESSION['cart']));
    echo("GET['cart'] is ".gettype($_GET['cart']));
    */
    // output results as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($_SESSION['cart'], JSON_PRETTY_PRINT));
    
  
?>