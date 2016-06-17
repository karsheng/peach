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