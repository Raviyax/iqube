<?php $this->view('inc/Header', $data) ?>
<?php $not_completed_study_materials = false;
$subjects = $data['chapters'];
$studied_subunits = false;
$progress_tracked_subunits = false;
$mainunit_progresses = false;
$subject_progresses = false;
$subject_completions = false;
$unit_weights = $data['unit_weights'];
?>

<body>
    
    <section class="dashboard">
        <section class="contents unit-container" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
            <div style="position: relative;">
                <div style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; padding: 20px;">
                    <div class="flex-btn" style="flex-direction: row; align-items: center; justify-content: center; margin-bottom:20px;">
                        <button id="" class="button-17">My Summary</button>
                    </div>
                    <div class="box-container" style="display:flex;">
                        <div class="box" style="width:500px; box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;">
                            <div id="overallProgress" style="height: 200px; width: 100%;"></div>
                        </div>
                        <div class="box" style="width:500px; box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;">
                            <div id="subject_completions" style="height:200px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.7); z-index: 1; display: flex; align-items: center; justify-content: center;">
                    <div class="profile">

                        <a href="<?php echo URLROOT ?>/Student/purchase_premium" class="btn"><i class="fa-solid fa-crown"></i> Upgrade to Premium</a>



                    </div>

                </div>
            </div>

            <div style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; padding: 20px; margin-top: 10px;">
                <div class="flex-btn" style="flex-direction: row; align-items: center; justify-content: center; margin-bottom:20px; margin-top:20px;">
                    <button id="" class="button-17">About My Subjects</button>
                </div>
                <div class="box-container" style="display:flex;">
                    <?php foreach ($unit_weights as $subject => $weights) : ?>
                        <div class="box" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset; width:400px;">
                            <div id="<?php echo $subject ?>Container" style="height: 200px; width: 100%;"></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="contents unit-container" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
            <h1 class="heading">Where am I</h1>
            <div class="flex-btn" style="flex-direction: row; align-items: center; justify-content: center;">
                <?php foreach ($subjects as $subjectData) : ?>
                    <button id="<?php echo htmlspecialchars($subjectData[0]->subject); ?>" class="button-17" role="button"><?php echo ucfirst(htmlspecialchars($subjectData[0]->subject)); ?></button>
                <?php endforeach; ?>
               
            </div>
           
            <?php
            foreach ($subjects as $subjectData) {
                echo '<section class="courses" id="' . htmlspecialchars($subjectData[0]->subject) . '"  >';
                $currentChapter = null;
                foreach ($subjectData as $chapter) {
                    if ($currentChapter !== $chapter->chapter_level_1) {
                        if ($currentChapter !== null) {
                            echo '</table>'; // Assuming this table was opened correctly before
                            echo '</section>';
                        }
                        echo '<section class="unit-container" id="chapter_level_1" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">';
                        echo '<h2 class="heading" style="border:none;">' . htmlspecialchars($chapter->chapter_level_1) . '</h2>';


                        echo '<div class="ongoing" style=" opacity: 0.5;"><p>Unit Overall Progress</p><div class="ongoing-bar ongoing1 wow slideInLeft animated" style="width:0%"><span class="ongoing-count">0%</span></div></div>';

                        echo '<table id="table">';
                        echo '<tr>';
                        echo '<th>Sub unit</th>';
                        echo '<th>Summary</th>';
                        echo '<th>Progress</th>';
                        echo '</tr>';
                        $currentChapter = $chapter->chapter_level_1;
                    }
                    echo '<tr onclick="window.location.href = \'' . htmlspecialchars(URLROOT . '/student/where_am_i/' . $chapter->id) . '\'">';
                    echo '<td>' . htmlspecialchars($chapter->chapter_level_2) . '</td>';
                    echo '<td style="display:flex; flex-direction:horizontal; opacity: 0.5;">';
                    echo '<button class="button-34" style="background-color:red" role="button">Not Studied</button>';
                    echo '<button class="button-34" style="background-color:red" role="button">Progress Not Tracked</button>';
                    echo '</td>';
                    echo '<td style=" opacity: 0.5;" >N/A</td>';
                    echo '</tr>';
                }
                if ($currentChapter !== null) {
                    echo '</table>';
                    echo '</section>';
                }
           
                echo '</section>';
            }
            ?>
        </section>
    </section>
    <?php $this->view('inc/Footer') ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
    //on click of div class box
    $('.box').click(function() {
        var content_id = $(this).attr('id');
        var type = $(this).data('type');
        window.location.href = "<?php echo URLROOT; ?>/student/" + type + "_overview/" + content_id;
    });
    //hide all courses except the first one
    $('.courses').hide();
    //<section class="courses" id="physics"> is shown
    $('.courses').first().show();
    //on click of button
    <?php foreach ($subjects as $subjectData) : ?>
        $('#<?php echo $subjectData[0]->subject; ?>').click(function() {
            $('.courses').hide();
            $('.courses#<?php echo $subjectData[0]->subject; ?>').show();
        });
    <?php endforeach; ?>
    window.onload = function() {
        // Assuming $subject_progresses is already defined
        var subjectProgresses = <?php echo json_encode($subjects); ?>;
        var dataPoints = [];
        // Loop through each subject progress
        subjectProgresses.forEach(function(subject) {
            dataPoints.push({
                y: 0,
                label: subject[0].subject
            });
        });
        var chart = new CanvasJS.Chart("overallProgress", {
            animationEnabled: true,
            title: {
                text: 'My Overall progress'
            },
            theme: "light2",
            axisX: {
                interval: 1,
                title: "Subjects"
            },
            axisY: {
                minimum: 0,
                maximum: 100,
                interval: 20,
                title: "Percentage"
            },
            data: [{
                type: "bar",
                dataPoints: dataPoints
            }]
        });
        chart.render();
        var chart2 = new CanvasJS.Chart("subject_completions", {
            animationEnabled: true,
            title: {
                text: 'My Overall Completion'
            },
            theme: "light2", //"light1", "dark1", "dark2"
            axisY: {
                interval: 20,
                suffix: "%"
            },
            toolTip: {
                shared: true,
                content: "{label}: {y}% completed" // Updated tooltip content format
            },
            data: [{
                    type: "stackedBar100",
                    showInLegend: false,
                    name: "Completion Percentage",
                    color: "green", // Green color for completed percentage
                    dataPoints: [
                        <?php if ($subjects) : ?>
                            <?php foreach ($subjects as $subject) : ?> {
                                    y: 0,
                                    label: "<?php echo ucfirst($subject[0]->subject); ?>"
                                },
                            <?php endforeach; ?>
                        <?php endif; ?>
                    ]
                },
                {
                    type: "stackedBar100",
                    showInLegend: false,
                    name: "Remaining Percentage",
                    color: "red", // Red color for remaining percentage
                    dataPoints: [
                        <?php if ($subject_completions) : ?>
                            <?php foreach ($subject_completions as $completion) : ?> {
                                    y: <?php echo 100 - $completion->percentage; ?>,
                                    label: "<?php echo ucfirst($completion->subject); ?>"
                                },
                            <?php endforeach; ?>
                        <?php endif; ?>
                    ]
                }
            ]
        });
        chart2.render();
        //kelawena eka
        function generateChart(subject, weights) {
            var dataPoints = [];
            // Iterate over units in the subject
            weights.forEach(function(unit) {
                // Push unit data to dataPoints
                dataPoints.push({
                    y: unit.total_weight,
                    label: unit.unit
                });
            });
            // Create chart
            var chart3 = new CanvasJS.Chart(subject + "Container", {
                animationEnabled: true,
                title: {
                    text: subject
                },
                data: [{
                    type: "pie",
                    startAngle: 240,
                    yValueFormatString: "##0.00\"\"",
                    toolTipContent: "{y} (#percent%)",
                    indexLabel: "{label} #percent%",
                    dataPoints: dataPoints
                }]
            });
            chart3.render();
        }
        // Define data
        var unitWeights = <?php echo json_encode($unit_weights); ?>;
        // Iterate over subjects
        for (var subject in unitWeights) {
            if (unitWeights.hasOwnProperty(subject)) {
                // Generate chart for each subject
                generateChart(subject, unitWeights[subject]);
            }
        }
    }
</script>

</html>