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

// calendar \\

$(document).ready(function () {
    // Initialize the calendar
    createCalendar();

    // Handle date selection
    $('#calendar').on('click', 'td:not(.disabled)', function () {
        $('#calendar td').removeClass('selected');
        $(this).addClass('selected');
        // You can perform actions on date selection here
    });
});

function createCalendar() {
    var today = new Date();
    var year = today.getFullYear();
    var month = today.getMonth();
    var daysInMonth = new Date(year, month + 1, 0).getDate();
    var firstDay = new Date(year, month, 1).getDay();
    
    var calendar = '<header>' + getMonthName(month) + ' ' + year + '</header>';
    calendar += '<table>';
    calendar += '<tr>';
    calendar += '<th>Sun</th>';
    calendar += '<th>Mon</th>';
    calendar += '<th>Tue</th>';
    calendar += '<th>Wed</th>';
    calendar += '<th>Thu</th>';
    calendar += '<th>Fri</th>';
    calendar += '<th>Sat</th>';
    calendar += '</tr>';
    
    var dayCounter = 1;
    for (var i = 0; i < 6; i++) {
        calendar += '<tr>';
        for (var j = 0; j < 7; j++) {
            if ((i === 0 && j < firstDay) || dayCounter > daysInMonth) {
                calendar += '<td class="disabled"></td>';
            } else {
                var isToday = isSameDay(new Date(year, month, dayCounter), today) ? 'today' : '';
                calendar += '<td class="' + isToday + '">' + dayCounter + '</td>';
                dayCounter++;
            }
        }
        calendar += '</tr>';
    }
    
    calendar += '</table>';
    $('#calendar').html(calendar);
}

function getMonthName(month) {
    var monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    return monthNames[month];
}

function isSameDay(date1, date2) {
    return date1.getFullYear() === date2.getFullYear() && date1.getMonth() === date2.getMonth() && date1.getDate() === date2.getDate();
}



// collapsible \\

var coll = document.getElementsByClassName("collapsible");
var span = document.getElementById("span");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    var content = this.nextElementSibling;
    if (content.style.display === "none") {
      content.style.display = "grid";
      span.innerHTML = "^";
    } else {
      content.style.display = "none";
      span.innerHTML = ">";
    }
  });
}
