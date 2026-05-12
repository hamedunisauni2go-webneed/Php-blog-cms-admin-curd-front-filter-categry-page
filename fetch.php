<?php
include("config/db.php");

$search = $_POST['search'];
$category = $_POST['category'];
$date = $_POST['date'];

$query = "SELECT * FROM blogs WHERE 1";

if($search != ""){
    $query .= " AND title LIKE '%$search%'";
}

if($category != ""){
    $query .= " AND category='$category'";
}

if($date != ""){
    $query .= " AND DATE(created_at)='$date'";
}

$query .= " ORDER BY id DESC";

$blogs = mysqli_query($conn,$query);

if(mysqli_num_rows($blogs) > 0){

while($row = mysqli_fetch_assoc($blogs)){
?>

<div class="card">

    <img src="uploads/<?php echo $row['image']; ?>">

    <h3><?php echo $row['title']; ?></h3>

    <p class="meta">
        <?php echo $row['category']; ?> |
        <?php echo date("d M Y", strtotime($row['created_at'])); ?>
    </p>
<p class="short-desc">
    <?php echo $row['short_desc']; ?>
</p>
    <p>
        <?php echo substr(strip_tags($row['content']),0,120); ?>...
    </p>

    <a href="blog.php?slug=<?php echo $row['slug']; ?>" class="btn">
        Read More
    </a>

</div>

<?php
}

}else{
    echo "<h3>No Blogs Found</h3>";
}
?>