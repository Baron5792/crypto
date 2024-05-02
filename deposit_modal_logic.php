<?php
    include './config/database.php';

    // check database for last plan made to fetch the range of amount required
    if (isset($_POST['submit'])) {
        $plan = $_POST['plan_no'];
        $users_id = $_POST['users_id'];
        $amount  = $_POST['amount'];
        $wallet = $_POST['wallet'];

        
        if ($plan == 1) {
            if ($amount < 100.00 || $amount > 2000.00) {
                $_SESSION['error'] = "Invalid Operation!";
                header('location: ' . ROOT_URL . 'deposit_modal.php');
            }

            else {
                $insert = mysqli_query($con, "INSERT INTO deposit (users_id, amount, plan, status, wallet_id) VALUE ('$users_id', '$amount', '$plan', 'Pending', '$wallet')");
                if ($insert) {
                    header('location: ' . ROOT_URL . 'deposit_confirm.php');
                }

                else {
                    header('location: ' . ROOT_URL . 'deposit_modal.php');
                }
            }
        }

        elseif ($wallet == 0) {
            $_SESSION['error'] = "Please select a wallet type";
            header('location: ' . ROOT_URL . 'deposit_modal.php');
            die;
        }

        elseif ($plan == 2) {
            if ($amount < 2100.00 || $amount > 4400.00) {
                $_SESSION['error'] = "Invalid Operation!";
                header('location: ' . ROOT_URL . 'deposit_modal.php');
            }

            else {
                $insert = mysqli_query($con, "INSERT INTO deposit (users_id, amount, plan, status, wallet_id) VALUE ('$users_id', '$amount', '$plan', 'Pending', '$wallet')");
                if ($insert) {
                    header('location: ' . ROOT_URL . 'deposit_confirm.php');
                }

                else {
                    header('location: ' . ROOT_URL . 'deposit_modal.php');
                }
            }
        }

        elseif ($plan == 3) {
            if ($amount <  5000.00 || $amount > 11000.00) {
                $_SESSION['error'] = "Invalid Operation!";
                header('location: ' . ROOT_URL . 'deposit_modal.php');
            }

            else {
                $insert = mysqli_query($con, "INSERT INTO deposit (users_id, amount, plan, status, wallet_id) VALUE ('$users_id', '$amount', '$plan', 'Pending', '$wallet')");
                if ($insert) {
                    header('location: ' . ROOT_URL . 'deposit_confirm.php');
                }

                else {
                    header('location: ' . ROOT_URL . 'deposit_modal.php');
                }
            }
        }

        elseif ($plan == 4) {
            if ($amount < 11200.00 || $amount > 15400.00) {
                $_SESSION['error'] = "Invalid Operation!";
                header('location: ' . ROOT_URL . 'deposit_modal.php');
            }

            else {
                $insert = mysqli_query($con, "INSERT INTO deposit (users_id, amount, plan, status, wallet_id) VALUE ('$users_id', '$amount', '$plan', 'Pending', '$wallet')");
                if ($insert) {
                    header('location: ' . ROOT_URL . 'deposit_confirm.php');
                }

                else {
                    header('location: ' . ROOT_URL . 'deposit_modal.php');
                }
            }
        }

        else {
            if ($amount < 16000.00 || $amount > 22000.00) {
                $_SESSION['error'] = "Invalid Operation!";
                header('location: ' . ROOT_URL . 'deposit_modal.php');
            }

            else {
                $insert = mysqli_query($con, "INSERT INTO deposit (users_id, amount, plan, status, wallet_id) VALUE ('$users_id', '$amount', '$plan', 'Pending', '$wallet')");
                if ($insert) {
                    header('location: ' . ROOT_URL . 'deposit_confirm.php');
                }

                else {
                    header('location: ' . ROOT_URL . 'deposit_modal.php');
                }
            }
        }
    
        if (isset($_SESSION['error'])) {
            $_SESSION['error_data'] = $_POST;
            header('location: ' . ROOT_URL . 'deposit_modal.php');
            die;
        }

    }

    else {
        header('location: ' . ROOT_URL . 'deposit_modal.php');
        die($con);
    }