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
    $count = 0;
      $sql_query = "select count(*) as cntMod from Moderators where User_ID ='".$username."' and User_Pass='".$pwd."'";
       $result= mysqli_query($connection, $sql_query);
        $row = mysqli_fetch_array($result);
         $count += $row['cntMod'];
          $sql_query = "select count(*) as cntUser from Users where User_ID ='".$username."' and User_Pass='".$pwd."'";
        
       $result= mysqli_query($connection, $sql_query);
        $row = mysqli_fetch_array($result);
     
        $count += $row['cntUser'];
        echo "$count";
        if ($count == 1){
            $_SESSION['username']= $username;
            header('Location: UserHomePage.php');
        }
        if ($count== 2){
            $_SESSION['username']= $username;
            header('Location: ModeratorHomePage.php');
        }

       

          else {
         $passworderr= "Invalid Log in Credentials";
         echo "$passworderr";
    
	    }
     
        
       

    
	}
   
  

	?>