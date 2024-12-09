<?php 
include('lib/init.php');
if( isset($_POST['login']) && !$logged ){
		$user_email = trim($_POST['email']);
		$user_password = trim($_POST['password']);
		if( !empty($user_email) && !empty($user_password) ){
				$query = "SELECT * FROM users WHERE email = ? AND password = ?";
				$stmt = $conn->prepare($query) ;
				$stmt->execute([$user_email,sha1($user_password)]);
				$user = $stmt->fetch();
				$count = $stmt->rowCount();
				if($count == 1){
						$_SESSION['user_id'] = $user['id'];
						$_SESSION['user_email'] = $user['email'];
						$_SESSION['user_name'] = $user['name'];
						header('Location: ' . 'index.php');

				}
				else{
						header('Location: ' . 'login.php?message=' . 'error');
				}
		}
		else {
				header('Location: ' . 'login.php?message=' . 'empty');
		}
}
else {
		echo ('<p>You are logged in as ' . $_SESSION['user_name'] . '.</p>');
		echo "<a href='logout.php'>logout</a>";
}
?>


