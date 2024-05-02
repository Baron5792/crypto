<?php
    include './config/database.php';

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if (empty($current_password || $new_password || $confirm_password)) {
            $_SESSION['error'] = "invalid operation, try again";
        }

        elseif (!preg_match('`[A-Z]`', $new_password)) {
            $_SESSION['error'] = "new password must at least contain one uppercase!";
        }

        elseif (!preg_match('`[a-z]`', $new_password)) {
            $_SESSION['error'] = "new password must have at least one lowercase!";
        }

        elseif ($new_password !== $confirm_password) {
            $_SESSION['error'] = "Passwords do not match, try again";
        }

        elseif (strlen($new_password) <= 5) {
            $_SESSION['error'] = "Password lenght must exceed 5 characters, try again";
        }

        else {
            $query = mysqli_query($con, "SELECT * FROM users WHERE id= '$id'");
            if (mysqli_num_rows($query) == 1) {
                $details = mysqli_fetch_assoc($query);
                $dbpass = $details['password'];

                if ($dbpass !== $current_password) {
                    $_SESSION['error'] = "Confirm current passowrd and try again";
                }

                else {
                    $update = mysqli_query($con, "UPDATE users SET password= '$new_password' WHERE id= '$id'");
                    if ($update) {
                        $_SESSION['success'] = "Congrats, password has been changed successfully";
                        header('location: ' . ROOT_URL . 'security.php');
                    }

                    else {
                        $_SESSION['error'] = "invalid operation";
                    }
                }

            }

            else {
                $_SESSION['error'] = "Invalid operation";
            }
        }

        if (isset($_SESSION['error'])) {
            header('location: ' . ROOT_URL . 'security.php');
            die;
        }
    }

    else {
        header('location: ' . ROOT_URL . 'security.php');
    }