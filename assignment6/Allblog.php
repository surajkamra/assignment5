<?php 
include('constant.php'); 
$recordperpage=10;
?>
<link href="style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
<?php
if(isset($_GET['pageno']))
{
  $mypage=$_GET['pageno'];
}
else
{
  $mypage=1;
}
$start=($mypage-1)*$recordperpage;
$result=mysqli_query($conn,"SELECT * FROM Blog WHERE Active='on' LIMIT $start, $recordperpage") or die(mysqli_error($conn));
?>
<table class="table">
   <tr>
      <th>Blog Title</th>
      <th>Date</th>
      <th>Image</th>
      <th>Email</th>
   </tr>
<?php
if (mysqli_num_rows($result) > 0) {
    while ($array = mysqli_fetch_assoc($result))
   { 
  ?>
        <tr> 
        <td><a href="test1.php?title=<?php echo $array['Title'];?>"><?php  echo $array['Title']; ?></a></td>
        <td><?php  echo $array['TitleDate'];;?></td>
        <td><img src="/assignment6/uploads/<?php echo $array['Image'];?>" width=50 height=30 ></td>
        <td><?php echo $array['Email']; ?></td>  
        </tr>
      
 <?php
    }
   echo "  </table>";
    $result=mysqli_query($conn,"SELECT * FROM Blog WHERE Active='on' ") or die(mysqli_error($conn));
    $num_rows=mysqli_num_rows($result);
    $pages=ceil($num_rows/$recordperpage);
    echo "<center>";
    for($i=1;$i<=$pages;$i++)
    {
      echo "<a href='Allblog.php?pageno=".$i."'>&nbsp".$i ."</a>";
    }
    echo "</center>";
  }
  ?>
    







































