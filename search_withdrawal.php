<?php
    include './partials/header.php';

if (isset($_GET['search'])) {
    $search = $_GET['search_withdrawal'];
    $query_all = mysqli_query($con, "SELECT * FROM withdrawal WHERE amount LIKE '%$search%' AND users_id= '$id' ORDER BY id DESC");
}

else {
    header('location: ' . ROOT_URL . 'view_withdrawal.php');
}

?>
    <!-- search for deposits -->
    <div class="home_input">
        <form action="<?= ROOT_URL ?>view_withdrawal.php" method="POST">
            <!-- <input type="text" name="search_deposit" id="" placeholder="Search Deposits"> -->
            <button type="submit" name="search">Return</button>
        </form>
    </div>


    <div class="display_transaction">
        <?php 
            if (mysqli_num_rows($query_all) > 0) {
        ?>
                <table>
                    <tr>
                        <th>Wallet</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Maturity Date</th>
                        <th>Date</th>
                    </tr>

                    <?php
                            foreach ($query_all as $row) {
                                # code...
                                $wallet = $row['wallet'];
                                $amount = $row['amount'];
                                $date  = $row['date'];
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
                                    <td><?= $status ?></td>
                                    <td><?= $date ?></td>
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