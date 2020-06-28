<!DOCTYPE html>
<html>
    <head>
        <title>Interface for MySQL</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
    <form method="POST" action="register.php">
        <input type="text" name="username" placeholder="New username">
        <br>
        <input type="password" name="password" placeholder="Password">
        <br>
        <input type="password" name="repeat" placeholder="Repeat password">
        <br>
        <button type="submit">Register</button>
    </form>
    <form id="loginform" method="POST" action="login.php">
        <input type="text" name="username" placeholder="Your username">
        <br>
        <input type="password" name="password" placeholder="Your password">
        <br>
        <button type="submit">Login</button>
    </form>
     <form id="updateform" method="POST" action="update.php">
        <input type="text" name="id" placeholder="Enter id/primary key">
        <br>
        <input type="text" name="username" placeholder="New username">
        <br>
        <input type="password" name="password" placeholder="New password">
        <br>
        <button type="submit">Update data</button>
    </form>
     <form id="deleteform" method="POST" action="delete.php">
        <input type="text" name="id" placeholder="Enter id/primary key">
        <br>
        <button type="submit">Delete</button>
    </form>
    <?php
    $database = new mysqli('localhost','timohh97_admin1','449060data','timohh97_phpdata') or die();
    
    
    $query = "SELECT * FROM user";

    $queryResult= $database->query($query);


    echo "<div id='container'><h2>Database</h2><table border='1'>";
    echo '<tr><td>Id</td><td>Username</td><td>Password (Hashed)</td></tr>';
    while($result = $queryResult->fetch_assoc())
    {
       	echo '<tr> <td>' . $result['id'] . '</td> <td>' . $result['username'] . '</td> <td>'.$result['password'].'</td> </tr>';
    }
    echo '</table></div>';
    
    
    ?> 
    
    
        
    </body>
</html>