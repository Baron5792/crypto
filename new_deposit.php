<?php
    include './partials/header.php';
?>

<script>
    document.getElementById('home').innerHTML = "Deposits";
    document.getElementById("tag").innerHTML = "New";
    document.getElementsByTagName('title')[0].innerHTML = "New deposit";

    $('.deposit__drop').show(0);
    $('#new_deposit').css('color', '#03316C');
    $('#angle').css('display', 'none');

    $(document).ready(function() {
        $('#radio_div_1').click(function() {
            $('#radio_label_1').toggle() && $('#radio_label_1').css('display', 'block');
        })
    })
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
                <p class="deposit_desc">Select your preferred investment plan</p>

                <!-- error message -->
                <?php if (isset($_SESSION['error'])): ?>
                    <p style="color: red; font-family:sans-serif; text-align:center;">
                        <?=
                            $_SESSION['error'];
                            unset($_SESSION['error']);
                        ?>
                    </p>
                <?php endif ?>


                <form action="<?= ROOT_URL ?>deposit_logic.php" method="POST">
                    <!-- fetch current users id -->
                    <input type="hidden" name="users_id" value="<?= $id ?>">
                    <div class="radio_div" id="">
                        <input type="radio" name="deposit_plan" value="1" id="radio_label_1">
                        <div class="for_label" id="radio_div_1">
                            <label for="deposit_plan">30.00% daily for 1 week</label>
                            <label for="">USD 100.00 - USD 2,000.00</label>
                        </div>
                    </div>

                    <div class="radio_div">
                        <input type="radio" name="deposit_plan" value="2" id="">
                        <div class="for_label">
                            <label for="deposit_plan">5.00% daily for 2 week</label>
                            <label for="">USD 2,100.00 - USD 4,400.00</label>
                        </div>
                    </div>

                    <div class="radio_div">
                        <input type="radio" name="deposit_plan" value="3" id="">
                        <div class="for_label">
                            <label for="deposit_plan">10.00% daily for 2 week</label>
                            <label for="">USD 5,000.00 - USD 11,000.00</label>
                        </div>
                    </div>

                    <div class="radio_div">
                        <input type="radio" name="deposit_plan" value="4" id="">
                        <div class="for_label">
                            <label for="deposit_plan">20.00% daily for 1 week</label>
                            <label for="">USD 11,200.00 - USD 15,400.00</label>
                        </div>
                    </div>

                    <div class="radio_div">
                        <input type="radio" name="deposit_plan" value="5" id="">
                        <div class="for_label">
                            <label for="deposit_plan">20.00% daily for 1 week</label>
                            <label for="">USD 16,000.00 - USD 22,000.00</label>
                        </div>
                    </div>

                    <div class="submit_desc">
                        <button type="submit" name="submit">PROCEED TO AMOUNT</button>
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