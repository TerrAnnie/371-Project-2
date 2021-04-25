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
            height: 100px;
            width: 500px;
            margin: 0.5px;
        }
        }
    </style>

  
</head>
<body>
    <center><h1>  Squid INC </h1></center>
    <div class="divbio">
        <h2> About us</h2>
        <p>
            Founded in 2006, we are a company dedicated to helping customers resell their unwanted items. All items listed on the website or verfied by our moderators.
            In order to provide a safe enviorment all sells are handled by our moderators, and all the money made from the sell goes to the seller. We have seen our business grow
            since 2006 and we can't wait for it to grow even more
        </p>
    </div>

    <div class="a">
        <div class="d">
            <h2> Weekly Updates:</h2>
            <p> The Sky is still very much blue </p>


        </div>

        <div class="info">
            <ul>
                <a href= "CATSales.php"> Car and Truck Listings </a><br>
               <a href= "ELCSales.php"> Electronic Listings </a><br>
               <a href= "CCASales.php"> ChildCare Listings</a><br>
               <a href= "HOUSales.php"> Housing Listings</a><br>
               <?php

                    session_start();
                    $role = '';
                    if(!isset($_SESSION['role'])){
                        $role = "G";
					}
                    else{
                    $role = $_SESSION['role'];
                    
					}
                    
                    if($role == 'G'){
                        echo "<a href='login.php'><button>Log in</button></a>";
                        echo "<a href='SignUp.php'><button>Sign Up</button></a>";
                    
					}
                    elseif($role == 'MU' || $role == 'M'){
                        echo "<a href='ModeratorHomepage.php'> UserHomepage </a>";
                    
					}
                    else{
                        echo "<a href='UserHomepage.php'> UserHomepage </a>";
                    
					}
          

               
                ?>

            </ul>
        </div>
    </div>
    <br>

    <center><h2> <b> Todays Listings </b></h2> </center>
    mysqli_close($connection);
</body>
</html>
<?php
	require_once  'connection.php';
	$connection = mysqli_connect($db_hostname, $db_username,$db_password,$db_database);

	if (!$connection)
        die("Database access failed: " . mysqli_error($connection));
?>
