<?php
    require "credentials.php";
    $connection = mysqli_connect($host, $system, $password, $database);
    $response = array();
    $ID = $_POST['ID'];
    $Status = $_POST['Status'];
    $Date = date('m/d/y', strtotime('+1 day'));
    $sql1 = "UPDATE terminalschedule
             SET Status = 'Available'
             WHERE ID = '".$ID."'";
    $sql2 = "UPDATE terminalschedule
             SET Status = 'In-Transit'
             WHERE ID = '".$ID."'";
    $sql3 = "UPDATE terminalschedule
             SET Status = 'Unavailable'
             WHERE ID = '".$ID."'";
    $sql4 = "UPDATE terminalschedule
             SET Dispatch_Date = '".$Date."',
                 Status = 'Available',
                 Slots = '0',
                 A1 = '0',
                 A2 = '0',
                 A3 = '0',
                 A4 = '0',
                 B1 = '0',
                 B2 = '0',
                 B3 = '0',
                 B4 = '0',
                 C1 = '0',
                 C2 = '0',
                 C3 = '0',
                 C4 = '0',
                 D1 = '0',
                 D2 = '0',
                 D3 = '0',
                 D4 = '0',
                 E1 = '0',
                 E2 = '0',
                 E3 = '0',
                 E4 = '0',
                 F1 = '0',
                 F2 = '0',
                 F3 = '0',
                 F4 = '0',
                 G1 = '0',
                 G2 = '0',
                 G3 = '0',
                 G4 = '0',
                 H1 = '0',
                 H2 = '0',
                 H3 = '0',
                 H4 = '0',
                 I1 = '0',
                 I2 = '0',
                 I3 = '0',
                 I4 = '0',
                 J1 = '0',
                 J2 = '0',
                 J3 = '0',
                 J4 = '0',
                 K1 = '0',
                 K2 = '0',
                 K3 = '0',
                 K4 = '0',
                 L1 = '0',
                 L2 = '0',
                 L3 = '0',
                 L4 = '0',
                 M1 = '0',
                 M2 = '0',
                 M3 = '0',
                 M4 = '0',
                 M5 = '0'
             WHERE ID = '".$ID."'";
    if (isset($Status)) {
        if ($Status == 'Available') {
            mysqli_query($connection, $sql1);
            $response['ID'] = 1;
            echo json_encode($response);
        } else if ($Status == 'In-Transit') {
            mysqli_query($connection, $sql2);
            $response['ID'] = 2;
            echo json_encode($response);
        } else if ($Status == 'Unavailable') {
            mysqli_query($connection, $sql3);
            $response['ID'] = 3;
            echo json_encode($response);
        } else if ($Status == 'Purge') {
            $response['ID'] = 4;
            mysqli_query($connection, $sql4);
            echo json_encode($response);
        }
    }
?>