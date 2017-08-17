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
                <input type="text" name="locality" id = "locality" class="form-control" placeholder="Locality" value="<?php if(isset($_POST['locality'])) { echo htmlentities ($_POST['locaity']); }?>"/ >
                <span class = "error"><?php echo $locaityerr ;?></span>
                <h4>
                <h4>
                  Sub-Locality:
                    <span class = "error">*</span>
                </h4>
                <input type="text" name="sublocality" id = "sublocality" class="form-control" placeholder="Sub-Locality" value="<?php if(isset($_POST['sublocality'])) { echo htmlentities ($_POST['sublocality']); }?>"/ >
                <span class = "error"><?php echo $sublocalityerr ;?></span>
                <h4>
                 Mobile No:
                  <span class = "error">*</span>
                </h4> 
                <input type="text" name="mobile" id = "mobile" class="form-control" placeholder="Mobile No" value="<?php if(isset($_POST['mobile'])) { echo htmlentities ($_POST['mobile']); }?>"/ >
                <span class = "error"><?php echo $mobileerr;?></span>
                  <h4>
                  Street Name:
                  <span class = "error">*</span>
                  </h4> 
                  <input type="text" name="street" class="form-control" placeholder="StreetName" id = "street" value="<?php if(isset($_POST['street'])) { echo htmlentities ($_POST['street']); }?>"/><span class = "error"><?php echo $streeterr;?></span>
                  
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
                    <input type="text" name="country" id = "country" class="form-control" placeholder="Country" value="<?php if(isset($_POST['country'])) { echo htmlentities ($_POST['country']); }?>"/ >
                     <span class = "error"><?php echo $countryerr;?></span>
                    
                   <input type="submit" name="submit" 
                   class="btn btn-primary center-block" id = "submitBtn" value = "Submit" >
                </form>
             </div>
          </div>
    </div>
      
    </body>
</html>
<h2 class="text-center text-danger">Result by Search</h2><br>
<table class="table">
             <tr>
              <th>MobileNo</th>
              <th>SubLocality </th>
              <th>Locality</th>
              <th>StreetName</th>
              <th>City</th>
              <th>Country</th>
              <th>ZipCodee</th>
            </tr>
              
    </table>