<?php
    require "credentials.php";
    $id = $_GET['id']; 
    $connection = mysqli_connect($host, $system, $password, $database);
    $sql = "DELETE FROM commuteraccounts 
            WHERE ID = '".$id."'";
    mysqli_query($connection, $sql);
    header("Location:administratorcommuters.php");
    exit();
?>