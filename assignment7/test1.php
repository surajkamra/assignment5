<?php 
session_start();
include('contant.php');
?>
<?php 
    if(isset($_POST['submit'])){
        $locality      =$_POST['locality'];
        $sublocality   =$_POST['sublocality'];
        $mobileNo      =$_POST['mobileNo'];
        $street        =$_POST['street'];
        $city          =$_POST['city'];
        $country       =$_POST['country'];
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $random_string_length=8;
        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
           $string .= $characters[mt_rand(0, $max)];
          
          }
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

    ?>
    <?php 
    if(empty($cityerr) &&  empty($mobileerr) && empty($streeterr) && empty($localityerr) && empty($sublocalityerr) && empty($countryerr)){
       $query=mysqli_query($conn ,"INSERT INTO Test(MobileNo,SubLocality,Locality,StreetName,City,Country,ZipCodde) 
         VALUES ('$mobileNo','$sublocality','$locality','$street ','$city','$country','$string')");
       echo "<h3 class=text-center text-danger>Data has been successfully submitted" ;
    }
    else if(!empty($cityerr) ||  !empty($mobileerr) || !empty($streeterr) || !empty($localityerr) || !empty($sublocalityerr) || !empty($countryerr)){
      echo "<h3 class=text-center text-danger>Data has not been submittes" ;
    }
    else
    {
      echo "<h3 class=text-center text-danger>SubLocality in use already" ;
    }
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
    
     <h2 class=" text-danger">Sign Up</h2><br>
        <div class = "container">
          <div class = "row">
            <div class = "col-md-4 col" >
            
              <form name="myForm" class = "form-group" action="" method="post" onsubmit="">
              <h4>
                  Search:
                    <span class = "error">*</span>
                </h4>
                <input type="text" name="S" id = "S" class="form-control" placeholder="Search" / >
                
                <input type="submit" name="Search" 
                   class="btn btn-primary center-block" id = "" value = "Search" >
                <h4>
                  Locality:
                    <span class = "error">*</span>
                </h4>
                <input type="text" name="locality" id = "locality" class="form-control" placeholder="Locality" value="<?php if(isset($_POST['locality'])) { echo htmlentities ($_POST['locality']); }?>"/ >
                <span class = "error"><?php echo $localityerr ;?></span>
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
                <input type="text" name="mobileNo" id = "mobileNo" class="form-control" placeholder="Mobile No" value="<?php if(isset($_POST['mobileNo'])) { echo htmlentities ($_POST['mobileNo']); }?>"/ >
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
             <!--address submission form ends-->
             
             
             <div class="col-md-8">
           <?php if(isset($_POST['Search'])){
            $search      =$_POST['S'];
            
            ?>
             <table class="table" >
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
   $result = mysqli_query($conn, "SELECT * FROM Test
WHERE MobileNO='$search' OR SubLocality='$search' OR Locality='$search' OR StreetName='$search' OR City='$search' OR Country='$search' OR ZipCodde='$search'
 ") or die(mysqli_error($conn));} 
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
                  </tr>

                  <?php } }?>
                  </table>
             </div>
             
          </div>
    </div>
      
    </body>
</html>
     <h2 class="text-center text-danger">ALL Listings</h2><br>
     <table class="table">
       <tr>
       <th><a href="test1.php?sort=SubLocality">SubLocality:</a></th>
<th><a href="test1.php?sort=Locality">Locality:</a></th>
<th><a href="test1.php?sort=StreetName">StreetName:</a></th>
<th><a href="test1.php?sort=ZipCodde">ZipCodde:</a></th>
       </tr>
     </table>
      
    <table class="table" >
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
            $sql="SELECT * FROM Test";
            if ($_GET['sort'] == 'SubLocality')
{
    $sql .= " ORDER BY SubLocality";
}
elseif ($_GET['sort'] == 'Locality')
{
    $sql .= " ORDER BY Locality";
}
elseif ($_GET['sort'] == 'StreetName')
{
    $sql .= " ORDER BY StreetName";
}
elseif($_GET['sort'] == 'ZipCodde')
{
    $sql .= " ORDER BY ZipCodde";
}

              $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
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
        
 <?php
    }
}?>
</table>