<!DOCTYPE html>
<html>
   
    <head>
		  <link rel="stylesheet" href="../style.css">
	  </head>
    
    <nav class="navMenu">

        <form  method = "post">

        <label>Username: </label>
        <input type = "text" name = "username" id="ciao"> <br>

        <label>Password: </label>
        <input type = "password" name = "password" id="pwd"> <br>
    

        <button type = "submit" name = "insertData">Submit</button> <br>
            
        </form>
    </nav>

    <?php
        require_once('../connection.php');
        
        $username = "";
        $password = "";
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if(!empty($_POST['username']) && !empty($_POST['password'])) {

                $username = $_POST['username'];
                $password = $_POST['password'];
                $hashPassword = hash("sha256", $password);
                
                $sql = "SELECT * FROM users WHERE username = '$username' AND encrypted_password = '$hashPassword'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    if($username == "test" && $password == "test"){
                        session_start();
                        $_SESSION["username"] = 'test';
                        header("Location: ../menu.php");
                    }
                    exit;
                } else {
                    echo "username o password sbagliata";
                    mysqli_error($conn);
                }  
            } 
        }
        

        mysqli_close($conn);
    ?>

</html>
