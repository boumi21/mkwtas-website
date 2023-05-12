/**
 * Scripts used globally
 */

$(function () {
  /*for popper.js*/
  addPopperJS();
})

/**
 * Add popover functionnality with popper.js
 */
function addPopperJS() {
  $('[data-toggle="tooltip"]').tooltip();
  $('[data-toggle="popover"]').popover();
  $('.popover-dismiss').popover({
    trigger: 'focus'
  })
}

//Display snackBar
// verif -> 0 = success, 1 = error / textAlert -> Text to display
function showSnackbar(verif, textAlert) {

  // Get the snackbar DIV
  if (verif == 0) { var x = document.getElementById("snackbar"); }
  else { var x = document.getElementById("snackbarError"); }

  x.textContent = textAlert
  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function () { x.className = x.className.replace("show", ""); }, 4000);
}

// Hide or show table on click
function collapseTable(element, tabNumber) {
  if ($(element).text() == 'Show') {
    $('.tab' + tabNumber).show();
    $(element).text('Hide');
  } else {
    $('.tab' + tabNumber).hide();
    $(element).text('Show');
  }
}