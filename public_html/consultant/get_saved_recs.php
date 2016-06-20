<?php

    // configuration
    require("../../includes/config.php"); 
    
    // query database for user
    $query = "SELECT * FROM saved_recs WHERE con_id = ".$_SESSION['con_id']." AND user_id = ".$_GET['userID']." AND img_id = ".$_GET["imgID"];
    $results = mysqli_query($link, $query);
    $saved_recs = [];
    
    if (mysqli_num_rows($results) > 0)
    {
        while($row = mysqli_fetch_array($results))
        {
            $saved_recs = [
                'saved_id'  => $row['id'],
                'comments' => $row['comments'],
                'rec_size' => $row['rec_size'],
                'found'     => 1
            ]; 
            
            
            
            
        }
    }else {
        $saved_recs = [
                'found' => 0
            ];
    }
    
        
    // output results as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($saved_recs, JSON_PRETTY_PRINT));
    
?>

