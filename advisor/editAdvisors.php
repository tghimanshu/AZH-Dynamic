<?php $title = 'Add Advisor | AZH' ?>
<?php 
if(isset($_GET['complete'])){
    $title = 'Complete Profile | AZH';
}
?>
<?php include('header.php') ?>  

<?php 

if(isset($_POST['submit'])){
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);
    $reg_no = mysqli_real_escape_string($conn, $_POST['reg_no']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $summary = mysqli_real_escape_string($conn, $_POST['summary']);

    // die('images/'.$username);
    if (!is_dir('images\\'.$username)){
        mkdir('images\\'.$username);
    }
    if(isset($_FILES['profile_pic']) && $_POST['cropped-image'] != ''){
        $upload_url = 'images\\'.$_SESSION['username'].'\\'.$_FILES['profile_pic']['name'];
        $file_name = $_FILES['profile_pic']['name'];
        list(, $data) = explode(';', $_POST['cropped-image']);
	    list(, $data) = explode(',', $data);
	    file_put_contents($upload_url, base64_decode($data));
        // move_uploaded_file($_FILES['profile_pic']['tmp_name'], $upload_url);    
        mysqli_query($conn, "UPDATE advisors SET name = '$name', summary='$summary', experience='$experience', reg_no = '$reg_no', position='$position', location='$location', profile_pic= '$file_name' WHERE id = $id;") or die(mysqli_error($conn));
    }else {
        mysqli_query($conn, "UPDATE advisors SET name = '$name', summary='$summary', experience='$experience', reg_no = '$reg_no', position='$position', location='$location' WHERE id = $id;") or die(mysqli_error($conn));
    }
    echo("<script>location.href = 'index.php';</script>");
}

?>


<?php 

$username = $_SESSION['username'];
$result = mysqli_query($conn, "SELECT * FROM `advisors` WHERE username = '$username';");
$advisor = mysqli_fetch_assoc($result);
$id = $advisor['id'];
?>

<form action="editAdvisors.php" method="POST" class="container" enctype="multipart/form-data"   >
    <input type="hidden" value="<?php echo $id; ?>" name="id">
    <div>
        <label for="name">Name: </label>
        <input class="form-control" type="text" name="name" id="name" placeholder="Enter Name Here!!" value="<?php echo $advisor['name'] ?>">
    </div>
    <div>
        <label for="name">Experience: </label>
        <input class="form-control" type="number" name="experience" id="experience" placeholder="Enter Experience!!"  value="<?php echo $advisor['experience'] ?>">
    </div>
    <div>
        <label for="name">SEBI Registration Number: </label>
        <input class="form-control" type="text" name="reg_no" id="reg_no" placeholder="Enter SEBI Reg No."  value="<?php echo $advisor['experience'] ?>">
    </div>
    <div>
        <label for="name">Expertise: </label>
        <input class="form-control" type="text" name="position" id="position" placeholder="Enter Position!!" value="<?php echo $advisor['position'] ?>">
    </div>
    <div>
        <label for="name">Location: </label>
        <input class="form-control" type="text" name="location" id="location" placeholder="Enter Location!!" value="<?php echo $advisor['location'] ?>">
    </div>
    <div>
        <label for="description">Summary: </label>
        <textarea class="form-control" name="summary" id="summary" cols="10" rows="10" ><?php echo $advisor['summary'] ?></textarea>
    </div>   
    <div>
        <input type="file" name="profile_pic" accept="image/*" class="form-control js-photo-upload">
    </div> 
    <img id="avatar-crop-img" src="" style="width:224px; height:224px; display: none">
	<input id="avatar-crop-input" type="hidden" name="cropped-image">

    <button type="submit" name="submit" class="btn btn-success btn-block mt-5">Submit</button>
</form>


<!-- image cropper -->

<div class="modal fade remove-modal" tabindex="-1" role="dialog" id="cropperModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content text-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-positioner">
                <h5>Crop Photo</h5>
                <hr>
                <img style="width: 271px; height: 271px;" class="js-avatar-preview" src="">
                <button class=" m-4 btn btn-primary js-save-cropped-avatar">Save</button>
            </div>
        </div>
    </div>
</div>


<?php include('footer.php') ?>