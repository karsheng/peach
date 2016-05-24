<?php

    // configuration
    require("../includes/config.php"); 

    // query database for user
    $user_id = mysqli_real_escape_string($link, $_SESSION['id']);

    $query = "SELECT recommendations.id, recommendations.cart, recommendations.comments, dress_info.img_name, dress_info.price, consultants.con_name FROM recommendations INNER JOIN dress_info ON recommendations.img_id = dress_info.id INNER JOIN consultants ON recommendations.con_id = consultants.id WHERE recommendations.user_id =".$user_id." AND recommendations.fav = 1 ORDER BY recommendations.id ASC";
    $results = mysqli_query($link, $query);
    $favourites = [];
    
    if (mysqli_num_rows($results) > 0)
    {
        while($row = mysqli_fetch_array($results))
        {
            $favourites[] = [
            
                'rec_id' => $row['id'],
                'cart'    => $row['cart'],
                'comments'    => $row['comments'],
                'img_name'    => $row['img_name'],
                'price'    => number_format($row["price"], 2, '.', ''),
                'con_name'    => $row['con_name']
            ]; 
            
        }
    }
    


        // render profile
    render("favourite_view.php", ["favourites" => $favourites, "title" => "Favourite"]);    

?>
