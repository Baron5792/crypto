<?php
    include './config/database.php';

    if (isset($_POST['submit'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $id = $_POST['id'];


        if (empty($firstname)) {
            $_SESSION['error'] = "Check inputs and try again";
        }

        elseif (empty($lastname)) {
            $_SESSION['error'] = "Check inputs and try again";
        }

        elseif (empty($email)) {
            $_SESSION['error'] = "Check inputs and try again";
        }

        else {
            // check if email already exists
            $query = mysqli_query($con, "SELECT * FROM users WHERE email= '$email'"); 
            if (mysqli_num_rows($query) > 1) {
                $_SESSION['error'] = "this email is invalid, please try again";
            } 

            else {
                // update the users table
                $update = mysqli_query($con, "UPDATE users SET firstname= '$firstname', lastname= '$lastname', email= '$email', phone= '$phone' WHERE id= '$id'");
                if ($update) {
                    $_SESSION['success'] = "details have been updated successfully";
                    header('location: ' . ROOT_URL . 'profile.php');
                }

                else {
                    $_SESSION['error'] = "Invalid operation, try again";
                }
            }
        }

        if (isset($_SESSION['error'])) {
            $_SESSION['error-data'] = $_POST;
            header('location: ' . ROOT_URL . 'profile.php');
            die;
        }
    }


    else {
        header('location: ' . ROOT_URL . 'login.php');
        die;
    }



?>