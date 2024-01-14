<!-- Actual number of questions : 15 -->

<!DOCTYPE html>
<html lang="en">

<?php
include 'php_includes/imports.php';

includeHeader(array(
    'description' => "Frequently Asked Questions for Mario Kart Wii TAS and mkwtas.com.",
    'title' => "FAQ - mkwtas"
));

include PHP_INCLUDES . 'imports_js.php';
?>

<body>
    <main>

        <?php include 'php_includes/nav.php' ?>

        <div class="main-container mb-5">
            <section class="mx-auto container faq-container">
                <div role="tablist" id="accordion-1">

                    <div class="card-faq">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0 faq-description"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-1" href="div#accordion-1 .item-1">What is this site
                                    about?</a>
                            </h5>
                        </div>
                        <div class="collapse show item-1" role="tabpanel" data-parent="#accordion-1">
                            <div class="card-body">
                                <p class="card-text">This website tracks record of all <b>TAS</b> (<b>T</b>ool
                                    <b>A</b>ssisted <b>S</b>peedrun) in Mario Kart Wii. </br>
                                    You'll find here details about every run, history of records, links to videos and
                                    more...
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card-faq">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0 faq-description"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-2" href="div#accordion-1 .item-2">What is TAS?</a>
                            </h5>
                        </div>
                        <div class="collapse item-2" role="tabpanel" data-parent="#accordion-1">
                            <div class="card-body">
                                <p class="card-text">TAS stands for "Tool Assisted Speedrun/Superplay".
                                    </br>
                                    It's basically using tools like savestates, slow-motion and more to push the game to
                                    it's limits.
                                    </br>
                                    It's a different way of speedrunning. You can learn a lot more <a href="http://tasvideos.org/WelcomeToTASVideos.html">here</a>.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card-faq">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0 faq-description"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-3" href="div#accordion-1 .item-3">Is it
                                    cheating?</a></h5>
                        </div>
                        <div class="collapse item-3" role="tabpanel" data-parent="#accordion-1">
                            <div class="card-body">
                                <p class="card-text"><b>No</b>.
                                    </br>
                                    The times done in TAS don't count in any real ranking.
                                    </br>
                                    You can learn more <a href="http://tasvideos.org/WelcomeToTASVideos.html">here</a>.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card-faq">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0 faq-description"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-10" href="div#accordion-1 .item-10">Where can I
                                    find official world records?</a></h5>
                        </div>
                        <div class="collapse item-10" role="tabpanel" data-parent="#accordion-1">
                            <div class="card-body">
                                <p class="card-text"><a href="https://mkwrs.com/mkwii/">Right here</a>.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-faq">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0 faq-description"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-4" href="div#accordion-1 .item-4">How do you
                                    TAS?</a></h5>
                        </div>
                        <div class="collapse item-4" role="tabpanel" data-parent="#accordion-1">
                            <div class="card-body">
                                <p class="card-text">You'll need a few tools for that but don't worry, it's not that
                                    hard :)
                                    </br>
                                    You can find <a href="https://citrinitas.net/mkwtas/tutorial">here</a>
                                    a complete guide on how to TAS Mario Kart Wii, from installation to finalizing your
                                    TAS. (Made by <a href="player.php?name=Kierio">Kierio</a>)
                                    </br>
                                    I highly suggest you to join the MKWii TAS Discord <a href="https://discord.gg/EPD9yCu">here</a>. You'll find there a lot
                                    of useful
                                    links and a lot of people that will be pleased to help you!
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card-faq">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0 faq-description"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-15" href="div#accordion-1 .item-15">How can I learn
                                    about Mario Kart Wii techniques and stuff?</a></h5>
                        </div>
                        <div class="collapse item-15" role="tabpanel" data-parent="#accordion-1">
                            <div class="card-body">
                                <p class="card-text">
                                    <a href="player.php?name=Kierio">Kierio</a> made a very complete document just <a href="https://docs.google.com/document/u/1/d/e/2PACX-1vRZObe4loAptsyRU5Ba-k0WdNQPnT_1DhG_r4H7wKZFm6BsKs28aPREV_649xTRT2cPZdz26GOB3zbR/pub">here</a>.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card-faq">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0 faq-description"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-9" href="div#accordion-1 .item-9">Why some TASes
                                    have no date/video?</a></h5>
                        </div>
                        <div class="collapse item-9" role="tabpanel" data-parent="#accordion-1">
                            <div class="card-body">
                                <p class="card-text">The video has been deleted or the user deleted his channel and
                                    nobody has a backup.
                                    </br>
                                    Same for the date since you find it on the video.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card-faq">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0 faq-description"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-13" href="div#accordion-1 .item-13">What is this
                                    icon? <img src='assets/img/svg/snail.svg' width='22px' data-toggle='tooltip' alt='' title='At least one lap of the 3 Laps run is faster than this Flap. Check FAQ for more details. '></a>
                            </h5>
                        </div>
                        <div class="collapse item-13" role="tabpanel" data-parent="#accordion-1">
                            <div class="card-body">
                                <p class="card-text">You can see this icon when a Flap BKT is slower than a lap of the 3
                                    Laps run on the same track. Most of the time it's because the Flap is old or does
                                    not use the fastest strategy.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-faq">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0 faq-description"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-14" href="div#accordion-1 .item-14">What is this
                                    icon? <img src='assets/img/supergrind.png' width='20px' data-toggle="tooltip" title="Run using Supergrind"></a></h5>
                        </div>
                        <div class="collapse item-14" role="tabpanel" data-parent="#accordion-1" id="multiCollapseExample1">
                            <div class="card-body">
                                <p class="card-text">You can see this icon when a run uses supergrind. This is a
                                    technique only achievable with TAS on certain tracks with the goal of gaining a lot
                                    of speed or, less often, bouncing off the road. <br>
                                    <a href="https://www.youtube.com/watch?v=9_ufOUrVpdk" target="_blank" title="Supergrind Video">Recommended video about supergrind</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card-faq">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0 faq-description"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-12" href="div#accordion-1 .item-12">Why total time
                                    of all tracks cannot be accessed at some dates?</a></h5>
                        </div>
                        <div class="collapse item-12" role="tabpanel" data-parent="#accordion-1" id="multiCollapseExample1">
                            <div class="card-body">
                                <p class="card-text">(<a href="snapshot.php">Concerning the snapshot page</a>) </br>
                                    Before a certain date, the 32 tracks of the game were not all TASed. So the total
                                    time would not be accurate with missing tracks. That's why total time is disabled
                                    for dates prior to : </br>
                                    3 Laps : 2011-03-24 </br>
                                    Flaps : 2016-04-02</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-faq">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0 faq-description"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-11" href="div#accordion-1 .item-11">What is the
                                    difference between 3 Laps / Flaps?</a></h5>
                        </div>
                        <div class="collapse item-11" role="tabpanel" data-parent="#accordion-1">
                            <div class="card-body">
                                <p class="card-text"><b>3 Laps</b> is the normal way of completing a track. You need to
                                    drive 3 laps with 3 shrooms as fast as possible.
                                    </br>
                                    <b>Flap</b> stands for "Fastest Lap" which consists in performing the best time for
                                    one lap of the track only. You can use your 3 shrooms during the lap.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card-faq">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0 faq-description"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-5" href="div#accordion-1 .item-5">What did you use
                                    to build the website?</a></h5>
                        </div>
                        <div class="collapse item-5" role="tabpanel" data-parent="#accordion-1">
                            <div class="card-body">
                                <p class="card-text">
                                <h4>Website's Github</h4>
                                </br>
                                Check the source code, report issues and more technical informations :
                                <a href="<?php echo GITHUB_REPO ?>">Here</a>
                                </br></br></br>
                                <h4>Resources</h4>
                                </br>
                                Datas : <a href="https://docs.google.com/spreadsheets/d/1USwHHYSL1pRMSWbZI78DlJqgywY6dus2zApg8YkyrR8/edit#gid=0">BKT
                                    sheet</a> | <a href="https://docs.google.com/spreadsheets/d/1TaZWQ4a3W8vqZfheGsNECw_3455HJIhUbmXUhv2J_Vo/edit?usp=sharing">TAS
                                    BKT History</a>
                                </br>
                                Inspiration : <a href="https://mkwrs.com/mkwii/">MKWii WRs</a>.
                                </br></br></br>
                                <h4>Programming</h4>
                                </br>
                                Languages : HTML, CSS (with Bootstrap), PHP, JS, JQuery, SQL.
                                </br>
                                Softwares : Xampp, Visual Studio Code, Sublime Text.
                                </br></br></br>
                                <h4>Other</h4>
                                <a href="https://popper.js.org/">Popper.js</a>, <a href="https://jedfoster.com/Readmore.js/">Readmore.js</a>, <a href="https://datatables.net/">DataTables</a>, <a href="https://github.com/uxsolutions/bootstrap-datepicker/blob/master/docs/index.rst">bootstrap-datepicker</a>,
                                <a href="https://github.com/vedmack/yadcf">yadcf</a>
                                , <a href="https://fonts.google.com/">Google Fonts</a>, <a href="https://fontawesome.com/">Font Awesome</a>,
                                <a href="https://www.amcharts.com/">amcharts</a>,
                                <a href="https://jquery.com/">jQuery</a>,
                                <a href="https://plausible.io/docs">Plausible</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card-faq">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0 faq-description"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-6" href="div#accordion-1 .item-6">How to report an
                                    error / Send message to admin?</a></h5>
                        </div>
                        <div class="collapse item-6" role="tabpanel" data-parent="#accordion-1">
                            <div class="card-body">
                                <p class="card-text">
                                    You can use <a data-toggle="modal" data-target="#modalMessage" href="#">this
                                        form</a> or contact me on Discord : <b>boumi21#6868</b> </br>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card-faq">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0 faq-description"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-7" href="div#accordion-1 .item-7">Site History /
                                    Changelog</a></h5>
                        </div>
                        <div class="collapse item-7" role="tabpanel" data-parent="#accordion-1">
                            <div class="card-body">
                                <p class="card-text">
                                    <b>V 5.3 (2024/01/14)</b></br>
                                    * Categories renamed and reordered. </br>
                                    * Hyphen removed before timecut. </br>
                                </p>
                                <p class="card-text">
                                    <b>V 5.2 (2023/11/19)</b></br>
                                    * <i>list of players</i> page reworked. </br>
                                    * All vehicles names are NA version. </br>
                                    * You can access a page without the <i>.php</i> extension in the URL. </br>
                                </p>
                                <p class="card-text">
                                    <b>V 5.1 (2023/03/11)</b></br>
                                    * Rules to upload a TAS reinforced for admins. </br>
                                    * CSV files can now be uploaded as ghost files. </br>
                                </p>
                                <p class="card-text">
                                    <b>V 5.0 (2022/08/15) Open Source Update <i class="fab fa-github"></i></b></br>
                                    * Big code reorganization to make it <a href="<?php echo GITHUB_REPO ?>">public</a>. </br>
                                    * Removed : unused code, images and libraries. </br>
                                    * Removed : Possibility to send message from form. </br>
                                    * A lot of other behind the scene things. </br>
                                </p>
                                <p class="card-text">
                                    <b>V 4.1 (2022/01/16)</b></br>
                                    * TAS runs are now tagged (valid, unverified or invalid). </br>
                                    * Added Tags management for admins. </br>
                                    * Added a new filter for tags in All TASes page. </br>
                                </p>
                                <p class="card-text">
                                    <b>V 4.0 (2021/10/23) 📈 & 🛠️</b></br>
                                    * New statistics for TAS and players. </br>
                                    * New management system for admins. </br>
                                    * Google Analytics removed and replaced by <a href="https://plausible.io/open-source-website-analytics">Plausible</a>. </br>
                                    * Fast search in List of TASers page added. </br>
                                    * New List of tracks page. </br>
                                    * Smaller other changes. </br>
                                </p>
                                <p class="card-text">
                                    <b>V 3.2 (2021/02/02)</b></br>
                                    * Feature to download ghost when available (everyone) and upload a new one (TASLabz
                                    only). </br>
                                    * New ghost filter in Recent TASes. </br>
                                    * Category "Standard" is now "Unrestricted". </br>
                                </p>
                                <p class="card-text">
                                    <b>V 3.1 (2020/12/04)</b></br>
                                    * Automatically open the right tab on track's page. </br>
                                    * Small fixes (Calendar on snapshot page & track's filter on recent page). </br>
                                </p>
                                <p class="card-text">
                                    <b>V 3.0 (2020/09/10) W̶o̶r̶s̶t̶ ̶y̶e̶a̶r̶ 2020 update</b></br>
                                    * New landing page. </br>
                                    * Splits added for 3 laps runs. </br>
                                    * Time-cut added. </br>
                                    * Country added for TASers. </br>
                                    * New theme/UI in general. </br>
                                </p>
                                <p class="card-text">
                                    <b>V 2.3 (2019/12/08)</b></br>
                                    * Filters in Recent TASes. </br>
                                    * Supergrind runs marked with icon. </br>
                                </p>
                                <p class="card-text">
                                    <b>V 2.2 (2019/10/12)</b></br>
                                    * New UI on Snapshot page. </br>
                                    * Possibility to Hide/Show tables for better navigation. </br>
                                    * Minor UI interface improvements. </br>
                                </p>
                                <p class="card-text">
                                    <b>V 2.1 (2019/09/06)</b></br>
                                    * Sorting for most of the tables. </br>
                                    * Possibility to search matching terms in Recent TASes. </br>
                                    * Compression enabled for web content (Optimisation). </br>
                                </p>
                                <p class="card-text">
                                    <b>V 2.0 (2019/07/23) Welcome mobile users!</b></br>
                                    * BIG responsive update for mobile users. </br>
                                    * Google Analytics (early July). </br>
                                    * New snapshot page (old one had a few bugs). </br>
                                    * Beautification list of TASers. </br>
                                    * Standards improvements (Accessibility, SEO, performance...). </br>
                                    * Button to show all players that participated in a TAS when they are a lot. </br>
                                    * A few minor changes in UI. </br>
                                </p>
                                <p class="card-text">
                                    <b>V 1.2 (2019/04/28)</b></br>
                                    * Add warning icons for Flaps that are slower than their 3 Laps version. </br>
                                    * Bug fix. </br>
                                </p>
                                <p class="card-text">
                                    <b>V 1.1 (2019/04/10)</b></br>
                                    * HTTP ► HTTPS </br>
                                    * Table's background color is now different from general background. </br>
                                    * All TASes ► Recent TASes, all TASes are still displayed but are now ordered by
                                    date by default.
                                </p>
                                <p class="card-text">
                                    <b>V 1.0 (2019/04/02) Official public release!</b></br>
                                    * New page with all the TASes displayed. Possibility to order them by clicking on
                                    the wanted header.</br>
                                    * New Snapshot page. You can select the date you want and it will show the state of
                                    the TASes BKTs at the desired date. It also shows the total time of all tracks.</br>
                                    * You can now specify your email in the little form when you send me a message. If
                                    so, I can reply to you!
                                </p>
                                <p class="card-text">
                                    <b>V 0.6 (2019/03/06)</b></br>
                                    Add ordering for TASes with approximates dates in lists. (Not on top anymore)
                                </p>
                                <p class="card-text">
                                    <b>V 0.5 (2019/03/03)</b></br>
                                    Initial beta release.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card-faq">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0 faq-description"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-8" href="div#accordion-1 .item-8">About</a></h5>
                        </div>
                        <div class="collapse item-8" role="tabpanel" data-parent="#accordion-1">
                            <div class="card-body">
                                <div>
                                    <h4 class="text-center">Made with love by</h4>
                                </div>
                                <img src="assets/img/scaryBoumi.jpg" class="img-fluid rounded-circle mx-auto d-block" width="150" alt="">
                                <h3 class="text-center">boumi</h3>
                                <div class="container container-creator-logo">
                                    <div class="row">
                                        <div class="col-sm"><img src="assets/img/svg/discord2.svg" class="person-logo" width="60" alt="">
                                            <p class="person-logo">boumi21#6868</p>
                                        </div>
                                        <div class="col-sm"><a href="https://www.youtube.com/user/boumi21du21"><img src="assets/img/svg/youtube.svg" class="person-logo" width="60" alt="My Youtube channel"></a>
                                            <p class="person-logo">boumi21du21</p>
                                        </div>
                                        <div class="col-sm"><a href="<?php echo GITHUB_REPO ?>"><img src="assets/img/github.png" class="person-logo" width="60" alt=""></a>
                                            <p class="person-logo">mkwtas.com</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">2024</div>
                                    <div class="col-sm text-right">V 5.3</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </main>
</body>

</html>
