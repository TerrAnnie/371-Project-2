
<!DOCTYPE html>
<html>
<head>
    <style>
        h1 {
            color: black;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: 100px;
            margin: 10px;
        }

        div.a {
            position: relative;
            width: 400px;
            height: 200px;
            margin: 10px;
        }

        .divbio {
            background-color: lightblue;
            color: black;
            border: 2px solid black;
            margin: 50px;
            font-family: Courier New, Courier, monospace;
        }

        .signin {
            position: absolute;
            background-color: lightblue;
            color: black;
            border: 2px solid black;
            padding: 10px;
            right: 150px;
            width: 200px;
            height: 200px;
        }

        .info {
            background-color: lightcyan;
            border: 2px solid black;
            position: absolute;
            font-size: 20px;
            right: -950px;
            height: 250px;
            width: 300px;
            margin: 0.5px;
        }

        div.d {
            background-color: lightcyan;
            border: 2px solid black;
            position: absolute;
            right: -550px;
            height: 100px;
            width: 500px;
            margin: 0.5px;
        }
         table,th {
				border: 1px solid black;
				background-color: lightblue;
				
			}

			}

            table {
                width: 70%;
            }

            td {
                border: 1px solid black;
            }
        }
    </style>
</head>
<body>
    <center><h1>  Squid INC </h1></center>
    <div class="divbio">
        <h2> About us</h2>
        <p>
            Founded in 2006, we are a company dedicated to helping customers resell their unwanted items. All items listed on the website are verified by our moderators.
            In order to provide a safe environment, all sales are handled by our moderators and all the money made from the sale goes to the seller. We have seen our business grow
            since 2006 and we can't wait for it to grow even more.
        </p>
    </div>

    <div class="a">
        <div class="signin">
            <p> Logged in </p>

        </div>
        <div class="d">
            <h2> Welcome Back</h2> 


        </div>

        <div class="info">
            <ul>
             <a href= "Homepage1.php">HomePage </a><br>
               <a href= "CATSales.php"> Car and Truck Listings </a><br>
               <a href= "ELCSales.php"> Electronic Listings </a><br>
               <a href= "CCASales.php"> ChildCare Listings</a><br>
               <a href= "HOUSales.php"> Housing Listings</a><br>
              <a href = "Userslistings.php"> Your Listings </a> <br>
              <a href= "AddListing.php"> Add Listings</a><br>
              <a href = "logout.php" >  Logout</a> <br>

            </ul>
        </div>
    </div>
    <br>
 <div>
        <center><h2> <b> Your Recent Listings </b></h2> </center>
    </div>
    <div>
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
    <?php // this code wil output the  most recent active listings
		
				require_once 'connection.php';
                session_start();
                $username = $_SESSION['username'];
				$connection = mysqli_connect($db_hostname, $db_username,$db_password,$db_database);

				
				if (!$connection){
					die("Database access failed: " . mysqli_error($connection));
					}

				$query= "select Advertisement_ID, AdvTitle,AdvDetails,AdvDateTime,Price,Category_ID,User_ID,Moderator_ID, Status_ID from Advertisements";
				
				$result = mysqli_query($connection, $query);
				if(mysqli_num_rows($result)> 0){
                $rowcount = mysqli_num_rows($result);
                }
             
                if($rowcount > 3){ //if the row count is greater than 3 output
                $num = $rowcount - 3;
                $rowCount = 0;
               while ($row= mysqli_fetch_array($result)){
                        $rowCount +=1;
						if($row ['Status_ID'] == "AC" && $rowCount >= $num && $row['User_ID'] == $username ){
							echo "<tr><td>". $row['Advertisement_ID'] ."</td><td>" . $row['AdvTitle'] ."</td><td>" . $row['AdvDetails'] ."</td><td>" . $row['AdvDateTime'] ."</td><td>" . $row['Price'] ."</td><td>" 
						    . $row['User_ID'] ."</td><td>" . $row['Moderator_ID'] . "</td></tr>"; 
					
						}
					}
				}
                else{
                
					while ($row= mysqli_fetch_array($result)){//otherwise just output
                   
						if($row ['Status_ID'] == "AC"){
							echo "<tr><td>". $row['Advertisement_ID'] ."</td><td>" . $row['AdvTitle'] ."</td><td>" . $row['AdvDetails'] ."</td><td>" . $row['AdvDateTime'] ."</td><td>" . $row['Price'] ."</td><td>" 
						. $row['User_ID'] ."</td><td>" . $row['Moderator_ID'] . "</td></tr>"; 
					
						}
					}
                   
				}
            
              
		
					
					
					

				mysqli_close($connection);
				?>
                </table>
    </div>

</body>
</html>