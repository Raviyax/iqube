<?php $this->view('Inc/Header', $data); ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/Student/syllabus.css">
<div class="container">
    <!-- start of sidebar -->
    <?php $this->view('Inc/Sidebar'); ?>
    <!-- end of sidebar -->

    <!-- start of main part -->
    <div id="main" class="main">
        <!-- start of navbar -->
        <?php $this->view('Inc/Navbar', $data); ?>

        <!-- end of navbar -->

        <!-- start of content -->
        
        <div class="content">
            <div class="cardBox" id="subjectList">
                <!-- Your subject cards will dynamically populate here -->
            </div>
            <div class="cardBox" id="chapterBox" style="display: none;">
                <!-- Display chapters here -->
                <div class="chapterList" id="chapterList"></div>
            </div>
        </div>

        

    </div>


    <!-- script for syllabus -->
<script>
    // Dummy data for subjects and their chapters
const subjects = [
    { name: "Combined Mathematics", progress: 55 },
    { name: "Physics", progress: 40 },
    { name: "Chemistry", progress: 60 }
];

const chaptersForSubjects = {
    "Combined Mathematics": ["Chapter 1", "Chapter 2", "Chapter 3"],
    "Physics": ["Chapter 1", "Chapter 2"],
    "Chemistry": ["Chapter 1", "Chapter 2", "Chapter 3", "Chapter 4"]
};

function displayChapters(selectedSubject) {
    const chapters = chaptersForSubjects[selectedSubject];
    const chapterList = document.getElementById('chapterList');
    chapterList.innerHTML = '';

    chapters.forEach(chapter => {
        const newChapter = document.createElement('div');
        newChapter.classList.add('chapter');
        newChapter.textContent = chapter;
        chapterList.appendChild(newChapter);
    });
}

const subjectList = document.getElementById('subjectList');
const chapterList = document.getElementById('chapterList'); 

subjects.forEach(subject => {
    const newCard = document.createElement('div');
    newCard.classList.add('card');
    newCard.innerHTML = `
        <h3 class="cardName">${subject.name}</h3>
        <div class="progress-bar">
            <div class="progress-fill" style="width: ${subject.progress}%;"></div>
        </div>
    `;

    newCard.addEventListener('click', () => {
        displayChapters(subject.name); 
        chapterList.style.display = 'block'; 
    });

    subjectList.appendChild(newCard);
});

</script>


<?php $this->view('Inc/Footer'); ?>