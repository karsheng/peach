<!DOCTYPE html>
<html>
   <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->

      <!-- http://getbootstrap.com/ -->
      <link href="css/bootstrap.min.css" rel="stylesheet"/>
      <link href="css/styles.css" rel="stylesheet"/>

      <?php if (isset($title)): ?>
      <title>Peach: <?= htmlspecialchars($title) ?></title>
      <?php else: ?>
      <title>Peach</title>
      <?php endif ?>
      <!-- https://jquery.com/ -->
      <script src="js/jquery-1.11.3.min.js"></script>
      <!-- http://getbootstrap.com/ -->
      <script src="js/bootstrap.min.js"></script>
      
      <!-- http://www.jacklmoore.com/zoom/ -->
      <script src="js/jquery.zoom.min.js"></script>
      
      <script src="js/scripts.js"></script>

      <!-- http://dropzonejs.com/ -->
      <script src="dropzone-4.3.0/dist/dropzone.js"></script>
      <link rel="stylesheet" href="dropzone-4.3.0/dist/dropzone.css">
      
   </head>
   <body>
      <?php if (!empty($_SESSION["id"])): ?>
      <nav class='navbar navbar-dark navbar-inverse navbar-fixed-top'>
         <div id='top' class='container'>
            <div class='navbar-header'>
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="#">Peach</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
               <ul class="nav nav-pills">
                  <li><a href="/public/">Home</a></li>
                  <li><a href="profile.php">Profile</a></li>
                  <li><a href="favourite.php"><span id='favourite' class='glyphicon glyphicon-heart'></span></a></li>
                  <li><a href="cart.php"><span id='cart' class='glyphicon glyphicon-shopping-cart'></span><div id="item-in-cart"><?=$itemInCart?></div></a></li>
                  <li><a href="logout.php"><strong>Log Out</strong></a></li>
               </ul>
            </div>
            <!--/.navbar-collapse -->
         </div>
      </nav>
      <?php else: ?>
      <div id='top' class='container'>
         <a href="/public/"><img style='width:10%; height:auto; margin-bottom: 15px; margin-top: 15px;' alt="Peach" src="img/logo.png"/></a>
      </div>      
      <?php endif ?>
      <div id="middle" class='container'>
         <div class='row'>