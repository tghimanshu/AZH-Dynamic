<?php $title = 'Solutions | AZH' ?>

<?php include('header.php') ?>

<?php 

$results = mysqli_query($conn, "SELECT * FROM solutions;");
// $solutions = mysqli_fetch_assoc($results);

?>
<table class="table table-bordered container">
    <tr>
        <th>Sr. No</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
        <?php 
            while($solution = mysqli_fetch_assoc($results)):
        ?>
        <tr>
            <td><?php echo $solution['id'] ?></td>
            <td><?php echo $solution['name'] ?></td>
            <td>
                <a href="../solutions.php?id=<?php echo $solution['id'] ?>" class="btn btn-success">View</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
<?php include('footer.php') ?>