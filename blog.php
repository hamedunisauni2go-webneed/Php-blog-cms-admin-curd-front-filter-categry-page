<?php
include("config/db.php");

$slug = $_GET['slug'];

$data = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM blogs WHERE slug='$slug'")
);
?>

<!DOCTYPE html>
<html>
<head>

<title><?php echo $data['title']; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="assets/css/front.css">

</head>

<body>

<div class="single-container">

    <a href="index.php" class="back">← Back</a>

    <h1><?php echo $data['title']; ?></h1>

    <p class="meta">
        <?php echo $data['category']; ?> |
        <?php echo date("d M Y", strtotime($data['created_at'])); ?>
    </p>

    <img src="uploads/<?php echo $data['image']; ?>">

    <div class="content">
        <?php echo $data['content']; ?>
    </div>

</div>

</body>
</html>