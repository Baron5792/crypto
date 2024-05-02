<?php
    include './config/database.php';

    if (isset($_POST['submit'])) {
        $amount = $_POST['amount'];
        $id = $_POST['id'];
        $payment_methods = $_POST['payment_methods'];
        $wallet = $_POST['wallet'];

        // fetch the current users balance
        $query = mysqli_query($con, "SELECT * FROM users WHERE id= '$id'");
        if (mysqli_num_rows($query) == 1) {
            $details = mysqli_fetch_assoc($query);
            $interest = $details['interest'];
        }

        if (empty($amount)) {
            $_SESSION['error'] = "An amount is required";
        }

        elseif (empty($wallet)) {
            $_SESSION['error'] = "please input a wallet address";
        }

        elseif ($payment_methods == 0) {
            $_SESSION['error'] = "please select a payment type";
        }

        elseif ($amount <= 10) {
            $_SESSION['error'] = "amount must exceed 10 dollars";
        }

        else {

            if ($amount < $interest && $amount > 0) {
                $insert = mysqli_query($con, "INSERT INTO withdrawal (users_id, amount, payment_method, wallet, status) VALUE ('$id', '$amount', '$payment_methods', '$wallet', 'Pending')");

                if ($insert) {
                    $_SESSION['success'] = "congratulations, your withdrawal is being processed";
                    header('location: ' . ROOT_URL . 'view_withdrawal.php');
                }

                else {
                    $_SESSION['error'] = "invalid operation";
                }
            }

            else {
                $_SESSION['error'] = "insufficient balance, try again";
            }
        }

        if (isset($_SESSION['error'])) {
            $_SESSION['error-data'] = $_POST;
            header('location: ' . ROOT_URL . 'new_withdrawal.php');
            die;
        }
    }

    else {
        header('location: ' . ROOT_URL . 'new_withdrawal.php');
        die;
    }