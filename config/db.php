<?php 
/**
 * Database connection configuration.
 *
 * This file handles the database connection using mysqli.
 * It connects to the MySQL database 'AdvisorZarooriHai' on localhost.
 */

$conn = mysqli_connect('localhost', 'root', '', 'AdvisorZarooriHai');
if(!$conn) {
    echo "Error Occured while connecting to the database". mysqli_errno();
}

?>