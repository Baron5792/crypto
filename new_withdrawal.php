<?php
    include './partials/header.php';

    if (isset($_SESSION['user'])) {
        $id = $_SESSION['user']['id'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE id= '$id'");
        $details = mysqli_fetch_assoc($query);
        $interest = $details['interest'];
        $kyc_track = $details['kyc_track'];

        $amount = $_SESSION['error-data']['amount'] ?? null;
        $wallet = $_SESSION['error-data']['wallet'] ?? null;
        unset($_SESSION['error-data']);
    }

    else {
        header('location: ' . ROOT_URL . 'login.php');
    }
?>

<script>
    document.getElementById('home').innerHTML = "Withdrawals";
    document.getElementById("tag").innerHTML = "New";

    $('.deposit__drop').show(0);
    $('#new_deposit').css('color', '#03316C');
    $('#angle').css('display', 'none');
    $('.withdrawal__drop').css('display', 'block');
    $('.deposit__drop').css('display', 'none');
    $('#new_withdrawal').css('color', '#03316C');
    document.getElementsByTagName('title')[0].innerHTML = "New withdrawal";

    $(document).ready(function() {
        $('#radio_div_1').click(function() {
            $('#radio_label_1').selected().toggle();
        })
    })
</script>

    <div class="headers__title">
        <div class="barrier">
            <p>Withdrawals / New withdrawal</p>
            <p>
                <a href="<?= ROOT_URL ?>view_withdrawal.php">My Withdrawals</a>
            </p>
        </div>

        <!-- for deposit containers -->
        <div class="deposit_div">
            <div class="amount_con">

             <!-- error message -->
             <?php if (isset($_SESSION['error'])): ?>
                    <p style="color: red; font-family:sans-serif; text-align:center;">
                        <?=
                            $_SESSION['error'];
                            unset($_SESSION['error']);
                        ?>
                    </p>
                <?php endif ?>
                <p class="deposit_desc">Enter Amount</p>

                <form action="<?= ROOT_URL ?>withdrawal_logic.php" class="form-group_con" method="POST">
                    <input type="number" name="amount" id="" value="<?= $amount ?>" placeholder="Enter amount">

                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="form-group">
                        <p class="deposit_desc">Payment Method</p>
                        <select name="payment_methods" id="">
                            <option value="0">Select a payment method</option>
                            <option value="1">bitcoin Wallet</option>
                            <option value="2">ethereum wallet</option>
                            <option value="3">usdt trc20 wallet</option>
                            <option value="4">bsc bep20 wallet</option>
                        </select>
                        <p class="deposit_desc">Wallet Address</p>
                        <input type="text" name="wallet" id="" value="<?= $wallet ?>" placeholder="Enter wallet address">
                    </div>

                    <?php  
                        if ($kyc_track == 0) {
                    ?>
                            <p class="error_text" style="text-align: center;">Please verify your account to proceed.</p>
                    <?php
                        }
                        elseif ($kyc_track == 1) {
                    ?>
                            <p class="error_text" style="text-align: center;">Your account verification is being processed.</p>
                    <?php 
                        }
                        else {
                    ?>
                            <div class="payment_submit">
                                <div class="submission">
                                    <input type="submit" value="Proceed" name="submit">
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </form>


            </div>
            <div class="total_deposit_con">
                <div class="withdrawable_new_deposit">
                    <div class="locked__head">
                        <p>Available</p>
                    </div>
                    <div class="icon_locked_con" id="icon_locked_con">
                        <!-- for the icon and amount -->
                        <p class="hand-holding"><span class="fa fa-hand-holding-dollar"></span></p>
                        <div class="show__amount">
                            <p>USD <?= $interest ?>.00</p>
                            <p>Available Funds</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    
<?php
    include './partials/footer.php';
?>