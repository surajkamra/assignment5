<?php

include('contant.php');
$code=$_GET['zipcode'];

$result = mysqli_query($conn, "SELECT * FROM Test WHERE ZipCodde='$code' ") or die(mysqli_error($conn));
   if (mysqli_num_rows($result) > 0) {
    
   $array = mysqli_fetch_assoc($result);
 }
 $zip= $array['ZipCodde'];
?>
<?php 
    if(isset($_POST['submit'])){
        $locality      =$_POST['locality'];
        $sublocality   =$_POST['sublocality'];
        $mobileNo      =$_POST['mobile'];
        $street        =$_POST['street'];
        $city          =$_POST['city'];
        $country       =$_POST['country'];

         if (empty($city) || ctype_alpha(str_replace(' ', '', $city)) === false) {
         $cityerr = "City must contain letters and spaces only";
         }
      if (empty($country) || ctype_alpha(str_replace(' ', '', $country)) === false) {
         $countryerr = "Country must contain letters and spaces only";
         }   

      if(empty($mobileNo) || !(is_numeric($mobileNo)) || (strlen($mobileNo)>10))
         {
          $mobileerr="number should contains only numbers";
         }

      if(empty($sublocality)){
          $sublocalityerr="Sub-Locality must not be empty or the can be alphanumeric only";
        }

      if(empty($street)){
         $streeterr="Street must not be empty or the can be alphanumeric only";
         }
      if(empty($locality)){
         $localityerr="Locality must not be empty or the can be alphanumeric only";
         }   


        
         if(empty($cityerr) &&  empty($mobileerr) && empty($streeterr) && empty($localityerr) && empty($sublocalityerr) && empty($countryerr)){
        $result = mysqli_query($conn, "UPDATE Test SET Locality='$locality' ,SubLocality= '$sublocality',MobileNO='$mobileNo',City='$city',StreetName='$street',Country='$country' WHERE ZipCodde='$zip'") or die(mysqli_error($conn));
        header("Location:test1.php");
       } 
else
{
 echo "<h3 class=text-center text-danger>Data hasnot  been successfully updated" ;
}
       ?>
        
       <?php
      
                
         }
              ?>
<!DOCTYPE html>
  <html>
    <head>
	    <title>Example of git version control.</title>
	      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	        <link rel="stylesheet" type="text/css" href="style.css">
	          <script type="text/javascript" src="js/jquery.js"></script>
              <script type="text/javascript" src = "js/bootstrap.min.js"></script>
              <script type="text/javascript" src = "js/Validation.js"></script>
              


     </head>
    <body>
     <h2 class="text-center text-danger">Sign Up</h2><br>
        <div class = "container">
          <div class = "row">
            <div class = "col-md-4 col-centered">
            
              <form name="myForm" class = "form-group" action="" method="post" onsubmit="Validate()">
                <h4>
                  Locality:
                    <span class = "error">*</span>
                </h4>
                <input type="text" name="locality" id = "locality" class="form-control" placeholder="Locality" value="<?php echo htmlentities ($_GET['locality']); ?>"/ >
                <span class = "error"><?php echo $localityerr ;?></span>
                <h4>
                <h4>
                  Sub-Locality:
                    <span class = "error">*</span>
                </h4>
                <input type="text" name="sublocality" id = "sublocality" class="form-control" placeholder="Sub-Locality" value="<?php  echo htmlentities ($_GET['sublocality']); ?>"/ >
                <span class = "error"><?php echo $sublocalityerr ;?></span>
                <h4>
                 Mobile No:
                  <span class = "error">*</span>
                </h4> 
                <input type="text" name="mobile" id = "mobile" class="form-control" placeholder="Mobile No" value="<?php echo htmlentities ($_GET['mobileno']); ?>"/ >
                <span class = "error"><?php echo $mobileerr ;?></span>
                  <h4>
                  Street Name:
                  <span class = "error">*</span>
                  </h4> 
                  <input type="text" name="street" class="form-control" placeholder="StreetName" id = "street" value="<?php  echo htmlentities ($_GET['street']); ?>"/><span class = "error"><?php echo $streeterr ;?></span>
                  
                    <h4>
                    City:
                      <span class = "error">*</span>
                    </h4> 
                    <input type="text" name="city" id = "city" class="form-control" placeholder="City" value="<?php echo htmlentities ($_GET['city']); ?>"/ >
                     <span class = "error"><?php echo $cityerr ;?></span>

                      <h4>
                    Country:
                      <span class = "error">*</span>
                    </h4> 
                    <input type="text" name="country" id = "country" class="form-control" placeholder="Country" value="<?php  echo htmlentities ($_GET['country']); ?>"/ >
                     <span class = "error"><?php echo $countryerr ;?></span>
                    
                   <input type="submit" name="submit" 
                   class="btn btn-primary center-block" id = "submitBtn" value = "Update" >
                </form>
             </div>
          </div>
    </div>
      
    </body>
</html>