<!DOCTYPE html>

<head>
    <title>Ticket Transaction Search</title>
    <link rel="stylesheet" type="text/css" href="administratorstyle.css">
</head>

<body>
    <div id="searchcontainer">
        <h2>TICKET TRANSACTIONS: SEARCH & FILTER</h2>
        <table id="table">
            <?php
                require "credentials.php";
                $test = "test";
                $search = $_GET["search"];
                $connection = mysqli_connect($host, $system, $password, $database);
                $sql = "SELECT * 
                        FROM tickettransactions 
                        WHERE Year LIKE '%".$search."%'
                        OR Month LIKE '%".$search."%'
                        OR Date LIKE '%".$search."%'
                        OR Time LIKE '%".$search."%'
                        OR Source LIKE '%".$search."%'
                        OR Username LIKE '%".$search."%'
                        OR Route LIKE '%".$search."%'
                        OR Bus_Number LIKE '%".$search."%'
                        OR Dispatch_Time LIKE '%".$search."%'
                        OR Dispatch_Date LIKE '%".$search."%'
                        OR Seats LIKE '%".$search."%'
                        OR Fare LIKE '%".$search."%'"; 
                $result = mysqli_query($connection, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo "<tr>
                            <th>YEAR:</th>
                            <th>MONTH:</th>
                            <th>DATE:</th>
                            <th>TIME:</th>
                            <th>SOURCE:</th>
                            <th>USERNAME:</th>
                            <th>ROUTE:</th>
                            <th>BUS#:</th>
                            <th>DISPATCH TIME:</th>
                            <th>DISPATCH DATE:</th>
                            <th>SEATS:</th>
                            <th>FARE:</th>
                            <th>STATUS:</th>
                          </tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row["Year"] . "</td>" .
                        "<td>" . $row["Month"] . "</td>" . 
                        "<td>" . $row["Date"] . "</td>" . 
                        "<td>" . date('h:i A', strtotime($row["Time"])) .  "</td>" .
                        "<td>" . $row["Source"] . "</td>" .
                        "<td>" . $row["Username"] . "</td>" .
                        "<td>" . $row["Route"] . "</td>" .
                        "<td>" . $row["Bus_Number"] . "</td>" .
                        "<td>" . date('h:i A', strtotime($row["Dispatch_Time"])) . "</td>" .
                        "<td>" . date('M/d', strtotime($row["Dispatch_Date"])) . "</td>" .
                        "<td>" . $row["Seats"] . "</td>" .
                        "<td>" . $row["Fare"] . "</td>" . 
                        "<td>" . $row["Status"] . "</td></tr>"; 
                    }
                } else {
                    echo "<tr><h1>0 RESULTS FOUND</h1></tr>";
                }
            ?>
        </table>
        <script src="jquery.min.js"></script>
        <script src="ddtf.js"></script>
        <script>
        var options = {
            minOptions: false,
        }
        $('#table').ddTableFilter(options);
        </script>
    </div>
</body>

</html>