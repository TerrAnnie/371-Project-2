
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
            height: 100px;
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
            <h2> Newest Listings </h2> 


        </div>

        <div class="info">
            <ul>
             <a href= "Homepage1.php">HomePage </a><br>
               <a href= "CATSales.php"> Car and Truck Listings </a><br>
               <a href= "ELCSales.php"> Electronic Listings </a><br>
               <a href= "CCASales.php"> ChildCare Listings</a><br>
               <a href= "HOUSales.php"> Housing Listings</a><br>
              <a href = "Userslistings.php"> Your Listings </a> <br>
              <a href= "AddListing.php"> Add Listings</a><br>
              <a href = "logout.php" >  Logout</a> <br>

            </ul>
        </div>
    </div>
    <br>

    <center><h2> <b> Todays Listings </b></h2> </center>

</body>
</html>