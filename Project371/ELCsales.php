<!DOCTYPE html>
	<html>
	<head>
		<style>
			table,th {
				border: 1px solid black;
				background-color: lightblue;
				
			

			}

            table {
                width: 70%;
            }

            td {
                border: 1px solid black;
            }
			h1{
			font-size: 100px;
			
			}

		</style>

		<title> Electronic Advertisements</title>
	</head>
	<body>
	<center> <h1> Electronic Advertisements </h1> </center>
		<center>
			<table>
				<tr>
					<th> Advertisement ID </th>
					<th> Advertisement Name    </th>
					<th> Advertisement Description</th>
					<th> Date Posted</th>
					<th> Price</th>
					<th> Published By:</th>
					<th> Moderator</th>
				</tr>
		</center>
				<?php
				require_once 'login.php';

				$connection = mysqli_connect($db_hostname, $db_username,$db_password,$db_database);

				if (!$connection){
					die("Database access failed: " . mysqli_error($connection));
					}

				$query= "select Advertisement_ID, AdvTitle,AdvDetails,AdvDateTime,Price,Category_ID,User_ID,Moderator_ID, Status_ID from Advertisements";
				
				$result = mysqli_query($connection, $query);
				if(mysqli_num_rows($result)> 0){
		
					while ($row= mysqli_fetch_array($result)){
						if($row['Category_ID']== "ELC" && $row ['Status_ID'] == "AC"){
							echo "<tr><td>". $row['Advertisement_ID'] ."</td><td>" . $row['AdvTitle'] ."</td><td>" . $row['AdvDetails'] ."</td><td>" . $row['AdvDateTime'] ."</td><td>" . $row['Price'] ."</td><td>" 
						. $row['User_ID'] ."</td><td>" . $row['Moderator_ID'] . "</td></tr>"; 
					
						}
						}
					
					

				}
				mysqli_close($connection);
				?>







	</body>
</html>

	