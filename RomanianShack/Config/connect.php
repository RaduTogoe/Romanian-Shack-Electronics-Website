<?php 
session_start();
$conn = mysqli_connect('localhost', 'mike', '12345678', 'romanianshack');
if (!$conn)
{
    echo 'Connection error:' . mysqli_connection_error();
}
?>