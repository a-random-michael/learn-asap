<?php
session_start();
include('connection.php');
$logged = isset($_SESSION['user_id']);
?>
