<!-- Modal -->
<div id="recModal">
    <div class="modal-dialog">
       <div class="modal-content">
    <?php $counter = 0; ?>
    <?php foreach ($items as $item): ?>
          <div class="modal-body">
             <div class="row">
                <div style="height:250px" class="col-md-6 col-sm-6 col-xs-12">
                    <img style="height:200px; width:auto; position:absolute; margin:auto; top:0; left:0; right:0; bottom:0;" src="dresses/<?=$item["img_id"]?>-0.jpg" alt="<?=$item["img_name"]?>">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12" style='text-align:center;'>
                    <h4 class='text-capitalize'><?=$item['img_name']?></h4>
                    <h5 class='text-capitalize'><?=$item['brand']?></h5>
                    <h5><i>RM <?=$item['price']?></i></h5>
                    </br>
                        <div class="form-group">
                                <label for="sd-size-<?=$counter?>">Size:</label>                                
                                <select style="width:75px;" class="form-control" name="item-no-<?=$counter?>">
                                    <option>XS</option>
                                    <option>S</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                </select>
                        </div> 
                        <div class="form-group">        
                                <a role='button' class="btn min-btn" name="item-no-<?=$counter?>">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </a>
                                <input style="width:40px; text-align:center;" class="form-control" id="item-no-<?=$counter?>" value='1' type="text">
                                <a role='button' class="btn plus-btn" name="item-no-<?=$counter?>">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </a>
                        </div>
                    <div class='comment-section'>
                    <p>Recommended by: <strong><?=$item['con_name']?></strong></p>
                    </div>  
                    <div>
                          <a data-toggle="popover" title="Are you sure?" data-content="<button>Yes</button>">Remove</a>
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
