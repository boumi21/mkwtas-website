/**
 * Everything related to Datatables / YADCF
 * -> Logic that creates powerfull tables with filters and hidden rows
 */


$(function () {

    /******************************** For Datatables ***********************************************************/

    // Add datatables functionalities to all tables
    var { tableClassic, tablePlayerBKT, tableTrack, tablePlayerAll, tableAll } = addDatatables();

    // Get usefull data like tracks names or categories
    var { trackData, categoryData } = getTracksData();

    // Listener for clicks on "green plus" button that opens details
    $('.detailRow tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');

        // Retrieve table's type from data-attribute
        var typeTable = $(this).data("table-type");
        // Get the table that corresponds to the type
        var tableToModify = getTable(typeTable);

        var row = tableToModify.row(tr);

        // Opens and create the html for hidden row
        openDetails(tr, row, typeTable);
    });

    /**
     * 
     * @param {string} typeTable Type of the table
     * @returns the Datatables instance of the table
     */
    function getTable(typeTable) {
        switch (typeTable) {
            case 'classic':
                return tableClassic;

            case 'all':
                return tableAll;

            case 'player-bkt':
                return tablePlayerBKT;

            case 'player-all':
                return tablePlayerAll;

            case 'track':
                return tableTrack;
        }
    }

    /**
     * 
     * @param {*} tr selected row in the table (DOM element)
     * @param {*} row hidden row
     * @param {*} typeTable Type of the table
     */
    function openDetails(tr, row, typeTable) {
        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(format(row.data(), typeTable)).show();
            tr.addClass('shown');
        }
    }

    /**
     * Create and add YADCF filters in the modal (all.php page only)
     */
    addYADCF(tableAll, trackData, categoryData, customFilterTag, customFilterGhost);


    /******************************** For Readmore ***********************************************************/
    $(".read-more").readmore({
        collapsedHeight: 49,
        heightMargin: 16,
        moreLink: '<a href="#" class="prompt"><img src="assets/img/svg/show-more.svg" width="20px" title="click me!"></a>',
        lessLink: ''
    });

    //Launch the function again when a tab is opened. Otherwise it does not work in tabs
    $('.nav-tabs a').on('shown.bs.tab', function () {
        $(".read-more").readmore({
            collapsedHeight: 49,
            heightMargin: 16,
            moreLink: '<a href="#" class="prompt"><img src="assets/img/svg/show-more.svg" width="20px" title="click me!"></a>',
            lessLink: ''
        });
        $.fn.dataTable.tables({
            visible: true,
            api: true
        }).columns.adjust();
    });

});

/**
 * Calls the correct format method depending on the table's type
 * @param {*} row to format
 * @param {*} typeTable Type of the table
 * @returns the formatted hidden row that will be shown
 */
function format(row, typeTable) {

    switch (typeTable) {
        case 'classic':
            return formatClassic(row);

        case 'all':
            return formatAll(row);

        case 'player-bkt':
            return formatPlayerBKT(row);

        case 'player-all':
            return formatPlayerAll(row);

        case 'track':
            return formatTrack(row);
    }
}

// Format hidden row for classic table
function formatClassic(row) {
    if (row[8] == "") {
        row[8] = "First run of its category";
    }
    if (row[9] == "") {
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr>' +
            '<td>Time cut</td>' +
            '<td>' + row[8] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Character</td>' +
            '<td>' + row[5] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Vehicle</td>' +
            '<td>' + row[6] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Ghost</td>' +
            '<td>' + row[10] + '</td>' +
            '</tr>' +
            '</table>';
    } else {
        var formatSplits = findMin(row[9]);
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr>' +
            '<td>Time cut</td>' +
            '<td>' + row[8] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Splits</td>' +
            '<td>' + formatSplits + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Character</td>' +
            '<td>' + row[5] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Vehicle</td>' +
            '<td>' + row[6] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Ghost</td>' +
            '<td>' + row[10] + '</td>' +
            '</tr>' +
            '</table>';
    }
}

// Format hidden row for all table
function formatAll(row) {
    if (row[8] == "") {
        row[8] = "First run of its category";
    }
    if (row[9] == "") {
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr>' +
            '<td>Time cut</td>' +
            '<td>' + row[8] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Character</td>' +
            '<td>' + row[6] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Vehicle</td>' +
            '<td>' + row[7] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Ghost</td>' +
            '<td>' + row[10] + '</td>' +
            '</tr>' +
            '</table>';
    } else {
        var formatSplits = findMin(row[9]);
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr>' +
            '<td>Time cut</td>' +
            '<td>' + row[8] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Splits</td>' +
            '<td>' + formatSplits + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Character</td>' +
            '<td>' + row[6] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Vehicle</td>' +
            '<td>' + row[7] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Ghost</td>' +
            '<td>' + row[10] + '</td>' +
            '</tr>' +
            '</table>';
    }

}

// Format hidden row for player BKT table
function formatPlayerBKT(row) {
    if (row[9] == "") {
        row[9] = "First run of its category";
    }
    if (row[10] == "") {
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr>' +
            '<td>Time cut</td>' +
            '<td>' + row[9] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Character</td>' +
            '<td>' + row[6] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Vehicle</td>' +
            '<td>' + row[7] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Ghost</td>' +
            '<td>' + row[11] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Admin</td>' +
            '<td>' + row[12] + '</td>' +
            '</tr>' +
            '</table>';
    } else {
        var formatSplits = findMin(row[10]);
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr>' +
            '<td>Time cut</td>' +
            '<td>' + row[9] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Splits</td>' +
            '<td>' + formatSplits + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Character</td>' +
            '<td>' + row[6] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Vehicle</td>' +
            '<td>' + row[7] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Ghost</td>' +
            '<td>' + row[11] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Admin</td>' +
            '<td>' + row[12] + '</td>' +
            '</tr>' +
            '</table>';
    }

}

// Format hidden row for player all table
function formatPlayerAll(row) {
    if (row[8] == "") {
        row[8] = "First run of its category";
    }
    if (row[9] == "") {
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr>' +
            '<td>Time cut</td>' +
            '<td>' + row[8] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Character</td>' +
            '<td>' + row[6] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Vehicle</td>' +
            '<td>' + row[7] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Ghost</td>' +
            '<td>' + row[10] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Admin</td>' +
            '<td>' + row[11] + '</td>' +
            '</tr>' +
            '</table>';
    } else {
        var formatSplits = findMin(row[9]);
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr>' +
            '<td>Time cut</td>' +
            '<td>' + row[8] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Splits</td>' +
            '<td>' + formatSplits + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Character</td>' +
            '<td>' + row[6] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Vehicle</td>' +
            '<td>' + row[7] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Ghost</td>' +
            '<td>' + row[10] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Admin</td>' +
            '<td>' + row[11] + '</td>' +
            '</tr>' +
            '</table>';
    }
}

// Format hidden row for track table
function formatTrack(row) {
    if (row[6] == "") {
        row[6] = "First run of its category";
    }
    if (row[7] == "") {
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr>' +
            '<td>Time cut</td>' +
            '<td>' + row[6] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Ghost</td>' +
            '<td>' + row[8] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Admin</td>' +
            '<td>' + row[9] + '</td>' +
            '</tr>' +
            '</table>';
    } else {
        var formatSplits = findMin(row[7]);
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr>' +
            '<td>Time cut</td>' +
            '<td>' + row[6] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Splits</td>' +
            '<td>' + formatSplits + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Ghost</td>' +
            '<td>' + row[8] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Admin</td>' +
            '<td>' + row[9] + '</td>' +
            '</tr>' +
            '</table>';
    }

}

/**
 * 
 * @param {*} splits cell that contains the splits
 * @returns the same splits but with a special <span> around the min lap
 */
function findMin(splits) {
    var detail = splits.split(' / ');
    var indexMenor = splits.indexOf(Math.min(detail[0], detail[1], detail[2]));
    var trueIndex = Math.floor(indexMenor / 9);
    detail[trueIndex] = "<span class='minSplit'>" + detail[trueIndex] + "</span>"
    var splitsToReturn = detail[0] + " / " + detail[1] + " / " + detail[2];
    return splitsToReturn;
}



/******************************** For Filters ***********************************************************/

/**
 * Reset all YADCF filters on all.php page
 */
function resetAllFilters() {
    var tableAll = $('#empTable').DataTable();
    yadcf.exResetAllFilters(tableAll);
}

/**
 * Add datatables functionalities to all tables
 * @returns all the Datatables instances
 */
function addDatatables() {

    /**
     * Add datatables functionalities for classic tables
     */
    var tableClassic = $('.data-table').DataTable({
        "autoWidth": false,
        "order": [],
        "searching": false,
        "orderCellsTop": true,
        'columnDefs': [{
            "className": 'details-control',
            'targets': [0],
            'orderable': false,
            "width": "6%"
        }, {
            "targets": [1],
            "width": "20%"
        }, {
            "targets": [5],
            "visible": false,
        }, {
            "targets": [6],
            "visible": false,
        }, {
            "targets": [8],
            "visible": false,
        }, {
            "targets": [9],
            "visible": false,
        }, {
            "targets": [10],
            "visible": false,
        }],
        "colReorder": true,
        "paging": false,
        "info": false
    });

    /**
     * Add datatables functionalities for player's page "bkt only" table
     */
    var tablePlayerBKT = $('.data-table-player').DataTable({
        "autoWidth": false,
        "order": [],
        "searching": false,
        "orderCellsTop": true,
        'columnDefs': [{
            "className": 'details-control',
            'targets': [0],
            'orderable': false,
            "width": "6%"
        }, {
            "targets": [1],
            "width": "20%"
        }, {
            "targets": [6],
            "visible": false,
        }, {
            "targets": [7],
            "visible": false,
        }, {
            "targets": [9],
            "visible": false,
        }, {
            "targets": [10],
            "visible": false,
        }, {
            "targets": [11],
            "visible": false,
        }, {
            "targets": [12],
            "visible": false,
        }],
        "colReorder": true,
        "paging": false,
        "info": false
    });

    /**
     * Add datatables functionalities for player's page "All TASes" table
     */
    var tablePlayerAll = $('.data-player-full').DataTable({
        "autoWidth": false,
        "order": [],
        "searching": false,
        "colReorder": true,
        "paging": false,
        "info": false,
        'columnDefs': [{
            "className": 'details-control',
            'targets': [0],
            'orderable': false,
            "width": "6%"
        }, {
            'targets': [6],
            "visible": false,
        }, {
            "targets": [7],
            "visible": false,
        }, {
            "targets": [8],
            "visible": false,
        }, {
            "targets": [9],
            "visible": false,
        }, {
            "targets": [10],
            "visible": false,
        }, {
            "targets": [11],
            "visible": false,
        }],
    });


    /**
     * Add datatables functionalities for track's page tables
     */
    var tableTrack = $('.data-track').DataTable({
        "autoWidth": false,
        "order": [],
        "searching": false,
        "orderCellsTop": true,
        "colReorder": true,
        "paging": false,
        "info": false,
        'columnDefs': [{
            "className": 'details-control',
            'targets': [0],
            'orderable': false,
            "width": "6%"
        }, {
            'targets': [6],
            "visible": false,
        }, {
            "targets": [7],
            "visible": false,
        }, {
            "targets": [8],
            "visible": false,
        }, {
            "targets": [9],
            "visible": false,
        }],
    });

    /**
     * Add datatables functionalities for all TASes page table
     */
    var tableAll = $('#empTable').DataTable({
        "autoWidth": false,
        "order": [],
        "colReorder": true,
        "orderCellsTop": true,
        "paging": false,
        "initComplete": function (settings, json) {
            $('#loader').remove();
            $('#empTable').removeAttr('hidden');
        },
        'columnDefs': [{
            "className": 'details-control',
            'targets': [0],
            'orderable': false,
            "width": "6%"
        }, {
            'targets': [6],
            "visible": false,
        }, {
            "targets": [7],
            "visible": false,
        }, {
            "targets": [8],
            "visible": false,
        }, {
            "targets": [9],
            "visible": false,
        }, {
            "targets": [10],
            "visible": false,
        }],
    });
    return { tableClassic, tablePlayerBKT, tableTrack, tablePlayerAll, tableAll };
}

/**
 * Add YADCF filters to all.php page
 * @param {*} tableAll the all table
 * @param {*} trackData all tracks
 * @param {*} categoryData all categories
 * @param {*} customFilterTag custom function for the tag filter
 * @param {*} customFilterGhost custom function for ghost filter
 */
function addYADCF(tableAll, trackData, categoryData, customFilterTag, customFilterGhost) {

    if (tableAll.context.length != 0) {
        yadcf.init(tableAll, [{
            column_number: 1,
            data: trackData,
            filter_match_mode: 'exact',
            filter_default_label: 'Select track',
            style_class: 's-filter',
            filter_container_id: 'trackFilter'
        },
        {
            column_number: 2,
            data: categoryData,
            filter_match_mode: 'exact',
            style_class: 'm-filter',
            filter_default_label: 'Select category',
            filter_container_id: 'categoryFilter'
        },
        {
            column_number: 3,
            filter_type: 'custom_func',
            custom_func: customFilterTag,
            data: [{
                value: 'All',
                label: 'All'
            }, {
                value: 'Verified',
                label: 'Verified'
            }, {
                value: 'Unverified',
                label: 'Unverified'
            }, {
                value: 'Invalid',
                label: 'Invalid'
            }],
            omit_default_label: true,
            style_class: 'xs-filter',
            filter_container_id: 'tagFilter'
        },
        {
            column_number: 4,
            column_data_type: 'html',
            filter_default_label: 'Select player',
            style_class: 's-filter',
            filter_container_id: 'playerFilter'
        },
        {
            column_number: 6,
            filter_default_label: 'Select',
            filter_match_mode: 'exact',
            style_class: 'xs-filter',
            filter_container_id: 'characterFilter'
        },
        {
            column_number: 7,
            filter_default_label: 'Select',
            filter_match_mode: 'exact',
            style_class: 'xs-filter',
            filter_container_id: 'vehicleFilter'
        },
        {
            column_number: 10,
            filter_type: 'custom_func',
            custom_func: customFilterGhost,
            data: [{
                value: 'all',
                label: 'All'
            }, {
                value: 'ghost',
                label: 'Yes'
            }, {
                value: 'no_ghost',
                label: 'No'
            }],
            omit_default_label: true,
            style_class: 'xs-filter',
            filter_container_id: 'ghostFilter'
        }
        ]);
    }
}




/********** For Custom Filters YADCF *******/

/**
 * Search for a hidden value in the ghost cell of the table's row. See tempGhost.php
 */
function customFilterGhost(filterVal, columnVal) {
    var found;
    if (columnVal === '') {
        return true;
    }
    switch (filterVal) {
        case 'ghost':
            found = columnVal.search(/yes_ghost/g);
            break;
        case 'no_ghost':
            found = columnVal.search(/no_ghost/g);
            break;
        default:
            found = 1;
            break;
    }

    if (found !== -1) {
        return true;
    }
    return false;
}

/**
 * Search for a hidden value in the time cell of the table's row. See tempTime.php
 */
function customFilterTag(filterVal, columnVal) {
    var found;
    if (columnVal === '') {
        return true;
    }
    switch (filterVal) {
        case 'Verified':
            found = columnVal.search(/Verified/g);
            break;
        case 'Unverified':
            found = columnVal.search(/Unverified/g);
            break;
        case 'Invalid':
            found = columnVal.search(/Invalid/g);
            break;
        default:
            found = 1;
            break;
    }

    if (found !== -1) {
        return true;
    }
    return false;
}



/******************************** Usefull Data ***********************************************************/

function getTracksData() {
    var trackData = [{
        value: "Luigi Circuit",
        label: "Luigi Circuit"
    }, {
        value: "Moo Moo Meadows",
        label: "Moo Moo Meadows"
    }, {
        value: "Mushroom Gorge",
        label: "Mushroom Gorge"
    }, {
        value: "Toad's Factory",
        label: "Toad's Factory"
    }, {
        value: "Mario Circuit",
        label: "Mario Circuit"
    }, {
        value: "Coconut Mall",
        label: "Coconut Mall"
    }, {
        value: "DK Summit",
        label: "DK Summit"
    }, {
        value: "Wario's Gold Mine",
        label: "Wario's Gold Mine"
    }, {
        value: "Daisy Circuit",
        label: "Daisy Circuit"
    }, {
        value: "Koopa Cape",
        label: "Koopa Cape"
    }, {
        value: "Maple Treeway",
        label: "Maple Treeway"
    }, {
        value: "Grumble Volcano",
        label: "Grumble Volcano"
    }, {
        value: "Dry Dry Ruins",
        label: "Dry Dry Ruins"
    }, {
        value: "Moonview Highway",
        label: "Moonview Highway"
    }, {
        value: "Bowser's Castle",
        label: "Bowser's Castle"
    }, {
        value: "Rainbow Road",
        label: "Rainbow Road"
    }, {
        value: "GCN Peach Beach",
        label: "GCN Peach Beach"
    }, {
        value: "DS Yoshi Falls",
        label: "DS Yoshi Falls"
    }, {
        value: "SNES Ghost Valley 2",
        label: "SNES Ghost Valley 2"
    }, {
        value: "N64 Mario Raceway",
        label: "N64 Mario Raceway"
    }, {
        value: "N64 Sherbet Land",
        label: "N64 Sherbet Land"
    }, {
        value: "GBA Shy Guy Beach",
        label: "GBA Shy Guy Beach"
    }, {
        value: "DS Delfino Square",
        label: "DS Delfino Square"
    }, {
        value: "GCN Waluigi Stadium",
        label: "GCN Waluigi Stadium"
    }, {
        value: "DS Desert Hills",
        label: "DS Desert Hills"
    }, {
        value: "GBA Bowser Castle 3",
        label: "GBA Bowser Castle 3"
    }, {
        value: "N64 DK's Jungle Parkway",
        label: "N64 DK's Jungle Parkway"
    }, {
        value: "GCN Mario Circuit",
        label: "GCN Mario Circuit"
    }, {
        value: "SNES Mario Circuit 3",
        label: "SNES Mario Circuit 3"
    }, {
        value: "DS Peach Gardens",
        label: "DS Peach Gardens"
    }, {
        value: "GCN DK Mountain",
        label: "GCN DK Mountain"
    }, {
        value: "N64 Bowser's Castle",
        label: "N64 Bowser's Castle"
    }];

    var categoryData = [{
        value: "Unrestricted 3laps",
        label: "Unrestricted 3laps"
    }, {
        value: "No Ultra 3laps",
        label: "No Ultra 3laps"
    }, {
        value: "No Glitch/SC 3laps",
        label: "No Glitch/SC 3laps"
    }, {
        value: "Unrestricted Flaps",
        label: "Unrestricted Flaps"
    }, {
        value: "No Ultra Flaps",
        label: "No Ultra Flaps"
    }, {
        value: "No Glitch/SC Flaps",
        label: "No Glitch/SC Flaps"
    }];
    return { trackData, categoryData };
}