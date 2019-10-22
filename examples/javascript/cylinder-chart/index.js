(function ($) {
    $.cylinder_chart = function (options) {
        var setting = {

            am4charts: {
                data: '',
                value_max: 0,
                category: '',
                value: '',
                title: '',
                title_fontSize: 0,
                title_marginBottom: 0,
                position: '',
            }

        }


        $.extend(setting, options);

        am4core.useTheme(am4themes_animated);

        var chart = am4core.create(setting.am4charts.position, am4charts.XYChart3D);


        chart.data = setting.am4charts.data;

        //export
		chart.exporting.menu = new am4core.ExportMenu();
		chart.exporting.menu.align = "rigth";
		chart.exporting.menu.verticalAlign = "top"
		chart.exporting.menu.items[0].icon = "https://static.thenounproject.com/png/36971-200.png";

		//label
		let title = chart.titles.create();
		title.text = setting.am4charts.title;
		title.fontSize = setting.am4charts.title_fontSize;
		title.marginBottom = setting.am4charts.title_marginBottom;

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.dataFields.category = setting.am4charts.category;
        categoryAxis.renderer.minGridDistance = 60;
        categoryAxis.renderer.grid.template.disabled = true;
        categoryAxis.renderer.baseGrid.disabled = true;
        categoryAxis.renderer.labels.template.dy = 20;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.grid.template.disabled = true;
        valueAxis.renderer.baseGrid.disabled = true;
        valueAxis.renderer.labels.template.disabled = true;
        valueAxis.renderer.minWidth = 0;

        var series = chart.series.push(new am4charts.ConeSeries());
        series.dataFields.categoryX = setting.am4charts.category;
        series.dataFields.valueY = setting.am4charts.value;
        series.columns.template.tooltipText = "{valueY.value}";
        series.columns.template.tooltipY = 0;
        series.columns.template.strokeOpacity = 1;

        // as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
        series.columns.template.adapter.add("fill", function (fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        });

        series.columns.template.adapter.add("stroke", function (stroke, target) {
            return chart.colors.getIndex(target.dataItem.index);
        });

    };
})(jQuery);


/*am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv3", am4charts.XYChart3D);


chart.data = [{
    "country": "USA",
    "visits": 3025
}, {
    "country": "China",
    "visits": 1882
}, {
    "country": "Japan",
    "visits": 1809
}, {
    "country": "Germany",
    "visits": 1322
}, {
    "country": "UK",
    "visits": 1122
}, {
    "country": "France",
    "visits": 1114
}, {
    "country": "India",
    "visits": 984
}, {
    "country": "Spain",
    "visits": 711
}, {
    "country": "Netherlands",
    "visits": 665
}, {
    "country": "Russia",
    "visits": 580
}, {
    "country": "South Korea",
    "visits": 443
}, {
    "country": "Canada",
    "visits": 441
}];

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.minGridDistance = 60;
categoryAxis.renderer.grid.template.disabled = true;
categoryAxis.renderer.baseGrid.disabled = true;
categoryAxis.renderer.labels.template.dy = 20;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.grid.template.disabled = true;
valueAxis.renderer.baseGrid.disabled = true;
valueAxis.renderer.labels.template.disabled = true;
valueAxis.renderer.minWidth = 0;

var series = chart.series.push(new am4charts.ConeSeries());
series.dataFields.categoryX = "country";
series.dataFields.valueY = "visits";
series.columns.template.tooltipText = "{valueY.value}";
series.columns.template.tooltipY = 0;
series.columns.template.strokeOpacity = 1;

// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function (fill, target) {
    return chart.colors.getIndex(target.dataItem.index);
});

series.columns.template.adapter.add("stroke", function (stroke, target) {
    return chart.colors.getIndex(target.dataItem.index);
});*/