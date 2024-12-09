<?php 
include('lib/init.php');
if($logged && isset($_GET['subjectId'])){
		$stmt = $conn->prepare("DELETE FROM kb WHERE user_id = ? and subject_id = ?");
		$stmt->execute([$_SESSION['user_id'], $_GET['subjectId']]);
}
header('Location: '. $_GET['from'] .'.php');
?>


