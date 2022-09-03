<?php
    include "validate_customer.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);              # allows the special characters to be considered as a part of the string and saved in the database as a string
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);              #fetch last name from html form via POST Method
    $acno = mysqli_real_escape_string($conn, $_POST["acno"]);               #  ....account info
    $email = mysqli_real_escape_string($conn, $_POST["email"]);               #  ....email of user
    $phno = mysqli_real_escape_string($conn, $_POST["phno"]);                   #.....phome no. of user

    $id = $_SESSION['loggedIn_cust_id'];                                        #contains all session varibale

    $sql0 = "SELECT cust_id FROM customer WHERE first_name='".$fname."' AND              #...selects cust_id column fron customer TABLE where....data as fetched from html form
                                                last_name='".$lname."' AND
                                                account_no='".$acno."' AND
                                                email='".$email."' AND
                                                phone_no='".$phno."'";
    $result = $conn->query($sql0);                                     #php oops way of sending query...performs query against database 

    $success = 0;
    if ($result->num_rows > 0) {                                     #returns number of rows
        $row = $result->fetch_assoc();                              # fetches a result row as an associative array.
        $beneficiary_id = $row["cust_id"];

        if ($id != $beneficiary_id) {                                
            $sql1 = "INSERT INTO beneficiary".$id." VALUES(
                        NULL,
                        '$beneficiary_id',
                        '$email',
                        '$phno',
                        '$acno'
                    )";

            if (($conn->query($sql1) === TRUE)) {          #if found its true set success to 1
                $success = 1;
            }
        }
        else {
            $success = -1;
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="action_style.css">
</head>

<body>
    <div class="flex-container">
        <div class="flex-item">
            <?php   
            if ($success == 1) { ?>                                          #if success==1 add user
                <p id="info"><?php echo "Beneficiary successfully added !\n"; ?></p>
            <?php } ?>

            <?php
            if ($success == 0) { ?>
                <p id="info"><?php echo "Invalid data entered/Connection error !\n"; ?></p>
            <?php } ?>

            <?php
            if ($success == -1) { ?>
                <p id="info"><?php echo "Can't add self as beneficiary !\n"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <a href="/beneficiary.php" class="button">Go Back</a>
        </div>
    </div>

</body>
</html>
