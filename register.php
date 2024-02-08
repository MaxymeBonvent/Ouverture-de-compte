<?php include("server.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registration</title>
    <link rel="stylesheet" href="style.css">    

</head>
<body>

    <!-- HEADER -->
    <header>

        <!-- TITLE -->
        <h1>Registration</h1>

        <!-- NAVIGATION -->
        <nav>
            <a href="index.php" title="Only for logged in users">Index</a>
            <a style="color: dodgerblue;" href="register.php">Register</a>
            <a href="login.php">Login</a>
        </nav>

    </header>
 
    <!-- MAIN -->
    <main>
        <!-- FORM -->
        <form method="post" action="register.php">

            <!-- IMPORTING ERROR CHECKING SCRIPT -->
            <?php include("errors.php") ?>

            <!-- USERNAME FIELD -->
            <div>
                <label for="username">Username</label>
                <input id="username" type="text" name="username" placeholder="Your username" autocomplete="on" required>
            </div>

            <!-- EMAIL FIELD -->
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" placeholder="your.adress@example.com" autocomplete="on" required>
            </div>

            <!-- PASSWORD FIELD -->
            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" placeholder="********" autocomplete="off" required>
            </div>

            <!-- PASSWORD CHECK FIELD -->
            <div>
                <label for="password_check">Password Confirmation</label>
                <input id="password_check" type="password" name="password_check" placeholder="********" autocomplete="off" required>
            </div>

            <!-- SIGN IN FIELD -->
            <p>Already a member? <a href="login.php">Log in.</a></p>

            <!-- SUBMIT AND RESET DIV -->
            <div>
                <!-- SUBMIT -->
                <input class="formBtn" type="submit" name="reg_user" value="Submit">

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