<?php

    // configuration
    require("../includes/config.php"); 
    
    // query database for user
    $user_id = mysqli_real_escape_string($link, $_SESSION['id']);
    $query = "SELECT recommendations.id, img_name, img_id, comments, price, cart,dress_info.brand, dress_info.color, consultants.con_name FROM recommendations INNER JOIN dress_info ON recommendations.img_id = dress_info.id INNER JOIN consultants ON recommendations.con_id = consultants.id WHERE user_id = ".$user_id." ORDER BY recommendations.id ASC;";
    $results = mysqli_query($link, $query);
    $items = [];
    $itemInCart = 0;
    
    if (mysqli_num_rows($results) > 0)
    {
        while($row = mysqli_fetch_array($results))
        {
            $items[] = [
                
                'rec_id'    => $row['id'],
                'img_id'    => $row['img_id'],
                'img_name'    => $row['img_name'],
                'brand'    => $row['brand'],
                'comments'  => $row['comments'],
                'price'     => number_format($row["price"], 2, '.', ''),
                'cart'      => $row['cart'],
                'con_name'  => $row['con_name'],
                'color'     => $row['color'],
                //'dress_info.description' => $row['desc']
                
            ]; 
            
            $itemInCart += intval($row['cart']);
            
            
            
        }
    }
  
        // render profile
    render("cart_view.php", ["items" => $items,"itemInCart" => $itemInCart , "title" => "Profile"]);    

?>
