<?php

    // configuration
    require("../../includes/config.php"); 
    
    // query database for user
    $query = "SELECT * FROM dress_info WHERE id = ".$_GET["imgID"];
    $results = mysqli_query($link, $query);
    $dress = [];
    
    if (mysqli_num_rows($results) > 0)
    {
        while($row = mysqli_fetch_array($results))
        {
            $dress = [
                'img_id'    => $row['id'],
                'img_name'    => $row['img_name'],
                'brand'    => $row['brand'],
                'price'     => number_format($row["price"], 2, '.', ''),
                'xs'     => explode("\t",$row['xs']),
                's'     => explode("\t",$row['s']),
                'm'     => explode("\t",$row['m']),
                'l'     => explode("\t",$row['l']),
                'xl'     => explode("\t",$row['xl']),
                'color'     => $row['color'],
                'care_label'     => explode("\n",$row['care_label']),
                'composition'     => $row['composition']
                
            ]; 
            
            
            
            
        }
    }
    
        
    // output results as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($dress, JSON_PRETTY_PRINT));
    
?>

