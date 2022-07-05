<!DOCTYPE html>

<head>
    <title>Load Transaction Search</title>
    <link rel="stylesheet" type="text/css" href="administratorstyle.css">
</head>

<body>
    <div id="searchcontainer">
        <h2>LOAD TRANSACTIONS: SEARCH & FILTER</h2>
        <table id="table">
            <?php
                require "credentials.php";
                $test = "test";
                $search = $_GET["search"];
                $connection = mysqli_connect($host, $system, $password, $database);
                $sql = "SELECT * 
                        FROM loadtransactions 
                        WHERE Year LIKE '%".$search."%'
                        OR Month LIKE '%".$search."%'
                        OR Date LIKE '%".$search."%'
                        OR Time LIKE '%".$search."%'
                        OR Source LIKE '%".$search."%'
                        OR Username LIKE '%".$search."%'
                        OR Amount LIKE '%".$search."%'"; 
                $result = mysqli_query($connection, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo "<tr>
                            <th>YEAR:</th>
                            <th>MONTH:</th>
                            <th>DATE:</th>
                            <th>TIME:</th>
                            <th>SOURCE:</th>
                            <th>USERNAME:</th>
                            <th>AMOUNT:</th>
                          </tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row["Year"] . "</th>" . 
                        "<td>" . $row["Month"] . "</th>" . 
                        "<td>" . $row["Date"] . "</th>" . 
                        "<td>" . date('h:i A', strtotime($row["Time"])) . "</td>" .
                        "<td>" . $row["Source"] . "</td>" . 
                        "<td>" . $row["Username"] . "</td>" .
                        "<td>" . $row["Amount"] . "</td></tr>";
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