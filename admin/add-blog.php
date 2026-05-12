<?php
include("includes/header.php");

if(isset($_POST['submit'])){

    $title = trim($_POST['title']);
    $category = $_POST['category'];
    $content = $_POST['content'];
	$short_desc = $_POST['short_desc'];

    if($title == "" || $content == ""){

        $_SESSION['error'] = "Title and Content required";

    }else{

        $slug = strtolower(str_replace(" ","-",$title));

        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp,"../uploads/".$image);

        mysqli_query($conn,"INSERT INTO blogs
        (title,slug,category,image,content,short_desc)
        VALUES
        ('$title','$slug','$category','$image','$content','$short_desc')");

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
<label>Short description</label>
<textarea  name="short_desc" ></textarea>

<label>Image</label>
<input type="file" name="image">

<label>Content</label>
<textarea name="content" id="editor"></textarea>

<button class="btn" name="submit">Publish</button>

</form>

</div>

<script src="https://cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>
<script src="ckfinder/ckfinder.js"></script>

<script>
var editor = CKEDITOR.replace('editor', {

    height: 400,

    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',
    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

    toolbar: [
        { name: 'document', items: ['Source', '-', 'Preview'] },
        { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'Undo', 'Redo'] },
        { name: 'editing', items: ['Find', 'Replace'] },
        '/',
        { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
        { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
        { name: 'insert', items: ['Image', 'Table', 'Link'] },
        { name: 'styles', items: ['Format'] },
        { name: 'colors', items: ['TextColor', 'BGColor'] }
    ]

});

// Optional: bind CKFinder popup
CKFinder.setupCKEditor(editor);

</script>

<?php include("includes/footer.php"); ?>