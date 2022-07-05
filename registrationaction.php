<?php
    require "credentials.php";
    $Fullname = $_POST['fullname'];
    $Email = $_POST['email'];
    $Contact = $_POST['contact'];
    $connection = mysqli_connect($host, $system, $password, $database);
    $Username = mysqli_real_escape_string($connection, $_POST['username']);
    $Password = mysqli_real_escape_string($connection, $_POST['password']);
    $Type = 'Commuter';
    $Balance = '0';
?>

<!DOCTYPE html>

<head>
    <title>S.S.B.P.S | Register</title>
    <link rel="stylesheet" type="text/css" href="errorstyle.css">
    <meta name="viewport" content="initial-scale=0.8, maximum-scale=0.8">
</head>

<body>
    <div>
        <?php
            $sql = "SELECT Username, Email 
                    FROM commuteraccounts
                    WHERE Username LIKE '%".$Username."%'
                    OR Email LIKE '%".$Email."%'
                    UNION
                    SELECT Username, Email
                    FROM employeeaccounts
                    WHERE Username LIKE '%".$Username."%'
                    OR Email LIKE '%".$Email."%'";
            $result = mysqli_query($connection, $sql);
            if (mysqli_num_rows($result) == 0) {
                $sql = "INSERT INTO commuteraccounts (Type, Username, Password, Balance, Name, Email, Contact, Ticket, Bus_Number, Route, Dispatch_Time, Dispatch_Date, Seats, Status)
                        VALUES ('".$Type."', '".$Username."', '".$Password."', '".$Balance."', '".$Fullname."', '".$Email."', '".$Contact."', '', '', '', '', '', '', '')";
                mysqli_query($connection, $sql);
                echo "<h1>Registration successful!</h1>";
                $success = 1;
            } else if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($Username == $row["Username"]) {
                        echo "<h1>Username already exists!</h1>";
                    }
                    else if ($Email == $row["Email"]) {
                        echo "<h1>Email already exists!</h1>";
                    }
                }
                $succes = 0;
            }
        ?>
        <input type="<?php if ($success == 1) {echo"button";} else {echo"hidden";} ?>" name="goback" class="button" value="GO BACK" onclick="window.location.href='index.php'">
        <input type="<?php if ($success == 0) {echo"button";} else {echo"hidden";} ?>" name="goback" class="button" value="GO BACK" onclick="window.location.href='registration.php'">
    </div>
</body>

</html>