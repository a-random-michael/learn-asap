<?php 
include('lib/header.php');
$level = 0;

if(isset($_POST['submit_article'])&& $logged){
		$level = 0;
		if(isset($_POST['article_level'])) $level = $_POST['article_level'];

		$image = "default.png";
		if(!empty($_FILES['article_image']['tmp_name'])){
				$image = "images/". basename($_FILES['article_image']['name']);
				move_uploaded_file($_FILES['article_image']['tmp_name'],$image);
		}
		$description = "";
		if(isset($_POST['article_description'])) $description = $_POST['article_discription'];	

		$article = "no title";
		if(isset($_POST['article_title'])) $article = $_POST['article_content'];

		$stmt = $conn->prepare('INSERT INTO subject (title, user_id, description, image, level) VALUES(?, ?, ?, ?, ?)');
		$stmt->execute([$_POST['article_title'], $_SESSION['user_id'], $description, $image, $level]);
		$id = $conn->lastInsertId();
		$file_name = "articles/" . $id . ".php";
		$file=fopen($file_name, 'w')or die('f');
		fwrite($file,$article);
		fclose($file);

		$stmt = $conn->prepare('SELECT * FROM subject');
		$stmt->execute();
		$result=$stmt->fetchAll();
}

?>

		<h2 class="text-light mx-auto" style="width:300px;">added succesfully!</h2>
		<h4 class="text-light"> choos prerequisets</h4>
		
		<form method="GET" class="form-control bg-dark border-primary" action="add.php">
		<div class="container-fluid bg-dark">
				<div class="row">
				<?php 
				foreach($result as $r)echo'
				<div class="col-lg-1 col-md-2 col-6-sm col-xs-12 m-1 p-1" style="hieght:10rem;">
						<div class="card bg-dark">
						<div class="card-body"><p class="card-title text-light">'.$r['title'].'</p></div>
						<div class="form-check">
								<input class="form-check-input" name="pre[]" type="checkbox" value="'.$r['id'].'" id="pre">
						</div>
						</div>
				</div>';
				?>
				</div>
		</div>
<?php 	echo '<input type="hidden" name="main" value="'.$id.'" ></input>'; ?>		
<?php 	echo '<input type="hidden" name="level" value="'.$level.'" ></input>'; ?>
		<button type="submit" name="prerequisets" class="btn btn-primary">finish!</button>
		</form>
<?php		

include('lib/footer.php');
?>
