<?php
include("../config/db.php");
session_start();

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM blogs WHERE id='$id'");

$_SESSION['success'] = "Blog Deleted";

header("Location: dashboard.php");
?>