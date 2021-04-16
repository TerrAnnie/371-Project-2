<?php
    require_once 'login.php';//include the connection file
    $connection = mysqli_connect($db_hostname, $db_username,$db_password,$db_database);
 
    if (!$connection)
       die("Unable to connect to MySQL: " . mysqli_connect_errno());
    $Advertisement_ID=isset($_POST['Advertisement_ID'])?$_POST['Advertisement_ID']:"";
    $AdvTitle=isset($_POST['AdvTitle'])?$_POST['AdvTitle']:"";
    $AdvDetails=isset($_POST['AdvDetails'])?$_POST['AdvDetails']:"";
    $AdvDateTime=isset($_POST['AdvDateTime'])?$_POST['AdvDateTime']:"";
    $Price=isset($_POST['Price'])?$_POST['Price']:"";
    $User_ID=isset($_POST['User_ID'])?$_POST['User_ID']:"";
    $Moderator_ID=isset($_POST['Moderator_ID'])?$_POST['Moderator_ID']:"";
    $Category_ID=isset($_POST['Category_ID'])?$_POST['Category_ID']:"";
    $Status_ID=isset($_POST['Status_ID'])?$_POST['Status_ID']:"";

    $SQL = "INSERT INTO Advertisements(Advertisement_ID,AdvTitle,AdvDetails,AdvDateTime,Price,User_ID,Moderator_ID,Category_ID,Status_ID) VALUES(";
    $SQL.="'".$Advertisement_ID."', '".$AdvTitle."', '".$AdvDetails."', '".$Price."', '".$Category_ID."', '".$Moderator_ID."', '".$User_ID."','".$Status_ID."')";
    $result = mysqli_query($connection,$SQL);
    if (!$result) //if the query fails
    die("Database access failed: " . mysqli_error($connection));

    if($Advertisement_ID !=''&& $AdvTitle !='' && $AdvDetails !=''&& $Price !=''&& $Category_ID !=''&& $Moderator_ID !=''&& $User_ID !='' && $Status_ID !='' )
    {
    header("Location:record_added_successfully.php");
    }

