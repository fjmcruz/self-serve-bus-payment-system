<!DOCTYPE html>

<head>
    <title>Add Route</title>
    <link rel="stylesheet" type="text/css" href="formstyle.css">
</head>

<body>
    <div>
        <form action="addrouteaction.php" class="form" method="POST">
            <h2>ADD ROUTE</h2>
            <table>
                <tr>
                    <th>ROUTE:</th>
                    <td><input type="text" name="route"></td>
                </tr>
                <tr>
                    <th>DISPATCH TIME:</th>
                    <td><input type="time" name="dispatch_time"></td>
                </tr>
                <tr>
                    <th>FARE:</th>
                    <td><input type="number" name="fare"></td>
                </tr>
                <tr>
                    <th>BUS NUMBER:</th>
                    <td><input type="number" name="bus_number"></td>
                </tr>
            </table>
            <input type="submit" name="submit" class="button" value="SUBMIT">
        </form>
    </div>
</body>

</html>