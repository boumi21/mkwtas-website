// Example : https://www.amcharts.com/demos/risk-heatmap/

am4core.ready(function () {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    var chart = am4core.create("chartdiv_activity_recordsPerMonth", am4charts.XYChart);
    chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

    // Set up data source
    chart.dataSource.url = "php_scripts/charts/stat_activity_recordsPerMonth.php";

    chart.maskBullets = false;

    var xAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    var yAxis = chart.yAxes.push(new am4charts.CategoryAxis());

    xAxis.dataFields.category = "month";
    yAxis.dataFields.category = "year";

    xAxis.renderer.grid.template.disabled = true;
    xAxis.renderer.minGridDistance = 40;
    xAxis.renderer.opposite = true;

    yAxis.renderer.grid.template.disabled = true;
    yAxis.renderer.inversed = true;
    yAxis.renderer.minGridDistance = 30;

    var title = chart.titles.create();
    title.text = "[bold]Total Number of BKTs per Month[/]";
    title.fontSize = 25;
    title.marginBottom = 30;

    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.categoryX = "month";
    series.dataFields.categoryY = "year";
    series.dataFields.value = "records";
    series.sequencedInterpolation = true;
    series.defaultState.transitionDuration = 3000;

    // Set up column appearance
    var column = series.columns.template;
    column.strokeWidth = 2;
    column.strokeOpacity = 1;
    column.stroke = am4core.color("#ffffff");
    column.tooltipText = "{month}, {year}";
    column.width = am4core.percent(100);
    column.height = am4core.percent(100);
    column.column.cornerRadius(6, 6, 6, 6);

    column.column.adapter.add("fill", function (fill, target) {
        if (target.dataItem) {
            if (target.dataItem.dataContext.year == 2009) {
                if (target.dataItem.dataContext.month != "December") {
                    return am4core.color("#fff")
                }
            }
            if (target.dataItem.value >= 15) {
                return am4core.color("#e74c3c")
            }
            else if (target.dataItem.value >= 10) {
                return am4core.color("#e67e22")
            }
            else if (target.dataItem.value >= 5) {
                return am4core.color("#f1c40f")
            }
            else if (target.dataItem.value > 0) {
                return am4core.color("#16a085")
            }
            else {
                return am4core.color("#95a5a6");
            }
        }
        return fill;
    });

    var bullet2 = series.bullets.push(new am4charts.LabelBullet());
    bullet2.label.text = "{records}";
    bullet2.label.fill = am4core.color("#fff");
    bullet2.zIndex = 1;
    bullet2.fontSize = 18;
    bullet2.interactionsEnabled = false;


    // Set cell size in pixels
    var cellSize = 5;
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

});