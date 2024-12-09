<?php 
include('lib/init.php');
if($logged && isset($_GET['subjectId'])){
		$stmt = $conn->prepare("INSERT INTO kb (user_id, subject_id) VALUES (?, ?)");
		$stmt->execute([$_SESSION['user_id'], $_GET['subjectId']]);
		echo '1 ';
		$stmt = $conn->prepare("SELECT * FROM prerequisets WHERE main = ? ");
		$stmt->execute([$_GET['subjectId']]);
		$pre = $stmt->fetchAll();
		echo '2 ';
		foreach($pre as $p){
				$stmt = $conn->prepare("INSERT IGNORE INTO kb SET user_id = ?, subject_id = ?");
			   	$stmt->execute([ $_SESSION['user_id'], $p['needed']]);
				echo 'l ';
		}
}

header('Location: '. $_GET['from'] .'.php');
?>


