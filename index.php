<?php 
include('lib/header.php');
$stmt = $conn->prepare("SELECT * FROM subject ORDER BY created LIMIT 4");
$stmt->execute();
$latest = $stmt->fetchAll();
?>
<div class="container-fluid" >
								<div class="row m-3 p-2">
										<?php
										foreach($latest as $l)
												echo'
												<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 m-lg-2 rounded-3">
														<div class="card bg-dark" >
																<img src="images/'.$l['image'].'"class="card-img-top" alt="images/default.png"/>	
																<div class="card-body">
																		<h4 class="card-title text-light">'.$l['title'].'</h4>
																		<p class="card-text text-light">'.$l['description'].'</p>
																		<a href="getsubject.php?subjectId='. $l['id'].'" class="btn btn-primary accent-bg ">view article ->></a>
																</div>
														</div>
												</div>';
?>
								</div>
								
</div>



<?php 

echo '<a href="listall.php" class="btn btn-primary m-3 p-1" style="width:250px;"> or see all articles ->> </a>';
include('lib/footer.php');
?>
