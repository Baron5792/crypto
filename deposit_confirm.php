<?php
    include './partials/header.php';
    $fetch = mysqli_query($con, "SELECT * FROM deposit WHERE users_id='$id' ORDER BY date DESC LIMIT 1");
    $list = mysqli_fetch_assoc($fetch);
    $wallet = $list['wallet_id'];
    $amount = $list['amount'];

    // check wallet that matches the wallet_id
    $check = mysqli_query($con, "SELECT * FROM payment_method WHERE id='$wallet'");
    $details = mysqli_fetch_assoc($check);
    $wallet_address = $details['wallet_address'];
    $payment_method = $details['payment_method'];
?>


<script>
    document.getElementById('home').innerHTML = "Deposits";
    document.getElementById("tag").innerHTML = "New";
    $('.deposit__drop').show(0);
    $('#new_deposit').css('color', '#03316C');
</script>

<div class="headers__title">
        <div class="barrier">
            <p>Deposits / New deposit</p>
            <p>
                <a href="">Back</a>
            </p>
        </div>

        <!-- for deposit containers -->
        <div class="deposit_div">
            <div class="amount_con">
                <div class="confirm_con">
                    <div>
                        <p class="fa fa-hand-holding-dollar"></p>
                    </div>
                    <div>
                        <p class="deposit_desc" style="text-transform: capitalize;"><?= $payment_method ?></p>
                        <P class="address_link">Copy the address below and pay in the selected amount of your choice. Once payment has been confirmed, you will be funded.</P>
                        <p class="wallet_address"><?= $wallet_address ?></p>

                        
                        <form action="<?= ROOT_URL ?>deposit_confirm_logic.php" method="POST">
                        <!-- current users id -->
                        <input type="hidden" name="users_id" value="<?= $id ?>">
                            <p class="wallet_description">Enter Transaction ID</p>
                            <div class="amount_input">
                                <input type="text" name="transaction_id" id="" placeholder="Transaction ID" required>
                            </div>

                            <?php if (isset($_SESSION['error'])): ?>
                                <p style="color: red; text-align:center; font-family:sans-serif">
                                    <?=
                                        $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    ?>
                                </p>
                            <?php endif ?>


                            <div class="submit_desc">
                                <button type="submit" name="submit">CONFIRM DEPOSIT AND PROCEED</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="total_deposit_con">
                <div class="withdrawable_new_deposit">
                    <div class="locked__head">
                        <p>Payment</p>
                    </div>
                    <div class="icon_locked_con" id="icon_locked_con">
                        <!-- for the icon and amount -->
                        <p class="hand-holding"><span class="fa fa-hand-holding-dollar" style="color: #808080;"></span></p>
                        <div class="confrim_deposit_amount">
                            <p>Pay <span> USD <?= $amount ?> </span></p>
                            <!-- <p>Total Deposits</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php
    include './partials/footer.php';
?>