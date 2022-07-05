<!DOCTYPE html>

<head>
    <title>S.S.B.P.S | Register</title>
    <link rel="stylesheet" type="text/css" href="registrationstyle.css">
    <meta name="viewport" content="initial-scale=0.8, maximum-scale=0.8">
</head>

<body>
    <div id="container">
        <form action="registrationaction.php" class="form" method="POST">
            <h1>Registration</h1>
            <input type="text" name="fullname" placeholder="Full Name" onfocus="this.placeholder=''" onblur="this.placeholder='Full Name'" required>
            <input type="text" name="email" placeholder="E-mail" onfocus="this.placeholder=''" onblur="this.placeholder='E-mail'" required>
            <input type="tel" name="contact" placeholder="Contact#" onfocus="this.placeholder=''" onblur="this.placeholder='Contact#'" required>
            <input type="text" name="username" placeholder="Username" onfocus="this.placeholder=''" onblur="this.placeholder='Username'" required>
            <input type="password" name="password" placeholder="Password" onfocus="this.placeholder=''" onblur="this.placeholder='Password'" id="password" required>
            <input type="password" name="verifypassword" placeholder="Verify Password" onfocus="this.placeholder=''" onblur="this.placeholder='Verify Password'" id="verifypassword" oninput="check(this)" required>
            <script language='javascript' type='text/javascript'>
            function check(input) {
                if (input.value != document.getElementById('password').value) {
                    input.setCustomValidity('The password must match!');
                } else {
                    input.setCustomValidity('');
                }
            }
            </script>
            <input type="submit" name="submit" class="button" value="SUBMIT">
            <input type="button" name="goback" class="button" value="GO BACK" onclick="window.location.href='index.php'">
        </form>
    </div>
</body>

</html>