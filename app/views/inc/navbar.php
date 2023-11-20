<header id="nav-menu" aria-label="navigation bar">
    <div class="container1">
        <div class="nav-start">

            <a class="toggle" onclick="openNav()">
                <i class="fa-solid fa-bars"></i>
            </a>
            <a class="logo" href="/">
                <img src="<?php echo URLROOT; ?>/assets/img/iqube.png" width="35" height="35" alt="Inc Logo" />
            </a>
        </div>

        <div class="nav-end">
            <div class="right-container">
                <form class="search" role="search">
                    <input type="search" name="search" placeholder="Search" />
                    <i class="bx bx-search" aria-hidden="true"></i>
                </form>
                <a href="#profile">
                    <img src="https://github.com/Evavic44/responsive-navbar-with-dropdown/blob/main/assets/images/user.jpg?raw=true" width="30" height="30" alt="user image" />
                </a>


                <!-- test -->

                <nav class="menu">
                    <ul class="menu-bar">

                        <li>
                            <?php if (Auth::is_logged_in()) { ?>

                                <button class="nav-link dropdown-btn" data-dropdown="dropdown2" aria-haspopup="true" aria-expanded="false" aria-label="discover">
                                    <?php echo ucwords($_SESSION['USER_DATA']['name']); ?>
                                    <i class="fa-solid fa-caret-down"></i>
                                </button>
                                <?php  ?>
                            <?php } else { ?>
                                <button data-dropdown="dropdown2" aria-haspopup="true" aria-expanded="false" aria-label="discover"><a href="<?php echo URLROOT ?>/Login">
                                        Login

                                </button>
                            <?php } ?>

                            <div id="dropdown2" class="dropdown">
                                <ul role="menu">
                                    <li>
                                        <span class="dropdown-link-title"><?php echo $_SESSION['USER_DATA']['email']; ?></span>
                                    </li>
                                    <li role="menuitem">
                                        <a class="dropdown-link" href="#branding">Branding</a>
                                    </li>
                                    <li role="menuitem">
                                        <a class="dropdown-link" href="#illustrations">Illustration</a>
                                    </li>
                                </ul>
                                <ul role="menu">
                                    <li>
                                        <span class="dropdown-link-title">Download App</span>
                                    </li>
                                    <li role="menuitem">
                                        <a class="dropdown-link" href="#mac-windows">MacOS & Windows</a>
                                    </li>
                                    <li role="menuitem">
                                        <a class="dropdown-link" href="#linux">Linux</a>
                                    </li>
                                </ul>

                            </div>
                        </li>
                    </ul>
                </nav>

                <?php

                if (Auth::is_logged_in()) {
                    $role = $_SESSION['USER_DATA']['role'];
                    if ($role == 'subject_admin') {
                        $role = 'Subject Admin';
                    }  ?>
                    <button class="userbtn btn-primary"><?php echo ucwords($role); ?></button>
                <?php } ?>


                <!-- test -->


            </div>

            <button id="hamburger" aria-label="hamburger" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-menu" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</header>




<script>
    const dropdownBtn = document.querySelectorAll(".dropdown-btn");
    const dropdown = document.querySelectorAll(".dropdown");
    const hamburgerBtn = document.getElementById("hamburger");
    const navMenu = document.querySelector(".menu");
    const links = document.querySelectorAll(".dropdown a");

    function setAriaExpandedFalse() {
        dropdownBtn.forEach((btn) => btn.setAttribute("aria-expanded", "false"));
    }

    function closeDropdownMenu() {
        dropdown.forEach((drop) => {
            drop.classList.remove("active");
            drop.addEventListener("click", (e) => e.stopPropagation());
        });
    }

    function toggleHamburger() {
        navMenu.classList.toggle("show");
    }

    dropdownBtn.forEach((btn) => {
        btn.addEventListener("click", function(e) {
            const dropdownIndex = e.currentTarget.dataset.dropdown;
            const dropdownElement = document.getElementById(dropdownIndex);

            dropdownElement.classList.toggle("active");
            dropdown.forEach((drop) => {
                if (drop.id !== btn.dataset["dropdown"]) {
                    drop.classList.remove("active");
                }
            });
            e.stopPropagation();
            btn.setAttribute(
                "aria-expanded",
                btn.getAttribute("aria-expanded") === "false" ? "true" : "false"
            );
        });
    });

    // close dropdown menu when the dropdown links are clicked
    links.forEach((link) =>
        link.addEventListener("click", () => {
            closeDropdownMenu();
            setAriaExpandedFalse();
            toggleHamburger();
        })
    );

    // close dropdown menu when you click on the document body
    document.documentElement.addEventListener("click", () => {
        closeDropdownMenu();
        setAriaExpandedFalse();
    });

    // close dropdown when the escape key is pressed
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            closeDropdownMenu();
            setAriaExpandedFalse();
        }
    });

    // toggle hamburger menu
    hamburgerBtn.addEventListener("click", toggleHamburger);
</script>