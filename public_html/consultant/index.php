<!--consultant-->
<?php
    // configuration
    require("../../includes/config.php"); 
    
    // query database for user
    $con_id = mysqli_real_escape_string($link, $_SESSION['con_id']);
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
                'username'    => $row['username'],
                'height'    => $row['height'],
                'chest'    => $row['chest'],
                'waist'    => $row['waist'],
                'hips'    => $row['hips'],
                'needs' => $row['needs'],
                'will_to_pay' => $row['will_to_pay'],
                'details' => $row['details'],
                'special_request'   =>  $row['special_request']
            ]; 
        }
    }
  
        // render profile
    conrender("main.php", ["users" => $users,"title" => "Main"]);    

?>
