<?php
    include './partials/header.php';

    if (isset($_GET['search'])) {
        $search_earning = $_GET['search_earning'];
        $id = $_GET['id'];
        $query_all = mysqli_query($con, "SELECT * FROM earning WHERE interest LIKE '%$search_earning%' AND users_id= '$id'");
    }

    else {
        header('location: ' . ROOT_URL . 'earning.php');
    }

?>

<script>
    $('#earn').css('color', '#03316C');
    $("#icon").css('color', '#03316C');
</script>

<!-- search for ratning -->
<div class="home_input">
    <form action="<?= ROOT_URL ?>earning.php" method="GET">
    <input type="hidden" name="id" value="<?= $id ?>">
        <!-- <input type="text" name="search_earning" id="" placeholder="Search Earnings"> -->
        <button type="submit" name="search">Return</button>
    </form>
</div>

<!-- create a table view every interest received -->
<div class="display_transaction">
    <?php  
        if (mysqli_num_rows($query_all) >= 1) {
    ?>
            <table>
                <tr>
                    <th>TITLE</th>
                    <th>AMOUNT</th>
                    <th>DATE</th>
                </tr>
                <?php
                    foreach ($query_all as $row) {
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
            <tr>
                <td>
                    <p style="text-align: center;width:100%;color:white;font-family:cursive">No result found</p>
                    <img src="<?= ROOT_URL ?>assets/images/no-search-results.png" alt="">
                </td>
            </tr>
    <?php
        }
    ?>
</div>  


<?php
    include './partials/footer.php';
?>