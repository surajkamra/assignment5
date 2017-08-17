<?php

session_start();
if(isset($_POST))

?>




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

if(isset($_POST['submit'])){
	if(!empty($_POST['medName'])){
		$name = $_POST['medName'];
        $expiryDate = @$_SESSION['medicine'][$name]['expiryDate'];
        $purchaseDate = @$_SESSION['medicine'][$name]['purchaseDate'];
        $medicine  =     @$_SESSION['medicine'][$name]['medicineNo'];
	  if($expiryDate){ ?>
		<table class="table">
		  <tr>
		    <th>Name</th>
		    <th>expiryDate</th>
		    <th>Purchasedate</th>
		    <th>MedicineNo</th>
		  </tr>
		  <tr>
		     <td><?php echo $name ?></td>
		     <td><?php echo $expiryDate ?></td>
		     <td><?php echo $purchaseDate ?></td>
		     <td><?php echo $medicine ?></td>
		  </tr>
		  </table>
		<?php
	      }
	    else{
		echo "<center><h2>$name not present in database</h2><center>";
	      }
	    }
     else if(!empty($_POST['medicineNo'])){
		$medicineNo = $_POST['medicineNo'];
		$expiryDate = @$_SESSION['medicine'][$medicineNo]['expiryDate'];
		if($expiryDate){
			echo "<center><h2>Expiry Date of medicineNo $medicineNo is $expiryDate</h2></center>";
		      }
		else{
			echo "<center><h2>Medicine No $medicineNo not present in database</h2></center>";
		      }
                }
	else {
		echo "<center><h2>Please fill the details before search</h2></center>";
	   }	
}


?>

