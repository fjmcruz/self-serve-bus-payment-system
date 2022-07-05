<?php
    date_default_timezone_set('Asia/Manila');
    require "credentials.php";
    $test = "test";
    $Route = $_POST['route'];
    $Dispatch_Time = $_POST['dispatch_time'];
    $Dispatch_Date = date("m/d/y");
    $Fare = $_POST['fare'];
    $Bus_Number = $_POST['bus_number'];
    $connection = mysqli_connect($host, $system, $password, $database);
    $sql = "INSERT INTO terminalschedule (Route, Dispatch_Time, Dispatch_Date, Fare, Bus_Number, Slots, Status,
            A1, A2, A3, A4, B1, B2, B3, B4, C1, C2, C3, C4, D1, D2, D3, D4, E1, E2, E3, E4, F1, F2, F3, F4, G1, G2, G3, G4, H1, H2, H3, H4, I1, I2, I3, I4, J1, J2, J3, J4, K1, K2, K3, K4, L1, L2, L3, L4, M1, M2, M3, M4, M5) 
            VALUES ('".$Route."', '".$Dispatch_Time."', '".$Dispatch_Date."', '".$Fare."', '".$Bus_Number."', '0', 'Available', 
            '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')"; 
    mysqli_query($connection, $sql);
    echo "<script>window.close();</script>";
    exit();
?>