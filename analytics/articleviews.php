<?php
$link = mysqli_connect("localhost", "root", "GreenJeans33Winter1@", "buttons");

$result = mysqli_query($link, "SELECT * FROM analytics where pageurl = '/article-view.php'");
$num_rows = mysqli_num_rows($result);

echo "$num_rows Article Views\n";
?>
