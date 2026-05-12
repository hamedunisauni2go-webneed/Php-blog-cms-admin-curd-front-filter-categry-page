<?php
include("includes/header.php");

if(isset($_POST['submit'])){

    $title = trim($_POST['title']);
    $category = $_POST['category'];
    $content = $_POST['content'];

    if($title == "" || $content == ""){

        $_SESSION['error'] = "Title and Content required";

    }else{

        $slug = strtolower(str_replace(" ","-",$title));

        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp,"../uploads/".$image);

        mysqli_query($conn,"INSERT INTO blogs
        (title,slug,category,image,content)
        VALUES
        ('$title','$slug','$category','$image','$content')");

        $_SESSION['success'] = "Blog Added Successfully";

        header("Location: dashboard.php");
        exit();
    }
}
?>

<div class="card">

<h2>Add Blog</h2>

<form method="POST" enctype="multipart/form-data">

<label>Title</label>
<input type="text" name="title" required>

<label>Category</label>
<select name="category">
    <option>Latest Jobs</option>
    <option>Results</option>
    <option>Admit Card</option>
</select>

<label>Image</label>
<input type="file" name="image">

<label>Content</label>
<textarea name="content" id="editor"></textarea>

<button class="btn" name="submit">Publish</button>

</form>

</div>

<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>CKEDITOR.replace('editor');</script>

<?php include("includes/footer.php"); ?>