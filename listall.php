<?php 
include('lib/header.php');

$attr="title";
$desc="ASC";



if(isset($_GET['order'])){
		$attr = $_GET['order'];
		}
if(isset($_GET['desc']) && $_GET['desc'] == "desc"){
$desc = "DESC";
		}
else $desc = "ASC";


$stmt = $conn->prepare("SELECT * FROM subject ORDER BY ? ?");
$stmt->execute([$attr, $desc]);
$result = $stmt->fetchAll();

?>
<div class="container-fluid"><div class="row">
<?php
		foreach($result as $r){
?>
		<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
				<div class="card bg-dark m-2 p-1">
						<img src="images/<?php echo $r['image']; ?>" class="card-img-top" alt="images/default.png"/>
								<div class="card-body bg-dark">
										<h5 class="card-title text-light"><?php echo $r['title'];?></h5>
										<p class="card-text text-light"><?php echo $r['description'];?></p>
										<a href="getsubject.php?subjectId=<?php echo $r['id'];?>" class="btn btn-primary">view article->></a>
								</div>
				</div>
		</div>
<?php 
		}
?>
</div></div>
<?php

include('lib/footer.php');
?>
