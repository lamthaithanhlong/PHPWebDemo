<?php
include 'connect.php';
$x= $_POST['id'] *10;
$query = "SELECT wp_users.ID AS id, images.caption As cap, images.file as pic ,wp_users.user_nicename as nick, wp_posts.post_date FROM images, wp_users ,wp_posts WHERE images.id=wp_posts.ID AND wp_posts.post_author = wp_users.ID LIMIT $x, 10";

$results = $conn->query($query);
$rows = $results->fetch_all(MYSQLI_ASSOC);
echo json_encode($rows);

 ?>
