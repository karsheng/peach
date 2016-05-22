<?php

    // configuration
    require("../includes/config.php"); 
    
    // query database for user
    $query = "UPDATE recommendations SET fav = ".$_GET['fav']." WHERE id = ".$_GET['rec_id'];
    $results = mysqli_query($link, $query);

    
  

?>