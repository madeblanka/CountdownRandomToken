<?php
/**
 * using mysqli_connect for database connection
 */

$databaseHost = 'localhost';
$databaseUsername = 'root';
$databasePassword = '';
$databaseName = 'tokencoba';

$koneksi = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

?>
