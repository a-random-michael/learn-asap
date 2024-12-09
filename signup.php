<?php 
include('lib/header.php');

?>
<div class="container">
		<form class="login bg-dark  p-5 rounded" method="post" action="signupproccess.php">
				<div class="form-group">
						<label class="text-light" for="name">your user name</label>
						<input type="text" name="name" id="name" class="form-control bg-dark text-light mb-3 pb-1" placeholder="name"/>
				</div>
				<div class="form-group">
						<label class="text-light" for="email"> your email </label>
						<input type="email" name="email" id="email" class="form-control bg-dark text-light mb-3 pb-1" placeholder="email"/>
				</div>
				<div class="form-group">
						<label class="text-light" for="password" >chose a password </label>
						<input type="password" name="password" id="passowrd" class="form-control bg-dark text-light mb-3 pb-1" placeholder="password" />
				</div>
				<div class="form-group">
						<label class="text-light" for="password2" > repeat password </label>
						<input type="password" name="password2" id="passowrd2" class="form-control bg-dark text-light mb-3 pb-1" placeholder="repeat passowrd" />
				</div>

				<div class="form-group">
						<button type="submit" class="btn btn-primary mb-2 mt-2" name="signup"> signup  </button>
				</div>
		</form>
</div>
<?php
if(isset($_GET['message'])){		
		$message = $_GET['message'];
		if($message == 'done') echo '<p class="text-light mx-auto" style="width=200px;">done</p>';
		else if($message == 'no_match') echo '<p class="text-light mx-auto" style="width=200px;">password do not match</p>';
		else if($message == 'exists') echo '<p class="text-light mx-auto" style="width=200px;">user exists</p>';
}
include('lib/footer.php');
?>
