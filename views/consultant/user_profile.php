<!--consultant-->
<div class="m-container">
</br>
<div class="row" style="background-color:white;">
    <div class="col-md-4 col-sm-4 col-xs-6">
        <div style="max-width:200px; max-height:320px; margin:auto;">
            <img style="display:block; margin-left:auto; margin-right:auto; max-width:200px; max-height:320px;" src="../img/<?=$user['username']?>-1.jpg"/>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-6">
        <div style="max-width:200px; max-height:320px; margin:auto;">
            <img style="display:block; margin-left:auto; margin-right:auto; max-width:200px; max-height:320px;" src="../img/<?=$user['username']?>-2.jpg"/>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div style="max-width:250px; max-height:420px; margin:auto;">
            <h3><?=$user['username']?></h3>
            <p>Height:<strong><?=$user['height']?></strong> cm</p>
            <p>Chest:<strong><?=$user['chest']?></strong> inch</p>
            <p>Waist:<strong><?=$user['waist']?></strong> inch</p>
            <p>Hips:<strong><?=$user['hips']?></strong> inch</p>
            </br>
            </br>
        </div>
    </div>    

</div>
</br>
<div class="row" style="background-color:white;">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div>
            </br>
            <table class="user-needs">
                <tbody>
                    <tr>
                        <th>Looking For</th>
                        <th>Willing to Pay</th>
                        <th>Details</th>
                    </tr>
                    <?php 
                    
                        for($i = 0; $i < count($user['needs']) - 1; $i++)
                        {
                            $cs = "<tr>";
                            $cs .= "<td class='t-needs'>".$user['needs'][$i]."</td>"; 
                            $cs .= "<td class='t-will'>".number_format($user['will_to_pay'][$i], 2, '.', '')."</td>";
                            $cs .= "<td class='t-details'><p>".$user['details'][$i]."</p></td>"; 
                            $cs .= "</tr>";
                            echo $cs;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div style="margin:auto;">
            </br>
            <h4>Special request:</h4>
            <p><?=$user['special_request']?></p>
            </br>
            </br>
        </div>
    </div>     

</div>

<div class="sticky-modal" style="margin-top:20px;">
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-body' style="padding:5px;">
                <?php if (empty($saved_recs)): ?>
                No saved items yet.
                <?php else: ?>
                    <h5 style="padding-left:5px;">Saved items:</h5>
                    <div id="savedRecs" data-toggle="modal" data-target="#dressModal">
                    <?php foreach($saved_recs as $saved_rec): ?>
                        <div id="rec-<?=$saved_rec['img_id']?>" style="display:inline-block;" class="dress-cat-btn" value="<?=$saved_rec['img_id']?>">
                        <img style="padding:5px; width:70px; max-height:113px;" src="../dresses/<?=$saved_rec['img_id']?>-0.jpg" alt="" />
                        </div>
                    <?php endforeach ?>
                    </div>
                    <div class="modal-footer">
                        <a id='pushBtn' role='button' class='btn btn-success'>
                            Push
                        </a> 
                    </div>
                <?php endif ?>
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
      /*
      var sticky = new Waypoint.Sticky({
        element: $('.sticky-modal')[0]
      });
      */
    </script>
</footer>


    
</div>
<div id='dressModal' class="modal fade in" role="dialog" value="<?=$user["user_id"]?>">
    <div class="modal-dialog modal-lg">
       <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Recommend</h4>
        </div>
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
                   <div id="car" class="carousel" data-interval="false" data-ride="carousel" value="">
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
                    </br>
                        <div class="form-group">
                                <label for="sd-size-<?=$counter?>">Recommend Size:</label>                                
                                <select id='recSize' style="width:75px;" class="form-control" name="item-no">
                                    <option>XS</option>
                                    <option>S</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                </select>
                        </div> 
                        </br>
                        </br>
                        </br>
                    <div class='comment-section'>
                        <label>Comment:</label>
                        <textarea id="comments" class='form-control' rows="7" placeholder="Tell customers why you recommend this item."></textarea>
                    </div>
                </div>                
             </div>
             <div class="row">
                <div class="col-xs-12">
                   <div id="tab" class="">
                      <ul class="nav nav-tabs small">
                         <li class="active">
                            <a data-toggle="tab" href="#tab-0" data-toggle="tab">
                               <h5>Size Details</h5>
                            </a>
                         </li>
                         <li class="">
                             <a data-toggle="tab" href="#tab-1" data-toggle="tab">
                               <h5>Details</h5>
                            </a>
                         </li>
                      </ul>
                 
                      </div>
                      <div class="tab-content">
                         <div class="tab-pane" id="tab-1">
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
                        
                         <div class="tab-pane active" id="tab-0">
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
          <div class="modal-footer">
            <a id='removeBtn' style="float:left; visibility:hidden" role='button' class="btn btn-danger" name='item-no' value="" data-dismiss="modal">
            Remove
            </a>
            <a id='saveBtn' role='button' class="btn btn-success" name='item-no'>
            Save
            </a>
          </div>
       </div>
    </div>
</div>
