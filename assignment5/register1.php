<?php include('constant.php');?>
<!DOCTYPE html>
  <html>
    <head>
	    <title>Example of git version control.</title>
	      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	        <link rel="stylesheet" type="text/css" href="style.css">
	          <script type="text/javascript" src="js/jquery.js"></script>
              <script type="text/javascript" src = "js/bootstrap.min.js"></script>
     </head>
    <body>
      
  <?php 
    if(isset($_POST['submit'])){
        $name          =$_POST['name'];
        $mobileNo      =$_POST['cellno'];
        $streetName    =$_POST['StreetName'];
        $city          =$_POST['city'];
        $Country       =$_POST['country'];
        $company       =$_POST['companyName'];


      if (ctype_alpha(str_replace(' ', '', $name)) === false) {
            $nameerr = 'Name must contain letters and spaces only';
         }

      if(empty($mobileNo) || !(preg_match('/^[0-9 +-]/',$mobileNo))) {
          $mobileerr="number should contains only numbers";
       }

      if(empty($streetName) || (ctype_alpha(str_replace(' ', '', $name)) === false)){
          $streeterr="Incorrect name format";
       }

      if(empty($city)||!(preg_match('/^[a-z]/i', $city))){
         $cityerr="Incorrect name format";
       }

      if(empty($Country)||!(preg_match('/^[a-z]/i', $Country))){
          $Countryerr="Incorrect name format";
       }

      if(empty($company)||!(preg_match('/^[a-z]/i', $company))){
          $companyerr="Incorrect name format";
       }

      if(empty($nameerr || $mobileerr || $streeterr || $cityerr || $Countryerr || $companyerr)){

         $sql = "INSERT INTO Register(Name, Mobile,Street,City,Country,CompanyName) 
         VALUES ('$name','$mobileNo','$streetName','$city ','$Country','$company')";

          if (mysqli_query($conn, $sql)) {
              echo "New record created successfully";
           } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }

          mysqli_close($conn);

          header('Location: //localhost/assignment3/medicine.php');


         }
       }

    ?>

      <h2 class="text-center text-danger">Sign Up</h2><br>
        <div class = "container">
          <div class = "row">
            <div class = "col-md-4 col-centered">
              <form class = "form-group" action="" method="post">
                <h4>
                  Name:
                    <span class = "error">*</span>
                </h4>
                <input type="text" name="name" id = "name" class="form-control" placeholder="Name" value="<?php if(isset($_POST['name'])) { echo htmlentities ($_POST['name']); }?>"/ >
                <span class = "error"><?php echo $nameerr ;?></span>
                <h4>
                 Mobile:
                  <span class = "error">*</span>
                </h4> 
                <input type="text" name="cellno" id = "mobileNo" class="form-control" placeholder="Mobile" value="<?php if(isset($_POST['cellno'])) { echo htmlentities ($_POST['cellno']); }?>"/ >
                <span class = "error"><?php echo $mobileerr;?></span>
                  <h4>
                  Street:
                  </h4> 
                  <input type="text" name="StreetName" class="form-control" placeholder="StreetName" id = "StreetName" value="<?php if(isset($_POST['StreetName'])) { echo htmlentities ($_POST['StreetName']); }?>"/><span class = "error"><?php echo $streeterr;?></span>
                  
                    <h4>
                    City:
                      <span class = "error">*</span>
                    </h4> 
                    <input type="text" name="city" id = "city" class="form-control" placeholder="City" value="<?php if(isset($_POST['city'])) { echo htmlentities ($_POST['city']); }?>"/ >
                     <span class = "error"><?php echo $cityerr;?></span>
                    <h4>
                    Country:
                      <span class = "error">*</span>
                    </h4> 
                   <input type="text" name="country" id = "country" class="form-control" placeholder="Country" value="<?php if(isset($_POST['country'])) { echo htmlentities ($_POST['country']); }?>"/>
                   <span class = "error"><?php echo $Countryerr;?></span>
                   <h4>
                   Company Name:
                     <span class = "error">*</span>
                   </h4>
                   <input type="text" name="companyName" id = "company" class="form-control" placeholder="Company Name"  value="<?php if(isset($_POST['companyName'])) { echo htmlentities ($_POST['companyName']); }?>"/>
                   <span class = "error"><?php echo $companyerr;?></span><br>
                   <input type="submit" name="submit" 
                   class="btn btn-primary center-block" id = "submitBtn" value = "Submit">
                </form>
             </div>
          </div>
    </div>
      
    </body>
</html>
   

         


          

          

         

      





      





































