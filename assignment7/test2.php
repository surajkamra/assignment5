<?php
$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
$random_string_length=8;
 $string = '';
 $max = strlen($characters) - 1;
 for ($i = 0; $i < $random_string_length; $i++) {
      $string .= $characters[mt_rand(0, $max)];
 }
 echo $string;
