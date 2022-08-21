<!-- Navigation menu for statistics page -->

<div class="col-2 collapse show d-md-flex pt-2 pl-0 pr-0 min-vh-100" id="sidebar_stat">

<h2 class="stat-nav-title">Statistics</h2>

<hr>

    <ul class="nav flex-column flex-nowrap overflow-hidden">

        <li class="nav-item">
            <a class="nav-link stats-nav-link collapsed text-truncate" href="#submenu_totaltime" data-toggle="collapse" data-target="#submenu_totaltime">
                <i class="fas fa-chart-area"></i></i> <span class="d-sm-inline">Totaltime</span>
            </a>
            <div class="collapse" id="submenu_totaltime" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                    <li class="nav-item"><a class="nav-link stats-nav-link py-0" href="#" onclick="display3laps()"><span>3Laps</span></a>
                    </li>
                </ul>
            </div>
            <div class="collapse" id="submenu_totaltime" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                    <li class="nav-item"><a class="nav-link stats-nav-link py-0" href="#" onclick="displayFlaps()"><span>Flaps</span></a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link stats-nav-link collapsed text-truncate" href="#submenu_playersRanking" data-toggle="collapse" data-target="#submenu_playersRanking"><i class="fas fa-users"></i> <span class="d-sm-inline">Players Ranking</span></a>
            <div class="collapse" id="submenu_playersRanking" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                    <li class="nav-item"><a class="nav-link stats-nav-link py-0" href="#" onclick="displayTotalNumberRecords()"><span>Total # of BKTs</span></a>
                    </li>
                </ul>
            </div>
            <div class="collapse" id="submenu_playersRanking" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                    <li class="nav-item"><a class="nav-link stats-nav-link py-0" href="#" onclick="displayTotalNumberTracks()"><span># of Tracks with BKTs</span></a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link stats-nav-link collapsed text-truncate" href="#submenu_activity" data-toggle="collapse" data-target="#submenu_activity"><i class="fas fa-chart-bar"></i> <span class="d-sm-inline">Activity</span></a>
            <div class="collapse" id="submenu_activity" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                    <li class="nav-item"><a class="nav-link stats-nav-link py-0" href="#" onclick="displayRecordsPerMonth()"><span># of BKTs per Month</span></a>
                    </li>
                </ul>
            </div>
            <div class="collapse" id="submenu_activity" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                    <li class="nav-item"><a class="nav-link stats-nav-link py-0" href="#" onclick="displayRecordsPerYear()"><span># of BKTs per Year</span></a>
                    </li>
                </ul>
            </div>
            <div class="collapse" id="submenu_activity" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                    <li class="nav-item"><a class="nav-link stats-nav-link py-0" href="#" onclick="displayPlayersPerYear()"><span># of Players per Year</span></a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link stats-nav-link text-truncate" href="https://plausible.io/mkwtas.com" target="_blank">
                <img class="stat-nav-icon" src="assets/img/favicon.png"> <span class="d-sm-inline">Website</span>
            </a>
        </li>
    </ul>
</div>