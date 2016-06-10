<div id="sign-in-up-form">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-body">
    <img style='width:30%; height:auto; margin-bottom: 15px; margin-top: 15px;' alt="Peach" src="img/logo.png"/>    
    <form action="login.php" method="post">
        <fieldset>
            </br>
            <div class="form-group">
                <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text"/>
            </div>
            <div class="form-group">
                <input class="form-control" name="password" placeholder="Password" type="password"/>
            </div>
            <div class="form-group">
                <h6>Stay logged in  <input name="stayLoggedIn" value = 0 type="checkbox"/></h6>
            </div>
            <div>
            </br>    
                <button class="btn btn-default" type="submit">
                    <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                    Log In
                </button>
            </div>
        </fieldset>
    </form>
    <div>
        </br>
        <p>or <a href="register.php">register</a> for an account</p>
    </div>
    </div>
    </div>
    </div>
</div>    