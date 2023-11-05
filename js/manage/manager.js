/* Script for adding and modifying TAS and players */



// boolean used for form verification on submit
var verifyOk;

// Table that contains all warnings when submitting a form. (when no video is provided with a TAS for example)
var verifyWarningEmpty;


$(function () {

    addSelectPickerToPlayersDropdown();

    populatePlayersDropdown();

    populateCountriesDropdown();

    // Hide warning messages on page loading
    $(".warningMessage").hide();

    // Verify form inputs
    verify();

    // Modify form depending if this is a 3 laps run or a flap
    manage3LapsAndLaps();

    listenChangeCategory();

    // Automatically fill in the date field on button click
    autoFillDate();

    listenGhostUpload();

    listenGhostRemove();
});

function listenGhostRemove() {
    // Remove file from form when user clicks on remove button
    $('#delete-file').click(function () {
        $('#fileUpload').val("");
        $('#label-file-upload').text("Choose file");
        $("#hiden-file-exist").val("0");
    });
}

function listenGhostUpload() {
    // Add filename in custom input when file selected
    $('#fileUpload').change(function (e) {
        var fileName = document.getElementById("fileUpload").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
        $("#hiden-file-exist").val("1");
    });
}

function autoFillDate() {
    $('.button-date').click(function (e) {
        switch ($(this).text()) {
            case 'Today':
                $('#inputDate').val(new Date().toISOString().split("T")[0]);
                break;
            case 'Yesterday':
                $('#inputDate').val(new Date(new Date().setDate(new Date().getDate() - 1)).toISOString().split("T")[0]);
                break;
        }
    });
}

function listenChangeCategory() {
    $("#inputCategory").change(function (e) {
        manage3LapsAndLaps();
    });
}

function populateCountriesDropdown() {
    let selectCountries = $('#select-countries');
    const countries = 'assets/country-flags/countries.json';

    // Populate dropdown with countries
    $.getJSON(countries, function (data) {
        $.each(data, function (key, entry) {
            selectCountries.append($('<option></option>').attr('value', key).text(entry));
        });
        bootstrapSelectCountries();
    });
}

// Populate player's dropdown if on modify page
function populatePlayersDropdown() {
    if ($('#id-players-hidden').length) {
        var playersIdString = $('#id-players-hidden').data("id");
        var playersIdArray = playersIdString.toString().split(',');
        $('#select-players').selectpicker('val', playersIdArray);
    }
}

// Add the select picker functionalities to player's dropdown
function addSelectPickerToPlayersDropdown() {
    $('#select-players').selectpicker({
        liveSearch: true,
        liveSearchNormalize: true,
        size: 15
    });
}

// Add bootstrap-select on countries dropdown
function bootstrapSelectCountries() {
    $('#select-countries').selectpicker({
        liveSearch: true,
        liveSearchNormalize: true,
        size: 15
    });

    // Pre-Select country if on modify page
    if ($('#country-key-hidden').length) {
        var countryKey = $('#country-key-hidden').data("key");
        $('#select-countries').selectpicker('val', countryKey.toUpperCase());
    }
}

// Modify form depending if this is a 3 laps run or a flap
function manage3LapsAndLaps() {
    if (!isFlap()) {
        $(".only-3laps").show();
        $(".only-flap").hide();
    } else {
        $(".only-flap").show();
        $(".only-3laps").hide();
    }
}



///////// Form Verification ////////////

function verify() {
    $(".form-manage-tas").submit(function (e) {
        verifyOk = true;
        verifyWarningEmpty = [];
        verifyTime();
        verifyDate();
        verifyUrl();
        verifyLaps();
        verifyPlayers();
        //verifyTag(); -> Temporary
        if (!isFlap()) {
            verifyCorrectTime();
        }
        // If one field is not correct -> We don't send the form
        if (!verifyOk) {
            e.preventDefault();
        }
        // If there is at least one warning, we display it to the user before submiting the form
        if (verifyOk && verifyWarningEmpty.length != 0) {
            var stringWarning = "Are you sure to add the TAS? \n \n";
            verifyWarningEmpty.forEach(function (warning) {
                stringWarning += warning + "\n";
            });
            // If the user confirms the warning(s), we send the form
            if (!confirm(stringWarning)) {
                e.preventDefault();
                e.stopPropagation();
            }
        }
    });


    $(".form-manage-player").submit(function (e) {
        var input = $("#inputName");
        var name = input.val().trim();
        if (name.length < 1 || name.includes("_")) {
            addWarning(input);
            e.preventDefault();
        }

        var playerBeingModified = $("#name-player-hidden").val();
        // If player is being modified, do not process the case we do not change the name of the TASer
        if (name.toUpperCase() !== playerBeingModified.toUpperCase()) {
            $.ajax({
                type: 'GET',
                'async': false,
                'data': { playerName: name },
                'url': "php_scripts/manage/verifyPlayerAdd.php",
                'dataType': "json",
                'success': function (data) {
                    // Prevent adding an already existing player name
                    if (data['playerExists'] > 0) {
                        e.preventDefault();
                        $('#validation-player-already-exists').show();
                    }
                }
            });
        }
    });
}

// Verify time is in correct format
function verifyTime() {
    var input = $("#inputTime");
    const regexTime = /^((([0-9]):[0-5][0-9].[0-9][0-9][0-9]$))/g;
    if (regexTime.exec(input.val()) === null) {
        addWarning(input);
    } else {
        removeWarning(input);
    }
}

// Verify date is in correct format
function verifyDate() {
    var input = $("#inputDate");
    const regexDate = /^\d{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/g;
    if (regexDate.exec(input.val()) === null) {
        addWarning(input);
    } else {
        removeWarning(input);
    }
}

// Verify url is in correct format
function verifyUrl() {
    var input = $("#inputLink");
    if (input.val().length != 0) {
        const regexUrl = /(http(s) ?: \/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g;
        if (regexUrl.exec(input.val()) === null) {
            addWarning(input);
        } else {
            removeWarning(input);
        }
    } else {
        removeWarning(input);
        verifyWarningEmpty.push("There is no video attached.")
    }
}

// Verify laps are in correct format
function verifyLaps() {
    for (let i = 1; i < 4; i++) {
        const regexLaps = /^(([0-5][0-9].[0-9][0-9][0-9]$))/g; //Don't move outside of for()
        var input = $("#inputLap" + i);
        if (input.val().length != 0) {
            if (regexLaps.exec(input.val()) === null) {
                addWarning(input);
            } else {
                removeWarning(input);
            }
        } else {
            removeWarning(input);
            if (!isFlap()) {
                verifyWarningEmpty.push("There is no time for lap " + i + " attached.")
            }
        }
    }
}

// Verify that there is at least one player selected
function verifyPlayers() {
    var input = $("#select-players");
    var inputValidation = $("#validationPlayers");
    if (input.val().length == 0) {
        // Specific warning for bootstrap-select
        inputValidation.addClass("d-block");
        input.addClass("red-border");
        verifySetFalse();
    } else {
        inputValidation.removeClass("d-block");
        input.removeClass("red-border");
    }
}

// Verify that the tag is matching the presence of ghost file or not
function verifyTag() {
    var input = $("#inputTag");
    var inputDate = $("#inputDate");

    if (input.find(":selected").val() == 1) {
        if ($("#hiden-file-exist").val() == "0") {
            addWarning(input);
        } else {
            removeWarning(input);
        }
    } else {
        if (Date.parse(inputDate.val()) > Date.parse("2021-11-29")){
            addWarning(input);
        } else {
            if ($("#hiden-file-exist").val() != 0) {
                addWarning(input);
            } else {
                removeWarning(input);
            }
        }
    }
}

// Verify sum of laps = 3 laps time
function verifyCorrectTime() {
    var isNotEmpty = true;
    var sumMiliseconds = 0;
    var sumSeconds = 0;
    for (let i = 1; i < 4; i++) {
        var input = $("#inputLap" + i);
        var miliseconds = parseInt(input.val().substr(-3), 10);
        var seconds = parseInt(input.val().substr(0, 2), 10);
        sumMiliseconds += miliseconds;
        sumSeconds += seconds;
        sumMinutes = 0;
        if (input.val().length == 0) {
            isNotEmpty = false;
        }
    }
    if (isNotEmpty) {
        if (sumMiliseconds >= 1000) {
            var secondsToAdd = (sumMiliseconds / 1000) << 0;
            sumSeconds += secondsToAdd;
            sumMiliseconds -= 1000 * secondsToAdd;
        }
        if (sumSeconds >= 60) {
            var minutesToAdd = (sumSeconds / 60) << 0;
            sumMinutes += minutesToAdd;
            sumSeconds -= 60 * minutesToAdd;
        }
        sumMiliseconds = String(sumMiliseconds).padStart(3, '0');
        sumSeconds = String(sumSeconds).padStart(2, '0');
        var formatedTime = (sumMinutes + ":" + sumSeconds + "." + sumMiliseconds);


        if (formatedTime != $("#inputTime").val()) {
            $(".warningMessage").show();
            verifySetFalse();
        } else {
            $(".warningMessage").hide();
        }
    }
}

// Add error messages in the form
function addWarning(input) {
    input.addClass("is-invalid");
    verifySetFalse();
}

// Remove error messages in the form
function removeWarning(input) {
    input.removeClass("is-invalid");
}

// Set the verification boolean to false
function verifySetFalse() {
    verifyOk = false;
}

// Verify if the selected category is a flap
function isFlap() {
    var selection = $("#inputCategory").find('option:selected').val();
    return !(selection == "classic" || selection == "no_glitch" || selection == "no_cut");
}

// 'Cancel' button in the form
function goBack() {
    window.history.back();
}