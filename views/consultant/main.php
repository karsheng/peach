<!--consultant-->
<h1>Hello <?=$_SESSION["con_name"]?></h1>

<?php $counter = 0; ?>    
<?php foreach($users as $user): ?>
    <?php
        $needs=explode(",",$user['needs']);
        $willToPay=explode("#",$user['will_to_pay']);
        $details=explode("#$%*",$user['details']);
        $counter++;
        $divRow = ($counter%2 == 0) ? "":"<div class='row'>";
        echo $divRow;
    ?>
    <div class="col-md-6 col-sm-6 col-xs-12">
<div class="modal-dialog" style="margin:0 auto; margin-bottom:10px; max-width:370px; display:block;">
    <div class="modal-content user-modal" value="<?=$user["user_id"]?>">
        <div class="modal-body" style="height:400px;">
            <p style="font-size:24px;"><?=$user['username']?></p>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <img style="margin-left:auto; margin-right:auto; display:inline; max-width:150px; height:240px;" src="../img/<?=$user["username"]?>-1.jpg"/>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <img style="margin-left:auto; margin-right:auto; display:inline; max-width:150px; height:240px;" src="../img/<?=$user["username"]?>-2.jpg">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
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
                        <!--
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <p>Height: <?=$user['height']?> cm</p>
                            <p>Bust: <?=$user['chest']?> inch</p>
                            <p>Waist: <?=$user['waist']?> inch</p>
                            <p>Hips: <?=$user['hips']?> inch</p>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
</div>        
<?php
    $closeDiv = ($counter%2 == 0) ? "</div>":"";
    echo $closeDiv;
    
?>
<?php endforeach ?>
<?php $oddDiv = ($counter%2 == 0) ? "":"</div>"; 
    echo $oddDiv;
?>    