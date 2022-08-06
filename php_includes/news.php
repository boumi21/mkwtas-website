<!-- File that needs to be included on the main menu page when there is an important annoucement -->
<!-- Everything needed for the news need to be included in this file (php, js, css...) -->


<!-- HTML Part -->
<a id="link_news" href="<?php echo GITHUB_REPO ?>" target="_blank" rel="noopener">
    <div class="card text-white bg-success card-news mb-3">
        <div class="card-body flex-row-center">
            <img src="assets/img/github.png" width="60px">
            <h5 class="ml-3 mr-3"><span class="font-chopsic">mkwtas.com</span> is now on Github</h5>
            <img src="assets/img/github.png" width="60px">
        </div>
    </div>
</a>


<!-- CSS Part -->
<style>
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
        background: linear-gradient(37deg, #232222, #8e4949, #cdc7c7);
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