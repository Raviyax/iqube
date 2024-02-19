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
                    <svg width="200" height="200" viewBox="0 0 250 250" class="circular-progress">
                        <circle class="bg"></circle>
                        <circle class="fg"></circle>
                    </svg>
                    <div class="points">
                       <span>143</span> 
                    </div>
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
        <div class="schedule">
            <div class="head">
                <div class="title">Schedule</div>
                <div class="more">see all ></div>
            </div>
            <div class="cards">
                <div class="card">
                    <div class="date">3</div>
                    <div class="topic">Attempt Quiz | Mechanics</div>
                    <div class="time">12.00pm - 1.00pm</div>
                </div>
            </div>
        </div>
        <div class="courses">
            <h1 class="title">Courses</h1>
            <div class="list">
                <ul>
                    <li id="popular" class="active" onclick="showCourses()">Popular</li>
                    <li id="mycourses" onclick="showCourses()">My Courses</li>
                    <li id="wishlist" onclick="showCourses()">Wish List</li>
                </ul>
            </div>
            <div class="cards">
                <div class="card">
                    <img src="https://i0.wp.com/www.sciencenews.org/wp-content/uploads/2023/12/120623_ec_quantum-gravity_feat.jpg?fit=1030%2C580&ssl=1" alt="">
                    <div class="content">
                        <div class="title">MCQ Madness</div>
                        <div class="detail">Physics MCQ MasterClass</div>
                        <a href="" class="btn">Go to</a>
                    </div>
                </div>
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfRa4JRDeUS6nc9pw_bQTZrj1P_sdU2f8sqA&usqp=CAU" alt="">
                    <div class="content">
                        <div class="title">Heat</div>
                        <div class="detail">Paper Class</div>
                        <a href="" class="btn">Go to</a>
                    </div>
                </div>
                <div class="card">
                    <img src="https://i0.wp.com/www.sciencenews.org/wp-content/uploads/2023/12/120623_ec_quantum-gravity_feat.jpg?fit=1030%2C580&ssl=1" alt="">
                    <div class="content">
                        <div class="title">MCQ Madness</div>
                        <div class="detail">Physics MCQ MasterClass</div>
                        <a href="" class="btn">Go to</a>
                    </div>
                </div>
                <div class="card">
                    <img src="https://www.brainscape.com/academy/content/images/size/w620/2020/08/Newton-s-cradle-balls.jpeg" alt="">
                    <div class="content">
                        <div class="title">Electricity</div>
                        <div class="detail">Crash Course</div>
                        <a href="" class="btn">Go to</a>
                    </div>
                </div>
            </div>
            <a href="courses" class="more">see all ></a>
        </div>
        <div class="tutorial">
        <h1 class="heading"><i class="fa-regular fa-lightbulb"></i> Tutorials for you</h1>
            <div class="tutorial-card">
                <div class="card-header">
                    <img src="data:image/jpeg;base64,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" alt="">
                    <button>
                        <div>
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.3685 14.6642C18.3796 14.6642 17.4129 14.9574 16.5907 15.5068C15.7684 16.0562 15.1276 16.8371 14.7491 17.7508C14.3707 18.6644 14.2717 19.6697 14.4646 20.6396C14.6575 21.6095 15.1337 22.5005 15.833 23.1997C16.5323 23.899 17.4232 24.3752 18.3931 24.5681C19.363 24.761 20.3683 24.662 21.2819 24.2836C22.1956 23.9051 22.9765 23.2643 23.5259 22.442C24.0753 21.6198 24.3685 20.6531 24.3685 19.6642M20.3685 10.7192C18.5146 10.5112 16.6418 10.8845 15.0093 11.7874C13.3768 12.6903 12.0652 14.0782 11.256 15.7591C10.4467 17.44 10.1798 19.3308 10.4922 21.17C10.8045 23.0093 11.6807 24.706 12.9996 26.0255C14.3184 27.3449 16.0146 28.222 17.8537 28.5353C19.6928 28.8486 21.5838 28.5826 23.2651 27.7742C24.9464 26.9658 26.3349 25.6549 27.2386 24.0229C28.1424 22.3908 28.5166 20.5182 28.3095 18.6642M22.3685 16.6642V13.6642L25.3685 10.6642V13.6642H28.3685L25.3685 16.6642H22.3685ZM22.3685 16.6642L19.3685 19.6642M18.3685 19.6642C18.3685 19.9294 18.4739 20.1838 18.6614 20.3713C18.849 20.5588 19.1033 20.6642 19.3685 20.6642C19.6337 20.6642 19.8881 20.5588 20.0756 20.3713C20.2632 20.1838 20.3685 19.9294 20.3685 19.6642C20.3685 19.399 20.2632 19.1446 20.0756 18.9571C19.8881 18.7695 19.6337 18.6642 19.3685 18.6642C19.1033 18.6642 18.849 18.7695 18.6614 18.9571C18.4739 19.1446 18.3685 19.399 18.3685 19.6642Z" stroke-linecap="round" stroke-linejoin="round"></path><path d="M6.09998 3.16406V10.1641M2.59998 6.66406H9.59998" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </div>
                    </button>
                </div>
                <div class="card-body">
                    <div class="info">
                        <span>1 <i class="fa-regular fa-star"></i> 5 points</span>
                    </div>
                    <div class="title">Learn Mechanics</div>
                    <div class="difficulty">4 of 100 lessons</div>
                </div>
                <div class="card-footer">
                    <div class="progress-pane">
                        <div class="percent">4%</div>
                        <div class="progress-bar">
                            <div class="bar">4%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tutorial-card">
                <div class="card-header">
                    <img src="https://facts.net/wp-content/uploads/2023/08/16-astounding-facts-about-mechanics-1693401672.jpg" alt="">
                    <button>
                        <div>
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.3685 14.6642C18.3796 14.6642 17.4129 14.9574 16.5907 15.5068C15.7684 16.0562 15.1276 16.8371 14.7491 17.7508C14.3707 18.6644 14.2717 19.6697 14.4646 20.6396C14.6575 21.6095 15.1337 22.5005 15.833 23.1997C16.5323 23.899 17.4232 24.3752 18.3931 24.5681C19.363 24.761 20.3683 24.662 21.2819 24.2836C22.1956 23.9051 22.9765 23.2643 23.5259 22.442C24.0753 21.6198 24.3685 20.6531 24.3685 19.6642M20.3685 10.7192C18.5146 10.5112 16.6418 10.8845 15.0093 11.7874C13.3768 12.6903 12.0652 14.0782 11.256 15.7591C10.4467 17.44 10.1798 19.3308 10.4922 21.17C10.8045 23.0093 11.6807 24.706 12.9996 26.0255C14.3184 27.3449 16.0146 28.222 17.8537 28.5353C19.6928 28.8486 21.5838 28.5826 23.2651 27.7742C24.9464 26.9658 26.3349 25.6549 27.2386 24.0229C28.1424 22.3908 28.5166 20.5182 28.3095 18.6642M22.3685 16.6642V13.6642L25.3685 10.6642V13.6642H28.3685L25.3685 16.6642H22.3685ZM22.3685 16.6642L19.3685 19.6642M18.3685 19.6642C18.3685 19.9294 18.4739 20.1838 18.6614 20.3713C18.849 20.5588 19.1033 20.6642 19.3685 20.6642C19.6337 20.6642 19.8881 20.5588 20.0756 20.3713C20.2632 20.1838 20.3685 19.9294 20.3685 19.6642C20.3685 19.399 20.2632 19.1446 20.0756 18.9571C19.8881 18.7695 19.6337 18.6642 19.3685 18.6642C19.1033 18.6642 18.849 18.7695 18.6614 18.9571C18.4739 19.1446 18.3685 19.399 18.3685 19.6642Z" stroke-linecap="round" stroke-linejoin="round"></path><path d="M6.09998 3.16406V10.1641M2.59998 6.66406H9.59998" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </div>
                    </button>
                </div>
                <div class="card-body">
                    <div class="info">
                        <span>1 <i class="fa-regular fa-star"></i> 5 points</span>
                    </div>
                    <div class="title">Learn Heat</div>
                    <div class="difficulty">9 of 72 lessons</div>
                </div>
                <div class="card-footer">
                    <div class="progress-pane">
                        <div class="percent">12%</div>
                        <div class="progress-bar">
                            <div class="bar">12%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tutorial-card">
                <div class="card-header">
                    <img src="https://my-learning.w3schools.com/tutorial-logos/html.svg" alt="">
                    <button>
                        <div>
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.3685 14.6642C18.3796 14.6642 17.4129 14.9574 16.5907 15.5068C15.7684 16.0562 15.1276 16.8371 14.7491 17.7508C14.3707 18.6644 14.2717 19.6697 14.4646 20.6396C14.6575 21.6095 15.1337 22.5005 15.833 23.1997C16.5323 23.899 17.4232 24.3752 18.3931 24.5681C19.363 24.761 20.3683 24.662 21.2819 24.2836C22.1956 23.9051 22.9765 23.2643 23.5259 22.442C24.0753 21.6198 24.3685 20.6531 24.3685 19.6642M20.3685 10.7192C18.5146 10.5112 16.6418 10.8845 15.0093 11.7874C13.3768 12.6903 12.0652 14.0782 11.256 15.7591C10.4467 17.44 10.1798 19.3308 10.4922 21.17C10.8045 23.0093 11.6807 24.706 12.9996 26.0255C14.3184 27.3449 16.0146 28.222 17.8537 28.5353C19.6928 28.8486 21.5838 28.5826 23.2651 27.7742C24.9464 26.9658 26.3349 25.6549 27.2386 24.0229C28.1424 22.3908 28.5166 20.5182 28.3095 18.6642M22.3685 16.6642V13.6642L25.3685 10.6642V13.6642H28.3685L25.3685 16.6642H22.3685ZM22.3685 16.6642L19.3685 19.6642M18.3685 19.6642C18.3685 19.9294 18.4739 20.1838 18.6614 20.3713C18.849 20.5588 19.1033 20.6642 19.3685 20.6642C19.6337 20.6642 19.8881 20.5588 20.0756 20.3713C20.2632 20.1838 20.3685 19.9294 20.3685 19.6642C20.3685 19.399 20.2632 19.1446 20.0756 18.9571C19.8881 18.7695 19.6337 18.6642 19.3685 18.6642C19.1033 18.6642 18.849 18.7695 18.6614 18.9571C18.4739 19.1446 18.3685 19.399 18.3685 19.6642Z" stroke-linecap="round" stroke-linejoin="round"></path><path d="M6.09998 3.16406V10.1641M2.59998 6.66406H9.59998" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </div>
                    </button>
                </div>
                <div class="card-body">
                    <div class="info">
                        <span>1 <i class="fa-regular fa-star"></i> 5 points</span>
                    </div>
                    <div class="title">Learn Mechanics</div>
                    <div class="difficulty">4 of 100 lessons</div>
                </div>
                <div class="card-footer">
                    <div class="progress-pane">
                        <div class="percent">4%</div>
                        <div class="progress-bar">
                            <div class="bar">4%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tutorial-card">
                <div class="card-header">
                    <img src="https://my-learning.w3schools.com/tutorial-logos/html.svg" alt="">
                    <button>
                        <div>
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.3685 14.6642C18.3796 14.6642 17.4129 14.9574 16.5907 15.5068C15.7684 16.0562 15.1276 16.8371 14.7491 17.7508C14.3707 18.6644 14.2717 19.6697 14.4646 20.6396C14.6575 21.6095 15.1337 22.5005 15.833 23.1997C16.5323 23.899 17.4232 24.3752 18.3931 24.5681C19.363 24.761 20.3683 24.662 21.2819 24.2836C22.1956 23.9051 22.9765 23.2643 23.5259 22.442C24.0753 21.6198 24.3685 20.6531 24.3685 19.6642M20.3685 10.7192C18.5146 10.5112 16.6418 10.8845 15.0093 11.7874C13.3768 12.6903 12.0652 14.0782 11.256 15.7591C10.4467 17.44 10.1798 19.3308 10.4922 21.17C10.8045 23.0093 11.6807 24.706 12.9996 26.0255C14.3184 27.3449 16.0146 28.222 17.8537 28.5353C19.6928 28.8486 21.5838 28.5826 23.2651 27.7742C24.9464 26.9658 26.3349 25.6549 27.2386 24.0229C28.1424 22.3908 28.5166 20.5182 28.3095 18.6642M22.3685 16.6642V13.6642L25.3685 10.6642V13.6642H28.3685L25.3685 16.6642H22.3685ZM22.3685 16.6642L19.3685 19.6642M18.3685 19.6642C18.3685 19.9294 18.4739 20.1838 18.6614 20.3713C18.849 20.5588 19.1033 20.6642 19.3685 20.6642C19.6337 20.6642 19.8881 20.5588 20.0756 20.3713C20.2632 20.1838 20.3685 19.9294 20.3685 19.6642C20.3685 19.399 20.2632 19.1446 20.0756 18.9571C19.8881 18.7695 19.6337 18.6642 19.3685 18.6642C19.1033 18.6642 18.849 18.7695 18.6614 18.9571C18.4739 19.1446 18.3685 19.399 18.3685 19.6642Z" stroke-linecap="round" stroke-linejoin="round"></path><path d="M6.09998 3.16406V10.1641M2.59998 6.66406H9.59998" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </div>
                    </button>
                </div>
                <div class="card-body">
                    <div class="info">
                        <span>1 <i class="fa-regular fa-star"></i> 5 points</span>
                    </div>
                    <div class="title">Learn Mechanics</div>
                    <div class="difficulty">4 of 100 lessons</div>
                </div>
                <div class="card-footer">
                    <div class="progress-pane">
                        <div class="percent">4%</div>
                        <div class="progress-bar">
                            <div class="bar">4%</div>
                        </div>
                    </div>
                </div>
            </div>
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