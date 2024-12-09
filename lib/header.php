<!DOCTYPE HTML>
<html>
<head>
		<meta charset="utf-8" />
		<meta name="auther" content="michael" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="keywords" content="learn, learning, fast, asap, programming, computer, language, skill, how to"/>
		<meta name="application-name" content="learn asap"/>
		
		<meta 
				name="description" 	
				content="learn as soon as possible wiht articles optomized for each user"
		/>
		
		<link href="main.css" rel="stylesheet" />
		<link href="lib/other.css" rel="stylesheet"/>

		<title>learn asap</title>
		<link rel="icon" type="image/x-icon" href="favicon.png">
</head>
<?php
include('lib/init.php');
?>
<body class="main-body">
		<header>
				<nav class="navbar navbar-expand-lg bg-dark mb-lg-4">
						<div class="container-fluid">
								<a class="navbar-brand text-primary" href="index.php">learn asap</a>
								<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">	
								<span class="navbar-toggler-icon">
								</button>
								<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
										<div class="navbar-nav">
												<?php if($logged) echo'
												<a class="nav-link text-light" href="dashboard.php">Dashboard</a>';?>
												
												<a class="nav-link text-light" href="about.php">about</a>
												<a class="nav-link text-light" href="contact.php">contacts</a>
												<?php if($logged) echo'
												<a class="nav-link text-light" href="logout.php">logout</a>';
												else echo'
												<a class="nav-link text-light" href="login.php">login</a>
												<a class="nav-link text-light" href="signup.php">signup</a>';?>
										</div>
								</div>
						</div>
				</nav>
																			
		</header>

