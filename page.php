<?php 
if(isset($_GET['name'])){
    $slug = $_GET['name'];
}else {
    header('Location: index.php');
}

$page_title = ucwords(implode(' ',explode('-',$_GET['name'])));
?>
<?php include('header.php') ?>
<?php 

$query = mysqli_query($conn, "SELECT * FROM `pages` WHERE slug = '$slug';");

$page = mysqli_fetch_assoc($query);

?>
<div class="p-title">
  <section class="p-title-inner py-5">
    <div class="container d-flex justify-content-center">
      <h1><?php echo $page['name']; ?></h1>
    </div>
  </section>
</div>

<div class="container mt-5">
    <?php echo $page['content']; ?>
</div>

<?php include('footer.php') ?>