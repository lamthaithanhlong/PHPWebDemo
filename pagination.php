<?php
include 'connect.php';

$query = "SELECT id FROM wp_posts";
$result = $conn->query($query);
$rows = $result->num_rows;
echo $rows;


 ?>
