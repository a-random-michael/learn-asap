<?php 
include('lib/header.php');
if( empty($_SESSION['user_id'])){
		if( isset($_GET['message'])){
				if($_GET['message']=='error') echo "wrong email or password" ;
				else if ($_GET['message'] == 'empty') echo "empty feilde";
		}

?>
		<div class="container">
		<form class="login bg-dark  p-5 rounded" method="post" action="loginprocess.php">
				
				<div class="form-group">
						<label class="text-light" for="email"> your email </label>
						<input type="email" name="email" id="email" class="form-control bg-dark text-light mb-3 pb-1" placeholder="email"/>
				</div>
				<div class="form-group">
						<label class="text-light" for="password" > your password </label>
						<input type="password" name="password" id="passowrd" class="form-control bg-dark text-light mb-3 pb-1" placeholder="password" />
				</div>
				<div class="form-group">
						<button type="submit" class="btn btn-primary mb-2 mt-2" name="login"> login  </button>
				</div>
				<a class="primary signup-link" href="signup.php">or signup</a>
		</form>
		</div>
<?php
}

else {
		echo ('<p class="text-light">You are logged in as ' . $_SESSION['user_name'] . '</p>');
		echo '<a href="logout.php" class="btn btn-primary" >logout</a>';
}
include('lib/footer.php');
?>
