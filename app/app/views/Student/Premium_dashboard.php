<?php $this->view('inc/Header', $data) ?>

<body>

    <h1 class="heading">Hello <?php echo $_SESSION['USER_DATA']['username']; ?>!</h1>

    <section class="flex white_box">
        <h2 class="heading">Ongoing</h2>
        <br><br>
        <div class="ongoing">
            <p>Introduction to mechanics by Charitha Dissanayake</p>
            <div class="ongoing-bar ongoing1 wow slideInLeft animated">
                <span class="ongoing-count">95%</span>
            </div>
        </div>
    </section>

    <?php
    $subjects = $data['chapters'];
    foreach ($subjects as $subjectData) {
        // Output subject name
        echo '<h1>' . $subjectData[0]->subject . '</h1>';

        // Initialize a variable to keep track of the current level 1 chapter
        $currentChapter = null;

        foreach ($subjectData as $chapter) {
            // Check if this chapter is a new level 1 chapter
            if ($currentChapter !== $chapter->chapter_level_1) {
                // If it's a new chapter, close the previous table if exists
                if ($currentChapter !== null) {
                    echo '</table>';
                    echo '</section>'; // Closing the section for previous chapter_level_1
                }

                // Open a new section for the current chapter_level_1
                echo '<section class="unit-container" id="chapter_level_1">';
                echo '<h2 class="heading">' . $chapter->chapter_level_1 . '</h2>';
                echo '<table>';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>Sub unit</th>';
                echo '<th>Completion Status</th>';
                echo '<th>Progress</th>';
                echo '</tr>';

                // Update the current chapter
                $currentChapter = $chapter->chapter_level_1;
            }

            // Print the chapter_level_2 and weight as table rows
            echo '<tr>';
            echo '<td>' . $chapter->id . '</td>';
            echo '<td contenteditable>' . $chapter->chapter_level_2 . '</td>';
            echo '<td>completed</td>'; // Fixed completion status
            echo '<td style="display:flex; flex-direction:row;">20%</td>'; // Fixed progress
            echo '</tr>';
        }

        // Close the last table and section
        if ($currentChapter !== null) {
            echo '</table>';
            echo '</section>'; // Closing the section for last chapter_level_1
        }
    }
    ?>

    <?php $this->view('inc/Footer') ?>
</body>

</html>
