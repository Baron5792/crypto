<?php
    include './partials/header.php';

    if (isset($_SESSION['user'])) {
        $id = $_SESSION['user']['id'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE id= '$id'");
        $list = mysqli_fetch_assoc($query);
        $interest = $list['interest'];
        
        $pending = 0;
        // fetch users pending withdrawals
        $check = mysqli_query($con, "SELECT * FROM earning WHERE title= 'Referral' AND users_id= '$id'");
        if (mysqli_num_rows($check) > 0) {
            foreach ($check as $row) {
                $pending += $row['interest'];
            }
        }

        else {
            $pending = 0;
        }

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
        $('#earn').css('color', '#03316C');
        $("#icon").css('color', '#03316C');
        document.getElementsByTagName('title')[0].innerHTML = "Earning";
    </script>

  <!-- search for ratning -->
    <div class="home_input">
        <form action="<?= ROOT_URL ?>search_earning.php" method="GET">
        <input type="hidden" name="id" value="<?= $id ?>">
            <input type="text" name="search_earning" id="" placeholder="Search Earnings">
            <button type="submit" name="search">Search</button>
        </form>
    </div>

    <div class="earning__cont">
        <div class="total_deposit_con">
            <div class="withdrawable_new_deposit">
                <div class="locked__head">
                    <p>Interest</p>
                </div>
                <div class="icon_locked_con" id="icon_locked_con">
                    <!-- for the icon and amount -->
                    <p class="hand-holding"><span class="fa fa-money-bill-trend-up"></span></p>
                    <div class="show__amount">
                        <p>USD <?= $interest ?>.00</p>
                        <p>Interest Earnings</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="total_deposit_con">
            <div class="withdrawable_new_deposit">
                <div class="locked__head">
                    <p>Referral</p>
                </div>
                <div class="icon_locked_con" id="icon_locked_con">
                    <!-- for the icon and amount -->
                    <p class="hand-holding"><span class="fa fa-hand-holding-dollar"></span></p>
                    <div class="show__amount">
                        <p>USD <?= $sum_int ?>.00</p>
                        <p>Referral Earnings</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- create a table view every interest received -->
    <div class="display_transaction" id="earning__table">
        <?php  
            $query = mysqli_query($con, "SELECT * FROM earning WHERE users_id= '$id' ORDER BY date DESC LIMIT 30");
            if (mysqli_num_rows($query) >= 1) {
        ?>
                <table>
                    <tr>
                        <th>TITLE</th>
                        <th>AMOUNT</th>
                        <th>DATE</th>
                    </tr>
                    <?php
                        foreach ($query as $row) {
                            $title = $row['title'];
                            $interest = $row['interest'];
                            $date = $row['date'];
                    ?>
                            <tr>
                                <td><?= $title ?></td>
                                <td><?= $interest ?></td>
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
                <p class="error_text">No record found</p>
        <?php
            }
        ?>
    </div>  

<?php
    include './partials/footer.php';
?>