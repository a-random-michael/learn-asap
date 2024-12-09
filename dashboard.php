<?php 

include('lib/header.php');
if($logged){
		$user_id = $_SESSION['user_id'];
?>
		<h2 class="text-light mx-auto" style="width: 400px;"> welcome <?php echo $_SESSION['user_name'] ?></h2><br/>
		<a href="addsubject.php" class="btn btn-primary mx-auto ms-3 me-3 pe-1 ps-1" > creat->> </a>
		<a href="listsubject.php" class="btn btn-primary mx-auto ms-3 me-3 pe-1 ps-1" >your articles->> </a>
		<a href="managekb.php" class="btn btn-primary mx-auto ms-3 me-3 pe-1 ps-1" >manage your knowledg base->> </a>
<?php

		$stmt = $conn->prepare("SELECT * FROM subject WHERE user_id = ?");
		$stmt->execute([$user_id]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount())
		echo'
		<h4 class="text-light mx-auto" style="width: 300px;"> you last article:</h4>
		<div class="card bg-dark m-2 p-1">
		
				<div class="card-body">
				<h4 class="card-title text-light">'.$result['title'].'</h4>
				<p class="card-text text-light">'.$result['description'].'</p>
				<a href="editsubject.php?subjectId='. $result['id'].'" class="btn btn-secondary ">edit ->></a>
		</div>
		<br/>';
}
include('lib/footer.php');
?>
