
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
   
   <form method="post" action="add_listing.php">
   <table>
           <tr><td>Advertisement ID: </td><td><input type="int" name="Advertisement_ID"></td></tr>
           <tr><td>Advertisement Title: </td><td><input type="varchar" name="AdvTitle"></td></tr>
           <tr><td>Advertisement Details: </td><td><input type="varchar" name="AdvDetails"></td></tr>
           <tr><td>Advertisement Time: </td><td><input type="date" name="AdvDateTime"></td></tr>
           <tr><td>Price: </td><td><input type="float" name="Price"></td></tr>
           <tr><td>User ID: </td><td><input type="varchar" name="User_ID"></td></tr>
           <tr><td>Moderator ID: </td><td><input type="varchar" name="Moderator_ID"></td></tr>
           <tr><td>Category ID: </td><td><input type="varchar" name="Category_ID"></td></tr>
           <tr><td>Status ID: </td><td><input type="varchar" name="Status_ID"></td></tr>
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
