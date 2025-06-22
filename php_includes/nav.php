<!-- Main navigation menu -->

<nav class="navbar fixed-top navbar-expand-md main-nav">
    <a href="menu.php"><img src="assets/img/logoNew.png" alt="Site logo" width="130px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav navbar-nav-menus">
            <li class="nav-item dropdown">
                <a class="nav-link nav_link_main_nav dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Best Known Times <i class="fas fa-medal nav-icon"></i>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="3laps.php">3 Laps <span id="icon_3laps" class="nav-icon"></span></a>
                    <a class="dropdown-item" href="flaps.php">Flaps <span id="icon_flaps" class="nav-icon"></span></a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link nav_link_main_nav" href="all.php">Recents
                    <i class="far fa-clock nav-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav_link_main_nav" href="listPlayers.php">TASers
                <i class="fas fa-users nav-icon"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link nav_link_main_nav dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    More...
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="listTracks.php">Tracks <i class="fas fa-motorcycle"></i></a>
                    <a class="dropdown-item" href="stats.php">Statistics <i class="fas fa-chart-bar nav-icon"></i></a>
                    <a class="dropdown-item" href="snapshot.php">Snapshots <i class="fas fa-camera-retro nav-icon"></i></a>
                    <a class="dropdown-item" href="faq.php">FAQ <i class="far fa-question-circle"></i></a>
                    <a class="dropdown-item" href="<?php echo GITHUB_REPO ?>">Source Code <i class="fab fa-github"></i></a>
                    <a class="dropdown-item" href="https://discordapp.com/invite/EPD9yCu">TAS Discord <i class="fab fa-discord"></i></a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalMessage">Send Message <i class="fas fa-paper-plane"></i></a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link nav_link_main_nav" href="https://play.mkwtas.com/">TASle
                <i class="fas fa-gamepad nav-icon"></i>
                </a>
            </li>
        </ul>

        <!-- Admin part -->
        <?php

        if (isUserAdmin()) { ?>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link nav_link_main_nav dropdown-toggle" href="#" id="navbarDropdownAccountLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span id="username-overflow"><?php echo $_SESSION['username'] ?></span>
                        <img class="rounded" width="30px" src="https://cdn.discordapp.com/avatars/<?php $extention = is_animated($_SESSION['user_avatar']);
                                                                                                    echo $_SESSION['user_id'] . "/" . $_SESSION['user_avatar'] . $extention; ?>" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownAccountLink">
                        <a class="dropdown-item" href="addTas.php">Add TAS <i class="fas fa-plus-circle"></i></a>
                        <a class="dropdown-item" href="addPlayer.php">Add Player <i class="fas fa-user"></i></a>
                        <a class="dropdown-item" href="php_scripts/authentication/logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
                    </div>
                </li>
            </ul>
        <?php } else { ?>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link nav_link_main_nav dropdown-toggle" href="#" id="navbarDropdownAccountLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Account <i class="far fa-user-circle nav-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownAccountLink">
                        <a class="dropdown-item" href="<?php echo url(DISCORD_ID, LOGIN_URL, "identify"); ?>">Login (admin) <i class="fas fa-sign-in-alt"></i></a>
                    </div>
                </li>
            </ul>
        <?php } ?>

    </div>
</nav>

<?php include MODAL . 'modalMessage.php'; ?>