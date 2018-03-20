<link rel="stylesheet" href="style.css" type="text/css">
<?php

class crud 
{

    function __construct() 
    {
        //include_once 'database.php';
        $connect = mysqli_connect('localhost', 'root', '','class');
        if(mysqli_connect_error($connect))
        {
            echo ' Not Connected';
     
        }

    }
        
        public function insert($fname, $lname, $email, $username, $password)
        {
            //echo'hello';
            //exit();
            //include_once 'database.php';
            if(isset($_POST['submit']))
            {
            $connect = mysqli_connect('localhost', 'root', '','class');
            $sql = mysqli_query($connect, "INSERT INTO user (`first_name`, `last_name`, `email`, `username`, `password`) "
                                . "VALUES ('$fname', '$lname', '$email', '$username', '$password')");
                if ($sql)
                {
                    header("Location: index.php?Status=User Added");
                    
                    
                }
            }
        }
        public function display()
        { 
            $connect = mysqli_connect('localhost', 'root', '','class');
            ?>
            <title>Display Page</title>
            <h1>Displaying Record</h1> 
            <table border="2">
            <tr>   
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>User Name</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>
            </tr>    

            <?php
            $sql = mysqli_query($connect,"SELECT * FROM `user`");
            while( $data = mysqli_fetch_array($sql))
            {
            ?>
            <tr>
                <td> <?php echo $data['id'];?></td>
                <td> <?php echo $data['first_name'];?></td>
                <td> <?php echo $data['last_name'];?></td>
                <td> <?php echo $data['email'];?></td>
                <td> <?php echo $data['username'];?></td>
                <td> <?php echo $data['password'];?></td>
                <td> <a href="edit.php?id=<?php echo $data['id'];?>">Edit</a></td>
                <td> <a href="delete.php?id=<?php echo $data['id'];?>">Delete</a></td>
                



            </tr>
            <?php
            }
            ?>
            </table>
            <br/>

<?php

        }
        
        public function delete() 
        {
            $connect = mysqli_connect('localhost', 'root', '','class');
            $id= $_GET['id'];
            $delete = mysqli_query($connect,"DELETE FROM `user` WHERE id='$id'");
            header("location:read.php");
            
            
        }
        
        public function edit() 
        {
            $connect = mysqli_connect('localhost', 'root', '','class');
            $id = $_GET['id'];
            $mad = mysqli_query($connect, "SELECT * FROM user WHERE id =  '$id' ");

            $check = mysqli_fetch_array($mad);


            if(isset($_POST['submit'])) {
                $fname = mysqli_real_escape_string($connect, $_POST['first_name']);
                $lname = mysqli_real_escape_string($connect, $_POST['last_name']);
                $email = mysqli_real_escape_string($connect, $_POST['email']);
                $username = mysqli_real_escape_string($connect, $_POST['username']);
                $password = mysqli_real_escape_string($connect, $_POST['password']);


                mysqli_query($connect, "UPDATE `user` SET `first_name`='$fname',`last_name`='$lname',`email`='$email',`username`='$username',`password`='$password' WHERE id='$id'");

                        if (mysqli_affected_rows($connect) > 0) {
                        header("location:read.php");
                    } else {
                        echo "<b>Record Not Edited</b><br />";
                        echo mysqli_error($connect);
                    }

            }
            ?>
            <form method="post">
                <h1>Edit Page</h1>
                <label style="text-align: center">First Name</label>
                <input type="text" name="first_name" value="<?php echo $check['first_name']; ?>" placeholder="Enter First Name" required/> <br/>
                <label style="text-align: center">Last Name</label>
                <input type="text" name="last_name" value="<?php echo $check['last_name']; ?>" placeholder="Enter Last Name" required/> <br/>
                <label style="text-align: center">Email:</label>
                <input type="email" name="email"  value="<?php echo $check['email']; ?>" placeholder="Enter Email" required/><br/>
                <label style="text-align: center">Username</label>
                <input type="text" name="username" value="<?php echo $check['username']; ?>" placeholder="Enter User Name" required/> <br/>
                <label style="text-align: center">Password:</label>
                <input type="password" name="password"  value="<?php echo $check['password'];?>" placeholder="*************" required/><br/>

                <input type="submit" value="Submit" name="submit">
                <a href="read.php"> <input type="button" value="Cancel"> </a>
            </form>
<?php
        }
}