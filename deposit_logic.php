<?php
    include './config/database.php';

    if (isset($_POST['submit'])) {
        $value = $_POST['deposit_plan'];
        $users_id = $_POST['users_id'];
        
        // make sure a plan was selected
        if ($value > 0) {
            // Insert into plan_track in database
            $insert = mysqli_query($con, "INSERT INTO plan_track (users_id, plan_no) VALUE ('$users_id', '$value')");
            if ($insert) {
                header('location: ' . ROOT_URL . "deposit_modal.php");
            }

            else {
                header('location: ' . ROOT_URL . 'new_deposit.php');
                die;
            }
        }

        else {
            $_SESSION['error'] = "A plan has to be selected to proceed";
            header('location: ' . ROOT_URL . 'new_deposit.php');
            die;
        }
    }

    else {
        header('location: ' . ROOT_URL . 'new_deposit.php');
    }