<?php
    include './partials/header.php';

    if (isset($_SESSION['user'])) {
        $id = $_SESSION['user']['id'];

        $query = mysqli_query($con, "SELECT * FROM users WHERE id= '$id'");
        $details = mysqli_fetch_assoc($query);
        $total_deposit = $details['total_deposit'];
    }

    else {
        header('location: ' . ROOT_URL . 'login.php');
    }

?>

<script>
    document.getElementById('home').innerHTML = "Deposits";
    document.getElementById("tag").innerHTML = "View";
    document.getElementsByTagName('title')[0].innerHTML = "View deposits";

    $('.deposit__drop').show(0);
    // $('#new_deposit').css('color', '#03316C');
    $('#view_deposit').css('color', '#03316C');
    $('#angle').css('display', 'none');

    $(document).ready(function() {
        $('#radio_div_1').click(function() {
            $('#radio_label_1').prop("checked", true);
        })
    })
</script>

    <!-- search for deposits -->
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

        <form action="<?= ROOT_URL ?>search_deposit.php?id=<?= $id ?>" method="GET">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="text" name="search_deposit" id="" placeholder="Search Deposits">
            <button type="submit" name="search">Search</button>
        </form>
    </div>


    <div class="earning__cont">
        <div class="total_deposit_con">
            <div class="withdrawable_new_deposit">
                <div class="locked__head">
                    <p>Active deposit</p>
                </div>
                <div class="icon_locked_con" id="icon_locked_con">
                    <!-- for the icon and amount -->
                    <p class="hand-holding"><span class="fa fa-money-bill-trend-up"></span></p>
                    <div class="show__amount">
                        <p>USD <?= $total_deposit ?>.00</p>
                        <p>Locked Deposits</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="total_deposit_con">
            <div class="withdrawable_new_deposit">
                <div class="locked__head">
                    <p>Inactive</p>
                </div>
                <div class="icon_locked_con" id="icon_locked_con">
                    <!-- for the icon and amount -->
                    <p class="hand-holding"><span class="fa fa-hand-holding-dollar"></span></p>
                    <div class="show__amount">
                        <p>USD <?= $interest ?>.00</p>
                        <p>Inactive Deposits</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- display the transactipon history -->
    <div class="display_transaction">
        <?php
            $query = mysqli_query($con, "SELECT * FROM deposit WHERE users_id= '$id' ORDER BY date DESC LIMIT 30");
            if (mysqli_num_rows($query) > 0) {
        ?>
                <table>
                    <tr>
                        <th>Transaction id</th>
                        <th>Amount</th>
                        <th>Created on</th>
                        <th>Maturity date</th>
                        <th>Status</th>
                    </tr>

                    <?php
                        
                            foreach ($query as $row) {
                                # code...
                                $transaction_id = $row['transaction_id'];
                                $amount = $row['amount'];
                                $date  = $row['date'];
                                $status = $row['status'];
                                $dbtime = strtotime($date) + 24 * 60 * 60;
                                // Format the new timestamp as a date string
                                $maturity_date = date('Y-m-d H:i:s', $dbtime);
                    ?>

                                <tr>
                                    <td><?= $transaction_id ?></td>
                                    <td>USD <?= $amount ?>.00</td>
                                    <td><?= $date ?></td>
                                    <td><?= $maturity_date ?></td>
                                    <td><?= $status ?></td>
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