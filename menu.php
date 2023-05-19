<?php
    require_once("./connection.php");
	//session_start();
	if(!isset($_SESSION['username'])){
		header('location: ./controller/index.php');
	}

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST["logout"])){
            session_destroy();
            header("location: ./controller/index.php");
        }
    }

?>
<!DOCTYPE html>
<html>

    <head>
		<link rel="stylesheet" href="style.css">
	</head>
    
    <body>
        <a href="model/add.php">add</a><br>
        <a href="visual/visual.php">table</a>
        
        <form method="POST">
			<button type = "submit" name = "logout">logout</button> <br>
		</form>

        
    </body>

</html>