<?php

    // configuration
    require("../includes/config.php"); 
    
    // query database for user
    $user_id = mysqli_real_escape_string($link, $_SESSION['id']);
    $query = "SELECT recommendations.id, img_name, img_id, comments, price, rec_size, fav, cart,dress_info.brand,dress_info.details, dress_info.xs,dress_info.s,dress_info.m,dress_info.l,dress_info.xl,dress_info.color,dress_info.care_label,dress_info.composition,consultants.con_name FROM recommendations INNER JOIN dress_info ON recommendations.img_id = dress_info.id INNER JOIN consultants ON recommendations.con_id = consultants.id WHERE user_id = ".$user_id." ORDER BY recommendations.id ASC;";
    $results = mysqli_query($link, $query);
    $recs = [];
    $itemInCart = 0;
    
    if (mysqli_num_rows($results) > 0)
    {
        while($row = mysqli_fetch_array($results))
        {
            $recs[] = [
                'rec_id'    => $row['id'],
                'img_id'    => $row['img_id'],
                'img_name'    => $row['img_name'],
                'brand'    => $row['brand'],
                'comments'  => $row['comments'],
                'price'     => number_format($row["price"], 2, '.', ''),
                'fav'       => $row['fav'],
                'cart'      => $row['cart'],
                'rec_size'  => $row['rec_size'],
                'con_name'  => $row['con_name'],
                'details'  => $row['details'],
                'xs'     => $row['xs'],
                's'     => $row['s'],
                'm'     => $row['m'],
                'l'     => $row['l'],
                'xl'     => $row['xl'],
                'color'     => $row['color'],
                'care_label'     => $row['care_label'],
                'composition'     => $row['composition']
                //'dress_info.description' => $row['desc']
                
            ]; 
            
            $itemInCart += intval($row['cart']);
            
            
            
        }
    }
    $_SESSION['cart'] = $itemInCart;
    $query2 = "SELECT * FROM users WHERE id = ".$user_id;
    $results2 = mysqli_query($link, $query2);
    $_SESSION['measurement'] = [];
    
    if (mysqli_num_rows($results2) > 0)
    {
        
        while($row = mysqli_fetch_array($results2))
        {
            
            $_SESSION['measurement'] = [
                'height'    => $row['height'],
                'chest'     => $row['chest'],
                'waist'     => $row['waist'],
                'hips'      => $row['hips'],
                'request'   => $row['request']
                
            ]; 
            
            
        }
    }
    
        // render profile
    render("profile.php", ["recs" => $recs, "measurement" => $_SESSION['measurement'] ,"itemInCart" => $_SESSION['cart'] , "title" => "Profile"]);    

?>
