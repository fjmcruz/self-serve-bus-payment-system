<!DOCTYPE html>

<head>
    <title>Add Employee</title>
    <link rel="stylesheet" type="text/css" href="formstyle.css">
</head>

<body>
    <div>
        <form action="addemployeeaction.php" class="form" method="POST">
            <h2>ADD EMPLOYEE</h2>
            <table>
                <tr>
                    <th>TYPE:</th>
                    <td><input type="radio" id="administrator" name="type" value="Administrator" required>
                        <label for="administrator">Administrator</label><br>
                        <input type="radio" id="cashier" name="type" value="Cashier">
                        <label for="cashier">Cashier</label><br>
                        <input type="radio" id="busconductor" name="type" value="Bus Conductor">
                        <label for="busconductor">Bus Conductor</label>
                    </td>
                </tr>
                <tr>
                    <th>USERNAME:</th>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <th>PASSWORD:</th>
                    <td><input type="text" name="password" required></td>
                </tr>
                <tr>
                    <th>NAME:</th>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <th>E-MAIL:</th>
                    <td><input type="text" name="email" required></td>
                </tr>
                <tr>
                    <th>CONTACT#:</th>
                    <td><input type="tel" name="contact" required></td>
                </tr>
            </table>
            <input type="submit" name="submit" class="button" value="SUBMIT">
        </form>
    </div>
</body>

</html>