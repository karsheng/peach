<!--consultant-->
<h1>Hello <?=$_SESSION["con_name"]?></h1>

<?php foreach($users as $user): ?>
    <?php
        $needs=explode(",",$user['needs']);
        $willToPay=explode("#",$user['will_to_pay']);
        $details=explode("#$%*",$user['details']);
        
    ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-body user-modal">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div>
                        <img style="display:inline; max-width:100px; width:auto; height:200px;" src="../img/<?=$user["username"]?>-1.jpg"/>
                        <img style="display:inline; max-width:100px; height:200px;" src="../img/<?=$user["username"]?>-2.jpg">
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h3><?=$user['username']?></h3>
                            <h5>
                            Looking for:
                            <i>
                            <?php 
                                for($i = 0; $i < count($needs) - 1; $i++)
                                {
                                $s = ($i < count($needs)-2) ? $needs[$i].", " : $needs[$i];
                                echo($s);
                                }
                            ?>
                            </i>
                            </h5>                            
                        </div>    
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <p>Height: <?=$user['height']?> cm</p>
                            <p>Bust: <?=$user['chest']?> inch</p>
                            <p>Waist: <?=$user['waist']?> inch</p>
                            <p>Hips: <?=$user['hips']?> inch</p>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
    
    <button class="btn btn-link" name="u" type="submit" value="<?=$user["user_id"]?>"><?=$user["username"]."-".count($details)?></button>
    
    
<?php endforeach ?>
    
    