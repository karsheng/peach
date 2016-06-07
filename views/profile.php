<!-- Modal -->
<div id="recModal">
    <?php $counter = 0; ?>
    <?php foreach ($recs as $rec): ?>
    <?php 
        $xs = explode("\t",$rec['xs']);
        $s = explode("\t",$rec['s']); 
        $m = explode("\t",$rec['m']); 
        $l = explode("\t",$rec['l']); 
        $xl = explode("\t",$rec['xl']); 
        $care_labels = explode("\n",$rec['care_label']);
    ?>
    
    <div class="modal-dialog modal-lg">
       <div class="modal-content">
          <div class="modal-header">
             <div class="row">
                <div class="col-xs-1 vcenter mh-tn"><img class="img-circle" src="consultant_photos/<?= $rec["con_name"]?>_1.jpeg"></div>
                <div class="col-xs-10 vcenter mh-cn"><?= $rec["con_name"]?></div>
             </div>
          </div>
          <div class="modal-body">
             <div class="row">
                <div class="col-md-1 col-sm-1 hidden-xs container">
                    <ul class="img-list">
                    <?php for ($x = 0; $x < 5; $x++): ?>
                    <?php $active = $x == 0 ? 'active': '';?>                    
                    <li><span><img name="car-<?=$counter?>" class="tn" value="<?=$x?>" style="" src="dresses/<?=$rec["img_id"]?>-<?=$x?>.jpg" alt="<?=$rec["img_name"]?>"></span></li>
                    <?php endfor ?>
                    </ul>
                </div>                 
                <div class="col-md-5 col-sm-5 col-xs-12" style="margin-left:auto; margin-right:auto;">
                   <div id="car-<?=$counter?>" class="carousel" data-interval="false" data-ride="carousel">
                      <div class="carousel-inner" role="listbox">
                        <ol class="carousel-indicators">
                            <?php for ($x = 0; $x < 5; $x++): ?>
                            <?php $active = $x == 0 ? 'active': '';?>
                            <li data-target="#car-<?=$counter?>" data-slide-to="<?=$x?>" class="<?=$active?>"></li>
                            <?php endfor ?>
                        </ol>
                        <?php for ($x = 0; $x < 5; $x++): ?>
                        <?php $active = $x == 0 ? 'active': '';?>
                        <div class="item <?=$active?>"><img src="dresses/<?=$rec["img_id"]?>-<?=$x?>.jpg" alt="<?=$rec["img_name"]?>"></div>
                        <?php endfor ?>
                      </div>
                      <a class="left carousel-control" href="#car-<?=$counter?>" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#car-<?=$counter?>" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>
                   </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12" style='text-align:center;'>
                    <h4 class='text-capitalize'><?=$rec['img_name']?></h4>
                    <h5 class='text-capitalize'><?=$rec['brand']?></h5>
                    <h5><i>RM <?=$rec['price']?></i></h5>
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
                    <?php 
                        $cart = ($rec['cart'] == 0) ? 'user-cart': 'user-cart';
                        $fav = ($rec['fav'] == 0) ? 'user-fav': 'user-favourited';
                    
                    ?>
                    <div>
                    <a role='button' class="btn btn-success cart add-to-cart" name='item-no-<?=$counter?>' value="<?=$rec["rec_id"]?>">
                    <span class="glyphicon glyphicon-shopping-cart <?=$cart?>"></span>  Add to Cart
                    </a>
                    </div>
                    <div>
                    <a role='button' class="btn btn-info hrt">
                      <span class="glyphicon glyphicon-heart <?=$fav?>" value="<?=$rec["rec_id"]?>"></span>  Add to Favourite
                    </a>
                    </div>
                    <div class='comment-section'>
                    <strong><?=$rec['con_name']?></strong>:</br> <?=$rec['comments']?>
                    </div>                     
                </div>                
             </div>
             <div class="row">
                <div class="col-xs-12">
                   <div id="tab-<?=$counter?>" class="">
                      <ul class="nav nav-tabs small">
                         <li class="active">
                            <a data-toggle="tab" href="#tab-<?=$counter?>-0" data-toggle="tab">
                               <h5>Details</h5>
                            </a>
                         </li>
                         <li class="">
                            <a data-toggle="tab" href="#tab-<?=$counter?>-1" data-toggle="tab">
                               <h5>Size Details</h5>
                            </a>
                         </li>
                         <li class="">
                            <a data-toggle="tab" href="#tab-<?=$counter?>-2" data-toggle="tab">
                               <h5>Shipping</h5>
                            </a>
                         </li>
                      </ul>
                 
                      </div>
                      <div class="tab-content">
                         <div class="tab-pane active" id="tab-<?=$counter?>-0">
                            <table class='details-table'>
                                <tbody>
                                    <tr>
                                        <td class='det-prop'>Colour</td>
                                        <td><?=$rec['color']?></td>
                                    </tr>
                                    <tr>
                                        <td class='det-prop'>Care Label</td>
                                        <td>
                                        <?php foreach ($care_labels as $care_label): ?>
                                        <?=$care_label?></br>
                                        <?php endforeach ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='det-prop'>Composition</td>
                                        <td><?=$rec['composition']?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                         <div class="tab-pane " id="tab-<?=$counter?>-1">
                            <table class='sizes-table'>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Bust</th>
                                        <th>Waist</th>
                                        <th>Hip</th>
                                        <th>Hem</th>
                                        <th>Length</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($xs as $size): ?>
                                        <td><?=$size?></td>
                                        <?php endforeach ?>
                                    </tr>
                                    <tr>
                                        <?php foreach ($s as $size): ?>
                                        <td><?=$size?></td>
                                        <?php endforeach ?>
                                    </tr>
                                    <tr>
                                        <?php foreach ($m as $size): ?>
                                        <td><?=$size?></td>
                                        <?php endforeach ?>
                                    </tr>
                                    <tr>
                                        <?php foreach ($l as $size): ?>
                                        <td><?=$size?></td>
                                        <?php endforeach ?>
                                    </tr>
                                    <tr>
                                        <?php foreach ($xl as $size): ?>
                                        <td><?=$size?></td>
                                        <?php endforeach ?>
                                    </tr>                                    
                                </tbody>
                            </table>
                            </br>
                            <p><small>-All measurements are in cm.</small></p>
                        </div>
                         <div class="tab-pane " id="tab-<?=$counter?>-2"><p>All shipping is free. You can return anytime you want, no questions asked.</p></div>
                      </div>  
                </div>
             </div>
          </div>
       </div>
    </div>
    <?php $counter++;?>
    <?php endforeach ?>
</div>


