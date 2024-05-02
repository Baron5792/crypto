<?php
    include './config/database.php';

    if (isset($_POST['signin'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email)) {
            $_SESSION['error'] = "An email is required";
        }

        elseif (empty($password)) {
            $_SESSION['error'] = "A password is required";
        }

        else {
            // check if email exists in the database
            $fetch = mysqli_query($con, "SELECT * FROM users WHERE email= '$email'");
            if (mysqli_num_rows($fetch) == 1) {
                $details = mysqli_fetch_assoc($fetch);
                $users_id = $details['id'];
                $firstname = $details['firstname'];
                $lastname = $details['lastname'];
                $db_pass = $details['password'];
                // adding session['user'] to hold user's details
                $_SESSION['user'] = $details;
             

                if ($db_pass == $password) {
                    header('location: ' . ROOT_URL . 'dashboard.php');
                }

                else {
                    $_SESSION['error'] = "Invalid email or password, try again!";
                    header('location: ' . ROOT_URL . 'login.php');
                    die;
                }


            }

            else {
                $_SESSION['error'] = "No user record found, try again!";
                header('location: ' . ROOT_URL . 'login.php');
            }

            
        }

        if (isset($_SESSION['error'])) {
            $_SESSION['error-data'] = $_POST;
            header('location: ' . ROOT_URL . 'login.php');
            die;
        }
    }

    else {
        header('location: ' . ROOT_URL . 'login.php');
        die;
    }