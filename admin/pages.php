<?php
/**
 * Pages Management (Admin).
 *
 * This page lists all dynamic pages in the system.
 * It allows the administrator to view and edit existing pages.
 */
$title = 'Solutions | AZH'
?>

<?php include('header.php') ?>

<?php 

$results = mysqli_query($conn, "SELECT * FROM pages;");
// $solutions = mysqli_fetch_assoc($results);

?>
<table class="table table-bordered container">
    <tr>
        <th>Sr. No</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Actions</th>
    </tr>
        <?php 
            while($page = mysqli_fetch_assoc($results)):
        ?>
        <tr>
            <td><?php echo $page['id'] ?></td>
            <td><?php echo $page['name'] ?></td>
            <td><?php echo $page['slug'] ?></td>
            <td>
                <a href="addPage.php?id=<?php echo $page['id'] ?>" class="btn btn-primary">Edit</a>
                <a href="../page.php?name=<?php echo $page['slug'] ?>" class="btn btn-success">View</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
<?php include('footer.php') ?>