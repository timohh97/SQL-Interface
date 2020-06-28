<!DOCTYPE html>
<html>
    <head>
        <title>Interface for MySQL</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
    
    $id = $_POST["id"];
    $newusername = $_POST["username"];
    $newpassword = $_POST["password"];
    
    
    if(strlen($id)>0)
    {
    $database = new mysqli('localhost','timohh97_admin1','449060data','timohh97_phpdata') or die();
    
    $queryForIdCheck = "Select id from user";
    
    $queryResult = $database -> query($queryForIdCheck);
    

           while($row = mysqli_fetch_row($queryResult))
           {
              
           

           

               if($id==$row[0])
               {
                  $flag= true;
                  
                  if(strlen($newusername)>1)
                  {
                  $query = "UPDATE user SET username='$newusername' WHERE id='$id'";

                  $database->query($query);
                  }
                  
                  
                  
                  if(strlen($newpassword)>5)
                  {
                      
                  $hashedPassword = password_hash($newpassword,PASSWORD_DEFAULT);   
                      
                  $query = "UPDATE user SET password='$hashedPassword' WHERE id='$id'";

                  $database->query($query);
                  }
                  
                  
                  
                  echo "<script type='text/javascript'>alert('Update request successful!')</script>";
                  echo "<script>window.location = 'index.php'</script>";  
               }
            
           }
            if(!$flag)
            {
                echo "<script type='text/javascript'>alert('Update request not successful!')</script>";
                  echo "<script>window.location = 'index.php'</script>"; 
            }
    
    
    }
    else
    {
        echo "<script type='text/javascript'>alert('Please enter a primary key!')</script>";
            echo "<script>window.location = 'index.php'</script>";
    }
    
    
    ?> 
    
    
        
    </body>
</html>