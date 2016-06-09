<!--consultant-->
<?php

    // configuration
    require("../../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // query database for user
        $user_id = mysqli_real_escape_string($link, $_GET['u']);
        $query = "SELECT * FROM users WHERE id = ".$user_id;
        $results = mysqli_query($link, $query);
        $user = [];
        
        if (mysqli_num_rows($results) > 0)
        {
            while($row = mysqli_fetch_array($results))
            {
                $user = [
                    
                    'username'    => $row['username'],
                    'height'    => $row['height'],
                    'chest'    => $row['chest'],
                    'waist'    => $row['waist'],
                    'hips'    => $row['hips']
                ]; 
                
                
            }
        }
        conrender("user_view.php", ["user" => $user, "title" => $user['username']]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       
    }

?>
