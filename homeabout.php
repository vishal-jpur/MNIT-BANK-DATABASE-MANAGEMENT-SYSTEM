<?php
    include "header.php";
    include "navbar.php";

    if (isset($_GET['loginFailed'])) {
        $message = "Invalid Credentials ! Please try again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home_style.css">
</head>

<body>
    <div class="flex-container-background">
       

        <div class="flex-container">
             <div class="flex-item-2">
                <h1 id="form_header">Make your online banking experience wonderful</h1>
                
                <img src="images/homepage.gif" style="height:580px;margin-left: 20px;">
            </div>

            <div class="flex-item-3" style=" margin-top: 200px;">
               <button style="width: 300px; height: 70px;"> <a href="./admin_home.php" style="font-family: cursive;text-decoration: none; color: white; font-size: 25px;">Manager Login</a></button><br>
                 <button style="width: 300px; height: 70px;"><a href="./admin_home.php" style="font-family: cursive;text-decoration: none;color: white;font-size: 25px">Cashier Login</a></button><br>
               <button style="width: 300px; height: 70px;"> <a href="./home.php" style="font-family: cursive;text-decoration: none;color: white;font-size: 25px">User Login   </a></button>
            </div>
        </div>
       
        
    </div>


    

</body>
</html>

<?php include "easter_egg.php"; ?>
