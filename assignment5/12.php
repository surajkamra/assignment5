<?php include('constant.php');
$result = mysqli_query("SELECT * FROM Medicine ")or trigger_error(mysqli_error());
 while ($array = mysqli_fetch_array($result, MYSQLI_ASSOC))
  echo $array['Medicine'];
?>

