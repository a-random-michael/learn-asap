<?php 
include('lib/init.php');
$stmt = $conn->prepare("DELETE FROM prerequisets WHERE main = ?");
$stmt->execute([$_GET['main']]);
$alldeps = array();
foreach($_GET['pre'] as $pre){
		array_push($alldeps, $pre);
		$stmt = $conn->prepare('SELECT * FROM prerequisets WHERE main = ?');
		$stmt->execute([$pre]);
		$result = $stmt->fetchAll();
		foreach($result as $r) array_push($alldeps, $r['needed']);
}
array_unique($alldeps);
foreach($alldeps as $d){
		$stmt = $conn->prepare('INSERT INTO prerequisets (main, needed) VALUES(?, ?)');
		$stmt->execute([$_GET['main'], $d]);
}
			

header('Location: dashboard.php');
?>


