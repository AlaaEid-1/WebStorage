<?php
$link = mysqli_connect('localhost', 'root', '', 'im_db');

if (!$link) {
    die('Connection error' . mysqli_connect_error());
}
?>