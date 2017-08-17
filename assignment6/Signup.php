<?php 
session_start();
include('constant.php');
    
?>

<?php 
    if(isset($_POST['submit'])){
        $name          =$_POST['name'];
        $mobileNo      =$_POST['cellno'];
        $email         =$_POST['email'];
        $password      =$_POST['password'];
        


      if (ctype_alpha(str_replace(' ', '', $name)) === false) {
         $nameerr = "Name must contain letters and spaces only";
         }

      if(empty($mobileNo) || !(preg_match('/^[0-9 +-]/',$mobileNo)) || (strlen($mobileNo)>10))
         {
          $mobileerr="number should contains only numbers";
         }

      if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
          $emailerr="Incorrect email format";
        }

      if(empty($password) || !(preg_match('/^[A-Z][a-z 0-9 @$%#~?><>]/',$password))){
         $passworderr="Incorrect name format";
         }

      

     if(empty($nameerr || $mobileerr || $emailerr || $passworderr)){

         $_SESSION['name'][$name] = array('name' => $name, 'mobileNo' => $mobileNo, 'email' => $email, 'password' => $password);


         $sql = "INSERT INTO Signup(Name, Mobile,Email,Password) 
         VALUES ('$name','$mobileNo','$email','$password ')";

          if (mysqli_query($conn, $sql)) {
              ?>
              <h3 class="text-center text-danger">Thanks for Registration</h3><br><br>
              <h3 class = "text-center"><a href="Login.php">Sign In</a></h3>
              <?php
           } else {
                 echo "<h3 class=text-center text-danger>User Email is already in use " ;
              }

          mysqli_close($conn);

             //header('Location: //localhost/assignment3/medicine.php');
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
     <h2 class="text-center text-danger">Sign Up</h2><br>
        <div class = "container">
          <div class = "row">
            <div class = "col-md-4 col-centered">
            <h3 class = "text-center"><a href="Allblog.php">Show all Blogs</a></h3>
            <h3 class = "text-center"><a href="Login.php">Sign In</a></h3>
              <form name="myForm" class = "form-group" action="" method="post" onsubmit="validateForm()">
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
                  E-mail:
                  <span class = "error">*</span>
                  </h4> 
                  <input type="text" name="email" class="form-control" placeholder="email" id = "email" value="<?php if(isset($_POST['StreetName'])) { echo htmlentities ($_POST['email']); }?>"/><span class = "error"><?php echo $emailerr;?></span>
                  
                    <h4>
                    Password:
                      <span class = "error">*</span>
                    </h4> 
                    <input type="text" name="password" id = "password" class="form-control" placeholder="password" value="<?php if(isset($_POST['city'])) { echo htmlentities ($_POST['password']); }?>"/ >
                     <span class = "error"><?php echo $passworderr;?></span>
                    
                   <input type="submit" name="submit" 
                   class="btn btn-primary center-block" id = "submitBtn" value = "Signup" >
                </form>
             </div>
          </div>
    </div>
      
    </body>
</html>

    