<?php
include_once 'classes.php';
include 'database.php';

if(isset($_POST['submit']))
    {
 
        $fname = mysqli_real_escape_string($connect, $_POST['first_name']);
        $lname = mysqli_real_escape_string($connect, $_POST['last_name']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);
        $crud = new crud();
        $crud->insert($fname, $lname, $email, $username, $password);

    }


