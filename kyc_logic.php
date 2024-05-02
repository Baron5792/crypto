<?php
    include './config/database.php';
    if (isset($_POST['upload'])) {
        $valid_id = $_FILES['valid_id'];
        $address = $_FILES['address'];
        $id = $_POST['id'];

        if (empty($valid_id['name'] || $address['name'])) {
            $_SESSION['false'] = "check selected images and try again";
        }

        else {
            $time = time();
            $avatar_name = $time . $valid_id['name'];
            $avatar_tmp = $valid_id['tmp_name'];
            $location = "./assets/images/kyc/" . $avatar_name;

            // make sure the file is allowed
            $allowed_files = ['png', 'jpg', 'jpeg'];
            $extension = explode('.', $avatar_name);
            $extension = end($extension);

            if (in_array($extension, $allowed_files)) {
                if ($avatar['size'] < 5000000)  {

                    // for the address avatar
                    $address_name = $time . $address['name'];
                    $address_tmp = $address['tmp_name'];
                    $address_location = './assets/images/kyc/' . $address_name;

                    // for allowed files
                    if (in_array($extension, $allowed_files)) {
                        if ($address['size'] < 5000000) {
                            move_uploaded_file($avatar_tmp, $location);
                            move_uploaded_file($address_tmp, $address_location);

                            // update kyc table
                            $insert = mysqli_query($con, "INSERT INTO kyc (users_id, valid_id, address, status) VALUE ('$id', '$avatar_name', '$address_name', 'Pending')");
                            if ($insert) {
                                // update the kyc track in users table
                                $update = mysqli_query($con, "UPDATE users SET kyc_track= '1' WHERE id= '$id'");
                                if ($update) {
                                    $_SESSION['success'] = "your kyc has been received and is being processed, please be patient.";
                                    header('location: ' . ROOT_URL . 'kyc.php');
                                }
                            }
                        }

                        else {
                            $_SESSION['false'] = "files size is too big, try again";
                        }
                    }

                }

                else {
                    $_SESSION['false'] = "file size is too big, try again";
                }
            }

            else {
                $_SESSION['false'] = "file must be an image, please try again";
            }
        }

        if (isset($_SESSION['false'])) {
            header('location: ' . ROOT_URL . 'kyc.php');
            die;
        }
    }

    else {
        header('location: ' . ROOT_URL . 'kyc.php');
    }