<!DOCTYPE html>
<html>
    <head>
        <title>Interface for MySQL</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
    
    $id = $_POST["id"];
    
    
    if(strlen($id)>0)
    {
    $database = new mysqli('localhost','timohh97_admin1','449060data','timohh97_phpdata') or die();
    
    $queryForIdCheck = "Select id from user";
    
    $queryResult = $database -> query($queryForIdCheck);
    
    $idArray = Array();

           while($result = $queryResult->fetch_assoc())
           {
              $idArray[] = $result['id'];
           }

            foreach ($idArray as $element) {

               if($element==$id)
               {
                  $flag= true;
                  $query = "DELETE FROM user WHERE id='$id'";

                  $database->query($query);
                  echo "<script type='text/javascript'>alert('Delete request successful!')</script>";
                  echo "<script>window.location = 'index.php'</script>";  
               }
            }
            
            if(!$flag)
            {
                echo "<script type='text/javascript'>alert('Delete request not successful!')</script>";
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