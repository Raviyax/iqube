<?php $this->view('inc/header', $data) ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<section>
    <h1 class="heading">Manage <?php echo $_SESSION['USER_DATA']['subject']; ?> Syllabus</h1>

    <?php
    $chapters = $data['syllabus'];

    $currentChapter = null; // To keep track of the current chapter

    foreach ($chapters as $chapter) {
        // Check if this is a new chapter
        if ($currentChapter !== $chapter->chapter_level_1) {
            // If it's a new chapter, close the previous section if exists
            if ($currentChapter !== null) {
                echo '</table>';
                echo '</section>'; // Closing the section for previous chapter_level_1
            }

            // Open a new section for the current chapter_level_1
            echo '<section class="unit-container" id="chapter_level_1">';
            echo '<h1 class="heading" style="border:none;">' . $chapter->chapter_level_1 . '</h1>';
            echo '<table id="table">';
            echo '<tr style="cursor:default;">';
            echo '<th>ID</th>';
            echo '<th>Sub unit</th>';
            echo '<th>Weight</th>';
            echo '<th>Action</th>';
      
            echo '</tr>';
        }

        // Print the chapter_level_2 and weight as table rows
        echo '<tr style="cursor:default;">';
        echo '<td>';
        echo $chapter->id;
        echo '</td>';
        echo '<td contenteditable>';
        echo $chapter->chapter_level_2;
        echo '</td>';
        echo '<td contenteditable>';
        echo $chapter->weight;
        echo '</td>';
        echo '<td style="display:flex; flex-direction:row;">';
        echo '<button class="btn" style="width:fit-content; height:min-content; background-color:unset; color:red; display:none;" id="save"><i class="fa-solid fa-circle-check"></i> Save</button>';

        echo '<button class="btn" style="width:min-content; height:min-content; background-color:unset; color:red;" id="delete"><i class="fa-solid fa-trash-can"></i></button>';

        echo '</td>';
        echo '</tr>';

        $currentChapter = $chapter->chapter_level_1; // Update the current chapter
    }

    // Close the last section
    if ($currentChapter !== null) {
        echo '</table>';
        echo '</section>'; // Closing the section for last chapter_level_1
    }
    ?>

</section>
<script>
  //if any edit for the subunit or weight, show the save button
  document.querySelectorAll('td[contenteditable]').forEach(td => {
    td.addEventListener('input', () => {
      td.parentElement.querySelector('#save').style.display = 'block';
    });
  });

  const URLROOT = '<?= URLROOT ?>';
  const api_root = URLROOT + '/api.php';
  $(document).ready(function() {
    // Save the edited subunit and weight
    $('button#save').click(function() {
      const id = $(this).closest('tr').find('td').eq(0).text();
      const subunit = $(this).closest('tr').find('td').eq(1).text();
      const weight = $(this).closest('tr').find('td').eq(2).text();

      $.ajax({
        url: api_root,
        type: 'POST',
        data: {
          action: 'update_syllabus',
          id: id,
          subunit: subunit,
          weight: weight
        },
        success: function(response) {
          console.log(response);
          if (response === 'success') {
            alert('Syllabus updated successfully');
            location.reload();
          } else {
            alert('Failed to update syllabus');
          }
        }
      });
    });

//delete sub unit with id
    $('button#delete').click(function() {
      const id = $(this).closest('tr').find('td').eq(0).text();
      $.ajax({
        url: api_root,
        type: 'POST',
        data: {
          action: 'delete_syllabus',
          id: id
        },
        success: function(response) {
          console.log(response);
          if (response === 'success') {
            alert('Syllabus deleted successfully');
            location.reload();
          } else {
            alert('Failed to delete syllabus');
          }
        }
      });
    });
  });
  

</script>

<?php $this->view('inc/Footer') ?>
</body>
</html>
