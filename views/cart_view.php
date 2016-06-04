<!-- Modal -->
<div id="recModal">
    <div class="modal-dialog modal-md">
       <div class="modal-content">
    <?php 
        $counter = 0; 
        $sizes = ['XS','S','M','L','XL'];
    ?>
    <div class='modal-header'>
        <div class="row">
            <div class="col-md-7 col-sm-7 col-xs-7">
                <?php foreach ($items as $item): ?>
                <p><strong><?=$item['img_name']?></strong> <span id="size-id-<?=$item['rec_id']?>">(<?=$item['sd_size']?>)</span></p>
                <p><?=$item['cart']?>  x <?=$item['price']?></p>
                <?php endforeach ?>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-5" style="text-align:right;">
                <?php foreach ($items as $item): ?>
                <p>&nbsp;</p>
                <p>RM <?=number_format($item['cart']*$item['price'], 2, '.', '')?></p>
                <?php endforeach ?>
            </div>
        </div>
        </br>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:right;">
                <p><small><i>Estimated delivery: 5-7 working days</i></small></p>
                <p>Subtotal: RM <?=$subTotal?></p>
                <p>Shipping: <?=$shipping?></p>
                <p><strong>Total: RM <?=$total?></strong></p>
                <a role='button' class="btn btn-success">Checkout</a>
            </div>
        </div>
    </div>
    <?php foreach ($items as $item): ?>
          <div class="modal-body cart-modal" id="<?=$item['rec_id']?>">
             <div class="row">
                <div style="height:250px" class="col-md-5 col-sm-5 col-xs-5">
                    <img style="height:200px; width:auto; position:absolute; margin:auto; top:0; left:0; right:0; bottom:0;" src="dresses/<?=$item["img_id"]?>-0.jpg" alt="<?=$item["img_name"]?>">
                </div>
                <div class="col-md-7 col-sm-7 col-xs-7" style='text-align:center;'>
                    <h4 class='text-capitalize'><?=$item['img_name']?></h4>
                    <h5 class='text-capitalize'><?=$item['brand']?></h5>
                    <h5><i>RM <span id="price-id-<?=$item['rec_id']?>"><?=$item['price']?></span></i></h5>
                    </br>
                        <div class="form-group">
                                <label for="sd-size-<?=$counter?>">Size:</label>                                
                                <select style="width:75px;" class="form-control in-cart update-size" name="item-no-<?=$counter?>" value="<?=$item['rec_id']?>">
                                    <?php foreach ($sizes as $size): ?>
                                    <?php $selected = $item['sd_size'] == $size ? "selected='selected'": "";?>
                                    <option <?=$selected?>><?=$size?></option>
                                    <?php endforeach ?>
                                </select>
                        </div> 
                        <div class="form-group">
                                <label for="qty-<?=$counter?>">&nbsp;Qty:</label>                                
                                <select style="width:75px;" class="form-control in-cart update-cart" name="item-no-<?=$counter?>" value="<?=$item['rec_id']?>">
                                    <?php for ($i=1; $i < 100; $i++): ?>
                                    <?php $selected = $item['cart'] == $i ? "selected='selected'": "";?>
                                    <option <?=$selected?>><?=$i?></option>
                                    <?php endfor ?>
                                </select>
                        </div>
                    <div>
                    <p>Recommended by: <strong><?=$item['con_name']?></strong></p>
                    </div>  
                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-sm-12" style='text-align:center'>
                            <a class="remove-from-cart" name='item-no-<?=$counter?>' value="<?=$item["rec_id"]?>" role="button">Remove</a>
                        </div>
                    </div>                    
                </div>                
             </div>
          </div>
        <hr>          
        <?php $counter++;?>
        <?php endforeach ?>
       </div>
    </div>
</div>
