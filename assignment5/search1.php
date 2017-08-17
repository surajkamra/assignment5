<?php include('constant.php');?>

<!DOCTYPE html>
<html>
  <head>
	<title>Php mini project.</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class = "container">
     <h3 class="text-center text-danger">Check Expiry Date</h3><br><br>
       <div class = "row">
         <div class = "col-md-4 col-centered">
           <form class = "form-group" method = "post" action = "">
             <h4>
	         Medicine Name
	         </h4>
	         <input type="text" name="medName" class="form-control" placeholder = "Enter Medicine Name">
	           <h4>
	           Medicine No
	           </h4>
	           <input type="text" name="medicineNo" class="form-control"><br>
	           <input type="submit" name="submit" class="btn btn-primary center-block" value = "Search">
	        </form>
          </div>
       </div>
     </div>
    <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src = "js/bootstrap.min.js"></script>
 </body>
</html>

<?php
   if(isset($_POST['submit']))
   {
    $Name       = $_POST['medName'];
    $result = mysqli_query($conn, "SELECT * FROM Medicine WHERE MedicineName='$Name' "); 
 ?>
<table class="table">
   <tr>
      <th>MedicineName</th>
      <th>MedicineNumber</th>
      <th>PurchaseDate </th>
      <th>ExpiryDate</th>
    </tr>
   <?php
    while ($array = mysqli_fetch_assoc($result))
   { ?>
        <tr> 
        <td><?php echo $array['MedicineName']; ?></td> 
        <td><?php  echo $array['MedicineNumber']; ?></td> 
        <td><?php  echo $array['PurchaseDate']; ?></td> 
        <td><?php  echo $array['ExpiryDate']; ?></td> 
        </tr>
        </table>
    <?php
    }

   }
    ?>


