<?php $this->view('inc/Header',$data) ?>
    <section class="video-form">
        <form action="<?php echo URLROOT?>/student/more_details" method="post" enctype="multipart/form-data">
            <h1 class="heading">We Need to Know Few Details About You</h1>
            <p>Subject <span>*</span></p>
            <select name="subjects" class="box" required>
                <option value="" selected disabled>-- select subject</option>
                <?php foreach ($data['subjects'] as $subject) : ?>
                <option value="<?php echo $subject->subject_name;?>"><?php echo ucwords($subject->subject_name);?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Proceed" name="proceed" class="btn">
        </form>
    </section>
<?php $this->view('inc/Footer') ?>
</body>
</html>