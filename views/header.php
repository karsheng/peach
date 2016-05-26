<!DOCTYPE html>

<html>

    <head>

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

        <script src="js/scripts.js"></script>
        
        <!-- http://dropzonejs.com/ -->
        <script src="dropzone-4.3.0/dist/dropzone.js"></script>
        
        <link rel="stylesheet" href="dropzone-4.3.0/dist/dropzone.css">        

    </head>

    <body>
    <div class='jumbotron'>
    <div class='row'>
    <div class='col-xs-12'>    
        <div class="container">

            <div id="top">
                <div>
                    <a href="/public/"><img class="small-sized-logo" alt="Peach" src="img/logo.png"/></a>
                
                </div>

                <?php if (!empty($_SESSION["id"])): ?>

                    <ul class="nav nav-pills">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="favourite.php" role="button"><span id='favourite' class='glyphicon glyphicon-heart'></span></a></li>
                        <li><a href="cart.php" role="button"><span id='cart' class='glyphicon glyphicon-shopping-cart'></span></a></li>
                        <li><a href="logout.php"><strong>Log Out</strong></a></li>
                    </ul>
                <?php endif ?>
            </div>

            <div id="middle">
