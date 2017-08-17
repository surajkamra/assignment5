<?php include('constant.php');?>
<html>
  <head>
    <title>Php mini project using session.</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script  type="text/javascript" src="js/jquery.js"></script> 
    <script type="text/javascript" src = "js/bootstrap.min.js"></script>
  </head>
  <body>
 <div class = "container">
      <h3 class="text-center text-danger">Thanks for Registration</h3><br><br>
      <h3 class="text-center text-danger">Add Medicine or</h3>
      <h3 class = "text-center"><a href="search1.php">Check Expiry Date here</a></h3>
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
        $medName = $_POST['medName'];
        $medicineNo = $_POST['medicineNo'];
        $expDate = $_POST['expDate'];
        $purchaseDate = $_POST['purchaseDate'];

      $sql = "INSERT INTO Medicine(MedicineName,MedicineNumber,ExpiryDate,PurchaseDate) VALUES ('$medName', 
        '$medicineNo','$expDate','$purchaseDate')";

       $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result)>0) {
             echo "New record created successfully";
          } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
               }
               mysqli_close($conn);

     }
?>

        

  
                            
