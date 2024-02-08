<?php
    // Begin session
    session_start();

    // Form variables
    $username = "";
    $email = "";
    $password = "";
    $password_check = "";

    // Form errors
    $errors = array();

    // Database variables
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db_name = "registration";

    // Connection to database
    $db = mysqli_connect($host, $user, $pwd, $db_name);

    // If registration form info was correctly received
    if(isset($_POST["reg_user"]))
    {
        // Assign registration info to form variables
        $username = mysqli_real_escape_string($db, $_POST["username"]);
        $email = mysqli_real_escape_string($db, $_POST["email"]);
        $password = mysqli_real_escape_string($db, $_POST["password"]);
        $password_check = mysqli_real_escape_string($db, $_POST["password_check"]);

        // If no username was found
        if(empty($username))
        {
            // Add this error to the errors array
            array_push($errors, "<p>Error : no username found.</p>");
        }

        // If no email was found
        if(empty($email))
        {
            // Add this error to the errors array
            array_push($errors, "<p>Error : no email found.</p>");
        }

        // If no first password was found
        if(empty($password))
        {
            // Add this error to the errors array
            array_push($errors, "<p>Error : no password found.</p>");
        }

        // If the passwords are different
        if($password != $password_check)
        {
            // Add this error to the errors array
            array_push($errors, "<p>Error : passwords are different.</p>"); 
        }

        // Look in the database for a user or email identical to those received from the form
        $user_check = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";

        // Prepare the user check query
        $prepared_user_check = mysqli_prepare($db, $user_check);

        // Bind question marks to registration form info
        mysqli_stmt_bind_param($prepared_user_check, "ss", $username, $email);

        // Execute prepared user check query
        mysqli_stmt_execute($prepared_user_check);

        // Store result in a variable   
        $result = mysqli_stmt_get_result($prepared_user_check);

        // Store already existing username and email in an associative array (username => Reimu, email => reimu.hakurei@hotmail.com)
        $user = mysqli_fetch_assoc($result);

        // If the user does already exist
        if($user)
        {
            // If the username already in the database is identical to the one from the form
            if($user["username"] === $username)
            {
                // Add this error to the errors array
                array_push($errors, "<p>Error : Username already exists.</p>"); 
            }

            // If the email already in the database is identical to the one from the form
            if($user["email"] === $email)
            {
                // Add this error to the errors array
                array_push($errors, "<p>Error : Email already exists.</p>");
            }
        }

        // If there are no errors
        if(count($errors) == 0)
        {
            // Encrypt the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Reset the ID column
            mysqli_query($db, "ALTER TABLE users AUTO_INCREMENT = 1;");

            // Prepare insertion of correct data into the users table
            $registration_query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

            // Prepare the query
            $prepared_registration_query = mysqli_prepare($db, $registration_query);

            // Bind table columns to question marks
            mysqli_stmt_bind_param($prepared_registration_query, "sss", $username, $email, $hashed_password);

            // Execute the registration query
            mysqli_stmt_execute($prepared_registration_query);

            // Session name
            $_SESSION["username"] = $username;

            // Successful connection message
            $_SESSION["success"] = "Success. Your account has been registered.";

            // Redirection
            header("location: index.php");
        }
    }

    // If login form info was correctly received
    if(isset($_POST["login"]))
    {   
        // Assign login form info to login form variables
        $username = mysqli_real_escape_string($db, $_POST["username"]);
        $password = mysqli_real_escape_string($db, $_POST["password"]);

        // If there's no username
        if(empty($username))
        {
            // Add this error to the errors array
            array_push($errors, "<p>Error : username is required.</p>");

            // Show an error message
            echo "<p>Error : username is required.</p>";
        }

        // If there's no password
        if(empty($password))
        {
            // Add this error to the errors array
            array_push($errors, "<p>Error : password is required.</p>");

            // Show an error message
            echo "<p>Error : password is required.</p>";
        }

        // If there are no errors
        if(count($errors) == 0)
        {
            // Encrypt the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Select the user and the password from the users table
            $login_query = "SELECT * FROM users WHERE username=? AND password=?";

            // Prepare login query
            $prepared_login_query = mysqli_prepare($db, $login_query);

            // Bind question marks to login info
            mysqli_stmt_bind_param($prepared_login_query, "ss", $username, $password);

            // Execute login query
            mysqli_stmt_execute($prepared_login_query);

            // Store result in a variable
            $result_login = mysqli_stmt_get_result($prepared_login_query);

            // If there is only 1 result
            if(mysqli_num_rows($result) == 1)
            {
                // Session name
                $_SESSION["username"] = $username;

                // Successful connection message
                $_SESSION["success"] = "Success. You are logged in.";

                // Redirection
                header("location: index.php");
            }

            // If there are more or less than 1 result
            else
            {
                // Add this error to the errors array
                array_push($errors, "<p>Error : wrong username and password combination.</p>");
            }
        }
    }
?>