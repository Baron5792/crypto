<?php
    include './partials/header.php';

    if (isset($_GET['search'])) {
        $search_deposit = $_GET['search_deposit'];
        $id = $_GET['id'];
        $query_deposit = mysqli_query($con, "SELECT * FROM deposit WHERE amount LIKE '%$search_deposit%' AND users_id= '$id' ORDER BY id DESC");
    }

    elseif (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query_deposit = mysqli_query($con, "SELECT * FROM deposit WHERE amount LIKE '%$search_deposit%' AND users_id= '$id' ORDER BY id DESC");
    }

    else {
        header('location: ' . ROOT_URL . 'view_deposit.php');
    }

?>


<script>
    document.getElementById('home').innerHTML = "Deposits";
    document.getElementById("tag").innerHTML = "View";

    $('.deposit__drop').show(0);
    // $('#new_deposit').css('color', '#03316C');
    $('#view_deposit').css('color', '#03316C');
    $('#angle').css('display', 'none');

    $(document).ready(function() {
        $('#radio_div_1').click(function() {
            $('#radio_label_1').selected().toggle();
        })
    })
</script>

    <!-- search for deposits -->
    <div class="home_input">
        <form action="<?= ROOT_URL ?>view_deposit.php" method="POST">
            <!-- <input type="text" name="search_deposit" id="" placeholder="Search Deposits"> -->
            <button type="submit" name="search">Return</button>
        </form>
    </div>

    <!-- display the transactipon history -->
    <div class="display_transaction">
        <table>
            <tr>
                <th>Transaction id</th>
                <th>Amount</th>
                <th>Created on</th>
                <th>Maturity date</th>
                <th>Status</th>
            </tr>

            <?php
                if (mysqli_num_rows($query_deposit) > 0) {
                    foreach ($query_deposit as $row) {
                        $transaction_id = $row['transaction_id'];
                        $amount = $row['amount'];
                        $date  = $row['date'];
                        $status = $row['status'];
            ?>

                        <tr>
                            <td><?= $transaction_id ?></td>
                            <td>USD <?= $amount ?>.00</td>
                            <td><?= $date ?></td>
                            <td><?= $date ?></td>
                            <td><?= $status ?></td>
                        </tr>
            <?php
                    }
                }

                    else {
            ?>          
                        <tr>
                            <td>
                                <p style="text-align: center;width:100%;">No deposit found</p>
                                <img src="<?= ROOT_URL ?>assets/images/no-search-results.png" alt="">
                            </td>
                        </tr>
            <?php
                }
            ?>

              
        </table>
    </div>

<?php
    include './partials/footer.php';
?>