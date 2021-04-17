
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
            height: 100px;
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
        <div class="signin">
            <form method="post" action="homepage1.php">
                <h2> <b>Sign in</b> </h2>
                <label for="username"> Username: </label><br>
                <input type="text" id="username" name="username"><br>
                <label for="pwd">Password: </label><br>
                <input type="password" id="pwd" name="pwd"><br>
                <input type="submit" value="Submit">
            </form>

        </div>
        <div class="d">
            <h2> Newest Listings </h2>


        </div>

        <div class="info">
            <ul>
                <li>Current listings</li>

                <li>Ask us a question</li>

                <a href="SignUp.php"><button>Sign Up</button></a>

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

	$username = "";
    $pwd= "";
    $usernameerr= $passworderr= " ";
		
     

	if(isset($_POST['username']) & !empty($_POST['username'])){
       $username = $_POST['username'];
   }
           

    
	if(isset($_POST['pwd'])){
        $pwd = $_POST['pwd'];
	}
		

    if($username != "" && $pwd != ""){
         $sql_query = "select count(*) as cntUser from Users where User_ID ='".$username."' and User_Pass='".$pwd."'";
        $result= mysqli_query($connection, $sql_query);
        $row = mysqli_fetch_array($result);
        $count = $row['cntUser'];
        if ($count> 0){
            $_SESSION['username']= $username;
            header('Location: UserHomePage.php');
    
	    }
        
        else {
         $passworderr= "Invalid Log in Credentials";
         echo "$passworderr";
    
	    }

    
	}
   

	?>