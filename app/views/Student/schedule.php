<?php $this->view('inc/header', $data); ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/Student/schedule.css">
<link href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css" rel="stylesheet">
<script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>

    
<div class="container">
    <!-- start of sidebar -->
    <?php $this->view('inc/sidebar'); ?>
    <!-- end of sidebar -->

    <!-- start of main part -->
    <div id="main" class="main">
        <!-- start of navbar -->
        <?php $this->view('inc/navbar', $data); ?>

        <!-- end of navbar -->

        <!-- start of content -->
        <div class="content">
            <div id="gantt_here" style='width:100%; height:500px;'></div>
        </div>
        
        
    </div>
    <script>
            gantt.config.xml_date = "%Y-%m-%d %H:%i";
            gantt.init("gantt_here");
            gantt.parse({
                data: [
                    { id: 1, text: "Task #1", start_date: "2023-10-01 00:00", duration: 3, progress: 0.6 },
                    // Add more tasks in a similar format
                ]
            });

            gantt.attachEvent("onAfterTaskAdd", function(id, item){
                // Handle the event after a task is added
                console.log("New task added", id, item);
            });

        </script>

<?php $this->view('inc/footer'); ?>