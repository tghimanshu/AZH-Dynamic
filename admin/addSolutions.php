<?php
/**
 * Add Solutions Page (Admin).
 *
 * This page allows the administrator to add a new "solution" (likely a service or offering).
 * It includes fields for name, description, and multiple FAQ questions and answers.
 */
$title = 'Add Solutions | AZH'
?>

<?php include('header.php') ?>
<?php 

// Handle form submission to add a new solution
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $questions = implode('|',$_POST['question']);
    $answers = implode('|',$_POST['answer']);
    mysqli_query($conn, "INSERT INTO solutions VALUES (null, '$name','$description','$questions','$answers');") or die('error');
}

?>


<form action="addSolutions.php" method="POST" class="container">
    <div class="nput-group">
        <label for="name">Name: </label>
        <input class="form-control" type="text" name="name" id="name" placeholder="Enter Name Here!!">
    </div>
    <div class="nput-group">
        <label for="description">Description: </label>
        <textarea class="form-control" name="description" id="description" cols="10" rows="10"></textarea>
    </div>
    <div class="faqs">
        <h3>FAQS</h3>
        
    </div><!-- faqs -->
    <button class="btn btn-primary" id="addNewQuestion">Add New Question</button>
    
    
    <button type="submit" name="submit" class="btn btn-success btn-block mt-5">Submit</button>
</form>


<?php include('footer.php') ?>