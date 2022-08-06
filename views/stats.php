<!DOCTYPE html>
<html lang="en">

<?php
include 'php_includes/imports.php';

includeHeader(array(
    'description' => "Discover Statistics related to Mario Kart Wii TAS. Including evolution of times, most active players and more.",
    'title' => "Statistics - mkwtas"
));
?>

<!-- CSS -->
<link rel="stylesheet" href="css/stat.css">

<!-- JS -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script src="js/stat.js"></script>

<body>

    <script>
        am4core.options.autoDispose = true;
    </script>

    <main>

        <?php include 'php_includes/nav.php' ?>

        <div class="main-container">
            <section class="mx-auto container-fluid stats-page-container">
                <div class="row flex-nowrap">
                    <?php include 'php_includes/stat_nav.php'; ?>
                    <div class="col pt-2">
                        <button type="button" id="sidebarCollapse" class="btn btn-dark mb-2">
                            <i class="fas fa-bars"></i>
                        </button> <span class="d-md-none"><i class="fas fa-arrow-left"></i> More</span>
                        <div id="display-div">
                            <?php include TEMP_CHARTS . 'totaltime_3laps.php' ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>

</html>