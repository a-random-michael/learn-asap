<?php

include('lib/header.php');
echo '<div class="text-light">';
if(isset($_GET['subjectId']) && $logged){
		$stmt = $conn->prepare("SELECT * FROM prerequisets WHERE main = ? ");
		$stmt->execute([$_GET['subjectId']]);
		$prerequisets = $stmt->fetchAll();
		$deps = array();
		foreach($prerequisets as $p) array_push($deps,$p['needed']);
		$stmt = $conn->prepare("SELECT * FROM kb WHERE user_id = ?");
		$stmt->execute([$_SESSION['user_id']]);
		$kb = $stmt->fetchAll();
		$known = array();
		foreach($kb as $k) array_push($known, $k['subject_id']);
		$known = array_intersect($deps,$known);
		$deps = array_diff($deps,$known);
		foreach($deps as $d){
				$stmt = $conn->prepare("SELECT * FROM subject WHERE id = ?");
				$stmt->execute([$d]);
				$res=$stmt->fetch(PDO::FETCH_ASSOC);
				$article= 'articles/'.$res['id'] . '.php';
				include($article);
		}
		include('articles/'.$_GET['subjectId'].'.php');
}
echo '</div>';
include('lib/footer.php');
?>
