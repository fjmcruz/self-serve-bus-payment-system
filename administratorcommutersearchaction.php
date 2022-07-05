<!DOCTYPE html>

<head>
    <title>Commuter Search</title>
    <link rel="stylesheet" type="text/css" href="administratorstyle.css">
</head>

<body>
    <div id="searchcontainer">
        <h2>COMMUTERS: SEARCH & FILTER</h2>
        <table id="table">
            <?php
                require "credentials.php";
                $test = "test";
                $search = $_GET["search"];
                $connection = mysqli_connect($host, $system, $password, $database);
                $sql = "SELECT * 
                        FROM commuteraccounts 
                        WHERE Username LIKE '%".$search."%'
                        OR Name LIKE '%".$search."%'
                        OR Email LIKE '%".$search."%'
                        OR Contact LIKE '%".$search."%'
                        OR Balance LIKE '%".$search."%'"; 
                $result = mysqli_query($connection, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo "<tr>
                            <th>USERNAME</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>CONTACT#:</th>
                            <th>BALANCE</th>
                            <th>ACTION:</th>
                         </tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row["Username"] . "</td>" . 
                        "<td>" . $row["Name"] . "</td>" .
                        "<td>" . $row["Email"] . "</td>" .
                        "<td>" . $row["Contact"] . "</td>" . 
                        "<td>" . $row["Balance"] . "</td>" .
                        "<td>" . "<a href='removecommuter.php?id=".$row["ID"]."' class='delete'>REMOVE</a>" . "</td></tr>";
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