<!-- File that needs to be included on the main menu page when there is an important annoucement -->
<!-- Everything needed for the news need to be included in this file (php, js, css...) -->


<!-- HTML Part -->
<div class="row">
    <div class="col-md-6">
        <a id="link_news" href="https://wiki.mkwtas.com/" target="_blank" rel="noopener">
            <div class="card text-white bg-success card-news mb-3">
                <span class="text-new-announcement">New!</span>
                <div class="card-body">
                    <div class="flex-row-center">
                        <h5 class="ml-3 mr-3">MKWii TAS Wiki</h5>
                        <i class="icon-news fab fa-wikipedia-w"></i>
                    </div>
                    <i>The MKWii TAS book of knowledge</i>
                </div>
            </div>
        </a>

    </div>
    <div class="col-md-6">
        <a id="link_news" href="https://www.youtube.com/watch?v=ZCrs7keDpFM" target="_blank" rel="noopener">
            <div class="card text-white bg-success card-news mb-3">
                <span class="text-new-announcement">New!</span>
                <div class="card-body">
                    <div class="flex-row-center">
                        <h5 class="ml-3 mr-3">2024 MKWii TAS Awards Results</h5>
                        <i class="icon-news fab fa-youtube"></i>
                    </div>
                    <i>Watch the video</i>
                </div>
            </div>
        </a>
    </div>
</div>


<!-- CSS Part -->
<style>
    .text-new-announcement {
        position: absolute;
        margin-top: 0.5em;
        margin-left: 1em;
        font-weight: 800;
        text-shadow: red 0 0 0.4em;
    }

    .icon-news {
        font-size: 3em;
    }

    #link_news {
        text-decoration: none;
        text-align: center;
    }

    .flex-row-center {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    .card-news {
        transition: transform .2s;
        /* Animation */

        /* Background gradient */
        background: linear-gradient(37deg, #232222, #6657e1, #9c333b);
        background-size: 600% 600%;

        -webkit-animation: gradientAnim 10s ease infinite;
        -moz-animation: gradientAnim 10s ease infinite;
        animation: gradientAnim 10s ease infinite;
    }

    .card-news:hover {
        transform: scale(1.1);
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }

    #text-news {
        font-family: 'Chopsic', sans-serif;
    }

    #img_awards {
        width: 50%;
        border-radius: 10px;
    }

    .font-chopsic {
        font-family: Chopsic;
    }

    @font-face {
        font-family: "Chopsic";
        src: url("assets/fonts/Chopsic.woff2") format("woff2"),
            url('assets/fonts/Chopsic.woff') format('woff');
    }


    /* Background animation */
    @-webkit-keyframes gradientAnim {
        0% {
            background-position: 86% 0%
        }

        50% {
            background-position: 15% 100%
        }

        100% {
            background-position: 86% 0%
        }
    }

    @-moz-keyframes gradientAnim {
        0% {
            background-position: 86% 0%
        }

        50% {
            background-position: 15% 100%
        }

        100% {
            background-position: 86% 0%
        }
    }

    @keyframes gradientAnim {
        0% {
            background-position: 86% 0%
        }

        50% {
            background-position: 15% 100%
        }

        100% {
            background-position: 86% 0%
        }
    }
</style>