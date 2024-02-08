<?php
    // Begin session
    session_start();

    // If there is no username in this session
    if(!isset($_SESSION["username"]))
    {
        // Show an error message
        $_SESSION["msg"] = "You must log in first.";

        // Redirect user to login page
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Index</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <!-- HEADER -->
    <header>

        <!-- TITLE -->
        <h1>Index</h1>

        <!-- NAVIGATION -->
        <nav>
            <a style="color: dodgerblue;" href="index.php" title="Only for logged in users">Index</a>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
        </nav>

    </header>

    <!-- MAIN -->
    <main>
        <?php
            // If session has correctly started
            if(isset($_SESSION["success"]))
            {
                // Show success message
                echo $_SESSION["success"];

                unset($_SESSION["success"]);
            }

            // If username was correctly set
            if(isset($_SESSION["username"]))
            {
                // Store session's username in a variable
                $session_username = $_SESSION["username"];

                // Welcome user
                echo "<p>Welcome $session_username.</p>";
            }
        ?>

        <!-- LOGOUT LINK -->
        <a href="logout.php">Logout</a>
    </main>  

    <!-- FOOTER -->
    <footer>
       <p>&copy; Maxyme Bonvent.</p> 
    </footer>

</body>
</html>