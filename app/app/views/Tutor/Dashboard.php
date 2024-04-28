<?php $this->view('inc/Header', $data) ?>

<?php
$student_count = $data['student_count'];
$content_count = $data['content_count'];
$purchase_count = $data['purchase_count'];
$last_month_earnings = $data['last_month_earnings'];
$video_analytics = $data['video_analytics'];
$model_paper_analytics = $data['model_paper_analytics'];


?>
<section class="dashboard">
    <section class="contents unit-container" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
        <div class="box-container">
            <div class="box">
                <h3>My Analytics</h3>
            </div>
        </div>
        <section class="courses">
            <div class="box-container">
                <div class="box" style="cursor:pointer; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col">
                            <div class="tutor">
                                <img src="<?php echo URLROOT; ?>/public/assets/img/student.png" alt="">
                                <div>
                                    <h3>Total Students</h3>
                                    <H3> <?php echo $student_count; ?></H3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          



           
                <div class="box" style="cursor:pointer; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col">
                            <div class="tutor">
                                <img src="<?php echo URLROOT; ?>/public/assets/img/content.png" alt="">
                                <div>
                                    <h3>Total Contents</h3>
                                    <H3><?php echo $content_count; ?></H3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          

            

         
                <div class="box" style="cursor:pointer; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col">
                            <div class="tutor">
                                <img src="<?php echo URLROOT; ?>/public/assets/img/purchase.svg" alt="">
                                <div>
                                    <h3>Total Purchases</h3>
                                    <H3><?php echo $purchase_count; ?></H3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
     

    
          


            </div>
        </section>

        <section class="courses">
            <div class="box-container">
            <div class="box" style="cursor:pointer; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col">
                            <div class="tutor">
                                <img src="<?php echo URLROOT; ?>/public/assets/img/profit.jpg" alt="">
                                <div>
                                    <h3>Last Month Earnings</h3>
                                    <H3><?php echo $last_month_earnings; ?> LKR</H3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    

    </section>

    <section class="contents unit-container" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
        <h1 class="heading">My Uploads</h1>
        <div class="flex-btn" style="flex-direction: row; align-items: center; justify-content: center;">

            <button id="showVideo" class="button-17" role="button">Videos</button>
            <button id="showModelPaper" class="button-17" role="button">Model Papers</button>

        </div>
        <section class="unit-container" id="video">
            <div class="box-container">
                <div class="box">
                    <h3>Videos</h3>
                </div>
            </div>
            <?php
            echo '<table id="table" class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Video Name</th>';
            echo '<th>Purchases</th>';
            echo '<th>Price</th>';
            echo '<th>Revenue</th>';
            echo '<th>Status</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($video_analytics as $video) {
                echo '<tr onclick="window.location=\'' . URLROOT . '/Tutor/video/' . $video->video_content_id . '\'">';
                echo '<td>' . $video->name . '</td>';
                echo '<td>' . $video->purchase_count . '</td>';
                echo '<td>' . $video->price . 'LKR</td>';
                echo '<td>' . $video->revenue . 'LKR</td>';
                echo '<td>' . ($video->active ? 'Active' : 'Inactive') . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            ?>



        </section>

        <section class="unit-container" id="model-paper">
            <div class="box-container">
                <div class="box">
                    <h3>Model Papers</h3>
                </div>
            </div>
            <?php
            echo '<table id="table" class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Model Paper Name</th>';
            echo '<th>Purchases</th>';
            echo '<th>Price</th>';
            echo '<th>Revenue</th>';
            echo '<th>Status</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($model_paper_analytics as $model_paper) {
                $url = URLROOT . '/Tutor/model_paper/' . $model_paper->model_paper_content_id;

                // Output the table row with onclick event
                echo '<tr onclick="window.location=\'' . $url . '\'">';
                echo '<td>' . $model_paper->name . '</td>';
                echo '<td>' . $model_paper->purchase_count . '</td>';
                echo '<td>' . $model_paper->price . 'LKR</td>';
                echo '<td>' . $model_paper->revenue . 'LKR</td>';
                echo '<td>' . ($model_paper->active ? 'Active' : 'Inactive') . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            ?>

        </section>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#model-paper").hide();
            $("#showVideo").click(function() {
                $("#model-paper").hide();
                $("#video").show();
            });
            $("#showModelPaper").click(function() {
                $("#video").hide();
                $("#model-paper").show();
            });
        });
    </script>
    <?php $this->view('inc/Footer') ?>
    </body>

    </html>