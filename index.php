<?php
	session_start();
	require "credentials.php";
	$connection = mysqli_connect($host, $system, $password, $database);
	if (isset($_POST['username'])) {
		$username = mysqli_real_escape_string($connection, $_POST['username']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);
		$sql = "SELECT Username, Password, Type 
				FROM commuteraccounts 
				WHERE BINARY Username = BINARY '".$username."' 
				AND BINARY Password = BINARY '".$password."'
				UNION
				SELECT Username, Password, Type 
				FROM employeeaccounts
				WHERE BINARY Username = BINARY '".$username."' 
				AND BINARY Password = BINARY '".$password."'";
		$result = mysqli_query($connection, $sql);
		if (!$result) {
			printf("Error: %s\n", mysqli_error($connection));
			exit();
		}
		$value = mysqli_fetch_array($result);
		if (mysqli_num_rows($result) == 1) {
		    $_SESSION['username'] = $username;
			if ($value['Type'] == 'Administrator') {
                header('Location: administratorhome.php');
				exit();
			} else if ($value['Type'] == 'Cashier') {
				header('Location: cashierhome.php');
				exit();
			} else if ($value['Type'] == 'Commuter') {
				header('Location: commuterhome.php');
				exit();
			}
		} else {
			header('Location: loginfailed.php');
			exit();
		}
	} else if (isset($_SESSION['username'])) {
	    $username = $_SESSION['username'];
	    $sql = "SELECT Username, Type
				FROM commuteraccounts 
				WHERE BINARY Username = BINARY '".$username."' 
				UNION
				SELECT Username, Type
				FROM employeeaccounts
				WHERE BINARY Username = BINARY '".$username."'";
		$result = mysqli_query($connection, $sql);
		$value = mysqli_fetch_array($result);
		if (mysqli_num_rows($result) == 1) { 
			if ($value['Type'] == 'Administrator') {
                header('Location: administratorhome.php');
				exit();
			} else if ($value['Type'] == 'Cashier') {
				header('Location: cashierhome.php');
				exit();
			} else if ($value['Type'] == 'Commuter') {
				header('Location: commuterhome.php');
				exit();
			}
		}
	}
?>

<!DOCTYPE html>

<head>
    <title>S.S.B.P.S | Login</title>
    <link rel="stylesheet" type="text/css" href="indexstyle.css">
    <meta name="viewport" content="initial-scale=0.8, maximum-scale=0.8">
</head>

<body>
    <div id="container">
        <div id="title" class="title">
            <h1>SELF-SERVE BUS PAYMENT SYSTEM</h1>
            <h4>A THESIS PROJECT BY:</h4>
            <section class="cardlist">
                <article class="card">
                    <header class="cardheader">
                        <h2>ENGR. Kathleen Villanueva</h2>
                        <p>Thesis Adviser</p>
                    </header>
                    <div class="cardauthor">
                        <a class="authoravatar">
                            <img src="images/ADVISER.jpg">
                        </a>
                        <svg class="halfcircle" viewBox="0 0 106 57">
                            <path d="M102 4c0 27.1-21.9 49-49 49S4 31.1 4 4"></path>
                        </svg>
                    </div>
                </article>
                <article class="card">
                    <header class="cardheader">
                        <h2>Cruz, Francis Joseph</h2>
                        <p>D.L.S.U.D - C.P.E</p>
                    </header>
                    <div class="cardauthor">
                        <a class="authoravatar" href="https://www.facebook.com/fjmcruz/" target="_blank">
                            <img src="images/CRUZ.jpg">
                        </a>
                        <svg class="halfcircle" viewBox="0 0 106 57">
                            <path d="M102 4c0 27.1-21.9 49-49 49S4 31.1 4 4"></path>
                        </svg>
                    </div>
                </article>
                <article class="card">
                    <header class="cardheader">
                        <h2>Frani, Franz <br> Gerard</h2>
                        <p>D.L.S.U.D - C.P.E</p>
                    </header>
                    <div class="cardauthor">
                        <a class="authoravatar" href="https://www.facebook.com/ge.frani" target="_blank">
                            <img src="images/FRANI.png">
                        </a>
                        <svg class="halfcircle" viewBox="0 0 106 57">
                            <path d="M102 4c0 27.1-21.9 49-49 49S4 31.1 4 4"></path>
                        </svg>
                    </div>
                </article>
                <article class="card">
                    <header class="cardheader">
                        <h2>Incomio, <br> Jerzon</h2>
                        <p>D.L.S.U.D - C.P.E</p>
                    </header>
                    <div class="cardauthor">
                        <a class="authoravatar" href="https://www.facebook.com/jerzon.incomio" target="_blank">
                            <img src="images/INCOMIO.jpg">
                        </a>
                        <svg class="halfcircle" viewBox="0 0 106 57">
                            <path d="M102 4c0 27.1-21.9 49-49 49S4 31.1 4 4"></path>
                        </svg>
                    </div>
                </article>
            </section>
        </div>
        <div id="login">
            <form class="form" method="POST" action="#">
                <h1>Login</h1>
                <input type="text" name="username" placeholder="Username" onfocus="this.placeholder=''" onblur="this.placeholder='Username'">
                <input type="password" name="password" placeholder="Password" onfocus="this.placeholder=''" onblur="this.placeholder='Password'">
                <input type="submit" name="submit" value="LOGIN" class="button-login">
                <input type="button" name="register" value="REGISTER" class="button" onclick="window.location.href='registration.php'">
            </form>
        </div>
    </div>
</body>

</html>