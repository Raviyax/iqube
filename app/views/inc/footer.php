
<script src="<?php echo URLROOT; ?>/assets/js/main.js"></script>
<?php if(Auth::is_student()){ ?>
    <script src="<?=URLROOT?>/assets/js/Student/main.js"></script>
<?php } ?>


</body>

</html>