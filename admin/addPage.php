<?php $title = 'Add Advisor | AZH' ?>
<?php include('header.php') ?>
<?php 

if(isset($_GET['id'])){
    $query = mysqli_query($conn, "SELECT * FROM pages WHERE id = ".$_GET['id']);
    $page = mysqli_fetch_assoc($query);
    $name = $page['name'];
    $slug = $page['slug'];
    $content = $page['content'];
}else {
    $name = '';
    $slug = '';
    $content = '';
}

?>
<?php 

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $slug = mysqli_real_escape_string($conn, $_POST['slug']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $page_id = mysqli_real_escape_string($conn, $_POST['page_id']);
    if($page_id == null){
        mysqli_query($conn, "INSERT INTO `pages` VALUES (null, '$slug','$name','$content');") or die('error');
    } else {
        mysqli_query($conn, "UPDATE `pages` SET `slug`='$slug',`name`='$name',`content`='$content' WHERE id = $page_id;") or die('error');
    }
    echo("<script>location.href = 'pages.php';</script>");
}

?>


<form action="addPage.php" method="POST" class="container">
    <input type="hidden" name="page_id" value="<?php echo isset($_GET['id'])?$_GET['id']:null; ?>">
    <div>
        <label for="name">Name: </label>
        <input class="form-control" type="text" name="name" id="name" placeholder="Enter Name Here!!" value="<?php echo $name; ?>">
    </div>
    <div>
        <label for="name">Slug: </label>
        <input class="form-control" type="text" name="slug" id="slug" placeholder="Enter slug!!" value="<?php echo $slug; ?>">
    </div>
    <div>
        <label for="description">Content: </label>
        <textarea class="form-control" name="content" id="content" cols="10" rows="10">
            <?php echo $content; ?>
        </textarea>
    </div>    
    <button type="submit" name="submit" class="btn btn-success btn-block mt-5">Submit</button>
</form>
<?php include('footer.php') ?>