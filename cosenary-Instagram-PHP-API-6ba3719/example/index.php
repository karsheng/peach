<?php
require '../src/Instagram.php';
use MetzWeb\Instagram\Instagram;
// initialize class
$instagram = new Instagram(array(
    'apiKey' => '9ff8a9c069ee449f95bd09150ed410cd',
    'apiSecret' => '0968643abe63466cbabc57b63026e37c',
    'apiCallback' => 'https://peach-karsheng88.c9users.io/cosenary-Instagram-PHP-API-6ba3719/example/success.php' // must point to success.php
));
// create login URL
$loginUrl = $instagram->getLoginUrl();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram - OAuth Login</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <style>
        .login {
            display: block;
            font-size: 20px;
            font-weight: bold;
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div class="container">
    <header class="clearfix">
        <h1>Instagram <span>display your photo stream</span></h1>
    </header>
    <div class="main">
        <ul class="grid">
            <li><img src="assets/instagram-big.png" alt="Instagram logo"></li>
            <li>
                <a class="login" href="<?php echo $loginUrl ?>">» Login with Instagram</a>
                <h4>Use your Instagram account to login.</h4>
            </li>
        </ul>
        <!-- GitHub project -->
        <footer>
            <p>created by <a href="https://github.com/cosenary/Instagram-PHP-API">cosenary's Instagram class</a>,
                available on GitHub</p>
        </footer>
    </div>
</div>
</body>
</html>