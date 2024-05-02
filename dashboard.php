<?php
    include __DIR__ . '/./partials/header.php';
    $referral_code = "www.localhost/crypto/signup.php?ref=$users_referral_code";
?>
    <!-- for dashbaord -->
    <!-- display withdrawal and deposit balance -->
    <!-- availability to refer users through email -->
    <script>
        // $('.home p span').css('color', '#03316C');
        $('.dashboard').css('color', '#03316C');
        $('#icons').css('color', '#03316C');
    </script>


    <div class="headers__title">
        <div class="barrier">
            <p>Dashboard</p>
        </div>

        <!-- for widget -->
        <marquee behavior="" direction="right" style="margin-top:20px;" class="marq">
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
            {
            "symbols": [
                [
                "Apple",
                "AAPL|1D"
                ],
                [
                "Google",
                "GOOGL|1D"
                ],
                [
                "Microsoft",
                "MSFT|1D"
                ]
            ],
            "chartOnly": true,
            "width": 1000,
            "height": 300,
            "locale": "en",
            "colorTheme": "light",
            "autosize": false,
            "showVolume": false,
            "showMA": false,
            "hideDateRanges": false,
            "hideMarketStatus": false,
            "hideSymbolLogo": false,
            "scalePosition": "right",
            "scaleMode": "Normal",
            "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
            "fontSize": "10",
            "noTimeScale": false,
            "valuesTracking": "1",
            "changeMode": "price-and-percent",
            "chartType": "line",
            "maLineColor": "#2962FF",
            "maLineWidth": 1,
            "maLength": 9,
            "lineWidth": 3,
            "lineType": 2,
            "dateRanges": [
                "1d|1",
                "1m|30",
                "3m|60",
                "12m|1D",
                "60m|1W",
                "all|1M"
            ]
            }
            </script>
            </div>
        </marquee>
        <!-- end of widget --> 

        <div class="greeting">
            <p>Hello, <?= $firstname ?> &#128075;</p>
        </div>


        <!-- display deposits and email referral -->
        <div class="balance__con">
            <div class="border__for__balance">
                <div class="balance__div">
                    <div class="for_the_flex">
                        <div class="withdrawable">
                            <div class="locked__head">
                                <p>Earnings</p>
                            </div>
                            <div class="icon_locked_con">
                                <!-- for the icon and amount -->
                                <p class="hand-holding"><span class="fa fa-hand-holding-dollar"></span></p>
                                <div class="show__amount">
                                    <p>USD <?= $interest ?>.00</p>
                                    <p>Withdrawable</p>
                                </div>
                            </div>
                        </div>
                        <div class="locked">
                            <div class="locked__head">
                                <p>Active deposits</p>                    
                            </div>
                            <div class="icon_locked_con">
                                <!-- for the icon and amount -->
                                <p class="hand-holding"><span class="fa fa-lock"></span></p>
                                <div class="show__amount">
                                    <p>USD <?= $balance ?>.00</p>
                                    <p>Locked</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="active__div">
                        <img src="<?= ROOT_URL ?>assets/images/download.png" alt="">
                    </div>
                   
                </div>


                <div class="email__message">
                    <div class="email__div">
                        <div class="email__margin">
                            <p class="referral__text">Refer and earn from your referral's deposits.</p>
                            <div class="refs_div">
                                <p class="referral_link">Referral Link:<span style="margin-left: 6px;" id="ref_link"> localhost/crypto/signup.php?ref=<?= $users_referral_code ?></span></p>

                                <?php if (isset($_SESSION['mail_error'])): ?>
                                    <p class="error_text">
                                        <?=
                                            $_SESSION['mail_error'];
                                            unset($_SESSION['mail_error']);
                                        ?>
                                    </p>
                                <?php endif ?>

                                <?php if (isset($_SESSION['mail_success'])): ?>
                                    <p class="success_text">
                                        <?=
                                            $_SESSION['mail_success'];
                                            unset($_SESSION['mail_success']);
                                        ?>
                                    </p>
                                <?php endif ?>
                                
                                <button class="fa fa-copy" style="margin-left: 10px;background-color:unset; border:none;color:white" onclick="copyRef()"></button>

                                <input type="hidden" name="" value="<?= $referral_code  ?>" id="myInput">
                            </div>
                            <form action="<?= ROOT_URL ?>send_ref.php" method="POST" class="invite">
                                <input type="email" name="email" required placeholder="Enter Email Address">

                                <!-- users_id -->
                                <input type="hidden" name="users_id" value="<?= $id ?>">
                                <input type="submit" value="Invite Friends" name="invite">
                            </form>
                        </div>
                    </div>

                    <div class="email__div" style="margin-top: 30px;">
                        <div class="email__margin">
                            <div class="history">
                                <p>Earnings History</p>
                                <p>Detailed History</p>
                            </div>
                            <div class="history__header">
                                <table style="width:100%;text-align:center; margin-top:20px">
                                    <tr>
                                        <th>TITLE</th>
                                        <th>AMOUNT (USD)</th>
                                        <th>DATE</th>
                                    </tr>
                                    <?php 
                                        $fetch_earning = mysqli_query($con, "SELECT * FROM earning WHERE users_id= '$id' ORDER BY date DESC LIMIT 5");

                                        if (mysqli_num_rows($fetch_earning) >= 1) {
                                            foreach ($fetch_earning as $key) {
                                                $title = $key['title'];
                                                $interest = $key['interest'];
                                                $date = $key['date'];
                                    ?>
                                            <tr>
                                                <td><?= $title ?></td>
                                                <td><?= $interest ?></td>
                                                <td><?= $date ?></td>
                                            </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>

      
    </div>
        

 


<?php
    include './partials/footer.php';
?>
 

