<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Logout</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <!-- HEADER -->
    <header>

        <!-- TITLE -->
        <h1>Logout</h1>

        <!-- NAVIGATION -->
        <nav>
            <a href="index.php" title="Only for logged in users">Index</a>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
        </nav>

    </header>

    <!-- MAIN -->
    <main>
        <?php
            // Begin session
            session_start();

            // End session
            session_destroy();

            // Confirmation message
            echo "<p>You are logged out.</p>";
        ?>
    </main>

    <!-- FOOTER -->
    <footer>
       <p>&copy; Maxyme Bonvent.</p> 
    </footer>
    
</body>
</html>