<?php
    // configuration
    require("../includes/config.php"); 
    
    // query database for user
    $con_name = mysqli_real_escape_string($link, $_GET['c']);
    $query = "SELECT * FROM consultants WHERE con_name = '".$con_name."'";
    $results = mysqli_query($link, $query);
    $con = [];
    
    if (mysqli_num_rows($results) > 0)
    {
        while($row = mysqli_fetch_array($results))
        {
            $con = [
                
                'profile'  => $row['profile'],
                'email'    => $row['email'],
                'con_name'  =>  $row['con_name']
            ]; 
        }
    }
  
        // render profile
    render("consultant/profile_view.php", ["measurement" => $_SESSION['measurement'], "con" => $con,"itemInCart" => $_SESSION['cart'], "title" => $con['con_name']]);    

?>
