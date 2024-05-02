<?php
    include './partials/header.php';

    if (isset($_SESSION['user'])) {
        $id = $_SESSION['user']['id'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE id= '$id'");
        $row = mysqli_fetch_assoc($query);
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $referral_code = $row['users_code'];
        $phone = $row['phone'];
        $kyc_track = $row['kyc_track'];


        if (isset($_SESSION['error-data'])) {
            $firstname = $_SESSION['error-data']['firstname'] ?? null;
            $lastname = $_SESSION['error-data']['lastname'] ?? null;
            $email = $_SESSION['error-data']['email'] ?? null;
            $phone = $_SESSION['error-data']['phone'] ?? null;
            unset($_SESSION['error-data']);
        }

    }

    else {
        header('location: ' . ROOT_URL . 'login.php');
    }
?>

<script>
    document.getElementById('home').innerHTML = "Settings";
    document.getElementById("tag").innerHTML = "Security";
    document.getElementsByTagName('title')[0].innerHTML = "Security";
</script>


<div class="profile-boarder">
    <div class="profile__header">
        

        <!-- fetch current users id -->
        <form action="<?= ROOT_URL ?>avatar_logic.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id ?>">

            <div class="profile__dp" id="#profile">
                <label for="profile" class="for__avatar__dp">
                    <?php
                        if ($avatar > 0) {
                    ?>
                            <img src="<?= ROOT_URL ?>assets/images/avatar/<?= $avatar ?>" alt="Profile img" id="">
                            <i class="fa fa-camera"></i>
                    <?php
                        }
                        else {
                    ?>
                            <img src="<?= ROOT_URL ?>assets/images/avatar3.png" alt="Profile img" id="">
                            <i class="fa fa-camera"></i>
                    <?php
                        }
                    ?>
                </label>
            </div>
            <div class="profile__data">
                <p class="for__name"><?= $firstname . ' ' . $lastname ?></p>
                <p class="for__email"><?= $email ?></p>
                <!-- <button type="submit" name="change"> <i class="fa fa-upload"></i> change profile pics</button> -->
                <input type="file" name="profile" id="">

                <!-- success and eror message -->
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="error_text">
                        <p>
                            <?= 
                                $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </p>
                    </div>
                <?php endif ?>

                <?php if (isset($_SESSION['success'])): ?>
                    <div class="success_text">
                        <p>
                            <?=
                                $_SESSION['success'];
                                unset($_SESSION['success']);
                            ?>
                        </p>
                    </div>
                <?php endif ?>
            </div>
        </form>
    </div>


    <!-- for the menu of settings tab -->
    <div class="profile__tabs">
        <div class="profile__account__settings">
            <a href="">Account Details</a>
        </div>

        <div class="profile__tab">
            <a href="<?= ROOT_URL ?>profile.php">My Profile</a>
            <a href="<?= ROOT_URL ?>kyc.php">KYC</a>
            <a href="<?= ROOT_URL ?>security.php" class="selected">Security</a>
        </div>
    </div>



    <form action="<?= ROOT_URL ?>change_password_logic.php" method="POST" class="sercurity">
        <input type="hidden" name="id" value="<?= $id ?>">

        <div class="email_details">
            <div class="for_others">
                <label for="">Current Password</label>
                <input type="password" name="current_password" id="" placeholder="">
            </div>
        </div>

        <div class="fname_lname">
            <div>
                <label for="">New Password</label>
                <input type="password" name="new_password" id="" placeholder="" value="">
            </div>
            <div>
                <label for="">Confirm Password</label>
                <input type="password" name="confirm_password" id="" placeholder="" value="">
            </div>
        </div>

        <div class="email_details">
            <div class="submission">
                <input type="submit" value="Change Password" name="submit">
            </div>
        </div>

        
    </form>



<?php
    include './partials/footer.php';
?>