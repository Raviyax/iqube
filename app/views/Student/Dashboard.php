<?php $this->view('inc/header',$data) ?>

<link rel="stylesheet" href="<?=URLROOT?>/assets/css/student/dash.css">

<section>

    <!-- <h1 class="heading">Hello <?php echo $_SESSION['USER_DATA']['username'];?>!</h1> -->


    <!-- <div class="box-container">

        <div class="box">
            <h3>test</h3>
            <p>test</p>

        </div>

    </div> -->

    <div class="container">
        <div class="mylearning">
            <div>
                <div class="intro">
                    <h1 class="heading">Hello <?php echo $_SESSION['USER_DATA']['username'];?>!</h1>
                    <span>Welcome to the new "My learning" Feature at IQube. This will be your hub to all the tutorials we offer and your learning progress.
We hope you will continue to learn with us.</span>
                </div>
                <div class="scorecard">
                    <div class="gauge"></div>
                    <div class="points"></div>
                    <div class="factors"></div>
                </div>
                <div class="btn-area">
                    <button class="btn">Continue "Magnetic Flux | Physics</button>
                    <button class="btn">Browse Tutorials</button>
                </div>
            </div>
        </div>
        <div id="calendar"></div>
        <div class="cards">
            <div class="card">Courses completed</div>
            <div class="card">Lessons Read</div>
            <div class="card">Achievements</div>
        </div>

        <div class="pathfinder">
            <div class="heading">
                <span>My Goal</span>
                <a href="">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.3685 14.6642C18.3796 14.6642 17.4129 14.9574 16.5907 15.5068C15.7684 16.0562 15.1276 16.8371 14.7491 17.7508C14.3707 18.6644 14.2717 19.6697 14.4646 20.6396C14.6575 21.6095 15.1337 22.5005 15.833 23.1997C16.5323 23.899 17.4232 24.3752 18.3931 24.5681C19.363 24.761 20.3683 24.662 21.2819 24.2836C22.1956 23.9051 22.9765 23.2643 23.5259 22.442C24.0753 21.6198 24.3685 20.6531 24.3685 19.6642M20.3685 10.7192C18.5146 10.5112 16.6418 10.8845 15.0093 11.7874C13.3768 12.6903 12.0652 14.0782 11.256 15.7591C10.4467 17.44 10.1798 19.3308 10.4922 21.17C10.8045 23.0093 11.6807 24.706 12.9996 26.0255C14.3184 27.3449 16.0146 28.222 17.8537 28.5353C19.6928 28.8486 21.5838 28.5826 23.2651 27.7742C24.9464 26.9658 26.3349 25.6549 27.2386 24.0229C28.1424 22.3908 28.5166 20.5182 28.3095 18.6642M22.3685 16.6642V13.6642L25.3685 10.6642V13.6642H28.3685L25.3685 16.6642H22.3685ZM22.3685 16.6642L19.3685 19.6642M18.3685 19.6642C18.3685 19.9294 18.4739 20.1838 18.6614 20.3713C18.849 20.5588 19.1033 20.6642 19.3685 20.6642C19.6337 20.6642 19.8881 20.5588 20.0756 20.3713C20.2632 20.1838 20.3685 19.9294 20.3685 19.6642C20.3685 19.399 20.2632 19.1446 20.0756 18.9571C19.8881 18.7695 19.6337 18.6642 19.3685 18.6642C19.1033 18.6642 18.849 18.7695 18.6614 18.9571C18.4739 19.1446 18.3685 19.399 18.3685 19.6642Z" stroke-linecap="round" stroke-linejoin="round"></path><path d="M6.09998 3.16406V10.1641M2.59998 6.66406H9.59998" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg></a>
            </div>
            <div class="goals">
                <div class="goal-card">
                    <button class="collapsible">
                        <span id="span">></span>
                        <h1>Learn Mechanics</h1>
                        <a href=""><i class="fa-solid fa-pen"></i></a>
                        <div class="duration">31 days left</div>
                    </button>
                    <div class="coll-content">
                        <span>Straight Line Motion</span>
                        <span>Rotational Motion</span>
                        <span>Fluid Dynamics</span>
                    </div>
                    <div class="progress-area">
                        <div class="progress-bar">
                            <div class="bar">20%</div>
                        </div>
                    </div>
                </div>
                <div class="goal-card">
                    <button class="collapsible">
                        <span id="span">></span>
                        <h1>Learn Mechanics</h1>
                        <a href=""><i class="fa-solid fa-pen"></i></a>
                        <div class="duration">31 days left</div>
                    </button>
                    <div class="coll-content">
                        <span>Straight Line Motion</span>
                        <span>Rotational Motion</span>
                        <span>Fluid Dynamics</span>
                    </div>
                    <div class="progress-area">
                        <div class="progress-bar">
                            <div class="bar">20%</div>
                        </div>
                    </div>
                </div>
                <div class="goal-card">
                    <button class="collapsible">
                        <span id="span">></span>
                        <h1>Learn Mechanics</h1>
                        <a href=""><i class="fa-solid fa-pen"></i></a>
                        <div class="duration">31 days left</div>
                    </button>
                    <div class="coll-content">
                        <span>Straight Line Motion</span>
                        <span>Rotational Motion</span>
                        <span>Fluid Dynamics</span>
                    </div>
                    <div class="progress-area">
                        <div class="progress-bar">
                            <div class="bar">20%</div>
                        </div>
                    </div>
                </div>
                <div class="goal-card">
                    <button class="collapsible">
                        <span id="span">></span>
                        <h1>Learn Mechanics</h1>
                        <a href=""><i class="fa-solid fa-pen"></i></a>
                        <div class="duration">31 days left</div>
                    </button>
                    <div class="coll-content">
                        <span>Straight Line Motion</span>
                        <span>Rotational Motion</span>
                        <span>Fluid Dynamics</span>
                    </div>
                    <div class="progress-area">
                        <div class="progress-bar">
                            <div class="bar">20%</div>
                        </div>
                    </div>
                </div>
                <div class="goal-card">
                    <button class="collapsible">
                        <span id="span">></span>
                        <h1>Learn Mechanics</h1>
                        <a href=""><i class="fa-solid fa-pen"></i></a>
                        <div class="duration">31 days left</div>
                    </button>
                    <div class="coll-content">
                        <span>Straight Line Motion</span>
                        <span>Rotational Motion</span>
                        <span>Fluid Dynamics</span>
                    </div>
                    <div class="progress-area">
                        <div class="progress-bar">
                            <div class="bar">20%</div>
                        </div>
                    </div>
                </div>
                <div class="goal-card">
                    <button class="collapsible">
                        <span id="span">></span>
                        <h1>Learn Mechanics</h1>
                        <a href=""><i class="fa-solid fa-pen"></i></a>
                        <div class="duration">31 days left</div>
                    </button>
                    <div class="coll-content">
                        <span>Straight Line Motion</span>
                        <span>Rotational Motion</span>
                        <span>Fluid Dynamics</span>
                    </div>
                    <div class="progress-area">
                        <div class="progress-bar">
                            <div class="bar">20%</div>
                        </div>
                    </div>
                </div>
                <div class="btn-area"></div>
            </div>
            <div class="visuals">
                <svg cx="50%" cy="50%" class="recharts-surface" width="312" height="312" viewBox="0 0 312 312" style="width: 100%; height: 100%;"><title></title><desc></desc><defs><clipPath id="recharts1-clip"><rect x="5" y="5" height="288" width="302"></rect></clipPath></defs><g class="recharts-polar-grid"><g class="recharts-polar-grid-angle"><line stroke="#ccc" cx="156" cy="156" x1="156" y1="156" x2="156" y2="40.8"></line><line stroke="#ccc" cx="156" cy="156" x1="156" y1="156" x2="223.71286106409292" y2="62.80124224800605"></line><line stroke="#ccc" cx="156" cy="156" x1="156" y1="156" x2="265.5617106772017" y2="120.40124224800606"></line><line stroke="#ccc" cx="156" cy="156" x1="156" y1="156" x2="265.5617106772017" y2="191.59875775199396"></line><line stroke="#ccc" cx="156" cy="156" x1="156" y1="156" x2="223.71286106409292" y2="249.19875775199395"></line><line stroke="#ccc" cx="156" cy="156" x1="156" y1="156" x2="156" y2="271.2"></line><line stroke="#ccc" cx="156" cy="156" x1="156" y1="156" x2="88.28713893590711" y2="249.19875775199395"></line><line stroke="#ccc" cx="156" cy="156" x1="156" y1="156" x2="46.43828932279831" y2="191.59875775199396"></line><line stroke="#ccc" cx="156" cy="156" x1="156" y1="156" x2="46.4382893227983" y2="120.40124224800607"></line><line stroke="#ccc" cx="156" cy="156" x1="156" y1="156" x2="88.28713893590708" y2="62.80124224800606"></line></g><g class="recharts-polar-grid-concentric"><path stroke="#ccc" cx="156" cy="156" radius="0" fill="none" class="recharts-polar-grid-concentric-polygon" d="M 156,156L 156,156L 156,156L 156,156L 156,156L 156,156L 156,156L 156,156L 156,156L 156,156Z"></path><path stroke="#ccc" cx="156" cy="156" radius="28.8" fill="none" class="recharts-polar-grid-concentric-polygon" d="M 156,127.2L 172.92821526602322,132.7003105620015L 183.39042766930044,147.1003105620015L 183.39042766930044,164.8996894379985L 172.92821526602322,179.2996894379985L 156,184.8L 139.07178473397678,179.2996894379985L 128.60957233069956,164.8996894379985L 128.60957233069956,147.1003105620015L 139.07178473397676,132.7003105620015Z"></path><path stroke="#ccc" cx="156" cy="156" radius="57.6" fill="none" class="recharts-polar-grid-concentric-polygon" d="M 156,98.4L 189.85643053204646,109.40062112400302L 210.78085533860084,138.20062112400302L 210.78085533860084,173.79937887599698L 189.85643053204646,202.599378875997L 156,213.6L 122.14356946795355,202.599378875997L 101.21914466139916,173.79937887599698L 101.21914466139916,138.20062112400302L 122.14356946795354,109.40062112400304Z"></path><path stroke="#ccc" cx="156" cy="156" radius="86.4" fill="none" class="recharts-polar-grid-concentric-polygon" d="M 156,69.6L 206.78464579806968,86.10093168600453L 238.17128300790125,129.30093168600453L 238.17128300790125,182.69906831399547L 206.78464579806968,225.89906831399549L 156,242.4L 105.21535420193032,225.89906831399549L 73.82871699209873,182.69906831399547L 73.82871699209872,129.30093168600456L 105.21535420193031,86.10093168600454Z"></path><path stroke="#ccc" cx="156" cy="156" radius="115.2" fill="none" class="recharts-polar-grid-concentric-polygon" d="M 156,40.8L 223.71286106409292,62.80124224800605L 265.5617106772017,120.40124224800606L 265.5617106772017,191.59875775199396L 223.71286106409292,249.19875775199395L 156,271.2L 88.28713893590711,249.19875775199395L 46.43828932279831,191.59875775199396L 46.4382893227983,120.40124224800607L 88.28713893590708,62.80124224800606Z"></path></g></g><g class="recharts-layer recharts-polar-angle-axis"><path cx="156" cy="156" orientation="outer" radius="115.2" fill="none" class="recharts-polygon angleAxis" d="M156,40.8L223.71286106409292,62.80124224800605L265.5617106772017,120.40124224800606L265.5617106772017,191.59875775199396L223.71286106409292,249.19875775199395L156,271.2L88.28713893590711,249.19875775199395L46.43828932279831,191.59875775199396L46.4382893227983,120.40124224800607L88.28713893590708,62.80124224800606L156,40.8Z"></path><g class="recharts-layer recharts-polar-angle-axis-ticks"><g class="recharts-layer recharts-polar-angle-axis-tick"><line class="angleAxis" cx="156" cy="156" orientation="outer" radius="115.2" fill="none" x1="156" y1="40.8" x2="156" y2="32.8"></line><text cx="156" cy="156" orientation="outer" radius="115.2" stroke="none" font-size="10px" x="156" y="32.8" class="recharts-text recharts-polar-angle-axis-tick-value" text-anchor="middle" fill="#808080"><tspan x="156" dy="0em">Heat</tspan></text></g><g class="recharts-layer recharts-polar-angle-axis-tick"><line class="angleAxis" cx="156" cy="156" orientation="outer" radius="115.2" fill="none" x1="223.71286106409292" y1="62.80124224800605" x2="228.41514308243268" y2="56.329106293006475"></line><text cx="156" cy="156" orientation="outer" radius="115.2" stroke="none" font-size="10px" x="228.41514308243268" y="56.329106293006475" class="recharts-text recharts-polar-angle-axis-tick-value" text-anchor="start" fill="#808080"><tspan x="228.41514308243268" dy="0em">R</tspan></text></g><g class="recharts-layer recharts-polar-angle-axis-tick"><line class="angleAxis" cx="156" cy="156" orientation="outer" radius="115.2" fill="none" x1="265.5617106772017" y1="120.40124224800606" x2="273.1701628075629" y2="117.92910629300647"></line><text cx="156" cy="156" orientation="outer" radius="115.2" stroke="none" font-size="10px" x="273.1701628075629" y="117.92910629300647" class="recharts-text recharts-polar-angle-axis-tick-value" text-anchor="start" fill="#808080"><tspan x="273.1701628075629" dy="0em">G-field</tspan></text></g><g class="recharts-layer recharts-polar-angle-axis-tick"><line class="angleAxis" cx="156" cy="156" orientation="outer" radius="115.2" fill="none" x1="265.5617106772017" y1="191.59875775199396" x2="273.1701628075629" y2="194.07089370699353"></line><text cx="156" cy="156" orientation="outer" radius="115.2" stroke="none" font-size="10px" x="273.1701628075629" y="194.07089370699353" class="recharts-text recharts-polar-angle-axis-tick-value" text-anchor="start" fill="#808080"><tspan x="273.1701628075629" dy="0em">C++</tspan></text></g><g class="recharts-layer recharts-polar-angle-axis-tick"><line class="angleAxis" cx="156" cy="156" orientation="outer" radius="115.2" fill="none" x1="223.71286106409292" y1="249.19875775199395" x2="228.41514308243268" y2="255.67089370699352"></line><text cx="156" cy="156" orientation="outer" radius="115.2" stroke="none" font-size="10px" x="228.41514308243268" y="255.67089370699352" class="recharts-text recharts-polar-angle-axis-tick-value" text-anchor="start" fill="#808080"><tspan x="228.41514308243268" dy="0em">M-field</tspan></text></g><g class="recharts-layer recharts-polar-angle-axis-tick"><line class="angleAxis" cx="156" cy="156" orientation="outer" radius="115.2" fill="none" x1="156" y1="271.2" x2="156" y2="279.2"></line><text cx="156" cy="156" orientation="outer" radius="115.2" stroke="none" font-size="10px" x="156" y="279.2" class="recharts-text recharts-polar-angle-axis-tick-value" text-anchor="middle" fill="#808080"><tspan x="156" dy="0em">E-field</tspan></text></g><g class="recharts-layer recharts-polar-angle-axis-tick"><line class="angleAxis" cx="156" cy="156" orientation="outer" radius="115.2" fill="none" x1="88.28713893590711" y1="249.19875775199395" x2="83.58485691756732" y2="255.67089370699352"></line><text cx="156" cy="156" orientation="outer" radius="115.2" stroke="none" font-size="10px" x="83.58485691756732" y="255.67089370699352" class="recharts-text recharts-polar-angle-axis-tick-value" text-anchor="end" fill="#808080"><tspan x="83.58485691756732" dy="0em">Algebra</tspan></text></g><g class="recharts-layer recharts-polar-angle-axis-tick"><line class="angleAxis" cx="156" cy="156" orientation="outer" radius="115.2" fill="none" x1="46.43828932279831" y1="191.59875775199396" x2="38.82983719243708" y2="194.07089370699353"></line><text cx="156" cy="156" orientation="outer" radius="115.2" stroke="none" font-size="10px" x="38.82983719243708" y="194.07089370699353" class="recharts-text recharts-polar-angle-axis-tick-value" text-anchor="end" fill="#808080"><tspan x="38.82983719243708" dy="0em">Trigonometry</tspan></text></g><g class="recharts-layer recharts-polar-angle-axis-tick"><line class="angleAxis" cx="156" cy="156" orientation="outer" radius="115.2" fill="none" x1="46.4382893227983" y1="120.40124224800607" x2="38.82983719243707" y2="117.9291062930065"></line><text cx="156" cy="156" orientation="outer" radius="115.2" stroke="none" font-size="10px" x="38.82983719243707" y="117.9291062930065" class="recharts-text recharts-polar-angle-axis-tick-value" text-anchor="end" fill="#808080"><tspan x="38.82983719243707" dy="0em">Chemical Bonding</tspan></text></g><g class="recharts-layer recharts-polar-angle-axis-tick"><line class="angleAxis" cx="156" cy="156" orientation="outer" radius="115.2" fill="none" x1="88.28713893590708" y1="62.80124224800606" x2="83.5848569175673" y2="56.32910629300649"></line><text cx="156" cy="156" orientation="outer" radius="115.2" stroke="none" font-size="10px" x="83.5848569175673" y="56.32910629300649" class="recharts-text recharts-polar-angle-axis-tick-value" text-anchor="end" fill="#808080"><tspan x="83.5848569175673" dy="0em">Mechanics</tspan></text></g></g></g><g class="recharts-layer recharts-polar-radius-axis"><line class="radiusAxis" opacity="0" orientation="right" stroke="#ccc" radius="115.2" fill="none" x1="156" y1="156" x2="255.76612651596736" y2="98.4"></line><g class="recharts-layer recharts-polar-radius-axis-ticks"><g class="recharts-layer recharts-polar-radius-axis-tick"><text transform="rotate(60, 156, 156)" opacity="0" cx="156" cy="156" orientation="right" radius="115.2" stroke="none" x="156" y="156" class="recharts-text recharts-polar-radius-axis-tick-value" text-anchor="start" fill="#ccc"><tspan x="156" dy="0em">0</tspan></text></g><g class="recharts-layer recharts-polar-radius-axis-tick"><text transform="rotate(60, 180.94153162899184, 141.6)" opacity="0" cx="156" cy="156" orientation="right" radius="115.2" stroke="none" x="180.94153162899184" y="141.6" class="recharts-text recharts-polar-radius-axis-tick-value" text-anchor="start" fill="#ccc"><tspan x="180.94153162899184" dy="0em">25</tspan></text></g><g class="recharts-layer recharts-polar-radius-axis-tick"><text transform="rotate(60, 205.88306325798368, 127.2)" opacity="0" cx="156" cy="156" orientation="right" radius="115.2" stroke="none" x="205.88306325798368" y="127.2" class="recharts-text recharts-polar-radius-axis-tick-value" text-anchor="start" fill="#ccc"><tspan x="205.88306325798368" dy="0em">50</tspan></text></g><g class="recharts-layer recharts-polar-radius-axis-tick"><text transform="rotate(60, 230.8245948869755, 112.80000000000001)" opacity="0" cx="156" cy="156" orientation="right" radius="115.2" stroke="none" x="230.8245948869755" y="112.80000000000001" class="recharts-text recharts-polar-radius-axis-tick-value" text-anchor="start" fill="#ccc"><tspan x="230.8245948869755" dy="0em">75</tspan></text></g><g class="recharts-layer recharts-polar-radius-axis-tick"><text transform="rotate(60, 255.76612651596736, 98.4)" opacity="0" cx="156" cy="156" orientation="right" radius="115.2" stroke="none" x="255.76612651596736" y="98.4" class="recharts-text recharts-polar-radius-axis-tick-value" text-anchor="start" fill="#ccc"><tspan x="255.76612651596736" dy="0em">100</tspan></text></g></g></g><g class="recharts-layer recharts-radar"><g class="recharts-layer recharts-radar-polygon"><path name="My Goals" stroke="#E19500" fill="#E19500" fill-opacity="0.2" class="recharts-polygon" d="M156,98.4L189.85643053204646,109.40062112400302L210.78085533860084,138.20062112400302L210.78085533860084,173.79937887599698L189.85643053204646,202.599378875997L156,213.6L122.14356946795355,202.599378875997L101.21914466139916,173.79937887599698L101.21914466139916,138.20062112400302L122.14356946795354,109.40062112400304L156,98.4Z"></path></g></g><g class="recharts-layer recharts-radar"><g class="recharts-layer recharts-radar-polygon"><path name="My Skills" stroke="#04AA6D" fill="#04AA6D" fill-opacity="0.8" class="recharts-polygon" d="M156,156L156,156L156,156L156,156L166.83405777025487,170.91180124031902L156,157.152L156,156L154.904382893228,156.35598757751993L156,156L156,156L156,156Z"></path></g></g></svg>
            </div>
        </div>

    </div>

    <!-- <div class="flexbox">
        <svg width="250" height="250" viewBox="0 0 250 250" class="circular-progress">
            <circle class="bg"></circle>
            <circle class="fg"></circle>
        </svg>
        <img src="<?php echo "data:image/jpg;base64,".$_SESSION['USER_DATA']['image'];?>" alt="">
    </div> -->



</section>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
        var currentIndex = 0;

        function showSlide(index) {
            var carousel = document.querySelector('.carousel');
            var cardWidth = document.querySelector('.card').offsetWidth;
            var newPosition = -index * cardWidth;
            carousel.style.transform = 'translateX(' + newPosition + 'px)';
            currentIndex = index;
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + 3) % 3;
            showSlide(currentIndex);
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % 3;
            showSlide(currentIndex);
        }
    </script>
<script>
                // Simulated data - Replace with actual data retrieval logic
        const syllabusProgress = 70; // Example syllabus completion percentage
        const subjectsProgress = [50, 80, 60]; // Example progress for subjects

        // Update overall syllabus progress bar
        const progressElement = document.querySelector('.progress-bar');
        progressElement.style.width = syllabusProgress + '%';

        // Create subject progress bars
        const subjectProgress = document.querySelector('.subject-progress');
        subjectsProgress.forEach(progress => {
            const subjectBar = document.createElement('div');
            subjectBar.classList.add('subject-bar');
            subjectBar.style.width = progress + '%';
            subjectProgress.appendChild(subjectBar);
        });

        // Simulated course data
        const courses = [
            { name: 'Course 1', completion: 80 },
            { name: 'Course 2', completion: 60 },
            // Add more course data
        ];

        // Display course cards
        const courseCards = document.querySelector('.course-cards');
        courses.forEach(course => {
            const card = document.createElement('div');
            card.classList.add('course-card');
            card.textContent = `${course.name} - ${course.completion}% completed`;
            courseCards.appendChild(card);
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
                // Wait for the DOM content to load
        document.addEventListener("DOMContentLoaded", function() {
            // Chart.js initialization
            var gradesCtx = document.getElementById("grades-chart").getContext("2d");
            var timeSpentCtx = document.getElementById("time-spent-chart").getContext("2d");

            // Dummy data for the charts
            var gradesData = {
                labels: ["Week 1", "Week 2", "Week 3", "Week 4", "Week 5"],
                datasets: [{
                    label: "Grades",
                    data: [80, 85, 78, 92, 88], // Replace with actual data
                    backgroundColor: "rgba(54, 162, 235, 0.2)",
                    borderColor: "rgba(54, 162, 235, 1)",
                    borderWidth: 1
                }]
            };

            var timeSpentData = {
                labels: ["Week 1", "Week 2", "Week 3", "Week 4", "Week 5"],
                datasets: [{
                    label: "Time Spent (hours)",
                    data: [15, 20, 18, 22, 19], // Replace with actual data
                    backgroundColor: "rgba(255, 99, 132, 0.2)",
                    borderColor: "rgba(255, 99, 132, 1)",
                    borderWidth: 1
                }]
            };

            // Create dummy line charts
            var gradesChart = new Chart(gradesCtx, {
                type: "line",
                data: gradesData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var timeSpentChart = new Chart(timeSpentCtx, {
                type: "line",
                data: timeSpentData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });

    </script>



<script src="<?=URLROOT?>/assets/js/student/dash.js"></script>

<?php $this->view('inc/footer') ?>



</body>

</html>