
<script src="<?php echo URLROOT; ?>/assets/js/main.js"></script>
<?php if(Auth::is_logged_in()){ ?>
<?php if(Auth::is_student()){ ?>
    <script src="<?=URLROOT?>/assets/js/Student/main.js"></script>
<?php } ?>
<?php } ?>


</body>

</html>
