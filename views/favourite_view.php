<div id="recModal">
    <?php $counter = 0; ?>
    <?php foreach ($favourites as $favourite): ?>
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
             <div class="row">
                <div class="col-xs-1 vcenter mh-tn"><img class="img-circle" src="consultant_photos/<?= $favourite["con_name"]?>_1.jpeg"></div>
                <div class="col-xs-11 vcenter mh-cn"><?= $favourite["con_name"]?></div>
             </div>
          </div>
          <div class="modal-body">
             <div class="row">
                <div class="col-xs-9">
                   <div id="car-<?=$counter?>" class="carousel" data-interval="false" data-ride="carousel">
                      <div class="carousel-inner" role="listbox">
                         <div class="item active"><img src="dresses/<?=$favourite["img_name"]?>-0.jpg" alt="3"></div>
                         <div class="item "><img src="dresses/<?=$favourite["img_name"]?>-1.jpg" alt="<?=$favourite["img_name"]?>"></div>
                         <div class="item "><img src="dresses/<?=$favourite["img_name"]?>-2.jpg" alt="<?=$favourite["img_name"]?>"></div>
                         <div class="item "><img src="dresses/<?=$favourite["img_name"]?>-3.jpg" alt="<?=$favourite["img_name"]?>"></div>
                         <div class="item "><img src="dresses/<?=$favourite["img_name"]?>-4.jpg" alt="<?=$favourite["img_name"]?>"></div>
                      </div>
                      <a class="left carousel-control" href="#car-<?=$counter?>" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#car-<?=$counter?>" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>
                   </div>
                </div>
                <div class="col-xs-3">
                   <div><img name="car-<?=$counter?>" class="tn" value="0" style="" src="dresses/<?=$favourite["img_name"]?>-0.jpg" alt="<?=$favourite["img_name"]?>"></div>
                   <div><img name="car-<?=$counter?>" class="tn" value="1" style="" src="dresses/<?=$favourite["img_name"]?>-1.jpg" alt="<?=$favourite["img_name"]?>"></div>
                   <div><img name="car-<?=$counter?>" class="tn" value="2" style="" src="dresses/<?=$favourite["img_name"]?>-2.jpg" alt="<?=$favourite["img_name"]?>"></div>
                   <div><img name="car-<?=$counter?>" class="tn" value="3" style="" src="dresses/<?=$favourite["img_name"]?>-3.jpg" alt="<?=$favourite["img_name"]?>"></div>
                   <div><img name="car-<?=$counter?>" class="tn" value="4" style="" src="dresses/<?=$favourite["img_name"]?>-4.jpg" alt="<?=$favourite["img_name"]?>"></div>
                </div>
             </div>
             <div class="row">
                <div class="col-xs-12">
                   <div id="tab-<?=$counter?>" class="">
                      <ul class="nav nav-tabs small">
                         <li class="active">
                            <a href="#tab-<?=$counter?>-0" data-toggle="tab">
                               <h5>Comments</h5>
                            </a>
                         </li>
                         <li class="">
                            <a href="#tab-<?=$counter?>-1" data-toggle="tab">
                               <h5>Details</h5>
                            </a>
                         </li>
                         <li class="">
                            <a href="#tab-<?=$counter?>-2" data-toggle="tab">
                               <h5>Misc.</h5>
                            </a>
                         </li>
                      </ul>
                      <div class="tab-content">
                         <div class="tab-pane active" id="tab-<?=$counter?>-0">this is great too!</div>
                         <div class="tab-pane " id="tab-<?=$counter?>-1">RM 70.00</div>
                         <div class="tab-pane " id="tab-<?=$counter?>-2">.....</div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="modal-footer"><a role="button"><span class="glyphicon hrt glyphicon-heart user-favourited" value="<?=$favourite["rec_id"]?>"></span></a><a role="button"><span class="glyphicon cart glyphicon-shopping-cart user-cart" value="<?=$favourite["rec_id"]?>"></span></a></div>
       </div>
    </div>
    <?php $counter++;?>
    <?php endforeach ?>
</div>