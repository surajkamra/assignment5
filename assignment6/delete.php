<?php
include('constant.php');

$title = $_GET['title'];
$result = mysqli_query($conn, "DELETE FROM Blog WHERE TitleDate='$title'") or die(mysqli_error($conn)); 

 header('Location: //localhost/assignment6/Home.php');
         

?>