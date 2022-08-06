// Example : https://www.amcharts.com/demos/clustered-column-chart/

am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end
    
    var chart = am4core.create('chartdiv_activity_playersPerYear', am4charts.XYChart)
    chart.colors.step = 3;
    
    chart.legend = new am4charts.Legend()
    chart.legend.position = 'top'
    chart.legend.paddingBottom = 20
    chart.legend.labels.template.maxWidth = 95
    
    var xAxis = chart.xAxes.push(new am4charts.CategoryAxis())
    xAxis.dataFields.category = 'year'
    xAxis.renderer.cellStartLocation = 0.1
    xAxis.renderer.cellEndLocation = 0.9
    xAxis.renderer.grid.template.location = 0;
    xAxis.renderer.labels.template.horizontalCenter = "right";
    xAxis.renderer.labels.template.verticalCenter = "middle";
    xAxis.renderer.labels.template.rotation = 270;
    xAxis.renderer.minGridDistance = 30;
    
    var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
    yAxis.min = 0;
    yAxis.extraMax = 0.1;

    var title = chart.titles.create();
    title.text = "[bold]Number of TASers per Year[/]";
    title.fontSize = 25;
    title.marginBottom = 30;
    
    function createSeries(value, name) {
        var series = chart.series.push(new am4charts.ColumnSeries())
        series.dataFields.valueY = value
        series.dataFields.categoryX = 'year'
        series.name = name
    
        series.events.on("hidden", arrangeColumns);
        series.events.on("shown", arrangeColumns);
    
        var bullet = series.bullets.push(new am4charts.LabelBullet())
        bullet.interactionsEnabled = true
        bullet.dy = -15;
        bullet.label.text = '{valueY}'
        bullet.label.fill = am4core.color('#000000')
        bullet.label.tooltipText = '{valueY}'
    
        return series;
    }
    
    // Set up data source
    chart.dataSource.url = "php_scripts/charts/stat_activity_playersPerYear.php";
    
    createSeries('players', 'Total TASers');
    createSeries('newplayers', 'New TASers');
    

    function arrangeColumns() {
    
        var series = chart.series.getIndex(0);
    
        var w = 1 - xAxis.renderer.cellStartLocation - (1 - xAxis.renderer.cellEndLocation);
        if (series.dataItems.length > 1) {
            var x0 = xAxis.getX(series.dataItems.getIndex(0), "categoryX");
            var x1 = xAxis.getX(series.dataItems.getIndex(1), "categoryX");
            var delta = ((x1 - x0) / chart.series.length) * w;
            if (am4core.isNumber(delta)) {
                var middle = chart.series.length / 2;
    
                var newIndex = 0;
                chart.series.each(function(series) {
                    if (!series.isHidden && !series.isHiding) {
                        series.dummyData = newIndex;
                        newIndex++;
                    }
                    else {
                        series.dummyData = chart.series.indexOf(series);
                    }
                })
                var visibleCount = newIndex;
                var newMiddle = visibleCount / 2;
    
                chart.series.each(function(series) {
                    var trueIndex = chart.series.indexOf(series);
                    var newIndex = series.dummyData;
    
                    var dx = (newIndex - trueIndex + middle - newMiddle) * delta
    
                    series.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
                    series.bulletsContainer.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
                })
            }
        }
    }
    
    }); // end am4core.ready()