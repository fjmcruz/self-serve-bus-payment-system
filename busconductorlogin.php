<?php
    require "credentials.php";
    $connection = mysqli_connect($host, $system, $password, $database);
    $response = array();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT Type, Username, Password
            FROM employeeaccounts
            WHERE Type = 'Bus Conductor' AND Username = '".$username."' AND Password = '".$password."'";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) == 1) {
        $response['ID'] = "1";
        echo json_encode($response);
    } else {
        $response['ID'] = "0";
        echo json_encode($response);
    }
    print_r($array);
?>