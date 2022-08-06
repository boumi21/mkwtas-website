// Example : https://www.amcharts.com/demos/data-grouping-50k-points/

am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("chartdiv_3laps", am4charts.XYChart);

    // Set up data source
    chart.dataSource.url = "php_scripts/charts/stat_tas_time.php";

    // Create axes
    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.minGridDistance = 70;
    chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";

    chart.durationFormatter.durationFormat = "mm':'ss'.'SSS'";

    // this makes the data to be grouped
    dateAxis.groupData = true;
    dateAxis.groupCount = 300;
    dateAxis.tooltipDateFormat = "d MMM, yyyy";
    dateAxis.title.text = "Date"

    var valueAxis = chart.yAxes.push(new am4charts.DurationAxis());
    valueAxis.baseUnit = "millisecond";
    valueAxis.title.text = "Total Duration";

    var title = chart.titles.create();
    title.text = "[bold]Total Time 3 laps[/] \n (Zoom in for details)";
    title.fontSize = 25;
    title.marginBottom = 30;
    title.textAlign = "middle";

    // Create series
    var series = chart.series.push(new am4charts.LineSeries());
    series.dataFields.valueY = "y";
    series.dataFields.dateX = "x";
    series.strokeWidth = 2;
    series.minBulletDistance = 10;
    series.tooltipText = "{valueY.formatDuration()}";
    series.tooltip.pointerOrientation = "vertical";
    series.tooltip.background.cornerRadius = 20;
    series.tooltip.background.fillOpacity = 0.5;
    series.tooltip.label.padding(12, 12, 12, 12);
    series.fillOpacity = 0.5;

    // Add scrollbar
    chart.scrollbarX = new am4charts.XYChartScrollbar();
    chart.scrollbarX.series.push(series);

    // Add cursor
    chart.cursor = new am4charts.XYCursor();
    chart.cursor.xAxis = dateAxis;
    chart.cursor.snapToSeries = series;

    $.getJSON('php_scripts/charts/stat_tas_time.php', function(jsonData) {
        var size = jsonData.length;
        var timeCut = (jsonData[0].y - jsonData[size - 1].y) / 1000;
        var firstDate = jsonData[0].x;
        var lastDate = jsonData[size - 1].x;
        $("#info_chart1").text("Time cut of " + timeCut + " seconds in " + size + " days from " +
            firstDate + " to " + lastDate);
    });


}); // end am4core.ready()