<?php

    // configuration
    require("../includes/config.php"); 
    
    // query database for user
    $user_id = mysqli_real_escape_string($link, $_SESSION['id']);
    $con_id = mysqli_real_escape_string($link, $_GET['con_id']);
    $query = "SELECT recommendations.id, img_name, comments, price, fav, cart,dress_info.description FROM recommendations INNER JOIN dress_info ON recommendations.img_id = dress_info.id WHERE user_id = ".$user_id." AND con_id = ".$con_id." ORDER BY recommendations.id ASC";
    $results = mysqli_query($link, $query);
    $recs = [];
    
    if (mysqli_num_rows($results) > 0)
    {
        while($row = mysqli_fetch_array($results))
        {
            $recs[] = [
                
                'rec_id'    => $row['id'],        
                'img_name'    => $row['img_name'],
                'comments'  => $row['comments'],
                'price'     => number_format($row["price"], 2, '.', ''),
                'fav'       => $row['fav'],
                'cart'      => $row['cart']
                //'dress_info.description' => $row['desc']
                
            ]; 
            
        }
    }
    
    
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($recs,JSON_PRETTY_PRINT));
    

?>