<?php
include('lib/init.php');
		if(isset($_POST['signup']) && !$logged){
				$user_name = trim($_POST['name']);
				$user_email = trim($_POST['email']);
				$password = trim($_POST['password']);
				$password2 = trim($_POST['password2']);
				if(!empty($user_name) && !empty($user_email)){
						if($password == $password2){
								$stmt = $conn ->prepare("SELECT * FROM users WHERE email = ?");
								$stmt->execute([$user_email]);
								if($stmt->rowCount()>0){
										$message = "exists";
								}
								else{
										$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?,?,?)");
										$stmt->execute([$user_name,$user_email,sha1($password)]);
										$message ="done";
								
								}
						}	
						else{
						$message ="no_match"; 
						}
				}
		echo $message;	
        header("Location: signup.php?message=".$message);
    
		}
?>
