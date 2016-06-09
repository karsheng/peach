<!--consultant-->
<h1>Hello <?=$_SESSION["con_name"]?></h1>
<form action="user.php" method="GET">
<ul>
    <?php foreach($users as $user): ?>
    <li><button class="btn btn-default" name="u" type="submit" value="<?=$user["user_id"]?>"><?=$user["username"]?></button></li>
    <?php endforeach ?>
</ul>
</form>