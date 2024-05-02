<?php
    include './config/database.php';

    if (isset($_POST['submit'])) {
        $users_id = $_POST['users_id'];
        $msg = $_POST['msg'];

        if (empty($msg)) {
            $_SESSION['error_message'] = "Please write a message to proceed";
        }

        else {
            // insert into messages
            $insert = mysqli_query($con, "INSERT INTO messages (users_id, message_body, message_track) VALUE ('$users_id', '$msg', '1')");

            if ($insert) {
                $users_insert = mysqli_query($con, "UPDATE users SET message_track= '1' WHERE id= '$users_id'");
                header('location: ' . $_SERVER['HTTP_REFERER']);
            }

            else {
                $_SESSION['error_message'] = "Could'nt send message, try again";
            }
        }

        if (isset($_SESSION['error_message'])) {
            $_SESSION['error-data'] = $_POST;
            header('location: ' . ROOT_URL . 'dashboard.php');
            die;
        }
    }
    
    else {
        header('location: ' . ROOT_URL . 'dashbaord.php');
    }