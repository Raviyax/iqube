<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME. " ".$data['title']; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/assets/css/style.css">
    <?php if (Auth::is_logged_in()) { ?>
    <?php if (Auth::is_student()) { ?>
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/Student/studentStyle.css">
    <?php } ?>
    <?php } ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">



