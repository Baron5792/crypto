<?php
    include './config/database.php';

    if (isset($_POST['submit'])) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $referral_code = $_POST['referral_code'];
        $code = $_POST['users_code'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Invalid email format";
        }

        elseif (empty($firstname)) {
            $_SESSION['error'] = "Check inputed values and try again";
        }

        elseif (empty($lastname)) {
            $_SESSION['error'] = "Check inputed values and try again";
        }

        elseif (empty($email)) {
            $_SESSION['error'] = "Check inputed values and try again";
        }

        // elseif (!preg_match('`[A-Z]`', $password)) {
        //     $_SESSION['error'] = "Password must at least contain one uppercase!";
        // }

        elseif (!preg_match('`[a-z]`', $password)) {
            $_SESSION['error'] = "Password must have at least one lowercase!";
        }

        // elseif (!preg_match('`[0-9]`', $password)) {
        //     $_SESSION['error'] = "Password must have one number!";
        // }

        elseif (strlen($password) <= 5) {
            $_SESSION['error'] = "Password's length must exceed 5 letters";
        }

        elseif ($password !== $confirm_password) {
            $_SESSION['error'] = "Password does not match";
        }

        else {
            // check if email already exists
            $check = mysqli_query($con, "SELECT * FROM users WHERE email= '$email'");
            if (mysqli_num_rows($check) == 1) {
                $_SESSION['error'] = "Email has already been used";
            }

            else {
                // check if the referral code exists
                $fetch_ref = mysqli_query($con, "SELECT * FROM users WHERE users_code= '$referral_code'");
                if (mysqli_num_rows($fetch_ref) > 0) {

                    $insert = mysqli_query($con, "INSERT INTO users (firstname, lastname, email, password, referral_code, users_code) VALUE ('$firstname', '$lastname', '$email', '$password', '$referral_code', '$code')");

                    if ($insert) {
                        // $to = $email;
                        // $subject = "Welcome to Our Finance Community!";
                        // $recover_code = "Hi" . " " . $firstname . ", Welcome to our Crypto community!. We're thrilled to have you onboard. Feel free to explore our resources, ask questions, and engage with fellow members. Together, let's navigate the world of finance and achieve our financial goals! If you need assistance, don't hesitate to reach out. <b>Happy investing!!!</b>";
                        // $header .= "FROM: crypto.com" . "\r\n";

                        // // send mail
                        // if (@mail($to, $subject, $recover_code, $header)) {
                            $_SESSION['success'] = "Congratulations, you can now log in !!";
                            header("location: " . ROOT_URL . "login.php");
                        // }
                        
                        // else {
                        //     $_SESSION['error'] = "not working";
                        //     header('location: ' . ROOT_URL . 'signup.php');
                        // }
                    }

                    else {
                        $_SESSION['error'] = "Registartion error";
                    }
                }

                else {
                    $_SESSION['error'] = "Check referral code and try again";
                }
            }


        }

        if (isset($_SESSION['error'])) {
            $_SESSION['error-data'] = $_POST;
            header('location: ' . ROOT_URL . "signup.php?ref=<?= $referral_code ?>");
            die;
        }
    }

    // for referral linked user
    elseif (isset($_GET['ref'])) {
        $ref = $_GET['ref'];
        var_dump($ref);
        die;
    }

    else {
        header('location: ' . ROOT_URL . 'index.php');
    }







  