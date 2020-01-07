<?php
$link = mysqli_connect("localhost", "root", "GreenJeans33Winter1@", "buttons");

$result = mysqli_query($link, "SELECT * FROM "analytics);
$num_rows = mysqli_num_rows($result);

echo "$num_rows Rows\n";
?>
