

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

        .signin {
            margin: auto;
            width : 50%;
            background-color: lightblue;
            color: black;
            border: 2px solid black;
            padding: 10px;
            right: 150px;
            width: 200px;
        }
    </style>

  
</head>
<body>

        <div class="signin">
            <form method="post" action="">
                <h2> <b>Sign up</b> </h2>
                 <label for="fname"> First Name: </label> <br>
                <input type="text" id="fname" name="fname"> <br>
                <label for="lname"> Last Name </label> <br>
                <input type="text" id="lname" name="lname"> <br>
                <label for="username"> Username: </label> <br>
                <input type="text" id="username" name="username"> <br>
                <label for="pwd">Password: </label><br>
                <input type="password" id="pwd" name="pwd"><br>
                <label for="Conpwd">Confirm Password: </label><br>
                <input type="password" id="Conpwd" name="Conpwd"><br>
                <input type="submit" value="Submit">
            </form>

        </div>
        
   
</body>
</html>
<?php
    session_start();
	require_once 'connection.php';
    include 'sanitization.php';
    include 'alert.php';

	$connection = mysqli_connect($db_hostname, $db_username,$db_password,$db_database);

	if (!$connection){
	 die("Database access failed: " . mysqli_error($connection));

	}

	$fname=$lname=$username =$pwd= $confirmpwd=" ";
    $usernameerr= $passworderr= $confirmpwderr= $fnameerr=$lnameerr="not empty";
    if($_SERVER["REQUEST_METHOD"] == "POST"){

 

		
		    if(empty($_POST['fname'])){
                function_alert("Please fill out the first name field");
            
		    }
		    else{
		        $fname= isset ($_POST['fname']) ?$_POST['fname']:"";
               $fnameerr="";
		    }
		    if(empty($_POST['lname'])){
                function_alert("Please fill out the last name field");
		    }
		    else{
			    $lname= isset ($_POST['lname']) ?$_POST['lname']:"";
                $lnameerr="";
		    }
		    if(empty($_POST['username'])){
                function_alert("Please fill out the username field");
                
		    }
            
		    else{
                 
			    $username= isset ($_POST['username']) ?$_POST['username']:"";
			    sanitizeString($username);
                $query_find= "Select User_ID from Users where User_ID = '$username'";
                $result= mysqli_query($connection, $query_find);
                if(mysqli_num_rows($result)>0){
                    function_alert("This User ID is already in use. Please try again");
				}
                $query_find= "Select User_ID from Moderators where User_ID = '$username'";
                $result= mysqli_query($connection, $query_find);
                 if(mysqli_num_rows($result)>0){
                    function_alert("This User ID is already in use. Please try again");
				}
                
                else{
                 $usernameerr="";
				}
               
               
               
                
		    }
		    if(empty($_POST['pwd'])){
                function_alert("Please fill out the password field");
		    }
             if(strlen($_POST['pwd'])< 8){
                 function_alert("Please enter a password at least 8 characters long");
			}
          
		    else{
			    $pwd= isset ($_POST['pwd']) ?$_POST['pwd']:"";
                $passworderr="";
            
			    }
           
            if(isset($_POST['Conpwd'])){
            if(empty($_POST['Conpwd'])){
			    function_alert("Please fill out the confirm password field");
                }
            
		    else{
		    $confirmpwd= isset ($_POST['Conpwd']) ?$_POST['Conpwd']:"";
            $confirmpwderr="";

		    }
		    if($pwd != $confirmpwd){
			    echo "Password confirmation doesn't match";
                 echo "<br>";
                 $confirmpwderr="";
		    }
            
			}
            
		    
		   
		    if(empty($usernameerr)&& empty($passworderr) && empty($confirmpwderr) && empty($lnameerr) && empty($fnameerr)){
			   echo "Working";
			   sanitizeString($pwd);
			   sanitizeString($confirmpwd);
			   sanitizeString($lname);
			   sanitizeString($fname);
			   sanitizeString($username);
               $password = password_hash($pwd, PASSWORD_DEFAULT, array  ('cost' => 12));
			    $sql= "Insert into Users(User_ID, UserFirst_Name, UserLast_Name, User_Pass) values ('$username','$fname', '$lname', '$password')";
			    $result= mysqli_query($connection, $sql);
                if (mysqli_query($connection, $sql)) {
                    echo "New record created successfully";
                    } 
                    else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                    }
			    $_SESSION["username"] = $username;
                 $_SESSION["role"] = "U";
                header('Location: userhomepage.php');
			    if(!result){
				    die("database access denied") . mysqli_error($connection);
			    }
		    }
            
            

}
mysqli_close($connection);

?>
