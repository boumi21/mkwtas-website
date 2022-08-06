// Example : https://www.amcharts.com/demos/column-with-rotated-series/

am4core.ready(function () {

    am4core.ready(function() {
        
        // Create chart instance
        var chart = am4core.create("chartdiv_activity_recordsPerYear", am4charts.XYChart);

        // Set up data source
        chart.dataSource.url = "php_scripts/charts/stat_activity_recordsPerYear.php";  
        
        // Create axes
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "year";
        categoryAxis.renderer.minGridDistance = 30;
        categoryAxis.renderer.labels.template.horizontalCenter = "right";
        categoryAxis.renderer.labels.template.verticalCenter = "middle";
        categoryAxis.renderer.labels.template.rotation = 270;
        categoryAxis.tooltip.disabled = true;
        categoryAxis.renderer.minHeight = 110;
        
        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.minWidth = 50;
        valueAxis.tooltip.disabled = true;

        var title = chart.titles.create();
        title.text = "[bold]Total Number of BKTs per Year[/]";
        title.fontSize = 25;
        title.marginBottom = 30;
        
        // Create series
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.sequencedInterpolation = true;
        series.dataFields.valueY = "records";
        series.dataFields.categoryX = "year";
        series.columns.template.strokeWidth = 0;
        
        series.tooltip.pointerOrientation = "vertical";

        var labelBullet = series.bullets.push(new am4charts.LabelBullet());
        labelBullet.label.verticalCenter = "bottom";
        labelBullet.label.dy = -10;
        labelBullet.label.text = "{values.valueY.workingValue}";
        labelBullet.tooltipText = "{values.valueY.workingValue}";
        
        series.columns.template.column.cornerRadiusTopLeft = 10;
        series.columns.template.column.cornerRadiusTopRight = 10;
        series.columns.template.column.fillOpacity = 0.8;
        
        // on hover, make corner radiuses bigger
        var hoverState = series.columns.template.column.states.create("hover");
        hoverState.properties.fillOpacity = 1;
        
        series.columns.template.adapter.add("fill", function(fill, target) {
          return chart.colors.getIndex(target.dataItem.index);
        });
        
        }); // end am4core.ready()

});