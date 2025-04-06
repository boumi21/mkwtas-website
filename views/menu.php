<!DOCTYPE html>
<html lang="en">

<?php
include 'php_includes/imports.php';

includeHeader(array(
    'description' => "Mario Kart Wii Tool Assisted Speedruns Leaderboards, ressources and more!",
    'title' => "mkwtas.com - Mario Kart Wii TAS Records"
));

include PHP_INCLUDES . 'imports_js.php';
?>

<body>

    <?php include 'php_includes/nav.php' ?>

    <main>
        <div class="container mt-3">
            <img src="assets/img/logoNew.png" class="mx-auto d-block mb-4" alt="Logo">

            <?php include 'php_includes/news.php' ?>

            <!-- Message when user tries to login but not admin -->
            <?php if (isset($_GET['logout'])) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> Login is reserved to admins only 😊
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>



            <div class="row row-cols-1 row-cols-md-2 h-100">
                <div class="col mb-4">
                    <div class="card h-100 card_menu border-secondary">
                        <div class="card-header card-header-menu">
                            <h4 class="text-center">Latest TASes <i class="far fa-clock"></i></h4>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Track</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $getLastBKTs->execute();
                                    while ($data = $getLastBKTs->fetch()) {
                                    ?>
                                        <tr>
                                            <?php include TEMP_CELLS . 'tempTrack.php' ?>
                                            <?php include TEMP_CELLS . 'tempTime.php' ?>
                                            <?php include TEMP_CELLS . 'tempDate.php' ?>
                                        </tr>
                                    <?php }
                                    $getLastBKTs->closeCursor();
                                    ?>
                                </tbody>
                            </table>
                            <a href="all.php" class="btn btn-block button_menu mt-auto" role="button"><span>See all</span></a>
                        </div>
                    </div>
                </div>


                <div class="col mb-4">
                    <div class="card h-100 card_menu border-secondary">
                        <div class="card-header card-header-menu">
                            <h4 class="text-center">Current BKTs <i class="far fa-calendar-check"></i></h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="text-center mt-1">
                                    <h5>All current records for every track & category</h5>
                                    <img src="assets/img/trophy.png" alt="Trophy" width="100px">
                                </div>
                                <div class="row text-center mt-3">
                                    <div class="col-md-6">
                                        <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Classic time trial mode where the players complete 3 laps of a track as fast as possible using 3 shrooms"></i>
                                        <a href="3laps.php" id="button_3laps" class="btn button_menu btn-block" role="button"><span>3 Laps</span></a>
                                    </div>
                                    <div class="col-md-6 mt-3 mt-md-0">
                                        <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Mode where the players complete only one lap of the track as fast as possible using 3 shrooms"></i>
                                        <a href="flaps.php" id="button_flaps" class="btn button_menu btn-block" role="button"><span>Flaps</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col mb-4">
                    <div class="card h-100 card_menu border-secondary">
                        <div class="card-header card-header-menu">
                            <h4 class="text-center">Browse TASers <i class="fas fa-users"></i></h4>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="text-center mb-4">
                                <ul class="list-group">
                                    <?php
                                    $getRandomPlayers->execute();
                                    while ($data = $getRandomPlayers->fetch()) {
                                        echo "<a id='list-player-menu' href=player.php?name=" . str_replace(' ', '_', $data['name_player']) . ">"
                                    ?>
                                        <li class="list-group-item list-group-item-secondary">
                                            <?php echo $data['name_player'] ?></li></a>
                                    <?php
                                    }
                                    $getRandomPlayers->closeCursor();
                                    ?>
                                </ul>
                            </div>
                            <?php
                            $countAllPlayers->execute();
                            $data = $countAllPlayers->fetch();
                            $countAllPlayers->closeCursor();
                            ?>
                            <a href="listPlayers.php" class="btn btn-block button_menu mt-auto" role="button"><span>Discover all <b><?php echo $data['nbrJoueurs'] ?></b> TASers</span></a>
                        </div>
                    </div>
                </div>


                <div class="col mb-4">
                    <div class="card h-100 card_menu border-secondary">
                        <div class="card-header card-header-menu">
                            <h4 class="text-center">Statistics <i class="fas fa-chart-bar"></i></h4>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="text-center">
                                <img src="assets/img/stat1.png" alt="Time machine" width="150px">
                                <img src="assets/img/stat2.png" alt="Time machine" width="150px">
                            </div>
                            <a href="stats.php" class="btn btn-block button_menu mt-auto" role="button"><span>Discover</span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-around mb-2">
                <div class="col-6 col-sm-2 mb-2">
                    <a href="faq.php" data-toggle="tooltip" data-placement="top" title="F.A.Q">
                        <img src="assets/img/svg/question.svg" alt="FAQ" class="img-bottom-menu mx-auto d-block">
                    </a>
                </div>
                <div class="col-6 col-sm-2 mb-2">
                    <a href="https://mkwrs.com/mkwii/" target="_blank" rel="noopener" title="MKWii WR website" data-toggle="tooltip" data-placement="top">
                        <img src="assets/img/mkwiiwr.png" alt="Official MKWii WR" class="img-bottom-menu mx-auto d-block">
                    </a>
                </div>
                <div class="col-6 col-sm-2 mb-2">
                    <a href="https://discordapp.com/invite/EPD9yCu" target="_blank" rel="noopener" data-toggle="tooltip" data-placement="top" title="MKWii TAS Discord server">
                        <img src="assets/img/svg/discord.svg" alt="Mario Kart Wii TAS Discord" class="img-bottom-menu mx-auto d-block">
                    </a>
                </div>
                <div class="col-6 col-sm-2 mb-2">
                    <a data-toggle="modal" data-target="#modalMessage" href="#" class="bottom-right">
                        <img src="assets/img/svg/message.svg" alt="Send message" class="img-bottom-menu mx-auto d-block" data-toggle="tooltip" data-placement="top" title="Send message / Report error">
                    </a>
                </div>
                <div class="col-6 col-sm-2 mb-2">
                <a href="<?php echo GITHUB_REPO ?>" target="_blank" rel="noopener" title="Website's Github" data-toggle="tooltip" data-placement="top">
                        <img src="assets/img/github.png" alt="Github Source Code" class="img-bottom-menu mx-auto d-block">
                    </a>
                </div>
                <div class="col-6 col-sm-2">
                    <a href="https://youtu.be/1zUJzzRu-xs?si=miP8NgV-6LVfP9aY" target="_blank" rel="noopener" data-toggle="tooltip" data-placement="top" title="( ͡* ͜ʖ ͡*)">
                        <img src="assets/img/svg/alien.svg" alt="Surprise button" class="img-bottom-menu mx-auto d-block">
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>