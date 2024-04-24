<?php $this->view('inc/Header',$data) ?>
<link rel="stylesheet" href="<?=URLROOT?>/assets/css/student/profile.css">
<section class="dashboard">
    <div class="grid">
        <div class="flex">
            <svg width="250" height="250" viewBox="0 0 250 250" class="circular-progress" onclick="changeDP()">
                <circle class="bg"></circle>
                <circle class="fg"></circle>
            </svg>
            <img src="<?php echo URLROOT."/student//userimage/".$_SESSION['USER_DATA']['image'];?>" alt="" >
        </div>
    </div>
    <div id="profile-pic">
        <input type="file" name="profile-pic" accept="image/*" class="box">
    </div>
</section>
<?php $this->view('inc/Footer') ?>
<script>
    function changeDP(){
        document.getElementById("profile-pic").style.display = "flex";
    }
    function close(id){
        document.getElementById(id).style.display = "none";
    }
</script>
</body>
</html>