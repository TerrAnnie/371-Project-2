<!DOCTYPE html>
<html>
<head>
    <style>
        div.signin {
            margin: auto;
            width : 50%;
            background-color: lightblue;
            color: black;
            border: 2px solid black;
            padding: 10px;
            right: 150px;
            width: 200px;
            height: 200px;
        }
    </style>
</head>
<body>
    <div class="signin">
        <form method="post" action="">
            <h2> <b>Sign in</b> </h2>
            <label for="username"> Username: </label><br>
            <input type="text" id="username" name="username"><br>
            <label for="pwd">Password: </label><br>
            <input type="password" id="pwd" name="pwd"><br>
            <input type="submit" value="Submit">
            </form>
    </div>
</body>
</html>

<?php
    session_start();
	require_once  'connection.php';
	include 'sanitization.php';
	include 'alert.php';
	$connection = mysqli_connect($db_hostname, $db_username,$db_password,$db_database);

	if (!$connection)
        die("Database access failed: " . mysqli_error($connection));


	$username = "";//define variables
    $role="";//the users role in database 
    $pwd= "";
    $usernameerr= $passworderr= " ";//errors
		
     

	if(isset($_POST['username']) & !empty($_POST['username'])){//get the username
       $username = $_POST['username'];
   }
           

    
	if(isset($_POST['pwd'])){//get the passowrd
        $pwd = $_POST['pwd'];
	}
		

    if($username != "" && $pwd != ""){//as long as username and password aren't empty continue
    sanitizeString($username);
    sanitizeString($pwd);
    $Ucount = 0;//User count
    $Mcount = 0;//Moderator Count
    $PassCheck = false;//bool to check if the password has been checked
      $sql_query = "select count(*) as cntMod from Moderators where User_ID = '$username'";
      //we need to use the count to test if user_id was found in Users or Moderators or both
    
       $result= mysqli_query($connection, $sql_query);
        $row = mysqli_fetch_array($result);
         $Mcount += $row['cntMod'];//add to count

       $sql_query = "select count(*) as cntUser from Users where User_ID ='".$username."'"; 
       $result= mysqli_query($connection, $sql_query);
        $row = mysqli_fetch_array($result);
        $Ucount += $row['cntUser'];//add to count
    

        if ($Ucount == 1){//Checks the stored hash password in users 
            $query = "Select * from Users where User_ID = '$username' ";
             $result= mysqli_query($connection, $query);
             $row = mysqli_fetch_array($result);
             $password = $row['User_Pass'];
             if (password_verify($pwd, $password)){
                $PassCheck = true;
             
			 }

        
		}
         elseif ($Mcount == 1){//Checks the stored hash password in moderators 
            $query = "Select * from Moderators where User_ID = '$username' ";
             $result= mysqli_query($connection, $query);
             $row = mysqli_fetch_array($result);
             $password = $row['User_Pass'];
             if (password_verify($pwd, $password)){
                $PassCheck = true;
             
			 }

        
  

     

        
		}
        if ($Ucount == 1 && $Mcount == 0 && $PassCheck){//Check if they're only a user'
            
            $_SESSION['username']= $username;
            $_SESSION['role']= "U";
            header('Location: UserHomePage.php');
        }
        if ($Mcount== 1 && $Ucount ==1 && $PassCheck){//Check if they're both a user and a mod'
            $_SESSION['username']= $username;
            $_SESSION['role']= "MU";
            header('Location: ModeratorHomePage.php');
        }

        if ($Mcount==1 && $Ucount == 0 && $PassCheck){//Check if they're only a mod'
            $_SESSION['username']= $username;
            $_SESSION['role']= "M";
            header('Location: ModeratorHomePage.php');
        
		}

       if (!$PassCheck){//invalid password
            function_alert("Invalid login credentials");
		}

         
        
       

    
	}
   
  

	?>