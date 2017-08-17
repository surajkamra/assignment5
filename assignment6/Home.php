<?php
include('constant.php');
$recordperpage=6;
?>
<?php
  session_start();
  $mailid=$_SESSION['email'];
  $result=mysqli_query($conn,"SELECT Name FROM Signup WHERE Email='$mailid' ") or die(mysqli_error());
  $row = mysqli_fetch_assoc($result);
 $login_session =$row['Name'];
if(!isset($login_session)){
  mysqli_close($connection); 
  header('Location: http://localhost/assignment6/Login.php'); // 
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Your Home Page</title>
      <link href="style.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div id="profile">
  <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
  <b id="logout"><a href="logout.php">Log Out</a></b>
  <h3 class = "text-center"><a href="newBlog.php">Create New Blog</a></h3>
  <h3 class = "text-center" color="Red"><?php echo $login_session; ?> Blogs</a></h3>
  </div>
</body>
</html>
<?php
if(isset($_GET['pageno']))
{
  $mypage=$_GET['pageno'];
}
else
{
  $mypage=1;
}


?>

<table class="table">
   <tr>
      <th>Title</th>
     <th>TitleDate </th>
      <th>Active</th>
      <th>Email</th>
      <th>Delete</th>
  </tr>

 <?php
   $mailid=$_SESSION['email'];
   $start=($mypage-1)*$recordperpage;
   $result = mysqli_query($conn, "SELECT * FROM Blog WHERE Email='$mailid' LIMIT $start ,$recordperpage ") or die(mysqli_error($conn));
   if (mysqli_num_rows($result) > 0) {
    while ($array = mysqli_fetch_assoc($result)){ 
  ?>
        <tr> 
          <td><a href="test1.php?title=<?php echo $array['TitleDate'];?>"><?php  echo $array['Title']; ?></a></td>
          <td><?php  echo $array['TitleDate']; ?></td> 
          <td><?php  echo $array['Active']; ?></td>
          <td><?php  echo $array['Email']; ?></td>
          <td><a href="delete.php?title=<?php echo $array['TitleDate'] ;?>">Delete</a></td>
        </tr>
      
 <?php
    }
    echo "  </table>";
    $result=mysqli_query($conn,"SELECT * FROM Blog WHERE Email='$mailid' ") or die(mysqli_error($conn));
    $num_rows=mysqli_num_rows($result);
    $pages=ceil($num_rows/$recordperpage);

    echo "<center>";
    for($i=1;$i<=$pages;$i++)
    {
      echo "<a href='Home.php?pageno=".$i."' aria-label=Previous>&nbsp".$i ."</a>";
    }
    echo "</center>";
  


}

 ?>