<?php
    session_start();
    date_default_timezone_set('Asia/Manila');
    require "credentials.php";
    $test = "test";
    $username=$_SESSION['username'];
    $Username = $_POST['username'];
    $Balance = $_POST['balance'];
    $Year = date("Y");
    $Month = date("m");
    $Date = date("d");
    $Time = date("H:i");
    $Source = "Cashier: " . $username;
    $connection = mysqli_connect($host, $system, $password, $database);
    $sql1 = "SELECT Username
             FROM commuteraccounts
             WHERE Username = '".$Username."'";
    $sql2 = "UPDATE commuteraccounts
             SET Balance = Balance + '".$Balance."'
             WHERE Username = '".$Username."'";
    $sql3 = "INSERT INTO loadtransactions (Year, Month, Date, Time, Source, Username, Amount)
             VALUES ('".$Year."', '".$Month."', '".$Date."', '".$Time."', '".$Source."', '".$Username."', '".$Balance."')";
    $result = mysqli_query($connection, $sql1);
    if (mysqli_num_rows($result) == 0) {
        echo "<script>window.location.href='userdoesnotexist.php'</script>";
    } else {
        mysqli_query($connection, $sql2);
        mysqli_query($connection, $sql3);
        echo "<script>window.close();</script>";
        exit();
    }
?>