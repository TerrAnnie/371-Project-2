<?php
    session_start();

	require_once 'connection.php';
     include 'sanitization.php';
	$connection = mysqli_connect($db_hostname, $db_username,$db_password,$db_database);

	if (!$connection)
	 die("Database access failed: " . mysqli_error($connection));

	
    $Adv_Title = $Adv_Descrp= $Category= " "; //most of this code is setting defaults
    
    $Adv_Price = 0;
    $TitleErr= $Adv_PriceErr= $AdvDescpErr= $CatError= "";
    $User_ID = $_SESSION["username"];//set the user_id so we can tell who this listing belongs to 
    $TodayDate= date("Y-m-d");
    $Sumbmited= "These Items have been succesfuly submitted";
    $SubmittedCheck = false;
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){//majority of the code is testing to see if any fields are empty if they are empty throw an error
     
     if(empty($_POST['AdvTitle'])){
        $TitleErr= "Please enter an Advertisement title";

     
	 }
     else{
        $Adv_Title=isset($_POST['AdvTitle'])?$_POST['AdvTitle']:"";
        $Adv_Title = addslashes($Adv_Title);//to prevent any kind of error
        sanitizeString($Adv_Title);
        $TitleErr= "";

     
	 }
     if(empty($_POST['AdvDetails'])){
       $AdvDescpErr ="Please enter the Advertisments details";
     
	 }
     else{
        $Adv_Descrp=isset($_POST['AdvDetails'])?$_POST['AdvDetails']:"";
        $Adv_Descrp = addslashes($Adv_Descrp);//to prevent errors from occuring when apostorphes are entered
        sanitizeString($Adv_Descrp);
        $AdvDescpErr="";

     
	 }
     if(empty($_POST['Price'])){
        $Adv_PriceErr = "Please enter a Price";
     
	 }
     else{
        $Adv_Price=isset($_POST['Price'])?$_POST['Price']:"";
       
       $Adv_PriceErr= "";

     
	 }
   
      if(empty($_POST['Category_ID'])){
        $CatError = "Please select a Category";
     
	 }
     else{
     $CatError= "";
    
 
        $Category=isset($_POST['Category_ID'])?$_POST['Category_ID']:"";
        
     
	 }
     if (empty($CatError)&& empty($Adv_PriceErr)&& empty($AdvDescpErr)&& empty($TitleErr)){//check if the error var are empty 
      $SubmittedCheck = true;//essentialy used to output error messages
    
    
        $SQL= "Insert Into Advertisements(AdvTitle, AdvDetails, AdvDateTime, Price,Category_ID,User_ID,Moderator_ID,Status_ID) values ("; //insert into database 
        $SQL.="'".$Adv_Title."','".$Adv_Descrp."','".$TodayDate."','".$Adv_Price."','".$Category."', '".$User_ID."', 'Null', 'PN')";

        $result = mysqli_query($connection, $SQL);
        if($result){
            echo "New record created successfully";
            header('Location: Userslistings.php'); //send the user to userlistings
         } 
         else {
             echo "Error: " . $SQL. "<br>" . mysqli_error($connection);
            }
        
               
			    if(!$result){
				    die("database access denied") . mysqli_error($connection);
			    }
        
		

    }
    }
    
     
      
		

     
   
	 

  

   
mysqli_close($connection);
    
?>






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
            height: 300px;
            width: 300px;
            margin: 0.5px;
        }
        div.d {
            background-color: lightcyan;
            border: 2px solid black;
            position: absolute;
            right: -550px;
           
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
            Founded in 2006, we are a company dedicated to helping customers resell their unwanted items. All items listed on the website or verfied by our moderators.
            In order to provide a safe enviorment all sells are handled by our moderators, and all the money made from the sell goes to the seller. We have seen our business grow
            since 2006 and we can't wait for it to grow even more
        </p>
    </div>
    <div class="a">
        <div class="signin">
            <p> Logged in </p>
        </div>
        <div class="d">
          
            <center><h2> <b> Create New Advertisement </b></h2> 
   
   <form method="POST" action="">
   <table>
           <tr><td>Advertisement Title: </td><td><input type="varchar" name="AdvTitle"></td></tr>
           <tr><td>Advertisement Details: </td><td><input type="text" name="AdvDetails"></td></tr>
        
           <tr><td>Price: </td><td><input type="number" step= ".01" name="Price"></td></tr>
           <tr><td>Category ID: </td><td>
           <select name="Category_ID">
           <option value= "">Select.. </option>
           <option value= "CAT"> Cars and Trucks </option>
           <option value= "HOU"> Housing </option>
           <option value= "ELC"> Electronics </option>
           <option value= "CCA"> Child Care</option>
           </select>
           </td></tr>
         
          
           <tr><td><input type="submit" value="Submit"></td><td></td>
       </table>

   </form>
     <?php
           echo "<p style = 'color:red'> $TitleErr </p>" ; //output error messages
           echo "<p style = 'color:red'> $AdvDescpErr </p>" ;
           echo "<p style = 'color:red'> $Adv_PriceErr </p>" ;
           echo "<p style = 'color:red'> $CatError </p>" ;
           if ($SubmittedCheck){
           echo "$Sumbmited <br>";

           }
           
           
           
           ?>
</center>
        </div>
        
        <div class="info">
            <ul>
                 <a href= "Homepage1.php">HomePage </a><br>
               <a href= "CATsales.php"> Car and Truck Listings </a><br>
               <a href= "ELCsales.php"> Electronic Listings </a><br>
               <a href= "CCAsales.php"> ChildCare Listings</a><br>
               <a href= "HOUsales.php"> Housing Listings</a><br>
                <?php //depending on the role of the user we may only want them to view certain things so users will only be able to add listings our view their listings
               
               $role= $_SESSION['role'];
               if($role == 'MU' || $role == 'U'){
               echo "<a href= 'AddListing.php' Add Listings</a> <br>";
               echo "<a href = 'Userslistings.php'> Your Listings </a> <br>";
                }
                if($role == 'M' || $role == 'MU'){//technically a mod should never be on this page but just in case
                echo " <a href ='ModeratorHomepage.php' >  Approve or Dissaprove Listings</a> <br>";
                echo " <a href= 'ModeratorsListings.php'> Moderator Listings </a><br>";
				}
               
               
               
               ?>
                 
              <a href= "AddListing.php"> Add Listings</a><br>
               <a href = "logout.php" >  Logout</a> 
            </ul>
        </div>
    </div>
    <br>
    
</body>
</html>