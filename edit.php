<?php
    //session_start();
    if(!isset($_SESSION['username'])){
        header('location: ../controller/index.php');
    }

    
?>


<!DOCTYPE html>

<html>
    
    <head>
		<link rel="stylesheet" href="style.css">
	</head>


    <body>
        
        <form method="post">    
            <label>Nome: </label>
            <input type="text" name="firstname" id="ciao" value='<?php echo $_GET["firstname"]; ?>'><br>

            <label>Cognome: </label>
            <input type="text" name="lastname" id="ciao" value='<?php echo $_GET["lastname"]; ?>'><br>
            
            <label>Email: </label>
            <input type="text" name="email" id="ciao" value='<?php echo $_GET["email"]; ?>'><br>
            
            <button type="submit" id="submit">Submit</button>
        
        </form>

        <?php
           require_once("../connection.php");
           
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$email = $_POST['email'];
                
                
                    $sql = "UPDATE clients  SET firstname = '$firstname', lastname='$lastname', email='$email' WHERE id= " . $_GET["id"];
                
                if(mysqli_query($conn, $sql)) {
                    echo "Record updated successfully";
                    header("location: ../visual/visual.php");
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
                
            }    
            
        ?>

        
        
    </body>


</html>