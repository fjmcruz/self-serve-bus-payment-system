<!DOCTYPE html>

<head>
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="formstyle.css">
</head>

<body>
    <div>
        <form action="employeepasswordaction.php" class="form" method="POST">
            <h2>CHANGE PASSWORD</h2>
            <table>
                <tr>
                    <th>NEW PASSWORD:</th>
                    <td><input type="password" name="newpassword" id="newpassword" required></td>
                </tr>
                <tr>
                    <th>VERIFY PASSWORD:</th>
                    <td><input type="password" name="verifypassword" id="verifypassword" oninput="check(this)" required></td>
                </tr>
            </table>
            <script language='javascript' type='text/javascript'>
            function check(input) {
                if (input.value != document.getElementById('newpassword').value) {
                    input.setCustomValidity('The password must match!');
                } else {
                    input.setCustomValidity('');
                }
            }
            </script>
            <input type="submit" name="submit" class="button" value="SUBMIT">
        </form>
    </div>
</body>

</html>