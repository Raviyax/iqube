<?php $this->view('inc/Header',$data) ?>
<?php $tutor = $data['tutor'];?>
<section class="tutor-profile" style="min-height: calc(100vh - 19rem);">
   <h1 class="heading">Tutors / <?php echo $tutor->fname." ".$tutor->lname;?>'s Personal Profile</h1>
   <div class="details">
      <div class="tutor">
         <img src=<?php echo URLROOT."/Admin/userimage/". $data['tutor']->image?> alt="profile" >
         <h3><?php echo $tutor->fname." ".$tutor->lname;?></h3>
            <span><?php echo ucfirst($tutor->subject)?>  Tutor </span>
            <br>
            <?php if ($tutor->active == 1) { ?>
                
                <button id="deactivate" class="button-34" style="background-color:Green" role="button">Active</button>
            <?php } else { ?>
                <button id="activate" class="button-34" style="background-color:Red" role="button">Inactive</button>
            <?php } ?>
      </div>
      <div class="flex">
            <div class="box">
                <span>Username</span>
                <p><?php echo $tutor->username;?></p>
            </div>
            <div class="box">
                <span>Firstname</span>
                <p><?php echo  $tutor->fname;?></p>
            </div>
            <div class="box">
                <span>Lastname</span>
                <p><?php echo  $tutor->lname;?></p>
            </div>
            <div class="box">
                <span>Joined At</span>
                <p><?php $formattedDate = date('Y-m-d', strtotime($tutor->approved_date)); echo  $formattedDate; ?></p>
            </div>
         <div class="box">
            <span>Email</span>
            <p><?php echo  $tutor->email;?></p>
         </div>
         <div class="box">
            <span>Subject</span>
            <p><?php echo  ucfirst($tutor->subject);?></p>
         </div>
         <div class="box">
            <span>Contact Number</span>
            <p><?php echo  $tutor->cno;?></p>
         </div>
      </div>
   </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    const url = "<?php echo URLROOT; ?>/api.php";
    $(document).ready(function () {
        $('#deactivate').click(function () {
            event.preventDefault();
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id: <?php echo $tutor->user_id; ?>,
                    action: 'admin_deactivate_tutor'
                },
                success: function (response) {
                    if (response === 'success') {
                    alert('Tutor deactivated successfully');
                    location.reload();
                } else {
                    alert('Something went wrong');
                }
                }
            });
        });
        $('#activate').click(function () {
            event.preventDefault();
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id: <?php echo $tutor->user_id; ?>,
                    action: 'admin_activate_tutor'
                },
                success: function (response) {
                    if (response === 'success') {
                    alert('Tutor activated successfully');
                    location.reload();
                } else {
                    alert('Something went wrong');
                }
                }
            });
        })
    });
</script>
<?php $this->view('inc/Footer') ?>
</body>
</html>