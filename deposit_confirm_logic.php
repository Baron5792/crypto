<?php
    include './config/database.php';

    if (isset($_POST['submit'])) {
        $id = $_POST['users_id'];
        $transaction_id = $_POST['transaction_id'];

        // update the last transaction made by the user
        $update = mysqli_query($con, "UPDATE deposit SET transaction_id = '$transaction_id' WHERE users_id= '$id' ORDER BY date DESC LIMIT 1");

        if (!$update) {
            $_SESSION['error'] = "Invalid Operation";
            header('location: ' . ROOT_URL . 'deposit_confirm.php');
        }

        else {
            $_SESSION['success'] = "Your deposit is being processed, please wait a little";
            header('location: ' . ROOT_URL . 'view_deposit.php');
        }
    }

    else {
        header('location: ' . ROOT_URL . 'deposit_confirm.php');
    }