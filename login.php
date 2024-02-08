<?php include("server.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    <link rel="stylesheet" href="style.css">    

</head>
<body>

    <!-- HEADER -->
    <header>

        <!-- TITLE -->
        <h1>Login</h1>

        <!-- NAVIGATION -->
        <nav>
            <a href="index.php" title="Only for logged in users">Index</a>
            <a href="register.php">Register</a>
            <a style="color: dodgerblue;" href="login.php">Login</a>
        </nav>

    </header>
 
    <!-- MAIN -->
    <main>
        <!-- FORM -->
        <form method="post" action="index.php">

            <!-- USERNAME FIELD -->
            <div>
                <label for="username">Username</label>
                <input id="username" type="text" name="username" placeholder="Your username" autocomplete="on" required>
            </div>

            <!-- PASSWORD FIELD -->
            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" placeholder="********" autocomplete="off" required>
            </div>

            <!-- REGISTER FIELD -->
            <p>Not a member yet? <a href="register.php">Create a new account.</a></p>

            <!-- SUBMIT AND RESET DIV -->
            <div>
                <!-- SUBMIT -->
                <input class="formBtn" type="submit" name="login" value="Submit">

                <!-- RESET -->
                <input class="formBtn" type="reset" value="Reset">
            </div>

        </form>
    </main>

    <!-- FOOTER -->
    <footer>
       <p>&copy; Maxyme Bonvent.</p> 
    </footer>
    
</body>
</html>