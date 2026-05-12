<?php include("includes/header.php"); ?>

<div class="table">

<h2>All Blogs</h2>

<a href="add-blog.php" class="btn">Add Blog</a>

<br><br>

<table>

<tr>
<th>ID</th>
<th>Title</th>
<th>Category</th>
<th>Action</th>
</tr>

<?php
$blogs = mysqli_query($conn,"SELECT * FROM blogs ORDER BY id DESC");

while($row = mysqli_fetch_assoc($blogs)){
?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['title']; ?></td>
<td><?php echo $row['category']; ?></td>
<td>

<a href="view-blog.php?id=<?php echo $row['id']; ?>">View</a> |
<a href="edit-blog.php?id=<?php echo $row['id']; ?>">Edit</a> |
<a href="delete-blog.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete?')">Delete</a>

</td>
</tr>

<?php } ?>

</table>

</div>

<?php include("includes/footer.php"); ?>