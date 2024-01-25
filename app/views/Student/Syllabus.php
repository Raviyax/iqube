<?php $this->view('inc/header',$data) ?>

<section class="dashboard">

    <h1 class="heading">Hello <?php echo $_SESSION['USER_DATA']['username'];?>!</h1>
    
    <div class="container">
        <h1>G.C.E. Advanced Level</h1>

        <div class="stream">
            <h2>Biological Sciences</h2>
            <div class="subjects">
                <a href="biology.php" class="subject" style="--subject-color: var(--main-color);">
                    Biology
                </a>
                <a href="chemistry.php" class="subject" style="--subject-color: var(--color2);">
                    Chemistry
                </a>
                <a href="physics.php" class="subject" style="--subject-color: var(--color3);">
                    Physics
                </a>
            </div>
        </div>

        <div class="stream">
            <h2>Physical Science</h2>
            <div class="subjects">
                <a href="math.php" class="subject" style="--subject-color: var(--main-color);">
                    Combined Mathematics
                </a>
                <a href="physics.php" class="subject" style="--subject-color: var(--color2);">
                    Chemistry 
                </a>
                <a href="chemistry.php" class="subject" style="--subject-color: var(--color3);">
                    Physics
                </a>
            </div>
        </div>
    </section>

    <section class="dashboard">
    <div class="MainHeader_mainHeader__flHoY">
            <div class="MainHeader_mainHeaderTitle__14sVT">My learning</div>
            <div class="MainHeader_mainHeaderContents__L4xJO">
                <div class="MainHeader_messagePanel__SA2Q3">
                    <h2>Hi, Hanafe</h2>
                    <p class="MainHeader_text_align_left__RayQX">Welcome to the new "My learning" Feature at IQube. This will be your hub to all the tutorials we offer and your learning progress.</p>
                    <p>We hope you will continue to learn with us.</p>
                    <div class="MainHeader_buttonGroup__xl9CD">
                        <button tabindex="0" aria-label="Continue “Learn JavaScript”" type="button" class="MainHeader_continueButton__Bd-dW btn btn-dark">Continue “Learn Magnetic Flux | Physics”</button>
                        <button tabindex="0" aria-label="Browse tutorials" type="button" class="MainHeader_browseLink__+tvwv btn btn-light">Browse tutorials</button>
                    </div>
                </div>
                <div class="MainHeader_scoreCardPanel__4G25U">
                    <div class="MainHeader_scoreCard__vCqYM">
                        <div id="scoreCardMLW3S" class="scoreCard_scoreCard__kCXP+">
                            <div class="scoreCard_header__8lJbn">Good job!</div>
                            <div class="scoreCard_yourScore__-n-iY">Your score</div>
                            <div class="scoreCard_arc__-AVUj">
                                <div id="gaugeChart" style="width: 91%; margin-bottom: 7%;">
                                <svg width="307.578125" height="138.41015625">
                                    <g transform="translate(42.97890625000002, 6.9)">
                                        <g class="doughnut" transform="translate(110.81015624999998, 110.81015624999998)">
                                            <g class="arc"><path d="M-107.71564741398431,-1.513213138732489A3,3,0,0,1,-110.71301754572413,-4.638800930153554A110.81015624999998,110.81015624999998,0,0,1,2.4161456526128537,-110.7838118514378A3,3,0,0,1,5.344651706133389,-107.59361138077453L5.232758596865365,-105.83889748710517A3,3,0,0,1,2.175507984782003,-103.03047974160157A103.05344531249997,103.05344531249997,0,0,0,-102.96008734110241,-4.385545061789757A3,3,0,0,1,-105.95736958709288,-1.5132131387324863Z" style="fill: rgb(217, 238, 225);">

                                            </path></g>
                                            <g class="arc"><path d="M7.051725689567876,-110.58555010917338L6.558104891298124,-102.84456160153125Z" style="fill: rgb(4, 170, 109);"></path></g>
                                            <g class="arc"><path d="M8.364943582658192,-107.40101596668423A3,3,0,0,1,11.67494232014258,-110.19340474806445A110.81015624999998,110.81015624999998,0,0,1,110.71301754572411,-4.6388009301534865A3,3,0,0,1,107.7156474139843,-1.5132131387324232L105.95736958709287,-1.5132131387324241A3,3,0,0,1,102.9600873411024,-4.385545061789699A103.05344531249997,103.05344531249997,0,0,0,10.928819587238824,-102.47230598169443A3,3,0,0,1,8.253050473390175,-105.64630207301485Z" style="fill: rgb(255, 244, 163);"></path></g>
                                        </g>
                                        <g class="needle" transform="translate(110.81015624999998, 110.81015624999998)"><path d="M -7.898152861379573 -1.5860392589794894 L -18.83322178682631 -62.11500133278564 L 7.898152861379573 -6.718570116020512" fill="white"></path><circle cx="0" cy="-4.1523046875" r="8.304609375" fill="white"></circle></g></g></svg></div></div><div class="scoreCard_number__49hUB">148</div><div class="scoreCard_text__Qua6F">points</div><div class="scoreCard_scoreFactorHeading__TS12C">Score factors</div>
                                        <div class="scoreCard_factors__oLCHD">
                                            <div>
                                                <div class="scoreCard_card__s2uNN scoreCard_lessons__AAa6X"><span>77</span><p>lessons read</p>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="scoreCard_card__s2uNN scoreCard_stars__mvoLG">
                                                <div>
                                                    <span>0</span>
                                                    <svg width="16" height="16" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.5479 0.957121C6.72831 0.575191 7.27169 0.575191 7.4521 0.957121L9.17302 4.60039C9.2459 4.75469 9.39245 4.86116 9.56172 4.8828L13.5585 5.39366C13.9775 5.44721 14.1454 5.964 13.8379 6.2536L10.9047 9.01612C10.7805 9.13312 10.7245 9.3054 10.7563 9.47308L11.5055 13.4321C11.584 13.8471 11.1444 14.1665 10.7739 13.9635L7.24023 12.0276C7.09057 11.9456 6.90943 11.9456 6.75977 12.0276L3.22606 13.9635C2.85561 14.1665 2.416 13.8471 2.49454 13.4321L3.24375 9.47308C3.27548 9.3054 3.2195 9.13312 3.09528 9.01612L0.162117 6.2536C-0.145371 5.964 0.0225447 5.44721 0.441531 5.39366L4.43828 4.8828C4.60755 4.86116 4.7541 4.75469 4.82698 4.60039L6.5479 0.957121Z" fill="#282A35"></path></svg>
                                                </div>
                                                <p>stars collected</p>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="scoreCard_card__s2uNN scoreCard_quiz__hd0Rv"><span>0</span><p>quiz points</p></div></div><div><div class="scoreCard_card__s2uNN scoreCard_execrcise__3QgIj">
                                                <span>71</span>
                                                <p>exercise points</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    
    <?php $this->view('inc/footer') ?>

</body>

</html>