<?php

    // configuration
    require("../includes/config.php"); 
    
    // query database for user
    $user_id = mysqli_real_escape_string($link, $_SESSION['id']);
    $con_id = mysqli_real_escape_string($link, $_GET['con_id']);
    $query = "SELECT recommendations.id, img_id, comments, price, fav FROM recommendations INNER JOIN dress_info ON recommendations.img_id = dress_info.id WHERE user_id = ".$user_id." AND con_id = ".$con_id;
    $results = mysqli_query($link, $query);
    $recs = [];
    
    if (mysqli_num_rows($results) > 0)
    {
        while($row = mysqli_fetch_array($results))
        {
            $recs[] = [
                
                'rec_id'    => $row['id'],        
                'img_id'    => $row['img_id'],
                'comments'  => $row['comments'],
                'price'     => $row['price'],
                'fav'       => $row['fav']
            ]; 
            
        }
    }
    
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($recs, JSON_PRETTY_PRINT));


?>