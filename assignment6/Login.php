<?php 
include('constant.php');
session_start();
 if(isset($_SESSION['email'])) {
     header('Location: http://localhost/assignment6/Home.php'); // redirects me to homepage
     exit; // for good measure
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
     <h2 class="text-center text-danger">Sign In</h2><br>
        <div class = "container">
        <div class = "row">
        <div class = "col-md-4 col-centered">
  <form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name ="password">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>
  <button name="submit" type="submit" class="btn btn-default" >Submit</button>
</form>
</div>
      </div>
    </div>
  </body>
</html>

<?php
  if(isset($_POST['submit'])){
    $emailaddress          =$_POST['email'];
    $password             =$_POST['password'];
    $search = mysqli_query($conn,"SELECT * FROM Signup WHERE Email='$emailaddress' AND Password='$password'") or die(mysqli_error()); 
                
     if(mysqli_num_rows($search)>0){
         $_SESSION['email']=$emailaddress;
                   //$_SESSION['email'][$emailaddress] = array('email' => $emailaddress, 'password' => $password, 
           header('Location: //localhost/assignment6/Home.php');
     }else{
            echo "failed";
        }

}

?>