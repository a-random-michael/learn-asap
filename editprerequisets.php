<?php
include('lib/header.php');
if(isset($_POST['edit_article']) && $logged){
		if(isset($_POST['article_level'])){
				$stmt = $conn->prepare("UPDATE subject SET level = ? WHERE id = ?");
				$stmt->execute([$_POST['article_level'],$_POST['id']]);
		}
		if(isset($_POST['article_title'])){
				$stmt = $conn->prepare("UPDATE subject SET title = ? WHERE id = ?");
				$stmt->execute([$_POST['article_title'],$_POST['id']]);
		}
		if(isset($_POST['article_description'])){
				$stmt = $conn->prepare("UPDATE subject SET description = ? WHERE id = ?");
				$stmt->execute([$_POST['article_description'],$_POST['id']]);
		}
		if(!empty($_FILES['article_image']['tmp_name'])){
				$image = "images/". basename($_FILES['article_image']['name']);
				move_uploaded_file($_FILES['article_image']['tmp_name'],$image);
				$stmt = $conn->prepare("UPDATE subject SET image = ? WHERE id = ?");
				$stmt->execute([$image, $_POST['id']]);
		}
		$article = $_POST['article_content'];
		$file_name = "articles/" . $_POST['id'] . ".php";
		$file=fopen($file_name, 'w')or die('f');
		fwrite($file,$article);
		fclose($file);
	


}
$stmt = $conn->prepare("SELECT * FROM prerequisets ");
$stmt->execute();//$_POST['id']]);
$pre = $stmt->fetchAll();

function exists($i,$pr){
		foreach($pr as $p) if($p['needed'] == $i) return True;
		return False;
		}
function checked($i,$pr){
		if(exists($i,$pr)) return "checked";
		return '';
}
$stmt = $conn->prepare('SELECT * FROM subject');
$stmt->execute();
$result=$stmt->fetchAll();

?>

		<h2 class="text-light mx-auto" style="width:300px;">edited succesfully!</h2>
		<h4 class="text-light"> edit prerequisets</h4>
		
		<form method="GET" class="form-control bg-dark border-primary" action="edit.php">
		<div class="container-fluid bg-dark">
				<div class="row">
				<?php 
				foreach($result as $r)echo'
				<div class="col-lg-1 col-md-2 col-6-sm col-xs-12 m-1 p-1" style="hieght:10rem;">
						<div class="card bg-dark">
						<div class="card-body"><p class="card-title text-light">'.$r['title'].'</p></div>
						<div class="form-check">
								<input class="form-check-input" name="pre[]" type="checkbox" value="'.$r['id'].'" id="pre" ' . checked($r['id'],$pre).' ></input>
						</div>
						</div>
				</div>';
				?>
				</div>
		</div>
<?php 	echo '<input type="hidden" name="main" value="'.$_POST['id'].'" ></input>'; ?>		
<?php 	//echo '<input type="hidden" name="level" value="'.$level.'" ></input>'; ?>
		<button type="submit" name="prerequisets" class="btn btn-primary">finish!</button>
		</form>
<?php		
include('lib/footer.php');
?>



