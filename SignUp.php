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
       
            background-color: lightblue;
            color: black;
            border: 2px solid black;
            padding: 10px;
            right: 150px;
            width: 400px;
            height: 400px;
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
   

    <div class="a">
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

	require_once 'login.php';

	$connection = mysqli_connect($db_hostname, $db_username,$db_password,$db_database);

	if (!$connection){
	 die("Database access failed: " . mysqli_error($connection));

	}

	$fname=$lname=$username =$pwd= $confirmpwd=" ";
    $usernameerr= $passworderr= $confirmpwderr= $fnameerr=$lnameerr="not empty";
    if($_SERVER["REQUEST_METHOD"] == "POST"){

 

		
		    if(empty($_POST['fname'])){
			    echo "Please fill out the first name field";
                 echo "<br>";
            
		    }
		    else{
			    $fname= isset ($_POST['fname']) ?$_POST['fname']:"";
               $fnameerr="";
		    }
		    if(empty($_POST['lname'])){
			    echo "Please fill out the last name field";
                 echo "<br>";
		    }
		    else{
			    $lname= isset ($_POST['lname']) ?$_POST['lname']:"";
                $lnameerr="";

		    }
		    if(empty($_POST['username'])){
			    echo "Please fill out the username field\n";
                 echo "<br>";
                
		    }
            
		    else{
                
               
                $usernameerr="";
               
                
		    }
		    if(empty($_POST['pwd'])){
			    echo "Please fill out the password field\n";
                echo "<br>";
		    }
		    else{
			    $pwd= isset ($_POST['pwd']) ?$_POST['pwd']:"";
                $passworderr="";
            
			    }
          
            if (isset($_POST['Conpwd'])){
            if(empty($_POST['Conpwd'])){

			    echo "Please fill out the confirm password field";
                 echo "<br>";
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
               $password = password_hash($pwd, PASSWORD_DEFAULT);
			    $sql= "Insert into Users(User_ID, UserFirst_Name, UserLast_Name, User_Pass) values ('$username','$fname', '$lname', '$pwd')";
			    $result= mysqli_query($connection, $sql);
                if (mysqli_query($connection, $sql)) {
                    echo "New record created successfully";
                    } 
                    else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                    }
			     $_SESSION['username']= $username;
                header('Location: UserHomePage.php');
			    if(!result){
				    die("database access denied") . mysqli_error($connection);
			    }
		    }
            else{
          
            echo"$usernameerr";
            echo" why $passworderr";
           
			}
            

}







mysqli_close($connection);

?>
