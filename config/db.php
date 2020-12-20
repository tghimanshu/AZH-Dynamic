<?php 

$conn = mysqli_connect('localhost', 'root', '', 'AdvisorZarooriHai');
if(!$conn) {
    echo "Error Occured while connecting to the database". mysqli_errno();
}

?>