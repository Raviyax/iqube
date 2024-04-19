<?php $this->view('inc/Header', $data) ?>
<section class="video-form">
    <form action="<?php echo URLROOT ?>/student/more_details" method="post" enctype="multipart/form-data">
        <h1 class="heading">We Need to Know Few Details About You</h1>
        <p>Subject/s you are planing to work on<span>* Select 1 to 3 subjects</span></p>
        <br>
        <!-- <div style="background-color: red; width:100%; padding:10px; border-radius:5px;">
                <p style="color: black; ">
                    <b>errorrrrrrrrr</b>
                </p>
            </div>
            <br> -->
            <?php if(isset($data['errors']['subjects'])):?>
                <div style="background-color: red; width:100%; padding:10px; border-radius:5px;">
                    <p style="color: black; ">
                        <b><?php echo $data['errors']['subjects'];?></b>
                    </p>
                </div>
                <br>
            <?php endif;?>
        <header class="header">
            <section class="flex">
                    <input type="text" name="searchbar" placeholder="search here..." id="searchbar" onkeyup="search()" maxlength="100">
                    <button type="submit" class="fas fa-search" name="search_btn"></button>
                </a>
            </section>
        </header>
        <div class="flex">
            <div class="col">
                <div class="chaptercontainer">
                    <?php
                    $subjects = $data['subjects'];
                    foreach ($subjects as $subject) {
                        echo '<div class="col">';
                        echo '<input type="checkbox" name="subject[]" value="' . $subject->subject_id . '" id="' . $subject->subject_id . '">';
                        echo '<label for="' . $subject->subject_id . '">' . $subject->subject_name . '</label>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div style="display: flex; flex-direction:row-reverse">
            <button type="submit" class="btn" style="width: fit-content;" name="proceed">Proceed <i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </form>
</section>
<?php $this->view('inc/Footer') ?>
</body>
</html>