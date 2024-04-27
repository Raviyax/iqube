<?php $this->view('inc/Header', $data) ?>
<?php $premium = $data['premium'];
?>
<section class="dashboard">
    <h1 class="heading">iQUbe Revenue</h1>
    <div class="flex-btn" style="flex-direction: row; align-items: center; justify-content: center;">

        <button id="showVideo" class="button-17" role="button">Premium Purchases</button>
        <button id="showModelPaper" class="button-17" role="button">Video Purchases</button>
        <button id="showModelPaper" class="button-17" role="button">Model Paper Purchases</button>


    </div>

    <section class="unit-container" id="Premium">
    <div class="box-container">
        <div class="box">
            <h3>Premium Student Package Purchases</h3>
        </div>
    </div>
    <?php
    echo '<table id="table" class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Student ID</th>';
    echo '<th>Student Name</th>';
    echo '<th>Email</th>';
    echo '<th>Purchased Date</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Loop through each premium purchase and display it in a table row
    foreach ($premium as $purchase) {
        echo '<tr>';
        echo '<td>' . $purchase->student_id . '</td>';
        echo '<td>' . $purchase->name . '</td>';
        echo '<td>' . $purchase->email . '</td>';
        echo '<td>' . $purchase->purchased_date . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    ?>
</section>

</section>

<?php $this->view('inc/Footer') ?>
</body>

</html>