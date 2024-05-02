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
    document.getElementById("tag").innerHTML = "My profile";
    document.getElementsByTagName('title')[0].innerHTML = "KYC";
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
            <a href="<?= ROOT_URL ?>kyc.php" class="selected">KYC</a>
            <a href="<?= ROOT_URL ?>security.php">Security</a>
        </div>
    </div>



    <div class="kyc__message">
        <div class="kyc__body">
            <!-- kyc message -->
            <p>Dear <?= $firstname ?>,</p>

            <p>To ensure compliance with regulatory standards and enhance the security of our platform, we kindly request your cooperation in completing the Know Your Customer (KYC) process.</p>

            <p>Please upload the following documents for verification:</p>

            <p>-- A scanned copy or high-quality photograph of your government-issued photo identification (e.g., passport, national ID card, driver's license).</p>
            <p>-- Proof of address (e.g., recent utility bill, bank statement, government-issued document).</p>
            <p>Your cooperation is essential for maintaining a safe and trusted environment for all users. Thank you for your understanding and assistance.</p>

            <p class="kyc_warn">Note: <span>Account must be verified before a withdrawal can be made.</span></p>

            Best regards.

            <form action="<?= ROOT_URL ?>kyc_logic.php" method="POST" enctype="multipart/form-data">
                    <!-- error message for id upload -->
                    <?php if (isset($_SESSION['false'])): ?>
                        <div class="error_text">
                            <p>
                                <?=
                                    $_SESSION['false'];
                                    unset($_SESSION['false']);
                                ?>
                            </p>
                        </div>
                    <?php endif ?>

                <input type="hidden" name="id" value="<?= $id ?>">
                <?php 
                    if ($kyc_track == 0) {
                ?>
                        <div class="kyc_group">
                            <label for="">Select a valid ID</label>
                            <input type="file" name="valid_id" id="">
                        </div>

                        <div class="kyc_group">
                            <label for="">Select a proof of address</label>
                            <input type="file" name="address" id="">
                        </div>

                        <div class="btn_submit">
                            <button type="submit" name="upload">Upload</button>
                        </div>
                <?php
                    }
                    elseif ($kyc_track == 1) {
                ?>      
                        <p class="success_text">Your KYC is being processed, please be patient.</p>
                <?php 
                    }
                    else {
                ?>
                        <p class="success_text">Congratulations, your account has been successfully verified !!</p>
                <?php
                    }
                ?>
            </form>
        </div>
    </div>
    
    
<?php
    include './partials/footer.php';
?>