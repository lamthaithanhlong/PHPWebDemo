<?php
include "connect.php";
$id = $_POST['id'];
$stmt = $conn->prepare("SELECT wp_posts.id, wp_users.user_nicename AS author, wp_posts.post_title AS title, LEFT(wp_posts.post_content, 100) AS content, wp_posts.post_date FROM wp_posts JOIN wp_users ON (wp_users.ID = wp_posts.post_author) WHERE wp_posts.id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$results = $stmt->get_result();
$rows = $results->fetch_all(MYSQLI_ASSOC);
echo json_encode($rows);


 ?>
