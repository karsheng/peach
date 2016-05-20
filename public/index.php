<?php

    // configuration
    require("../includes/config.php"); 

    // query database for user
    $user_id = mysqli_real_escape_string($link, $_SESSION['id']);
    
    

    $query = "SELECT consultants.con_name, consultants.id FROM consultants WHERE consultants.id in (SELECT DISTINCT (recommendations.con_id) FROM recommendations WHERE user_id = '".$user_id."')";
    $results = mysqli_query($link, $query);
    $cons = [];
    
    if (mysqli_num_rows($results) > 0)
    {
        while($row = mysqli_fetch_array($results))
        {
            $cons[] = [
            
                'name' => $row['con_name'],
                'id'    => $row['id']
            ]; 
            
        }
    }
    


        // render profile
    render("profile.php", ["cons" => $cons, "title" => "Profile"]);    

?>
