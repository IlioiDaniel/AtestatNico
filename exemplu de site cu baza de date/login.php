<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
    </style>
</head>
<body>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column; /* Arrange items in a column */
            align-items: center; /* Center items horizontally */
        }

        h1 {
            color: #333;
            text-align: center;
            width: 100%;
            margin-bottom: 20px; /* Add some space below the heading */
        }
		</style>
<div class="login-container">
    <h2>Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="username">Username or Email:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <button type="submit">Login</button>
        </div>
    </form>

    <?php
	session_start();
	$conn=new mysqli('localhost','root','','magazin');
	$db=mysqli_select_db($conn,'magazin');
	if (!$conn) 
	{
		die('Could not connect: ');
	
	}
    // Verificați dacă formularul a fost trimis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obțineți valorile introduse de utilizator
        $username = $_POST['username'];
        $password = $_POST['password'];
		
		$s="select * from users where (nume='$username' or email='$username') and parola='$password'";
		$result=mysqli_query($conn,$s);
		$row=mysqli_fetch_assoc($result);
	
        // Verificați informațiile de autentificare (aceasta este o simplificare; de obicei, veți face acest lucru pe partea serverului)
        if ($row) {
            // Autentificarea este validă, redirecționați către pagina dorită
            header('Location: home.php');
            exit();
        } else {
            // Autentificarea eșuată
            echo '<script>alert("Autentificare eșuată. Verificați utilizatorul și parola.");</script>';
        }
    }
    ?>
</div>

</body>
</html>
