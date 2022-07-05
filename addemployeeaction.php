<?php
    require "credentials.php";
    $test = "test";
    $Type = $_POST['type'];
    $Username = $_POST['username'];
    $Password = $_POST['password'];
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Contact = $_POST['contact'];
    $connection = mysqli_connect($host, $system, $password, $database);
    $sql = "INSERT INTO employeeaccounts (Type, Username, Password, Name, Email, Contact)
            VALUES ('$Type', '$Username', '$Password', '$Name', '$Email', '$Contact')"; 
    mysqli_query($connection, $sql);
    echo "<script>window.close();</script>";
    exit();
?>