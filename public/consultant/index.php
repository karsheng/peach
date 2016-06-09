<!--consultant-->
<?php
    // configuration
    require("../../includes/config.php"); 
    
    // query database for user
    $con_id = mysqli_real_escape_string($link, $_SESSION['id']);
    $query = "SELECT * FROM users WHERE request = 1";
    $results = mysqli_query($link, $query);
    $users = [];
    $itemInCart = 0;
    
    if (mysqli_num_rows($results) > 0)
    {
        while($row = mysqli_fetch_array($results))
        {
            $users[] = [
                
                'user_id'  => $row['id'],
                'request'    => $row['request'],
                'username'    => $row['username'],
            ]; 
        }
    }
  
        // render profile
    conrender("main.php", ["users" => $users,"title" => "Main"]);    

?>
