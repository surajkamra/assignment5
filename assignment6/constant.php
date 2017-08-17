 <?php
$servername = "localhost";
$username = "root";
$password = "admin@123";
$assignment5="assignment6";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $assignment5);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}else{
	

}

?>
