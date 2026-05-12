<?php
include("config/db.php");
?>

<!DOCTYPE html>
<html>
<head>

<title>Job Updates Portal</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="assets/css/front.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</head>

<body>

<!-- HEADER -->
<div class="header">

    <h2>Job Updates Portal</h2>

    <!-- SEARCH -->
    <input type="text" id="search" placeholder="Search blogs...">

    <!-- CATEGORY FILTER -->
    <select id="category">

        <option value="">All Categories</option>
        <option value="Latest Jobs">Latest Jobs</option>
        <option value="Results">Results</option>
        <option value="Admit Card">Admit Card</option>

    </select>

    <!-- DATE FILTER -->
    <input type="date" id="date">

</div>

<!-- BLOG LIST -->
<div class="container" id="blog-data">

<?php
$blogs = mysqli_query($conn,"SELECT * FROM blogs ORDER BY id DESC");

while($row = mysqli_fetch_assoc($blogs)){
?>

    <div class="card">

        <img src="uploads/<?php echo $row['image']; ?>">

        <h3><?php echo $row['title']; ?></h3>
           <p class="short-desc">
    <?php echo $row['short_desc']; ?>
</p>
        <p class="meta">
            <?php echo $row['category']; ?> |
            <?php echo date("d M Y", strtotime($row['created_at'])); ?>
        </p>

        <p>
            <?php echo substr(strip_tags($row['content']),0,120); ?>...
        </p>

        <a href="blog.php?slug=<?php echo $row['slug']; ?>" class="btn">
            Read More
        </a>

    </div>

<?php } ?>

</div>

<script>

$(document).ready(function(){

    function loadData(){

        var search = $("#search").val();
        var category = $("#category").val();
        var date = $("#date").val();

        $.ajax({
            url:"fetch.php",
            type:"POST",
            data:{
                search:search,
                category:category,
                date:date
            },
            success:function(data){
                $("#blog-data").html(data);
            }
        });

    }

    $("#search").keyup(function(){
        loadData();
    });

    $("#category").change(function(){
        loadData();
    });

    $("#date").change(function(){
        loadData();
    });

});

</script>

</body>
</html>