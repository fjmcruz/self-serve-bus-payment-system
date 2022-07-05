<?php
    session_start();
    require "credentials.php";
    $test = "test";
    $username = $_SESSION['username'];
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>

<head>
    <title>S.S.B.P.S | Change Password</title>
    <link rel="stylesheet" type="text/css" href="commuterstyle.css">
    <meta name="viewport" content="initial-scale=0.8, maximum-scale=0.8">
</head>

<body>
    <nav class="navigationbar">
        <ul class="navigationbar-navigation">
            <li class="logo">
                <a href="#" class="navigation-expand">
                    <img src="images/expand.svg">
                    <span class="link-text">
                        <h4>S.S.B.P.S</h4>
                    </span>
                </a>
            </li>
            <li class="navigation-item">
                <a href="commuterhome.php" class="navigation-link">
                    <img src="images/commuterhome.svg">
                    <span class="link-text">
                        <h4>Home</h4>
                    </span>
                </a>
            </li>
            <li class="navigation-item">
                <a href="commuteraccount.php" class="navigation-link">
                    <img src="images/commuteraccount.svg">
                    <span class="link-text">
                        <h4>Account</h4>
                    </span>
                </a>
            </li>
            <li class="navigation-item">
                <a href="commutersurvey.php" class="navigation-link">
                    <img src="images/survey.svg">
                    <span class="link-text">
                        <h4>Survey</h4>
                    </span>
                </a>
            </li>
            <li class="navigation-item">
                <a href="logoutaction.php" class="navigation-link">
                    <img src="images/logout.svg">
                    <span class="link-text">
                        <h4>Logout</h4>
                    </span>
                </a>
            </li>
        </ul>
    </nav>
    <header>
        <?php
            echo "<h2>$username</h2>";
            $connection = mysqli_connect($host, $system, $password, $database);
            $sql = "SELECT Balance 
					FROM commuteraccounts 
					WHERE Username = '".$username."'";
            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<h2>BALANCE: " . $row['Balance'] . "</h2>"; 
            }
        ?>
    </header>
    <div id="table">
        <form action="commuterpasswordaction.php" class="form" method="POST">
            <h2>CHANGE PASSWORD</h2>
            <input type="password" name="newpassword" placeholder="New Password" onfocus="this.placeholder=''" onblur="this.placeholder='New Password'" id="newpassword" required>
            <input type="password" name="verifypassword" placeholder="Verify Password" onfocus="this.placeholder=''" onblur="this.placeholder='Verify Password'" id="verifypassword" oninput="check(this)" required>
            <script language='javascript' type='text/javascript'>
            function check(input) {
                if (input.value != document.getElementById('newpassword').value) {
                    input.setCustomValidity('The password must match!');
                } else {
                    input.setCustomValidity('');
                }
            }
            </script>
            <input type="button" name="goback" class="button" value="<" onclick="window.location.href='commuteraccount.php'">
            <input type="submit" name="submit" class="button" value="SUBMIT">
        </form>
    </div>
</body>

</html>