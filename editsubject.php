<?php 
include('lib/header.php');
$subjectId = $_GET['subjectId'];
if(isset($subjectId)){
		$stmt = $conn->prepare("SELECT * FROM subject WHERE id = ?");
		$stmt->execute([$subjectId]);
		$sub = $stmt->fetch(PDO::FETCH_ASSOC);
		if($sub['user_id']==$_SESSION['user_id']){
?>
		<script src="lib/tinymce/tinymce.min.js"></script>
		<script>
				tinymce.init({
				selector : '#edit'
				});
		</script>
		<form  method="post" action="editprerequisets.php">
		<div class="form-group row">
				<div class="col-lg-5 col-md-5 col-sm-5 ms-2 ps-2 mb-2 pb-2 me-2 pe-2">
						<input class="form-control text-light bg-dark" type="text" id="title" name="article_title" placeholder="pick a title"></input>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 mb-2 pb-2 me-2 pe-2">
				<label for="level" class="text-light ">level: </label>
						<input class="from-control border-secondary rounded text-light bg-dark " type="number" id="level" name="article_level" placeholder="0" ></input>
				</div>
				<label for="image" class=" col-lg-1 col-sm-1 col-md-1 text-light">pick an image: </label>
				<div class="col-lg-1 col-md-1 col-sm-1">
						<input type="file" class="form-control-file text-light" id="image" name="article_image"></input>
				</div>

		</div>
		<textarea id="edit" name="article_content"> </textarea>	
				<div class="form-group row">
						</div>
		<div class="form-group row">
				<label for="d">
				<div class="col-12">
				<textarea class="form-control text-light bg-dark m-2 p-2" style="width:100%;hieght:60px;" id="d" name="article_description" > description </textarea>
				</div>
		</div>

				<button type="submit" class="btn btn-primary mx-auto" style="width:200px;" name="edit_article">next>></button>
		</div>
		<input type="hidden" name="id" value="<?php echo $subjectId; ?>" ></input>
		</form>
<?php
		}
}
include('lib/footer.php');
?>

