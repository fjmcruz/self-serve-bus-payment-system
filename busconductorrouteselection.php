 <?php
    require "credentials.php";
    $connection = mysqli_connect($host, $system, $password, $database);
    $response = array();
    $sql = "SELECT ID, Route, Dispatch_Time, Bus_Number, Status
            FROM terminalschedule
            ORDER BY Dispatch_Time ASC";
    $result = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $array[] = $row;
    }
    echo json_encode($array, JSON_FORCE_OBJECT);
?>