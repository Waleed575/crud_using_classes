<?php

$connect = mysqli_connect('localhost', 'root', '','class');
//$db = mysqli_select_db($connect, 'class');
 if(mysqli_connect_error($connect))
 {
     echo ' Not Connected';
     
 }
