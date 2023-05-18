<!DOCTYPE html>
<html>

	<head>
		<link rel="stylesheet" href="../style.css">
	</head>

    <body>
        <?php      
            require_once("../connection.php");

            $sqlReadData = "SELECT * FROM clients";
			$result = mysqli_query($conn, $sqlReadData);
				
			echo "<table>";
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

       
    </body>
</html>