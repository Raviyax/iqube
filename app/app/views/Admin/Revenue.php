<?php $this->view('inc/Header', $data) ?>
<?php $premium = $data['premium'];
$video = $data['video'];
$model_paper = $data['model_paper'];
?>
<section class="dashboard">
    <h1 class="heading">iQUbe Revenue</h1>
    <div class="flex-btn" style="flex-direction: row; align-items: center; justify-content: center; margin-bottom:30px;">

        <button id="showPremium" class="button-17" role="button">Premium Purchases</button>
        <button id="showVideo" class="button-17" role="button">Video Purchases</button>
        <button id="showModelPaper" class="button-17" role="button">Model Paper Purchases</button>


    </div>
    <section class="unit-container" id="premium">
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
        
        // Display only the first three parts of the date (year, month, date)
        $formattedDate = date('Y-m-d', strtotime($purchase->purchased_date));
        echo '<td>' . $formattedDate . '</td>';
        
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    ?>
</section>



    <section class="unit-container" id="video">
    <div class="box-container">
        <div class="box">
            <h3>Video Purchases</h3>
        </div>
    </div>
    <?php
    echo '<table id="table" class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Video ID</th>';
    echo '<th>Student Name</th>';
    echo '<th>Tutor</th>';
    echo '<th>Price</th>';
    echo '<th>Tutor Payment</th>';
    echo '<th>iQube Commission</th>';
    echo '<th>Purchased Date</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Loop through each video purchase and display it in a table row
    foreach ($video as $purchase) {
        echo '<tr>';
        echo '<td>' . $purchase->video_content_id . '</td>';
        echo '<td>' . $purchase->student_name . '</td>';
        echo '<td>' . $purchase->tutor_name . '</td>';
        echo '<td>' . number_format($purchase->price, 2) . ' LKR</td>'; // Format price with 2 decimal places and "LKR" currency

        // Calculate tutor payment (80% of price)
        $tutorPayment = $purchase->price * 0.8;
        echo '<td>' . number_format($tutorPayment, 2) . ' LKR</td>'; // Format tutor payment with 2 decimal places and "LKR" currency

        // Calculate iQube commission (20% of price)
        $iqubeCommission = $purchase->price * 0.2;
        echo '<td>' . number_format($iqubeCommission, 2) . ' LKR</td>'; // Format iQube commission with 2 decimal places and "LKR" currency

        // Display only the first three parts of the date (year, month, date)
        $formattedDate = date('Y-m-d', strtotime($purchase->purchased_date));
        echo '<td>' . $formattedDate . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    ?>
</section>

<section class="unit-container" id="model-paper">
    <div class="box-container">
        <div class="box">
            <h3>Model Paper Purchases</h3>
        </div>
    </div>
    <?php
    echo '<table id="table" class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Model Paper ID</th>';
    echo '<th>Student Name</th>';
    echo '<th>Tutor</th>';
    echo '<th>Price</th>';
    echo '<th>Tutor Payment</th>';
    echo '<th>iQube Commission</th>';
    echo '<th>Purchased Date</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Loop through each model paper purchase and display it in a table row
    foreach ($model_paper as $purchase) {
        echo '<tr>';
        echo '<td>' . $purchase->model_paper_content_id . '</td>';
        echo '<td>' . $purchase->student_name . '</td>';
        echo '<td>' . $purchase->tutor_name . '</td>';
        echo '<td>' . number_format($purchase->price, 2) . ' LKR</td>'; // Format price with 2 decimal places and "LKR" currency

        // Calculate tutor payment (80% of price)
        $tutorPayment = $purchase->price * 0.8;
        echo '<td>' . number_format($tutorPayment, 2) . ' LKR</td>'; // Format tutor payment with 2 decimal places and "LKR" currency

        // Calculate iQube commission (20% of price)
        $iqubeCommission = $purchase->price * 0.2;
        echo '<td>' . number_format($iqubeCommission, 2) . ' LKR</td>'; // Format iQube commission with 2 decimal places and "LKR" currency

        // Display only the first three parts of the date (year, month, date)
        $formattedDate = date('Y-m-d', strtotime($purchase->purchased_date));
        echo '<td>' . $formattedDate . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    ?>



</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Hide all sections except the first one
        $('#video').hide();
        $('#model-paper').hide();

        // Show the selected section and hide the others
        $('#showPremium').click(function() {
            event.preventDefault();
            $('#premium').show();
            $('#video').hide();
            $('#model-paper').hide();
        });

        $('#showVideo').click(function() {
            event.preventDefault();
            $('#premium').hide();
            $('#video').show();
            $('#model-paper').hide();
        });

        $('#showModelPaper').click(function() {
            event.preventDefault();
            $('#premium').hide();
            $('#video').hide();
            $('#model-paper').show();
        });
    });
</script>

<?php $this->view('inc/Footer') ?>
</body>

</html>