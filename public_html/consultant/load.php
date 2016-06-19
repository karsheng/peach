<!--consultant-->
<?php
    // configuration
    require("../../includes/config.php"); 
    
    // query database for user
     
    $query = "SELECT * FROM dress_info";
    $results = mysqli_query($link, $query);
    $dresses = [];
    $itemInCart = 0;
    
    if (mysqli_num_rows($results) > 0)
    {
        while($row = mysqli_fetch_array($results))
        {
            $dresses[] = [
                
                'dress_id'  => $row['id'],
                'img_name'    => $row['img_name'],
                'brand'    => $row['brand'],
                'price'     => number_format($row["price"], 2, '.', '')
            ]; 
        }
    }
?>
<div class="infinite-item">
  <div class="row">
  <?php foreach($dresses as $dress): ?>
      <div class="col-md-4 col-sm-4 col-xs-6" style="padding:0;">
          <div class="dress-cat-btn" value="<?=$dress['dress_id']?>" data-toggle="modal" data-target="#dressModal">
            <div style="margin-left:auto; margin-right:auto; border:1px solid #e0e0e0; max-width:250px; max-height:420px; background-color:white">
              <img style="height:100%; width:100%;" src="../dresses/<?=$dress['dress_id']?>-0.jpg"/>
            </div>
            <div style="margin-left:auto; margin-right:auto; border:1px solid #e0e0e0; max-width:250px; height:120px; background-color:white; margin-bottom:10px">
            <h4 style='margin-bottom:0; padding:5px;'><?=$dress['brand']?></h4>
            <p style="padding-left:5px; padding-top:0px;"><small><?=$dress['img_name']?></small></p>
            <h5 style='margin-bottom:5px; padding:5px;'><i>RM <?=$dress['price']?></i></h5>
            </div>
          </div>
      </div>    
  <?php endforeach ?>
  </div>
</div>

<a class="infinite-more-link" href="load.php">more</a>