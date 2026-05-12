<?php include("includes/header.php"); ?>

<?php
$id = $_GET['id'];

$data = mysqli_fetch_assoc(
mysqli_query($conn,"SELECT * FROM blogs WHERE id='$id'")
);
?>

<div class="card">

<h2><?php echo $data['title']; ?></h2>

<p><b>Short Description:</b> <?php echo $data['short_desc']; ?></p>

<p><b>Category:</b> <?php echo $data['category']; ?></p>

<img src="../uploads/<?php echo $data['image']; ?>" width="100%">

<hr>

<div>
<?php echo $data['content']; ?>
</div>

</div>

<?php include("includes/footer.php"); ?>