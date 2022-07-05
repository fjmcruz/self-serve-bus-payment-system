<!DOCTYPE html>

<head>
    <title>Commuter Search</title>
    <link rel="stylesheet" type="text/css" href="cashierstyle.css">
</head>

<body>
    <div id="searchcontainer">
        <table>
            <?php
                require "credentials.php";
                $test = "test";
                $search = $_GET["search"];
                $connection = mysqli_connect($host, $system, $password, $database);
                $sql = "SELECT * FROM commuteraccounts 
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
                         </tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row["Username"] . "</td>" . 
                        "<td>" . $row["Name"] . "</td>" .
                        "<td>" . $row["Email"] . "</td>" .
                        "<td>" . $row["Contact"] . "</td>" . 
                        "<td>" . $row["Balance"] . "</td></tr>";
                    }
                } else {
                    echo "<tr><h1>0 RESULTS FOUND</h1></tr>";
                }
            ?>
        </table>
    </div>
</body>

</html>