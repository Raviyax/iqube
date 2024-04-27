<?php $this->view('inc/Header', $data) ?>
<?php $backups = $data['backups'];?>

<section class="courses">
    <h1 class="heading">Site Backups <a href="<?php echo URLROOT; ?>/admin/create_backup" class="btn" style="width: fit-content; margin-left: 10px;"><i class="fa-solid fa-folder-plus"></i> Create a New Backup</a></h1>
    <section style="margin-top: 10px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px; padding: 50px;">
<?php foreach ($backups as $backup) : ?>
    <a href="<?php echo URLROOT; ?>/admin/download_backup/<?php echo $backup; ?>" class="btn" style="width: fit-content; margin: 10px;"><i class="fa-solid fa-database"></i> <?php echo $backup; ?></a>
<?php endforeach; ?>
    </section>
</section>
 

  
    <?php $this->view('inc/Footer') ?>