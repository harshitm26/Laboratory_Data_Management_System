<?php
	include 'dblink.php';
	include 'header.php';
	session_start();
	if(isset($_SESSION['username'])){
		session_destroy();
	}
?>
	<div class="container">
		<div class="span6 offset3" id="login">
			<form class="form-horizontal" action = "index.php" method="post">
			    <div class="control-group">
			    	<label class="control-label" for="inputUsername">Username</label>
				    <div class="controls">
				    	<input type="text" name="inputUsername" id="inputUsername" placeholder="Username">
				    </div>
			    </div>
			    <div class="control-group">
			    	<label class="control-label" for="inputPassword">Password</label>
				    <div class="controls">
				    	<input type="password" name="inputPassword" id="inputPassword" placeholder="Password">
				    </div>
				</div>
				<div class="control-group">
					<div class="controls">
				    	<button type="submit" class="btn btn-primary">Sign in</button>
				    </div>
			    </div>
	    	</form>
	    	<?php
	    		if(isset($_SESSION['incorrect'])){
	    			if($_SESSION['incorrect'] === "true"){
	    				$_SESSION['incorrect'] = "false";
	    				echo "
	    					    <div class='alert alert-error span5' align='center'>
	    							Please enter correct username and password
	    						</div>
	    					";
	    	
	    			}
	    		}
	    	?>
		</div>
	</div>
</body>
</html>

