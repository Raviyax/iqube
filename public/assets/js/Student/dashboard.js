// Define the course data
const coursesData = [
    { name: "Mathematics", progress: 75, nextEvent: "Ongoing Course: Trigonometry" },
    { name: "Physics", progress: 60, nextEvent: "Next Quiz: Next week" },
    { name: "Chemistry", progress: 69, nextEvent: "Next Test: Next week; Ongoing Course: Organic Conversions" },
];

// Function to dynamically create course cards and display in the HTML
function displayCourses() {
    const coursesContainer = document.getElementById("coursesContainer");

    coursesData.forEach(course => {
        const courseCard = document.createElement("div");
        courseCard.classList.add("course-card");

        const progress = document.createElement("p");
        progress.classList.add("progress");
        progress.textContent = `${course.progress}% Complete`;

        const nextEvent = document.createElement("p");
        nextEvent.textContent = course.nextEvent;

        courseCard.innerHTML = `<h3>${course.name}</h3>`;
        courseCard.appendChild(progress);
        courseCard.appendChild(nextEvent);

        coursesContainer.appendChild(courseCard);
    });
}

// Function to dynamically create the syllabus progress section and display in the HTML
function displaySyllabusProgress() {
    const syllabusProgress = document.getElementById("syllabusProgress");

    syllabusProgress.innerHTML = `<h2>Syllabus Progress</h2>
        <div class="progress-bar overall-progress">
            <div class="progress-label">Overall Progress</div>
            <div class="progress-track">
                <div class="progress-fill" style="width: 70%;">70%</div>
            </div>
        </div>
        <div class="subject-progress">
            <div class="subject-progress-bar">
                <div class="subject-label">Subject 1</div>
                <div class="progress-track">
                    <div class="progress-fill" style="width: 50%;">50%</div>
                </div>
            </div>
            <!-- More subject progress bars -->
        </div>`;
}

// Display the courses and syllabus progress when the page loads
window.onload = function() {
    displayCourses();
    displaySyllabusProgress();
};
