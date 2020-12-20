<?php $title = 'Add Advisor | AZH' ?>

<?php include('header.php') ?>
<?php 

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $summary = mysqli_real_escape_string($conn, $_POST['summary']);
    mysqli_query($conn, "INSERT INTO advisors VALUES (null, '$name','$summary','$experience','$position','$location');") or die('error');
}

?>


<form action="addAdvisors.php" method="POST" class="container">
    <div>
        <label for="name">Name: </label>
        <input class="form-control" type="text" name="name" id="name" placeholder="Enter Name Here!!">
    </div>
    <div>
        <label for="name">Experience: </label>
        <input class="form-control" type="number" name="experience" id="experience" placeholder="Enter Exxperience!!">
    </div>
    <div>
        <label for="name">Postion: </label>
        <input class="form-control" type="text" name="position" id="position" placeholder="Enter Position!!">
    </div>
    <div>
        <label for="name">Location: </label>
        <input class="form-control" type="text" name="location" id="location" placeholder="Enter Location!!">
    </div>
    <div>
        <label for="description">Summary: </label>
        <textarea class="form-control" name="summary" id="summary" cols="10" rows="10"></textarea>
    </div>    
    <button type="submit" name="submit" class="btn btn-success btn-block mt-5">Submit</button>
</form>


<?php include('footer.php') ?>