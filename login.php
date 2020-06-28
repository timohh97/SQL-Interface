<!DOCTYPE html>
<html>
    <head>
        <title>Interface for MySQL</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
    
    $username = $_POST["username"];
    
    $password = $_POST["password"];
    
    
    if(strlen($username)>1)
    {
       if(strlen($password)>0)
       {
         
           $database = new mysqli('localhost','timohh97_admin1','449060data','timohh97_phpdata') or die();
            
           $queryForUsernameCheck = "SELECT username FROM user";

           $usernameColumn = mysqli_query($database,$queryForUsernameCheck);

           $usernameArray = Array();

           while($result = $usernameColumn->fetch_assoc())
           {
              $usernameArray[] = $result['username'];
           }

            foreach ($usernameArray as $element) {

               if($element==$username)
               {
                  $queryForRow = "SELECT * FROM user WHERE username='$username'";
               
               $row = mysqli_query($database,$queryForRow);
               
               $rowArray = mysqli_fetch_array($row);
               
               

                    if(password_verify($password,$rowArray[2])==true)
                    {
                          echo "<script type='text/javascript'>alert('Login successful!')</script>";
                       echo "<script>window.location = 'index.php'</script>"; 
                    }
                    else 
                    {
                           echo "<script type='text/javascript'>alert('Wrong password!')</script>";
                  echo "<script>window.location = 'index.php'</script>"; 
                    }
               }
            }
            
            
           echo "<script type='text/javascript'>alert('This username doesnt exist!')</script>";
           echo "<script>window.location = 'index.php'</script>"; 
            
          
         
       }
       else
       {
          echo "<script type='text/javascript'>alert('Please enter your password!')</script>";
           echo "<script>window.location = 'index.php'</script>";  
       }
    }
    else
    {
        echo "<script type='text/javascript'>alert('Please enter your username!')</script>";
        echo "<script>window.location = 'index.php'</script>";
    }
    
    
    ?> 
    
    
        
    </body>
</html>