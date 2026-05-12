<?php
include("config/db.php");

$category = isset($_GET['cat']) ? $_GET['cat'] : "";

// FILTER QUERY
if($category != ""){
    $blogs = mysqli_query($conn,"SELECT * FROM blogs WHERE category='$category' ORDER BY id DESC");
}else{
    $blogs = mysqli_query($conn,"SELECT * FROM blogs ORDER BY id DESC");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Blog Portal</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="assets/css/front.css">

</head>

<body>

<!-- HEADER -->
<div class="header">

    <h2>Job Updates Portal</h2>

    <!-- FILTER DROPDOWN -->
    <form method="GET">

        <select name="cat" onchange="this.form.submit()">

            <option value="">All Categories</option>
            <option value="Latest Jobs">Latest Jobs</option>
            <option value="Results">Results</option>
            <option value="Admit Card">Admit Card</option>

        </select>

    </form>

</div>

<!-- BLOG LIST -->
<div class="container">

<?php while($row = mysqli_fetch_assoc($blogs)){ ?>

    <div class="card">

        <img src="uploads/<?php echo $row['image']; ?>">

        <h3><?php echo $row['title']; ?></h3>

        <p class="meta">
            <?php echo $row['category']; ?> | 
            <?php echo date("d M Y", strtotime($row['created_at'])); ?>
        </p>

        <!-- SHORT CONTENT -->
        <p>
            <?php echo substr(strip_tags($row['content']),0,120); ?>...
        </p>

        <!-- READ MORE -->
        <a href="blog.php?slug=<?php echo $row['slug']; ?>" class="btn">
            Read More
        </a>

    </div>

<?php } ?>

</div>

</body>
</html>