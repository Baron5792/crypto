<?php
    include './partials/header.php';
    
    if (isset($_SESSION['user'])) {
        $id = $_SESSION['user']['id'];

        // check for total interest value
        $total = mysqli_query($con, "SELECT * FROM earning WHERE users_id= '$id' AND title= 'Referral Bonus'");
        if (mysqli_num_rows($total) > 0) {
            foreach ($total as $row) {
                $sum_int = $row['interest'];
                $sum_int += $sum_int;
            }
        }

        else {
            $sum_int = 0;
        }
 
    }
    else {
        header('location: ' . ROOT_URL . 'login.php');
    }
?>

<script>
    $('#ref').css('color', '#03316C');
    $('#ref_icon').css('color', '#03316C');
    document.getElementsByTagName('title')[0].innerHTML = "Referrals";
</script>

<div class="headers__title">

    <div class="barrier">
        <p>My Referrals</p>
    </div>

    
    <?php
        // fetch current users users_code
        $query = mysqli_query($con, "SELECT * FROM users WHERE id= '$id'");
        $details = mysqli_fetch_assoc($query);
        $users_code = $details['users_code'];

        // fetch referred users record
        $fetch_all = mysqli_query($con, "SELECT * FROM users WHERE referral_code= '$users_code'");
        $referred = mysqli_num_rows($fetch_all);
        if (mysqli_num_rows($fetch_all) > 0) {
    ?>  

        <div class="earning__cont">
            <div class="total_deposit_con">
                <div class="withdrawable_new_deposit">
                    <div class="locked__head">
                        <p>Referral</p>
                    </div>
                    <div class="icon_locked_con" id="icon_locked_con">
                        <!-- for the icon and amount -->
                        <p class="hand-holding"><span class="fa fa-users"></span></p>
                        <div class="show__amount">
                            <p><?= $referred ?></p>
                            <p>Referred Users</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="total_deposit_con">
                <div class="withdrawable_new_deposit">
                    <div class="locked__head">
                        <p>Interest</p>
                    </div>
                    <div class="icon_locked_con" id="icon_locked_con">
                        <!-- for the icon and amount -->
                        <p class="hand-holding"><span class="fa fa-hand-holding-dollar"></span></p>
                        <div class="show__amount">
                            <p>USD <?= $sum_int ?>.00</p>
                            <p>Referral Interest</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                <div class="display_transaction" id="ref__table">
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Total Deposit</th>
                            <th>Phone</th>
                            <th>Registration Date</th>
                        </tr>
                        <?php 
                            foreach ($fetch_all as $ref) {
                                $firstname = $ref['firstname'];
                                $lastname = $ref['lastname'];
                                $total_deposit = $ref['total_deposit'];
                                $phone = $ref['phone'];
                                $date = $ref['date'];

                                if (strlen($phone) > 2) {
                                    $phone = $phone;
                                }

                                else {
                                    $phone = "No phone number found";
                                }
                        ?>
                                <tr>
                                    <td style="text-transform: capitalize;"><?= $firstname . ' ' . $lastname ?></td>
                                    <td><?= $total_deposit ?></td>
                                    <td>
                                        <?= $phone ?>
                                    </td>
                                    <td><?= $date ?></td>
                                </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
        <?php
            }

            else {
        ?>
                <div class="no_record">
                    <img src="<?= ROOT_URL ?>assets/images/no-search-results.png" alt="">
                </div>
        <?php
            }
        ?>
    </div>


<?php
    include './partials/footer.php';
?>
