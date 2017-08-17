echo $mobileerr;
      echo $streeterr;

     if(empty($cityerr) && empty($countryerr) && empty($mobileerr) && empty($sublocalityerr) && empty($streeterr) && empty($localityerr) ){

         

       if(!empty($city) && !empty($country) && !empty($mobileNo) && !empty($sublocality) && !empty($street) && !empty($locality) ){

         $sql = "INSERT INTO Test(MobileNo,SubLocality,Locality,StreetName,City,Country,ZipCodde) 
         VALUES ('$mobileNo','$sublocality','$locality','$street ','$city','$country','$string')";
       

          if (mysqli_query($conn, $sql)) {
             echo "<h3 class=text-center text-danger>Data Has been Submitted successfully" ;
              }?>
               
               
             
              
              <?php
           } else {
               echo "<h3 class=text-center text-danger>SubLocality is already in use " ;
              }

          mysqli_close($conn);

             //header('Location: //localhost/assignment3/medicine.php');
         }
      } 
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
              
              <?php
              $result = mysqli_query($conn, "SELECT * FROM Test  ") or die(mysqli_error($conn));
               if (mysqli_num_rows($result) > 0) {
               while ($array = mysqli_fetch_assoc($result)){ 
                ?>
                 <tr> 
                   <td><?php  echo $array['MobileNo']; ?></td>
                   <td><?php  echo $array['SubLocality']; ?></td> 
                   <td><?php  echo $array['Locality']; ?></td>
                   <td><?php  echo $array['StreetName']; ?></td>
                   <td><?php  echo $array['City']; ?></td>
                   <td><?php  echo $array['Country']; ?></td>
                   <td><?php  echo $array['ZipCodde']; ?></td>
                  <td>
      <?php 
          $m=  $array['MobileNo'];
          $su=  $array['SubLocality'];
          $l=  $array['Locality'];
          $st=  $array['StreetName'];
          $c=  $array['City'];
          $cou=  $array['Country'];
          $zip=  $array['ZipCodde'];
          echo "<a href='Edit.php?mobileno=".$m."&sublocality=".$su."&locality=".$l."&street=".$st."&city=".$c."&country=".$cou."&zipcode=".$zip."'> Edit </a>";

       ?>        </td>
              </tr>
      