<?php
	require_once("../connection.php");
    if(!isset($_SESSION['username'])){
        header('location: ../controller/index.php');
    }
    
?>

<!DOCTYPE html>
<html>

	<head>
		<link rel="stylesheet" href="../style.css">
	</head>

    <body>
        <?php      
            
            $sqlReadData = "SELECT * FROM clients";
			$result = mysqli_query($conn, $sqlReadData);
				
			echo "<table align='center'>";
			if (mysqli_num_rows($result) > 0) {
				
				while($row = mysqli_fetch_assoc($result)) {

					echo '<tr>';
					foreach ($row as $data) {
						echo "<td>".$data."</td>";
					}
					echo "<td><a href = '../model/delete.php?id=".$row['id']."'>Delete</a></td>";
					echo "<td><a href = '../model/edit.php?id= ".$row["id"]."&"."firstname= ".$row["firstname"]."&"."lastname= ".$row["lastname"]."&"."email= ".$row["email"]."'>Edit</a></td>";
					echo "</tr>";
				}
			} else {
				echo "0 results";
			}
			echo "</table>";

            mysqli_close($conn);
        ?>

		<div id="oke">
			<a href="../menu.php">
				<button type="submit" name="anulla">Back</button>
			</a>
		</div>

       
    </body>
</html>