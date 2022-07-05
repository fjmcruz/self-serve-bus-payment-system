<?php
    date_default_timezone_set('Asia/Manila');
    require "credentials.php";
    $connection = mysqli_connect($host, $system, $password, $database);
    $response = array();
    $Bus_Number = $_POST['Bus_Number'];
    $Dispatch_Time = $_POST['Dispatch_Time'];
    $Date = date("m/d");
    $sql = "SELECT *
            FROM tickettransactions
            WHERE Bus_Number = '".$Bus_Number."' AND Dispatch_Time = '".$Dispatch_Time."' AND Dispatch_Date = '".$Date."' AND Status = 'Verified'";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    } else {
        $array[] = null;
    }
    echo json_encode($array, JSON_FORCE_OBJECT);
?>