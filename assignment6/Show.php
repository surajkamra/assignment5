<?php
include('constant.php');
$recordperpage=2;
?>
<?php

$title = $_GET['title'];

$result=mysqli_query($conn,"SELECT * FROM Blog WHERE Title='$title' ") or die(mysqli_error($conn));
$array = mysqli_fetch_assoc($result);
$image = $array['Image'];
?>



<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    


<table class="table table-inverse">
   <tr>
      <th>Blog Title</th>
      <th>Image</th>
      <th>Description </th>
      <th>Active</th>
    </tr>
   <?php
  
   { ?>
        <tr> 
        <td><?php echo $array['Title']; ?></td> 
        <td><img src="/assignment6/uploads/<?php echo $image;?>" width=50 height=30></td> 
        <td><?php  echo $array['Description'];?></td> 
        <td><?php  echo $array['Active']; ?></td> 
        </tr>
        </table>
    <?php
    

   }

    

    ?>