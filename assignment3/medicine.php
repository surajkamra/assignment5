
<!DOCTYPE html>
<html>
  <head>
    <title>Php mini project using session.</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script  type="text/javascript" src="js/jquery.js"></script> 
    <script type="text/javascript" src = "js/bootstrap.min.js"></script>
  </head>
  <body>
<?php

        session_start();
      // This function eliminates the spaces,htmlcharacters,slashes from the input data   
          function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
                     }
          if(isset($_POST['submit'])) {
            $error=array();
             $name         = test_input($_POST['medName']);
             $medicineNo   = test_input($_POST['medicineNo']);
             $expiryDate   = test_input($_POST['expDate']);
             $purchaseDate = test_input($_POST['purchaseDate']);

             $_SESSION['medicine'][$name] = array('name' => $name, 'medicineNo' => $medicineNo, 
              'expiryDate' => $expiryDate, 'purchaseDate' => $purchaseDate);
            $_SESSION['medicine'][$medicineNo] = array('name' => $name, 'medicineNo' => $medicineNo, 'expiryDate' => $expiryDate, 'purchaseDate' => $purchaseDate);
                }
 ?>

    <div class = "container">
      <h3 class="text-center text-danger">Thanks for Registration</h3><br><br>
      <h3 class="text-center text-danger">Add Medicine or</h3>
      <h3 class = "text-center"><a href="search.php">Check Expiry Date here</a></h3>
      <div class = "container">
        <div class = "row">
          <div class = "col-md-4 col-centered">
            <form class = "form-group" action = "" method = "POST">
              <h4>
               Medicine Name<span class="error">*</span>
              </h4>
              <input type="text" name="medName" class="form-control" placeholder = "Enter Name" id="name" >
              <h4>
               Medicine No.<span class="error">*</span>
              </h4>
              <input type="text" name="medicineNo" class="form-control" id="type" >
              <h4>
                Expiry Date<span class="error">*</span>
              </h4>
              <input type="text" name="expDate" class="form-control" placeholder = "DD-MM-YYYY" >
	            <h4>
               Purchase Date<span class="error">*</span>
              </h4> 
              <input type="text" name="purchaseDate" class="form-control" placeholder = "DD-MM-YYYY"  >
              <br/>
	            <input type="submit" name="submit" class="btn btn-primary center-block" id="submitBtn" value = "Submit">
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<?php
if(isset($_POST['submit'])){
  echo "<center><h3>Medicine Details has been successfully submittted<center></h3>";
}
?>

