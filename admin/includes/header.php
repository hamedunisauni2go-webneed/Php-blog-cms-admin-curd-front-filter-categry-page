<?php include("../config/db.php"); include("auth.php"); ?>

<!DOCTYPE html>
<html>
<head>

<title>Admin Panel</title>
<link rel="stylesheet" href="../assets/css/admin.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

</head>

<body>

<div class="layout">

<!-- SIDEBAR -->
<div class="sidebar">

<h2>Blog CMS</h2>

<a href="dashboard.php">Dashboard</a>
<a href="add-blog.php">Add Blog</a>
<a href="logout.php">Logout</a>

</div>

<!-- MAIN -->
<div class="main">

<?php include("alert.php"); ?>

<div class="content">