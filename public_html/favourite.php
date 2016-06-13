<?php

    // configuration
    require("../includes/config.php"); 

    // query database for user
    $user_id = mysqli_real_escape_string($link, $_SESSION['id']);
    $query = "SELECT recommendations.id, img_name, img_id, comments, price, fav, cart,dress_info.brand,dress_info.details, dress_info.xs,dress_info.s,dress_info.m,dress_info.l,dress_info.xl,dress_info.color,dress_info.care_label,dress_info.composition, consultants.con_name FROM recommendations INNER JOIN dress_info ON recommendations.img_id = dress_info.id INNER JOIN consultants ON recommendations.con_id = consultants.id WHERE user_id = ".$user_id." AND recommendations.fav = '1' ORDER BY recommendations.id ASC;";
    $results = mysqli_query($link, $query);
    $favourites = [];

    
    if (mysqli_num_rows($results) > 0)
    {
        while($row = mysqli_fetch_array($results))
        {
            $favourites[] = [
            
                'rec_id'    => $row['id'],
                'img_id'    => $row['img_id'],
                'img_name'  => $row['img_name'],
                'brand'     => $row['brand'],
                'comments'  => $row['comments'],
                'price'     => number_format($row["price"], 2, '.', ''),
                'fav'       => $row['fav'],
                'cart'      => $row['cart'],
                'con_name'  => $row['con_name'],
                'details'   => $row['details'],
                'xs'        => $row['xs'],
                's'         => $row['s'],
                'm'         => $row['m'],
                'l'         => $row['l'],
                'xl'        => $row['xl'],
                'color'     => $row['color'],
                'care_label'     => $row['care_label'],
                'composition'    => $row['composition']
            ]; 
            
        }
    }
    


        // render profile
    render("favourite_view.php", ["favourites" => $favourites,"measurement" => $_SESSION['measurement'],"itemInCart" => $_SESSION['cart'], "title" => "Favourite"]);    

?>
