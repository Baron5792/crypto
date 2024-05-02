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
    document.getElementsByTagName('title')[0].innerHTML = "My profile";
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
                <button type="submit" name="change"> <i class="fa fa-upload"></i> change profile pics</button>
                <input type="file" name="profile" id="profile">

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
            <a href="" class="selected">My Profile</a>
            <a href="<?= ROOT_URL ?>kyc.php">KYC</a>
            <a href="<?= ROOT_URL ?>security.php">Security</a>
        </div>
    </div>

    <!-- for the input types -->
    <form action="<?= ROOT_URL ?>update_details.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">

        <div class="for__referral">
            <div class="fname_lname">
                <div>
                    <label for="">First Name</label>
                    <input type="text" name="firstname" id="" placeholder="Enter First Name" value="<?= $firstname ?>">
                </div>
                <div>
                    <label for="">Last Name</label>
                    <input type="text" name="lastname" id="" placeholder="Enter Last Name" value="<?= $lastname ?>">
                </div>
            
            </div>
            <!-- For referral code -->
            <div id="referral">
                <label for="">Referral Code</label>
                <p><?= $referral_code ?> <span class="fa fa-copy" style="margin-left: 4px;background-color:unset; border:none;color:white; font-size:small" onclick="copyRef()"></span></p>
                <input type="hidden" name="" value="<?= $referral_code  ?>" id="myInput">
            </div>
        </div>

        <div class="email_details">
            <div class="for_others">
                <label for="">Valid email address</label>
                <input type="email" name="email" id="" placeholder="Enter Valid Email" value="<?= $email ?>" >
            </div>

            <?php
                if ($phone > 0) {
            ?>
                    <div class="for_others">
                        <label for="">Phone</label>
                        <input type="number" name="phone" id="" placeholder="Enter Phone Number" value="<?= $phone ?>">
                    </div>
            <?php
                }

                elseif ($phone == 0) {
            ?>
                    <div class="for_others">
                        <label for="">Phone</label>
                        <input type="number" name="phone" id="" value="" placeholder="No saved phone number">
                    </div>
            <?php
                }

                else {
            ?>
                    <div class="for_others">
                        <label for="">Phone</label>
                        <input type="number" name="phone" id="" value="<?= $phone ?>" placeholder="No saved phone number">
                    </div>
            <?php
                }
            ?>
        </div>

        <!-- for error and success message -->
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
                        unset($_SESSION['euccess']);
                    ?>
                </p>
            </div>            
        <?php endif ?>

        <div class="email_details">
            <div class="submission">
                <input type="submit" value="Save" name="submit">
            </div>
        </div>
    </form>
</div>


<?php
    include './partials/footer.php';
?>