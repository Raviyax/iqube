<?php $this->view('inc/Header', $data) ?>
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
                echo '<button class="btn addnewsubunit"  name="addnewsubunit"><i class="fa-solid fa-circle-plus"></i> Add new sub unit</button>';
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
        echo '<button class="btn addnewsubunit"  name="addnewsubunit"><i class="fa-solid fa-circle-plus"></i> Add new sub unit</button>';
        echo '</section>'; 
        // Closing the section for last chapter_level_1
        echo '<button class="btn addUnitBtn" style="width: fit-content;" id="addnewunit"><i class="fa-solid fa-circle-plus"></i> Add new unit</button>';
    }
    ?>
</section>
<script>
  //add a new empty row for the current table when addnewsubunit button is clicked
  $(document).on('click', 'button.addnewsubunit', function() {
  const table = $(this).parent().find('table');
  const newRow = $('<tr><td>-</td><td contenteditable></td><td contenteditable></td><td style="display:flex; flex-direction:row;"><button class="btn" style="width:fit-content; height:min-content; background-color:unset; color:red;" id="savenew"><i class="fa-solid fa-floppy-disk"></i></button><button class="btn" style="width:min-content; height:min-content; background-color:unset; color:red;" id="removenew"><i class="fa-solid fa-xmark"></i></button></td></tr>');
  table.append(newRow);
});
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
    // Get the chapter_level_1 from the closest section's h1
    const chapter_level_1 = $(this).closest('section').find('h1').text();
    // Get the id, subunit, and weight from the table row
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
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while processing your request');
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
    // Save the new subunit and weight
    $(document).on('click', 'button#savenew', function() {
      // Get the chapter_level_1 from the closest section's h1
      const chapter_level_1 = $(this).closest('section').find('h1').text();
      // Get the subunit and weight from the new row
      const subunit = $(this).closest('tr').find('td').eq(1).text();
      const weight = $(this).closest('tr').find('td').eq(2).text();
      $.ajax({
        url: api_root,
        type: 'POST',
        data: {
          action: 'insert_subunit',
          chapter_level_1: chapter_level_1,
          subunit: subunit,
          weight: weight
        },
        success: function(response) {
          console.log(response);
          if (response === 'success') {
            alert('Subunit added successfully');
            location.reload();
          } else {
            alert('Failed to add subunit');
          }
        }
      });
    });
    // Remove the new subunit and weight
    $(document).on('click', 'button#removenew', function() {
      $(this).closest('tr').remove();
    });
    //add a new complete section with empty row when addnewunit button is clicked
    $('button#addnewunit').click(function() {
      //ask name of the unit by a alert
      const chapter_level_1 = prompt('Enter the name of the new unit');
      if (chapter_level_1) {
        const section = document.createElement('section');
        section.className = 'unit-container';
        section.innerHTML = `
          <h1 class="heading" style="border:none;">${chapter_level_1}</h1>
          <table id="table">
            <tr style="cursor:default;">
              <th>ID</th>
              <th>Sub unit</th>
              <th>Weight</th>
              <th>Action</th>
            </tr>
          </table>
          <button class="btn addnewsubunit" name="addnewsubunit"><i class="fa-solid fa-circle-plus"></i> Add new sub unit</button>
        `;
        //insert the new section before the addnewunit button
        document.querySelector('button#addnewunit').before(section);
      }
  });
});
</script>
<?php $this->view('inc/Footer') ?>
</body>
</html>
