<?php

    // configuration
    require("../includes/config.php"); 
    
    // query database for user
    $user_id = mysqli_real_escape_string($link, $_SESSION['id']);
    $query = "SELECT recommendations.id, img_name, comments, price, fav, cart,dress_info.brand,dress_info.details, consultants.con_name FROM recommendations INNER JOIN dress_info ON recommendations.img_id = dress_info.id INNER JOIN consultants ON recommendations.con_id = consultants.id WHERE user_id = ".$user_id." ORDER BY recommendations.id ASC;";
    $results = mysqli_query($link, $query);
    $recs = [];
    
    if (mysqli_num_rows($results) > 0)
    {
        while($row = mysqli_fetch_array($results))
        {
            $recs[] = [
                
                'rec_id'    => $row['id'],        
                'img_name'    => $row['img_name'],
                'brand'    => $row['brand'],
                'comments'  => $row['comments'],
                'price'     => number_format($row["price"], 2, '.', ''),
                'fav'       => $row['fav'],
                'cart'      => $row['cart'],
                'con_name'  => $row['con_name'],
                'details'  => $row['details']
                //'dress_info.description' => $row['desc']
                
            ]; 
            
        }
    }
  
        // render profile
    render("profile.php", ["recs" => $recs, "title" => "Profile"]);    

?>
