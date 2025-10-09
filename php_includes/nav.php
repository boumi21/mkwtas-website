<!-- Main navigation menu -->

<nav class="navbar fixed-top navbar-expand-lg main-nav">
    <a href="menu.php"><img src="assets/img/logoNew.png" alt="Site logo" width="130px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav navbar-nav-menus">
            <li class="nav-item dropdown">
                <a class="nav-link nav_link_main_nav dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-medal nav-icon"></i>Best Known Times
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="3laps.php"><span id="icon_3laps" class="nav-icon"></span>3 Laps</a>
                    <a class="dropdown-item" href="flaps.php"><span id="icon_flaps" class="nav-icon"></span>Flaps</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link nav_link_main_nav" href="all.php"><i class="far fa-clock nav-icon"></i>Recents 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav_link_main_nav" href="listPlayers.php"><i class="fas fa-users nav-icon"></i>TASers
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link nav_link_main_nav dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    More...
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="listTracks.php"><i class="fas fa-motorcycle nav-icon"></i>Tracks</a>
                    <a class="dropdown-item" href="stats.php"><i class="fas fa-chart-bar nav-icon"></i>Statistics</a>
                    <a class="dropdown-item" href="snapshot.php"><i class="fas fa-camera-retro nav-icon"></i>Snapshots</a>
                    <a class="dropdown-item" href="faq.php"><i class="far fa-question-circle nav-icon"></i>FAQ</a>
                    <a class="dropdown-item" href="<?php echo GITHUB_REPO ?>"><i class="fab fa-github nav-icon"></i>Source Code</a>
                    <a class="dropdown-item" href="https://discordapp.com/invite/EPD9yCu"><i class="fab fa-discord nav-icon"></i>TAS</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalMessage"><i class="fas fa-paper-plane nav-icon"></i>Send Message</a>
                </div>
            </li>
        </ul>


        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link nav_link_main_nav" href="https://wiki.mkwtas.com/"><i class="fas fa-book nav-icon"></i>Wiki
                     <span class="text-new ml-1">NEW</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav_link_main_nav" href="https://play.mkwtas.com/"><i class="fas fa-gamepad nav-icon"></i>TASle
                </a>
            </li>


            <!-- Admin part -->

            <?php

            if (isUserAdmin()) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link nav_link_main_nav dropdown-toggle" href="#" id="navbarDropdownAccountLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span id="username-overflow"><?php echo $_SESSION['username'] ?></span>
                        <img class="rounded" width="30px" src="https://cdn.discordapp.com/avatars/<?php $extention = is_animated($_SESSION['user_avatar']);
                                                                                                    echo $_SESSION['user_id'] . "/" . $_SESSION['user_avatar'] . $extention; ?>" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownAccountLink">
                        <a class="dropdown-item" href="addTas.php"><i class="fas fa-plus-circle nav-icon"></i>Add TAS</a>
                        <a class="dropdown-item" href="addPlayer.php"><i class="fas fa-user nav-icon"></i>Add Player</a>
                        <a class="dropdown-item" href="php_scripts/authentication/logout.php"><i class="fas fa-sign-out-alt nav-icon"></i>Logout</a>
                    </div>
                </li>
            <?php } else { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link nav_link_main_nav dropdown-toggle" href="#" id="navbarDropdownAccountLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-user-circle nav-icon"></i>Account
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownAccountLink">
                        <a class="dropdown-item" href="<?php echo url(DISCORD_ID, LOGIN_URL, "identify"); ?>"><i class="fas fa-sign-in-alt nav-icon"></i>Login (admin)</a>
                    </div>
                </li>
            <?php } ?>

        </ul>

    </div>
</nav>

<?php include MODAL . 'modalMessage.php'; ?>