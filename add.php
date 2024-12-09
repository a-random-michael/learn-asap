<?php 
include('lib/init.php');
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


