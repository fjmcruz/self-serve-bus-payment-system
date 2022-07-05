<!DOCTYPE html>

<head>
    <title>Load</title>
    <link rel="stylesheet" type="text/css" href="formstyle.css">
</head>

<body>
    <div>
        <form action="loadaction.php" class="form" method="POST">
            <h2>LOAD BALANCE</h2>
            <table>
                <tr>
                    <th>USERNAME:</th>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <th>BALANCE:</th>
                    <td><input type="number" name="balance" min="1" max="10000"></td>
                </tr>
            </table>
            <input type="submit" name="submit" class="button" value="SUBMIT">
        </form>
    </div>
</body>

</html>