<?php

    // configuration
    require(__DIR__ . "/../includes/config.php");
    
    // query database for user
    $query = "UPDATE users SET height = '".$_GET['height']."',chest = '".$_GET['chest']."',waist = '".$_GET['waist']."',hips = '".$_GET['hips']."'  WHERE id = ".$_SESSION['id'];
    $results = mysqli_query($link, $query);
    $_SESSION['measurement']['height'] = $_GET['height'];
    $_SESSION['measurement']['chest'] = $_GET['chest'];
    $_SESSION['measurement']['waist'] = $_GET['waist'];
    $_SESSION['measurement']['hips'] = $_GET['hips'];
    
    // output results as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($results, JSON_PRETTY_PRINT));
    
  
?>