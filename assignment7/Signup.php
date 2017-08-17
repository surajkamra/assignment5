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
    <?php
    
       if(isset($_POST['submit'])){
        $title         = $_POST['title'];
        $email         =$_SESSION['email'];
        $description   =$_POST['description'];
        $date          =date('Y-m-d H:i:s');
        $checkbox      =$_POST['interests2']; 
        $uploaddir     = '/var/www/html/assignment6/uploads/';
        $uploadfile    =  $uploaddir.basename($_FILES['userfile']['name']);
        $image         =  $_FILES['userfile']['name'];
}

    ?>


     <h2 class="text-center text-danger">Sign Up</h2><br>
        <div class = "container">
          <div class = "row">
            <div class = "col-md-4 col-centered">
            
              <form name="myForm" class = "form-group" action="" method="post" onsubmit="validateForm()">
                <h4>
                  Locality:
                    <span class = "error">*</span>
                </h4>
                <input type="text" name="name" id = "name" class="form-control" placeholder="Name" value="<?php if(isset($_POST['name'])) { echo htmlentities ($_POST['name']); }?>"/ >
                <span class = "error"><?php echo $nameerr ;?></span>
                <h4>
                <h4>
                  Sub-Locality:
                    <span class = "error">*</span>
                </h4>
                <input type="text" name="name" id = "name" class="form-control" placeholder="Name" value="<?php if(isset($_POST['name'])) { echo htmlentities ($_POST['name']); }?>"/ >
                <span class = "error"><?php echo $nameerr ;?></span>
                <h4>
                 Mobile No:
                  <span class = "error">*</span>
                </h4> 
                <input type="text" name="cellno" id = "mobileNo" class="form-control" placeholder="Mobile" value="<?php if(isset($_POST['cellno'])) { echo htmlentities ($_POST['cellno']); }?>"/ >
                <span class = "error"><?php echo $mobileerr;?></span>
                  <h4>
                  Street Name:
                  <span class = "error">*</span>
                  </h4> 
                  <input type="text" name="email" class="form-control" placeholder="email" id = "email" value="<?php if(isset($_POST['StreetName'])) { echo htmlentities ($_POST['email']); }?>"/><span class = "error"><?php echo $emailerr;?></span>
                  
                    <h4>
                    City:
                      <span class = "error">*</span>
                    </h4> 
                    <input type="text" name="password" id = "password" class="form-control" placeholder="password" value="<?php if(isset($_POST['city'])) { echo htmlentities ($_POST['password']); }?>"/ >
                     <span class = "error"><?php echo $passworderr;?></span>

                      <h4>
                    Country:
                      <span class = "error">*</span>
                    </h4> 
                    <input type="text" name="password" id = "password" class="form-control" placeholder="password" value="<?php if(isset($_POST['city'])) { echo htmlentities ($_POST['password']); }?>"/ >
                     <span class = "error"><?php echo $passworderr;?></span>
                    
                   <input type="submit" name="submit" 
                   class="btn btn-primary center-block" id = "submitBtn" value = "Submit" >
                </form>
             </div>
          </div>
    </div>
      
    </body>
</html>