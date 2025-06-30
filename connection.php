<?php
$link = mysqli_connect("localhost", "root", "", "quiz");
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
?>