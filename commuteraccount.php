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
    <title>S.S.B.P.S | Account</title>
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
                <a href="https://docs.google.com/forms/d/e/1FAIpQLScX7AkHm5YvQW2RWf3TSd--NgbWeghu7lIqwEgjzHQ867re4w/viewform?fbclid=IwAR1BO9eDN7y4Uywt2EJMp3u4jNalHWNwDqW4_j5MUp149rqXntRsYdrgMJw" target="_blank" class="navigation-link">
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
        <?php
            $connection = mysqli_connect($host, $system, $password, $database);
            $sql = "SELECT * 
                    FROM commuteraccounts 
                    WHERE Username = '$username'";
            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>
        <h2>MY ACCOUNT:</h2>
        <table>
            <tr>
                <td><b>Name:</b></td>
                <td>
                    <b><?php echo $row["Name"]; ?></b>
                </td>
            </tr>
            <tr>
                <td><b>Username:</b></td>
                <td>
                    <b><?php echo $username; ?></b>
                </td>
            </tr>
            <tr>
                <td><b>Email:</b></td>
                <td>
                    <b><?php echo $row["Email"]; ?></b>
                </td>
            </tr>
            <tr>
                <td><b>Contact#:</b></td>
                <td>
                    <b><?php echo $row["Contact"]; ?></b>
                </td>
            </tr>
        </table>
        <input type="button" name="changepassword" class="button" value="CHANGE PASSWORD" onclick="window.location.href='commuterchangepassword.php'">
    </div>
</body>

</html>