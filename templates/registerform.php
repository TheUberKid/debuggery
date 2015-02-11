// NOTE: this html submits to register.php (debuggery/public) which has been omitted for security reasons.

<div id="aboutbody">
	<div id="aboutcaption">
		Register
	</div>
</div>

<div id="register">
	<form action="register.php" method="post">
	    <fieldset>
	        <div class="form-group">
	            <input autofocus class="form-control" name="username" placeholder="Username" type="text"/>
	        </div>
	        <div class="form-group">
	            <input class="form-control" name="password" placeholder="Password" type="password"/>
	        </div>
	        <div class="form-group">
	            <input class="form-control" name="confirmation" placeholder="Password (Confirm)" type="password"/>
	        </div>
	        <div class="submit-form">
	            <button type="submit" class="btn btn-default">Register</button>
	        </div>
	    </fieldset>
	</form>
	<br>
	<div>
    or <a href="login.php">log in</a>
	</div>
</div>
