<?php 
include('lib/init.php');
if($logged && isset($_GET['subjectId'])){
		$stmt = $conn->prepare('SELECT * FROM subject WHERE id = ?');
		$stmt->execute([$_GET['subjectId']]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($result['user_id'] == $_SESSION['user_id']){
				$stmt = $conn->prepare("DELETE FROM subject WHERE id = ?");
				$stmt->execute([$_GET['subjectId']]);

				$stmt = $conn->prepare("DELETE FROM prerequisets WHERE main = ? OR needed = ?");
				$stmt->execute([$_GET['subjectId'], $_GET['subjectId']]);
				
				$stmt = $conn->prepare("DELETE FROM kb WHERE subject_id = ?");	
 				$stmt->execute([$_GET['subjectId']]);
		}
}
header('Location: listsubject.php');
?>
