<!DOCTYPE html>
<html>
    <head>
        <title>Interface for MySQL</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
    
    $newusername = $_POST["username"];
    
    $password = $_POST["password"];
    
    $repeatedPassword = $_POST["repeat"];
    
    
    if(strlen($newusername)>1)
    {
     if(!checkIfUsernameExists($newusername))
      {
       if(strlen($password)>5)
       {
          if($password == $repeatedPassword)
          {
              
            $database = new mysqli('localhost','timohh97_admin1','449060data','timohh97_phpdata') or die();
            
            $id = rand();
            
            $passwordHashed = password_hash($password,PASSWORD_DEFAULT);

            $queryForInsert = "INSERT INTO user (id,username,password) VALUES ('$id','$newusername','$passwordHashed')";

            $database->query($queryForInsert);
            
            echo "<script type='text/javascript'>alert('Created new account successfully!')</script>";
            echo "<script>window.location = 'index.php'</script>"; 
          }
          else
          {
           echo "<script type='text/javascript'>alert('The passwords dont match!')</script>";
           echo "<script>window.location = 'index.php'</script>"; 
          }
       }
       else
       {
          echo "<script type='text/javascript'>alert('Please enter at least 6 characters for the password!')</script>";
           echo "<script>window.location = 'index.php'</script>";  
       }
      }
      else
      {
          echo "<script type='text/javascript'>alert('This username already exists!')</script>";
        echo "<script>window.location = 'index.php'</script>";
      }
    }
    else
    {
        echo "<script type='text/javascript'>alert('Please enter at least 2 characters for the username!')</script>";
        echo "<script>window.location = 'index.php'</script>";
    }
  
    
    function checkIfUsernameExists($username)
    {
        $database = new mysqli('localhost','timohh97_admin1','449060data','timohh97_phpdata') or die();
        
        $query = "SELECT username FROM user";
        
        $queryResult = $database -> query($query);
        
        $array = Array();
        
         while($result = $queryResult->fetch_assoc())
           {
              $array[] = $result['username'];
           }
         
         foreach($array as $element)
         {
             if($element == $username)
             {
                 return true;
             }
         }
         
         return false;
        
        
    }
    
    
    ?> 
    
    
        
    </body>
</html>