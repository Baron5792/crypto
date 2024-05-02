<?php
    include './partials/header.php';

    $id = $_SESSION['user']['id'];
    $check = mysqli_query($con, "SELECT * FROM plan_track WHERE users_id= '$id' ORDER BY date DESC LIMIT 1");
    
    if (mysqli_num_rows($check) == 1) {
        $row = mysqli_fetch_assoc($check);
        $plan = $row['plan_no'];
    }

    else {
        header('location: ' . ROOT_URL . 'new_deposit.php');
    }

    $amount = $_SESSION['error_data']['amount'] ?? null;
    unset($_SESSION['error_data']);


?>


<script>
    document.getElementById('home').innerHTML = "Deposits";
    document.getElementById("tag").innerHTML = "New";
    document.getElementsByTagName('title')[0].innerHTML = "New deposit";

    $('.deposit__drop').show(0);
    $('#new_deposit').css('color', '#03316C');
</script>

    <div class="headers__title">
        <div class="barrier">
            <p>Deposits / New deposit</p>
            <p>
                <a href="<?= ROOT_URL ?>view_deposit.php">My deposits</a>
            </p>
        </div>

        <!-- for deposit containers -->
        <div class="deposit_div">
            <div class="amount_con">
                <p class="deposit_desc">Enter Amount</p>
                <form action="<?= ROOT_URL ?>deposit_modal_logic.php" method="POST">
                <!-- fetch plan number -->
                <input type="hidden" name="plan_no" value="<?= $plan ?>">
                <input type="hidden" name="users_id" value="<?= $id ?>">
                    <div class="amount_input">
                        <input type="number" name="amount" id="" placeholder="Enter Amount">
                    </div>

                    <!-- for payment type --> 
                    <p class="deposit_desc">Payment Method</p>
                    <div class="amount_input">
                        <select name="wallet" id="wallet">
                            <option value="0">Select a payment method</option>
                            <option value="1">bitcoin Wallet</option>
                            <option value="2">ethereum wallet</option>
                            <option value="3">usdt trc20 wallet</option>
                            <option value="4">bsc bep20 wallet</option>
                        </select>
                    </div>
                    <!-- error message -->
                    <?php if (isset($_SESSION['error'])): ?>
                        <p style="text-align: center; color:red; font-family:sans-serif;">
                            <?=
                                $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </p>
                    <?php endif ?>
                    <br><br>

                    <div class="submit_desc">
                        <button type="submit" name="submit">PROCEED TO PAY</button>
                    </div>
                </form>
            </div>
            <div class="total_deposit_con">
                <div class="withdrawable_new_deposit">
                    <div class="locked__head">
                        <p>Earnings</p>
                    </div>
                    <div class="icon_locked_con" id="icon_locked_con">
                        <!-- for the icon and amount -->
                        <p class="hand-holding"><span class="fa fa-hand-holding-dollar"></span></p>
                        <div class="show__amount">
                            <p>USD <?= $total_deposit ?>.00</p>
                            <p>Total Deposits</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php
    include './partials/footer.php';
?>

