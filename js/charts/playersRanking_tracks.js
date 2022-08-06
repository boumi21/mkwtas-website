// Example : https://www.amcharts.com/demos/column-with-rotated-series/
// Same but horizontal

am4core.ready(function () {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    var chart = am4core.create("chartdiv_playersRanking_tracks", am4charts.XYChart);
    chart.padding(40, 40, 40, 40);

    // Set up data source
    chart.dataSource.url = "php_scripts/charts/stat_playersRanking_tracks.php";

    var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.dataFields.category = "name_player";
    categoryAxis.renderer.minGridDistance = 1;
    categoryAxis.renderer.inversed = true;
    categoryAxis.renderer.grid.template.disabled = true;

    var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
    valueAxis.min = 0;
    valueAxis.renderer.opposite = true;

    var title = chart.titles.create();
    title.text = "[bold]Total Number of Tracks With BKTs[/]";
    title.fontSize = 25;
    title.marginBottom = 30;

    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.categoryY = "name_player";
    series.dataFields.valueX = "number_bkt";
    series.tooltipText = "{valueX.value}"
    series.columns.template.strokeOpacity = 0;
    series.columns.template.column.cornerRadiusBottomRight = 5;
    series.columns.template.column.cornerRadiusTopRight = 5;

    var labelBullet = series.bullets.push(new am4charts.LabelBullet())
    labelBullet.label.horizontalCenter = "left";
    labelBullet.label.dx = 10;
    labelBullet.label.text = "{values.valueX.workingValue}";
    labelBullet.locationX = 1;

    // as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
    series.columns.template.adapter.add("fill", function (fill, target) {
        return chart.colors.getIndex(target.dataItem.index);
    });

    categoryAxis.sortBySeries = series;

    // Set cell size in pixels
    var cellSize = 30;
    chart.events.on("datavalidated", function (ev) {

        // Get objects of interest
        var chart = ev.target;
        var categoryAxis = chart.yAxes.getIndex(0);

        // Calculate how we need to adjust chart height
        var adjustHeight = chart.data.length * cellSize - categoryAxis.pixelHeight;

        // get current chart height
        var targetHeight = chart.pixelHeight + adjustHeight;

        // Set it on chart's container
        chart.svgContainer.htmlElement.style.height = targetHeight + "px";
    });



}); // end am4core.ready()