<?php
    include './partials/header.php';

    if (isset($_SESSION['user'])) {
        $id = $_SESSION['user']['id'];
        $pending = 0;
        // fetch users pending withdrawals
        $check = mysqli_query($con, "SELECT * FROM withdrawal WHERE users_id= '$id' AND status= 'Pending'");
        if (mysqli_num_rows($check) > 0) {
            foreach ($check as $row) {
                $pending += $row['amount'];
            }
        }
    }

    else {
        header('location: ' . ROOT_URL . 'login.php');
    }
   
?>

<script>
    document.getElementById('home').innerHTML = "Withdrawals";
    document.getElementById("tag").innerHTML = "View";

    $('.deposit__drop').show(0);
    $('#new_deposit').css('color', '#03316C');
    $('#angle').css('display', 'none');
    $('.withdrawal__drop').css('display', 'block');
    $('.deposit__drop').css('display', 'none');
    $('#view_withdrawal').css('color', '#03316C');
    document.getElementsByTagName('title')[0].innerHTML = "View Withdrawal";

    $(document).ready(function() {
        $('#radio_div_1').click(function() {
            $('#radio_label_1').selected().toggle();
        })
    })
</script>

    <!-- search for withdrawals -->
    <div class="home_input">

        
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
        <form action="<?= ROOT_URL ?>search_withdrawal.php" method="GET">
            <input type="text" name="search_withdrawal" id="" placeholder="Search Withdrawals">
            <button type="submit" name="search">Search</button>
        </form>
    </div>


    <div class="earning__cont">
        <div class="total_deposit_con">
            <div class="withdrawable_new_deposit">
                <div class="locked__head">
                    <p>Pending</p>
                </div>
                <div class="icon_locked_con" id="icon_locked_con">
                    <!-- for the icon and amount -->
                    <p class="hand-holding"><span class="fa fa-money-bill-trend-up"></span></p>
                    <div class="show__amount">
                        <p>USD <?= $pending ?>.00</p>
                        <p>Pending Withdrawals</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="total_deposit_con">
            <div class="withdrawable_new_deposit">
                <div class="locked__head">
                    <p>Total</p>
                </div>
                <div class="icon_locked_con" id="icon_locked_con">
                    <!-- for the icon and amount -->
                    <p class="hand-holding"><span class="fa fa-hand-holding-dollar"></span></p>
                    <div class="show__amount">
                        <p>USD 0.00</p>
                        <p>Total Earnings</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- display the transactipon history -->
    <div class="display_transaction">
        <?php
            $query = mysqli_query($con, "SELECT * FROM withdrawal WHERE users_id= '$id' ORDER BY date DESC LIMIT 30");
            if (mysqli_num_rows($query) > 0) {
        ?>
                <table>
                    <tr>
                        <th>Wallet</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
                        <th>Maturity Date</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>

                    <?php
                        
                            foreach ($query as $row) {
                                # code...
                                $wallet = $row['wallet'];
                                $amount = $row['amount'];
                                $date  = $row['date'];
                                // for maturity date
                                $time = strtotime($date) + 48 * 60 * 60; // 2 days later
                                $maturity_date = date('Y-m-d H:i:s', $time);

                                $status = $row['status'];
                                $payment_method = $row['payment_method'];

                                if ($payment_method == 1) {
                                    $payment_method = "Bitcoin";
                                }

                                elseif ($payment_method == 2) {
                                    $payment_method = "Ethereum";
                                }

                                elseif ($payment_method == 4) {
                                    $payment_method = "USDT";
                                }

                                else {
                                    $payment_method = "BSC";
                                }
                    ?>

                                <tr>
                                    <td><?= $wallet ?></td>
                                    <td>USD <?= $amount ?>.00</td>
                                    <td><?= $payment_method ?></td>
                                    <td><?= $maturity_date ?></td>
                                    <td><?= $status ?></td>
                                    <td><?= $date ?></td>
                                </tr>
                    <?php
                            }
                    ?>          
                </table>
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