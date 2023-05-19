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
        <nav class="navMenu">
            <a href="model/add.php">add</a>
            <a href="visual/visual.php">table</a>
            <a href="controller/logout.php">logout</a>  
        </nav>
    </body>

</html>