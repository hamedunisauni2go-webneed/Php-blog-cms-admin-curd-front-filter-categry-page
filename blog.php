<?php
include("config/db.php");

$slug = $_GET['slug'];

$blog = mysqli_query($conn,"SELECT * FROM blogs WHERE slug='$slug'");

$row = mysqli_fetch_assoc($blog);
?>

<!DOCTYPE html>
<html>
<head>

<title><?php echo $row['title']; ?></title>

<link rel="stylesheet" href="assets/css/front.css">

</head>

<body>

<div class="blog-detail">

    <img src="uploads/<?php echo $row['image']; ?>" class="detail-image">

    <h1><?php echo $row['title']; ?></h1>
<p class="short-desc">
    <?php echo $row['short_desc']; ?>
</p>
    <p class="meta">
        <?php echo $row['category']; ?> |
        <?php echo date("d M Y", strtotime($row['created_at'])); ?>
    </p>

    <div class="content">
        <?php echo $row['content']; ?>
    </div>

    <a href="index.php" class="btn">Back</a>

</div>

</body>
</html>