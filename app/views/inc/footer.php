<footer class="footer">
<?php if(Auth::is_logged_in()){?>
   &copy; copyright @ <?= date('Y'); ?> by <span>IQube</span> | all rights reserved!
   <?php }?>
   <script src="<?php echo URLROOT;?>/assets/js/main.js"></script>
</footer>