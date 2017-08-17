 <?php
$servername = "localhost";
$username = "root";
$password = "admin@123";
$assignment5="assignment5";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $assignment5);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
	//echo 'db connected';
//	$result = mysqli_query($conn, "SELECT MedicineNumber FROM Medicine WHERE MedicineName='paracetimol' ");
   // print_r($result);
   
}

?>
