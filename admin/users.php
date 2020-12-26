<?php 
if(isset($_GET['type'])){
    $type = $_GET['type'];
} else {
    header('Location: index.php');
}
?>
<?php $title= ucwords($type).' | AZH' ?>

<?php include('header.php') ?>

<?php  

if(isset($_GET['id']) && isset($_GET['approve'])){
    $advisor = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM $type WHERE id = ".$_GET['id']));
    if($advisor['approved'] == '0'){
        mysqli_query($conn, "UPDATE `advisors` SET `approved` = '1' WHERE `id` = ".$_GET['id']) or die(mysqli_error($conn));
        advisor_account_approved($conn, $_GET['id']);
        echo("<script>location.href = 'users.php?type=advisors';</script>");
    }else if ($advisor['approved'] == '1') {
        mysqli_query($conn, "UPDATE `advisors` SET `approved` = '0' WHERE `id` = ".$_GET['id']) or die(mysqli_error($conn));
        echo("<script>location.href = 'users.php?type=advisors';</script>");
    }
}
?>

<?php 

$results = mysqli_query($conn, "SELECT * FROM $type;");
// $solutions = mysqli_fetch_assoc($results);

?>
<a class="btn btn-success" href="../config/export.php?table=<?php echo $type ?>">Export As Excel</button>
<table class="table table-bordered container">
    <tr>
        <th>Sr. No</th>
        <th>Name</th>
        <th>User Name</th>
        <th>E-Mail</th>
        <th>Contact</th>
        <?php echo ($type == 'advisors')?"<th>Approved</th><th>Actions</th>":""; ?>
        
    </tr>
        <?php 
            while($solution = mysqli_fetch_assoc($results)):
        ?>
        <!-- <tr class="<?php// echo ($type == 'advisors' && $solution['approved'] == '0')?'bg-danger':''; ?>"> -->
        <tr>
            <td><?php echo $solution['id'] ?></td>
            <td><?php echo $solution['name'] ?></td>
            <td><?php echo $solution['username'] ?></td>
            <td><?php echo $solution['email'] ?></td>
            <td><?php echo $solution['contact'] ?></td>
            <?php if($type == 'advisors'){
                if($solution['approved'] == '0') {
                    echo "<td>No</td>";
                }else if($solution['approved'] == '1') {
                    echo "<td>Yes</td>";
                }
            } ?>
                <?php if($type == 'advisors'){ ?>
                <td>

                    <!-- <a href="../advisors.php?id=<?php echo $solution['id'] ?>" class="btn btn-success">View</a> -->
                    <script>
                   function adv_data_<?php echo $solution['id']; ?>(){

                        Swal.fire({
                                title: '<strong><?php echo $solution['name']; ?></strong>',
                                html:
                                    `
                                    <div style='text-align:left'>
                                        <b>contact:</b> <?php echo $solution['contact']; ?><br>
                                        <b>E-Mail:</b> <?php echo $solution['email']; ?><br>
                                        <b>Experience:</b> <?php echo $solution['experience']; ?> years<br>
                                        <b>Expertise:</b> <?php echo $solution['position']; ?><br>
                                        <b>Location:</b> <?php echo $solution['location']; ?><br>
                                        <b>SEBI Reg No:</b> <?php echo $solution['reg_no']; ?><br>
                                        <b>Profile Pic:</b> <img src='<?php echo '../advisor/images/'.$solution['username'].'/'.$solution['profile_pic']; ?>' width='100%'>
                                    </div>`,
                                showCloseButton: true,
                                focusConfirm: false,
                                confirmButtonText:
                                    'Close',
                                confirmButtonAriaLabel: 'Close',
                            });
                    }
                    </script>
                    <button class="btn btn-success" onclick="adv_data_<?php echo $solution['id']; ?>()" id="adv_<?php $solution['id'] ?>">View</button>
                    <?php
                        if($solution['approved'] == '0') {
                            echo "<a class='btn btn-primary' href='users.php?type=advisors&id=".$solution['id']."&approve='>Approve</a>";
                        }else {
                            echo "<a class='btn btn-danger' href='users.php?type=advisors&id=".$solution['id']."&approve='>UnApprove</a>";
                        }
                    ?>
                </td>
            <?php } ?>
        </tr>
        <?php endwhile; ?>
    </table>
<?php include('footer.php') ?>