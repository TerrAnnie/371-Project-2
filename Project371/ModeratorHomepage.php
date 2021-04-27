<?php
    session_start();
	require_once 'connection.php';

	$connection = mysqli_connect($db_hostname, $db_username,$db_password,$db_database);

	if (!$connection){
	 die("Database access failed: " . mysqli_error($connection));

	}

    $ID_Number= 0;
    $Status="";
    $ID_Numbererr=$Status_Err= "";
    $Moderator_ID = $_SESSION['username'];

     if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST['id_num'])){
    
            $ID_Number= "Please enter a number";
		}
        else{
          $ID_Number = isset($_POST['id_num'])?$_POST['id_num']:"";
          $query = "Select * from Advertisements where Advertisement_ID = '$ID_Number'";
          $result= mysqli_query($connection, $query);
          $row= mysqli_fetch_array($result);
          if(mysqli_num_rows($result)==0){
            $ID_Numbererr="This ID_Number doesn't exist";
		  }
         else{
      
          if($row['Status_ID'] != "PN"){
            $ID_Numbererr= "This ID_Doesn't need approval";
		  }
           if($row['User_ID'] == $Moderator_ID){
            $ID_Numbererr ="You can't edit your own listing";
		  }
          
         
         
		 }
         

      
      

		}

    if(empty($_POST['Status_ID'])){
    $Status_Err= "Please select a status";
	}
    else{
   
        $Status = isset($_POST['Status_ID'])?$_POST['Status_ID']:"";
        
       $Status_Err="";
	}

    if (empty($Status_Err) && empty($ID_Numbererr)){
        $Update_Query= "Update Advertisements Set Status_ID = '$Status' where Advertisement_ID = '$ID_Number'";
         $result = mysqli_query($connection, $Update_Query);
          $SetModQuery= "Update Advertisements Set Moderator_ID ='$Moderator_ID' where Advertisement_ID = '$ID_Number'";
          $result = mysqli_query($connection, $SetModQuery);
       
       
         if($result){
            echo "New record created successfully";
         } 
         else {
             echo "Error: " . $query. "<br>" . mysqli_error($connection);
            }
            header('Location: ModeratorHomePage.php');
			    if(!result){
				    die("database access denied") . mysqli_error($connection);
			    }
                
	}


     }

     mysqli_close ($connection);
     ?>
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
            height: 300px;
            width: 300px;
            margin: 0.5px;
        }

        div.d {
            background-color: lightcyan;
            border: 2px solid black;
            position: absolute;
            right: -550px;
            height: 200px;
            width: 500px;
            margin: 0.5px;
        }
        }
    </style>

    Squid INC
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
            <h2> Approve listings </h2>
            <form method = "post" action=" ">
                <label for "id_num"> Advertisement ID: </label> <br>
                <input type = "number" id = "id-num" name = "id_num"> <br>
                <label for "Status_ID" > Set Status:  </label> <br> 
                <select name ="Status_ID" id= "Status_ID">
                <option value = ""> Select... </option>
                <option value = "AC"> Active </option>
                <option value = "DI"> Disapprove</option>
                <input type="submit" value="Submit">
            </form>
             
             <?php
             echo"<p style = 'color:red'> $ID_Numbererr </p>";
             echo "<p style = 'color:red'> $Status_Err </p>";
             ?>

        </div>
    
   

        <div class="info">
            <ul>
                <a href= "Homepage1.php">HomePage </a><br>
               <a href= "CATSales.php"> Car and Truck Listings </a><br>
               <a href= "ELCsales.php"> Electronic Listings </a><br>
               <a href= "CCAsales.php"> ChildCare Listings</a><br>
               <a href= "HOUsales.php"> Housing Listings</a><br>
               <a href= "ModeratorsListings.php"> Listings You Manage</a><br>
               <?php 
               $role= $_SESSION['role'];
              
               if($role == 'MU'){
              
               echo "<a href= 'AddListing.php'> Add Listings</a> <br>";
               echo "<a href = 'Userslistings.php'> Your Listings </a> <br>";
                }
               
               
               
               ?>
              
               <a href ="ModeratorHomepage.php" >  Approve or Dissaprove Listings</a> <br>
               <a href = "logout.php" >  Logout</a> 

            </ul>
        </div>
    </div>

    
     <div>
         <br>
              <br>
               <br>   
              <br>
               <br>
           <center> <h2> Listings needed for approval </h2> </center>
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
				require_once 'connection.php';

				$connection = mysqli_connect($db_hostname, $db_username,$db_password,$db_database);

				if (!$connection){
					die("Database access failed: " . mysqli_error($connection));
					}

				$query= "select Advertisement_ID, AdvTitle,AdvDetails,AdvDateTime,Price,Category_ID,User_ID,Moderator_ID, Status_ID from Advertisements";
				
				$result = mysqli_query($connection, $query);
				if(mysqli_num_rows($result)> 0){
		
					while ($row= mysqli_fetch_array($result)){
						if($row ['Status_ID'] == "PN"){
							echo "<tr><td>". $row['Advertisement_ID'] ."</td><td>" . $row['AdvTitle'] ."</td><td>" . $row['AdvDetails'] ."</td><td>" . $row['AdvDateTime'] ."</td><td>" . $row['Price'] ."</td><td>" 
						. $row['User_ID'] ."</td><td>" . $row['Moderator_ID'] . "</td></tr>"; 
					
						}
						}
					
					

				}
				mysqli_close($connection);
				?>


        </div>


</body>
</html>
