<!--consultant-->
<!DOCTYPE html>
<html>
   <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->
      <link href="../img/favicon.png" rel="icon" type="image/x-icon" />
      <!-- http://getbootstrap.com/ -->
      <link href="../css/bootstrap.min.css" rel="stylesheet"/>
      <link href="../css/styles.css" rel="stylesheet"/>
      <link href="../css/conStyles.css" rel="stylesheet"/>

      <?php if (isset($title)): ?>
      <title>Peach: <?= htmlspecialchars($title) ?></title>
      <?php else: ?>
      <title>Peach</title>
      <?php endif ?>
      <!-- https://jquery.com/ -->
      <script src="../js/jquery-1.11.3.min.js"></script>
      <!-- http://getbootstrap.com/ -->
      <script src="../js/bootstrap.min.js"></script>
      
      <!-- http://www.jacklmoore.com/zoom/ -->
      <script src="../js/jquery.zoom.min.js"></script>
      
      <!-- http://www.jqueryscript.net/form/Highly-Customizable-Range-Slider-Plugin-For-Bootstrap-Bootstrap-Slider.html -->
      <script src="../js/bootstrap-slider.min.js"></script>
      <link href="../css/bootstrap-slider.min.css" rel="stylesheet"/>
      
      <!-- http://underscorejs.org/ -->
      <script src="../js/underscore-min.js"></script>
      
      <!-- https://github.com/twitter/typeahead.js/ -->
      <script src="../js/typeahead.jquery.min.js"></script>
      
      <script src="../js/conScripts.js"></script>
      
   </head>
   <body>
      
      <?php if (!empty($_SESSION["con_id"])): ?>
         <nav class='navbar navbar-inverse navbar-fixed-top'>
            <div id='top' class='container'>
               <div class='navbar-header'>
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="/public_html/consultant/">Peach Consultant</a>
               </div>
               <!-- http://getbootstrap.com/css/#forms -->

               <div id="navbar" class="navbar-collapse collapse">
                  <div class="navbar-right">
                     <ul id="navpills" class="nav nav-pills">
                     <li><a href="/public_html/consultant/"><span id='favourite' class='glyphicon glyphicon-home'></span></a></li>
                     <li><a href="/public_html/consultant/profile.php"><span id='favourite' class='glyphicon glyphicon-user'></span></a></li>
                     <li><a href="/public_html/consultant/logout.php"><span id='favourite' class='glyphicon glyphicon-log-out'></span></a></li>
                     </ul>
                  </div>
               </div>
            </div> 
            <!--/.navbar-collapse -->
         </nav>
      <div id="middle" class='container'>
                            

      <?php else: ?>
      
      <div id="middle" class='container'>   
           
      <?php endif ?>
      
      
    