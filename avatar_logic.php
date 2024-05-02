<?php
    include './config/database.php';

    if (isset($_POST['change'])) {
        $id = $_POST['id'];
        $avatar = $_FILES['profile'];
        // var_dump($avatar);
        // die;

        if (empty($avatar['name'])) {
            $_SESSION['error'] = "please select an avatar";
        }

        else {
            $time = time();
            $avatar_name = $time . $avatar['name'];
            $tmp_name = $avatar['tmp_name'];
            $location = './assets/images/avatar/' . $avatar_name;

            // make sure the file is allowed
            $allowed_files = ['png', 'jpg', 'jpeg'];
            $extension = explode('.', $avatar_name);
            $extension = end($extension);

            if (in_array($extension, $allowed_files)) {

                if ($avatar['size'] < 5000000)  {
                    move_uploaded_file($tmp_name, $location);

                    // update database
                    $update = mysqli_query($con, "UPDATE users SET avatar= '$avatar_name' WHERE id= '$id'");
                    if ($update) {
                        $_SESSION['success'] = "Avatar has be updated";
                        header('location: ' . ROOT_URL . 'profile.php');
                    }

                    else {
                        $_SESSION['error'] = "Ivalid opertaion, try again";
                    }
                }

                else {
                    $_SESSION['error'] = "File size is too big, try again";
                }
            }

            else {
                $_SESSION['error'] = "File must be an image, try again";
            }
        }

        if (isset($_SESSION['error'])) {
            $_SESSION['error_data'] = $_POST;
            header('location: ' . ROOT_URL . 'profile.php');
            die;
        }
    }

    else {
        header('location: ' . ROOT_URL . "profile.php");
    }