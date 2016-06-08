<div id="sign-in-up-form">
    <img style='width:10%; height:auto; margin-bottom: 15px; margin-top: 15px;' alt="Peach" src="img/logo.png"/>    
    <form action="register.php" method="post">
        <fieldset>
            <div class="form-group">
                <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text"/>
            </div>
            <div class="form-group">
                <input autocomplete="off" autofocus class="form-control" name="email" placeholder="Email" type="email"/>
            </div>        
            <div class="form-group">
                <input class="form-control" name="password" placeholder="Password" type="password"/>
            </div>
            <div class="form-group">
                <input class="form-control" name="confirmation" placeholder="Confirm Password" type="password"/>
            </div>
            <div class="form-group">
                <h6>Stay logged in  <input name="stayLoggedIn" value = 0 type="checkbox"/>
            </div></h6>
            <div class="form-group">
                <button class="btn btn-default" type="submit">
                    <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                    Sign Up
                </button>
            </div>
        </fieldset>
    </form>
    <div>
        or <a href="login.php">log in</a>
    </div>
</div>