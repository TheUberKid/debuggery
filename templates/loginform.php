// NOTE: this html submits to login.php (debuggery/public) which has been omitted for security reasons.

<div id="aboutbody">
	<div id="aboutcaption">
		Log In
	</div>
</div>

<div id="login">
	<form action="login.php" method="post">
	    <fieldset>
	        <div class="form-group">
	            <input autofocus class="form-control" name="username" placeholder="Username" type="text"/>
	        </div>
	        <div class="form-group">
	            <input class="form-control" name="password" placeholder="Password" type="password"/>
	        </div>
	        <div class="submit-form">
	            <button type="submit" class="btn btn-default">Log In</button>
	        </div>
	    </fieldset>
	</form>
	<br>
	<div>
    or <a href="/public/register.php">register</a>
	</div>
</div>
