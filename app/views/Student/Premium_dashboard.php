<?php $this->view('inc/Header', $data) ?>
<section class="courses">
    <h1 class="heading">Hello <?php echo $_SESSION['USER_DATA']['username']; ?>!</h1>
    <section class="flex white_box">
        <h2 class="heading">ongoing</h2>
        <br><br>
        <div class="ongoing">
            <p>Introduction to mechanics by Charitha Dissanayake</p>
            <div class="ongoing-bar ongoing1 wow slideInLeft animated">
                <span class="ongoing-count">95%</span>

            </div>
        </div>

        </div><!-- end of /.coloumn -->
    </section>
    <?php $subjects = $data['chapters'];?>

<?php foreach($subjects as $subject => $chapters): ?>
    <section class="flex white_box">
        <h2 class="heading"><?php echo $subject;?> Syllabus</h2>

        <?php
        foreach ($chapters as $chapter) { // Iterate over $chapters, not $subject
            $elements = explode('--->>>', $chapter->chapter_level_2_list_with_id);
            $resultArray = [];
            foreach ($elements as $element) {
                list($id, $chapter_level_2) = explode('-->>', $element);
                $resultArray[] = ['id' => $id, 'chapter_level_2' => $chapter_level_2];
            }
            echo '<div class="chaptercontainer">';
            echo '<ul>';
            echo '<li>';
            echo '<p><b>' . $chapter->chapter_level_1 . '</b></p><br>';
            echo '<ul>';
            foreach ($resultArray as $result) {
                echo '<li><p>' . $result['chapter_level_2'] . '</p></li>';
            }
            echo '</ul>';
            echo '</li>';
            echo '</ul>';
            echo '</div>';
        }
        ?>
    </section>
<?php endforeach; ?>

        
   
    

</section>
<?php $this->view('inc/Footer') ?>
</body>

</html>