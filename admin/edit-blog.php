<?php
include("includes/header.php");

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM blogs WHERE id='$id'")
);

if(isset($_POST['update'])){

    $title = trim($_POST['title']);
    $category = $_POST['category'];
    $content = $_POST['content'];
	 $short_desc = $_POST['short_desc'];

    if($title == "" || $content == ""){
        $_SESSION['error'] = "Title and Content are required";
        header("Location: edit-blog.php?id=".$id);
        exit();
    }

    // DEFAULT IMAGE (OLD IMAGE)
    $image = $data['image'];

    // IF NEW IMAGE UPLOADED
    if(!empty($_FILES['image']['name'])){

        $newImage = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];

        $uniqueName = time() . "_" . $newImage;

        $uploadPath = "../uploads/" . $uniqueName;

        if(move_uploaded_file($tmp, $uploadPath)){

            // DELETE OLD IMAGE
            if(file_exists("../uploads/".$data['image'])){
                unlink("../uploads/".$data['image']);
            }

            $image = $uniqueName;
        }
    }

    mysqli_query($conn,"UPDATE blogs SET
        title='$title',
        category='$category',
        content='$content',short_desc='$short_desc',
        image='$image'
        WHERE id='$id'
    ");

    $_SESSION['success'] = "Blog Updated Successfully";

    header("Location: dashboard.php");
    exit();
}
?>

<div class="card">

<h2>Edit Blog</h2>

<form method="POST" enctype="multipart/form-data">

<label>Title</label>
<input type="text" name="title" value="<?php echo $data['title']; ?>">

<label>Category</label>
<select name="category">
    <option><?php echo $data['category']; ?></option>
    <option>Latest Jobs</option>
    <option>Results</option>
    <option>Admit Card</option>
</select>
<label>Short description</label>
<textarea  name="short_desc" ><?php echo $data['short_desc']; ?></textarea>
<label>Current Image</label><br>
<img src="../uploads/<?php echo $data['image']; ?>" width="120"><br><br>

<label>Change Image (optional)</label>
<input type="file" name="image">

<label>Content</label>
<textarea name="content" id="editor">
<?php echo $data['content']; ?>
</textarea>

<button class="btn" name="update">Update Blog</button>

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