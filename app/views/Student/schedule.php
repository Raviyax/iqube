<?php $this->view('Inc/Header', $data); ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/Student/schedule.css">
<link href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css" rel="stylesheet">
<script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
<script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt_connector.js"></script>
    
<div class="container">
    <!-- start of sidebar -->
    <?php $this->view('Inc/Sidebar'); ?>
    <!-- end of sidebar -->

    <!-- start of main part -->
    <div id="main" class="main">
        <!-- start of navbar -->
        <?php $this->view('Inc/Navbar', $data); ?>

        <!-- end of navbar -->

        <!-- start of content -->
        <div class="content">
            <div id="gantt_here" style='width:100%; height:500px;'></div>
        </div>

    </div>
    <script>
            gantt.config.xml_date = "%Y-%m-%d %H:%i";
            gantt.init("gantt_here");
            // gantt.load('http://localhost/dhtmlxGantt/data.php');
            // gantt.parse({
            //     data: [
            //         { id: 1, text: "Task #1", start_date: "2023-10-01 00:00", duration: 3, progress: 0.6 },
            //         // Add more tasks in a similar format
            //     ]
            // });

//             fetch('http://localhost/iqube/app/models/Gantt.php')
//   .then(response => response.json())
//   .then(data => {
//     gantt.parse(data);
//   })
//   .catch(error => {
//     console.error('Error fetching Gantt data:', error);
//   });


            gantt.attachEvent("onBeforeTaskAdd", function(id,task){
                task.sortorder = 0;
                return true;
            });
//             gantt.attachEvent("onAfterTaskAdd", function(id, item) {
//     fetch('/Student/addGanttTask', {
//         method: 'POST',
//         body: JSON.stringify(item),
//         headers: {
//             'Content-Type': 'application/json'
//         }
//     })
//     .then(response => response.json())
//     .then(data => {
//         console.log('New task ID:', data.taskId);
//         // Now, using the received task ID, insert link data or perform any other required actions
//     })
//     .catch(error => {
//         console.error('Error adding Gantt task:', error);
//     });
// });


        </script>

<?php $this->view('Inc/Footer'); ?>