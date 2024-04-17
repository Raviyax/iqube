<?php $this->view('inc/Header', $data) ?>
<section class="dashboard" id="section">
  <h1 class="heading">Tutor requests for <?php echo $_SESSION['USER_DATA']['subject'] ?></h1>
  <header class="header">
    <section class="flex">
      <form class="search-form">
        <button type="submit" class="fas fa-search" name="search_btn"></button>
        <input type="text" name="searchbar" placeholder="Type the tutors name here..." id="searchbar" onkeyup="search()" maxlength="100">
      </form>
    </section>
  </header>
  <?php if (($data['tutors'])) {
$tutors = $data['tutors'];
  ?>
  <table id="table">
    <tr>
      <th>Request ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Requested date</th>
    </tr>
    <?php foreach ($tutors as $tutor) : ?>
      <tr onclick="window.location='<?php echo URLROOT ?>/Subjectadmin/view_request/<?php echo $tutor->request_id; ?>'">
        <td><?php echo $tutor->request_id ?></td>
        <td><?php echo $tutor->fname . ' ' . $tutor->lname ?></td>
        <td><?php echo $tutor->email ?></td>
        <td><?php echo $tutor->requested_date ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <?php } else { ?>
    <p>No tutor requests found</p>
  <?php } ?>
</section>
<script>
  function search() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchbar");
    filter = input.value.toUpperCase();
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>
<?php $this->view('inc/Footer') ?>
</body>
</html>