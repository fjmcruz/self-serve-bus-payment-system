<?php
    session_start();
    require "credentials.php";
    $test = "test";
    $username = $_SESSION['username'];
    $newpassword = $_POST['newpassword'];
    $connection = mysqli_connect($host, $system, $password, $database);
    $sql = "UPDATE employeeaccounts 
            SET Password = '".$newpassword."' 
            WHERE Username = '".$username."'"; 
    mysqli_query($connection, $sql);
    echo "<script>alert('You have successfully changed your password!');
          window.close();</script>";
    exit();
?>