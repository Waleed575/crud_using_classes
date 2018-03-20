<html>
    <link rel="stylesheet" href="style.css" type="text/css">
    <head>
         <title>Add User Page</title>
    </head>
    <body>
        <form method="POST" action="insert.php">
            
            <label>First Name</label>
            <input type="text" name="first_name" placeholder="Enter First Name" required/></br>
            <label>Last Name</label>
            <input type="text" name="last_name" placeholder="Enter Last Name"required/></br>
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter Email"required/></br>
            <label>User Name</label>
            <input type="text" name="username" placeholder="Enter Username"required/></br>
            <label>Password</label>
            <input type="password" name="password" placeholder="***************"required/></br>
            <input type="submit" name="submit" value="Submit">
            <a href="read.php"><input class="button" type="button" value="Display Page" ></a>
            <a href="main.php"><input class="button" type="button" value="Back to Main Page" ></a>
            
            
                    
        </form>
    </body>
</html>
