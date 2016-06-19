<!--consultant-->
<div class="m-container">
<h1>User Profile</h1>

<div class="sticky-modal">
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-body'>
                Something sticky
            </div>
        </div>
    </div>
    <!--
    <form class="form-inline" id="form" role="form">
        <div class="form-group">
            <label class="sr-only" for="q">Search</label>
            <input style="max-width:200px;" class="form-control" id="q" placeholder="Search" type="text"/>
        </div>
    </form>    
    -->
</div>


<ul>
    <li><img style="height:200px; width:auto;" src="../img/<?=$user['username']?>-1.jpg" /></li>
    <li><img style="height:200px; width:auto;" src="../img/<?=$user['username']?>-2.jpg" /></li>
    <li><?=$user['username']?></li>
    <li><?=$user['height']?></li>
    <li><?=$user['chest']?></li>
    <li><?=$user['waist']?></li>
    <li><?=$user['hips']?></li>
</ul>

<div id="dress-cat" class="infinite-container waypoint">

</div>
<a class="infinite-more-link" href="load.php">more</a>

<footer>
    <script src="../js/lib/jquery.waypoints.min.js"></script>
    <script src="../js/lib/shortcuts/infinite.min.js"></script>
    <script src="../js/lib/shortcuts/sticky.min.js"></script>
    <script>
      var infinite = new Waypoint.Infinite({
        element: $('.infinite-container')[0]
      });
      var sticky = new Waypoint.Sticky({
        element: $('.sticky-modal')[0]
      });      
    </script>
</footer>


    
</div>
<div id='dressModal' class="modal fade in" role="dialog">
    <div class="modal-dialog modal-lg">
       <div class="modal-content">
          <div class="modal-body">
             <div class="row">
                <div class="col-md-1 col-sm-1 hidden-xs container">
                    <ul class="img-list">
                    <?php for ($x = 0; $x < 5; $x++): ?>
                    <?php $active = $x == 0 ? 'active': '';?>                    
                    <li><span><img id='tn-<?=$x?>' class="tn" value="<?=$x?>" style="" src="" alt=""></span></li>
                    <?php endfor ?>
                    </ul>
                </div>                 
                <div class="col-md-6 col-sm-6 col-xs-12" style="margin-left:auto; margin-right:auto;">
                   <div id="car" class="carousel" data-interval="false" data-ride="carousel">
                      <div class="carousel-inner" role="listbox">
                        <ol class="carousel-indicators">
                            <?php for ($x = 0; $x < 5; $x++): ?>
                            <?php $active = $x == 0 ? 'active': '';?>
                            <li data-target="#car" data-slide-to="<?=$x?>" class="<?=$active?>"></li>
                            <?php endfor ?>
                        </ol>
                        <?php for ($x = 0; $x < 5; $x++): ?>
                        <?php $active = $x == 0 ? 'active': '';?>
                        <div class="item <?=$active?>"><img id="item-<?=$x?>" src="" alt=""></div>
                        <?php endfor ?>
                      </div>
                      <a class="left carousel-control" href="#car" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#car" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>
                   </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12" style='text-align:center;'>
                    <h4 id='brand-text'class='text-capitalize'></h4>
                    <h5 id='dress-name' class='text-capitalize'></h5>
                    <h5><i id="dress-price"></i></h5>
                    </br>
                        <div class="form-group">
                                <label for="sd-size-<?=$counter?>">Recommend Size:</label>                                
                                <select style="width:75px;" class="form-control" name="item-no">
                                    <option>XS</option>
                                    <option>S</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                </select>
                        </div> 
                        </br>
                    <div>
                    <a role='button' class="btn btn-success cart add-to-cart" name='item-no'>
                    <span class="glyphicon glyphicon-shopping-cart"></span>  Recommend
                    </a>
                    </div>
                </div>                
             </div>
             <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class='comment-section'>
                        <strong>comment</strong>:</br>
                    </div>
                </div>
                <div class="col-xs-12">
                   <div id="tab-<?=$counter?>" class="">
                      <ul class="nav nav-tabs small">
                         <li class="active">
                            <a data-toggle="tab" href="#tab-0" data-toggle="tab">
                               <h5>Details</h5>
                            </a>
                         </li>
                         <li class="">
                            <a data-toggle="tab" href="#tab-1" data-toggle="tab">
                               <h5>Size Details</h5>
                            </a>
                         </li>
                      </ul>
                 
                      </div>
                      <div class="tab-content">
                         <div class="tab-pane active" id="tab-0">
                            <table class='details-table'>
                                <tbody>
                                    <tr>
                                        <td class='det-prop'>Colour</td>
                                        <td id="color"></td>
                                    </tr>
                                    <tr>
                                        <td class='det-prop'>Care Label</td>
                                        <td id="care-label-text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='det-prop'>Composition</td>
                                        <td id="composition"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                         <div class="tab-pane " id="tab-1">
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
                                    <tr id="size-xs">
                                        
                                    </tr>
                                    <tr id="size-s">
                                        
                                    </tr>
                                    <tr id="size-m">
                                        
                                    </tr>
                                    <tr id="size-l">
                                        
                                    </tr>
                                    <tr id="size-xl">
                                        
                                    </tr>                                    
                                </tbody>
                            </table>
                            </br>
                            <p><small>-All measurements are in cm.</small></p>
                        </div>
                      </div>  
                </div>
             </div>
          </div>
       </div>
    </div>
</div>
