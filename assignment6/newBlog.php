
<?php 
include('constant.php');
session_start();
if(!isset($_SESSION['email'])) {
header('Location: http://localhost/assignment6/Login.php'); // redirects them to homepage
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

if (empty($title) || ctype_alpha(str_replace(' ', '', $title)) === false) {
          $titleerr = 'title must contain letters and spaces only';
  }

if(empty($description)||!(preg_match('/^[a-z]/i', $description))){
          $descriptionerr="Incorrect description format";
 }

if(empty($image)){
         $imageerr="Please choose some file to upload";
  }

if(empty($titleerr || $descriptionerr || $imagerr )){

        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                
         } else {
                 echo "Possible file upload attack!\n";
                }
        
         $sql = "INSERT INTO Blog(Title,Email,Description,TitleDate,Image,Active) 
         VALUES ('$title','$email','$description ','$date','$image','$checkbox')";

          if (mysqli_query($conn, $sql)) {
              ?>
              <h3 class="text-center text-danger">Your Blog has Been Uploaded</h3><br><br>
             
              <?php
           } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
              
          mysqli_close($conn);

               
         
         }
       }

    ?>


      <h2 class="text-center text-danger">New Blog</h2><br>
        <div class = "container">
          <div class = "row">
            <div class = "col-md-4 col-centered">
              <form class = "form-group" action="" method="post" enctype="multipart/form-data">
                <h4>
                  Title:
                    <span class = "error">*</span>
                </h4>
                <input type="text" name="title" id = "name" class="form-control" placeholder="Title" / >
                <span class = "error"><?php echo $titleerr ;?></span>

                    <h4>
                    Description:
                      <span class = "error">*</span>
                    </h4> 
                    
                     <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
                     <span class = "error"><?php echo $descriptionerr;?></span>
                    
                   <h4>
                   Image:
                     <span class = "error">*</span>
                   </h4>
                   <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="userfile">
                   <span class = "error"><?php echo $imageerr;?></span><br>
                   <h4>
                   Active/Inactive:
                     <span class = "error">*</span>
                   </h4>
                    <input type="checkbox" name="interests2"   checked> Is Active
                   <span class = "error"><?php echo $checkboxerr;?></span><br>
                   
                   <input type="submit" name="submit" 
                   class="btn btn-primary center-block" id = "submitBtn" value = "Submit">
                </form>
             </div>
          </div>
    </div>
      
    </body>
</html>