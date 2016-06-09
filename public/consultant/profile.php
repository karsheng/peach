<!--consultant-->
<?php
    // configuration
    require("../../includes/config.php"); 
    
    // query database for user
    $con_id = mysqli_real_escape_string($link, $_SESSION['id']);
    $query = "SELECT * FROM consultants WHERE id = ".$con_id;
    $results = mysqli_query($link, $query);
    $con = [];
    
    if (mysqli_num_rows($results) > 0)
    {
        while($row = mysqli_fetch_array($results))
        {
            $con = [
                
                'profile'  => $row['profile'],
                'email'    => $row['email']
            ]; 
        }
    }
  
        // render profile
    conrender("profile_view.php", ["con" => $con,"title" => "Profile"]);    

?>
