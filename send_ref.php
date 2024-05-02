<?php
    include './config/database.php';

    if (isset($_POST['invite'])) {
        
        $users_id = $_POST['users_id'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE id= '$users_id'");
        if (mysqli_num_rows($query) == 1) {
            $details = mysqli_fetch_assoc($query);
            $name = $details['firstname'] . " " . $details['lastname'];
            $ref_code = $details['users_code'];
            $email = $details['email'];
        }

        // define receiver
        $to = $_POST['email'];

        // subject
        $subject = "cryptoinvestment: Register and Earn";

        // message
        $message = "Hey" . " " . $name . ",<br>" . "I think you might be interested in trying out cryptoinvestment. I've been a customer for a while now and have been really happy with their services. Use my referral code <b>" . " " . $ref_code . " " . "</b> to get Discount/Interest. Good luck as you invest!!!!" . " " . ".Visit <www.cryptoinvestment.com>" . "\r\n";
        

        // headers
        $header = 'From: ' . $email . "\r\n" . 'Reply-To: ' . $email . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/plain; charset=UTF-8';

        // send the email
        mail($to, $subject, $message, $header);

        if (mail($to, $subject, $message, $header)) {
            $_SESSION['mail_success'] = "Email sent successfully";
            header('location: ' . ROOT_URL . 'dashboard.php');
        }

        else {
            $_SESSION['mail_error'] = "Error sending email, try again later";
        }

        if (isset($_SESSION['mail_error'])) {
            $_SESSION['mail_data'] = $_POST;
            header('location: ' . ROOT_URL . 'dashboard.php');
            die;
        }
    }

    else {
        header('location: ' . ROOT_URL . 'dashboard.php');
        die;
    }