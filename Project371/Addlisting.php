<?php
    session_start();

	require_once 'login.php';

	$connection = mysqli_connect($db_hostname, $db_username,$db_password,$db_database);

	if (!$connection)
	 die("Database access failed: " . mysqli_error($connection));

	
    $Adv_Title = $Adv_Descrp= $Category_ID= " ";
    
    $Adv_Price = 0;
    $TitleErr= $Adv_PriceErr= $AdvDescpErr= $CatError= "Not empty";
    $User_ID = $_SESSION["username"];
    $TodayDate= date("Y-m-d");
    
    
     
     if(empty($_POST['AdvTitle'])){
        echo "Please enter an Advertisement title";
     
	 }
     else{
        $Adv_Title=isset($_POST['AdvTitle'])?$_POST['AdvTitle']:"";
        $TitleErr= "";

     
	 }
     if(empty($_POST['AdvDetails'])){
        echo "Please enter the Advertisments details";
     
	 }
     else{
        $Adv_Descrp=isset($_POST['AdvDetails'])?$_POST['AdvDetails']:"";
        $AdvDescpErr="";

     
	 }
     if(empty($_POST['Price'])){
        echo "Please enter a Price";
     
	 }
     else{
        $Adv_Price=isset($_POST['Price'])?$_POST['Price']:"";
       $Adv_PriceErr= "";

     
	 }
   
      if(empty($_POST['Category_ID'])){
        echo "Please select a Category";
     
	 }
     else{
     $CatError= "";
    
 
        $Category_ID=isset($_POST['Category_ID'])?$_POST['Category_ID']:"";
        if($Category_ID == "Cars and Trucks"){
            $Category_ID = "CAT";
		}
        if($Category_ID == "Housing"){
            $Category_ID = "HOU";
		}
        if($Category_ID == "Electronics"){
            $Category_ID = "ELC";
		}
        if($Category_ID == "Child Care"){
            $Category_ID = "CCA";
		}
     
	 }
     if (empty($CatError)&& empty($Adv_PriceErr)&& empty($AdvDescpErr)&& empty($TitleErr)){
    
        $query= "Insert Into Advertisements(AdvTitle, AdvDetails, AdvDateTime, Price,Category_ID,User_ID,Moderator_ID,Status_ID) values 
        ('$Adv_Title','$Adv_Descrp', '$TodayDate', 
        '$Adv_Price', '$Category_ID',
        '$User_ID',
        'Null', 'AC')";
        $result = mysqli_query($connection, $query);
        if($result){
            echo "New record created successfully";
         } 
         else {
             echo "Error: " . $query. "<br>" . mysqli_error($connection);
            }
        
                header('Location: AddListing.php');
			    if(!result){
				    die("database access denied") . mysqli_error($connection);
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
            height: 100px;
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
        
           <tr><td>Price: </td><td><input type="float" name="Price"></td></tr>
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
</center>
        </div>
        
        <div class="info">
            <ul>
                <li>Current listings</li>
                <li>Ask us a question</li>
                <li> Sign up</li>
            </ul>
        </div>
    </div>
    <br>
    
</body>
</html>