<?php $page_title = 'E-Learning'; ?>
<?php include('header.php') ?>
<?php 

$query = mysqli_query($conn, "SELECT * FROM `elearning`;");

?>
<div class="p-title">
  <section class="p-title-inner py-5">
    <div class="container d-flex justify-content-center">
      <h1>E-Learning</h1>
    </div>
  </section>
</div>

<div class="container mt-5">
    <div class="row">
        <?php while($elearning = mysqli_fetch_assoc($query)): ?>
            <div class="col-md-4 col-xs-12 pbDiv"> <a class="e-learning-a" href="<?php echo $elearning['link']; ?>" target="_blank"><div class="e-learning-div"><div class="row"><div class="col-7"><h5 class="title"><?php echo $elearning['title']; ?></h5><p class="bottom-title">by <?php echo $elearning['author']; ?></p></div><div class="col-5"> <img class="e-learning-img img-responsive" src="assets/img/<?php echo $elearning['image']; ?>"> <img src="assets/img/e_learning/rsz_video-icon.png" class="vid-icon"></div></div></div></a></div>
        <?php endwhile; ?>
    </div>
</div>

<?php include('footer.php') ?>