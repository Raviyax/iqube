<?php $this->view('inc/header') ?>
<section class="dashboard" id="section">

    <h1 class="heading">All Subject Admins</h1>
    <header class="header">

    <section class="flex">
       



        <form  class="search-form" >
            <input type="text" name="searchbar" placeholder="search here..." id="searchbar" onkeyup="search()"  maxlength="100">
            <button type="submit" class="fas fa-search" name="search_btn" ></button>
        </form>

        <a href="#" class="btn" onclick="addnewsubjectadmin()" style="width: fit-content;"><i class="fa-solid fa-user-plus"></i> Add New Subject Admin</a>
        
        

       

    

    </section>

</header>
    <table id="table">
        
  <tr>
    <th>Subject Admin ID</th>
    <th>Name</th>
    <th>Email</th>
    
    

  </tr>
    <?php foreach($data['subjectadmins'] as $subjectadmin): ?>
  <tr onclick="window.location='<?php echo URLROOT?>/Admin/Subject_admin_profile/<?php echo $subjectadmin->subject_admin_id; ?>'">
    <td>
        <?php echo $subjectadmin->subject_admin_id; ?>
    </td>
    <td>
        <?php echo $subjectadmin->fname." ".$subjectadmin->lname; ?>
    </td>
    <td>
        <?php echo $subjectadmin->email; ?>
    </td>
    
  </tr>
    <?php endforeach; ?>
 
 
</table>

</section>


<div id="addnewsubjectadmin" class="overlay" style="z-index: 1000;">
    <section class="video-form">


        <form action="<?php echo URLROOT?>/Admin/all_subject_admins" method="post" enctype="multipart/form-data">
            <div class="flex-btn" style="justify-content: flex-end;">


                <button class="option-btn" onclick="closeadd()" style="width: fit-content;" ><i class="fa-solid fa-xmark"></i></button>
            </div>
            <h1 class="heading">Add New Subject Admin</h1>

            <p>Subject <span>*</span></p>
            <select name="subject" class="box" required>
                <option value="" selected disabled>-- select subject</option>
                <?php foreach ($data['subjects'] as $subject) : ?>
                <option value="<?php echo $subject->subject_name;?>"><?php echo ucwords($subject->subject_name);?></option>
                
                <?php endforeach; ?>
            </select>
            <p>Firstname <span>*</span></p>
            <input type="text" name="fname" maxlength="100" required placeholder="Enter first name" class="box">
            <p>Lastname <span>*</span></p>
            <input type="text" name="lname" maxlength="100" required placeholder="Enter Last Name" class="box">
            <p>Contact Number <span>*</span></p>
            <input type="text" name="cno" maxlength="100" required placeholder="Enter Contact Number" class="box">

            <p>Username <span>*</span></p>
            <input type="text" name="username" maxlength="100" required placeholder="Enter username" class="box">
            <p>Email <span>*</span></p>
            <input type="email" name="email" maxlength="100" required placeholder="Enter email" class="box">

            <p>Password <span>*</span></p>
            <input type="password" name="password" maxlength="100" required placeholder="Enter Password" class="box">

            <p>Confirm Password <span>*</span></p>
            <input type="password" name="confirm_password" maxlength="100" required placeholder="Enter Password" class="box">


            <input type="submit" value="Add Subject Admin" name="submit" class="btn">
        </form>
    </section>
</div>

<script>

function search(){
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


function addnewsubjectadmin() {
        
        document.getElementById("addnewsubjectadmin").style.display = "block";

    }

    function closeadd() {
        
        document.getElementById("addnewsubjectadmin").style.display = "none";

    }
</script>
<?php $this->view('inc/footer') ?>



</body>

</html>