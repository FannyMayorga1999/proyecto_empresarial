(function ($) {
    $.donut_chart = function (options) {
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

        var chart = am4core.create(setting.am4charts.position, am4charts.PieChart);


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

        chart.innerRadius = am4core.percent(50);

        var series = chart.series.push(new am4charts.PieSeries());
        series.dataFields.value = setting.am4charts.value;
        series.dataFields.category = setting.am4charts.category;

        series.slices.template.cornerRadius = 10;
        series.slices.template.innerCornerRadius = 7;
        series.alignLabels = false;
        series.labels.template.padding(0, 0, 0, 0);

        series.labels.template.bent = true;
        series.labels.template.radius = 4;

        series.slices.template.states.getKey("hover").properties.scale = 1.1;
        series.labels.template.states.create("hover").properties.fill = am4core.color("#fff");

        series.slices.template.events.on("over", function (event) {
            event.target.dataItem.label.isHover = true;
        })

        series.slices.template.events.on("out", function (event) {
            event.target.dataItem.label.isHover = false;
        })

        series.ticks.template.disabled = true;

        // this creates initial animation
        series.hiddenState.properties.opacity = 1;
        series.hiddenState.properties.endAngle = -90;
        series.hiddenState.properties.startAngle = -90;

        chart.legend = new am4charts.Legend();

    };
})(jQuery);

/*am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv4", am4charts.PieChart);


chart.data = [{
    "country": "Lithuania",
    "value": 401
}, {
    "country": "Estonia",
    "value": 300
}, {
    "country": "Ireland",
    "value": 200
}, {
    "country": "Germany",
    "value": 165
}, {
    "country": "Australia",
    "value": 139
}, {
    "country": "Austria",
    "value": 128
}];

chart.innerRadius = am4core.percent(50);

var series = chart.series.push(new am4charts.PieSeries());
series.dataFields.value = "value";
series.dataFields.category = "country";

series.slices.template.cornerRadius = 10;
series.slices.template.innerCornerRadius = 7;
series.alignLabels = false;
series.labels.template.padding(0,0,0,0);

series.labels.template.bent = true;
series.labels.template.radius = 4;

series.slices.template.states.getKey("hover").properties.scale = 1.1;
series.labels.template.states.create("hover").properties.fill = am4core.color("#fff");

series.slices.template.events.on("over", function (event) {
    event.target.dataItem.label.isHover = true;
})

series.slices.template.events.on("out", function (event) {
    event.target.dataItem.label.isHover = false;
})

series.ticks.template.disabled = true;

// this creates initial animation
series.hiddenState.properties.opacity = 1;
series.hiddenState.properties.endAngle = -90;
series.hiddenState.properties.startAngle = -90;

chart.legend = new am4charts.Legend();*/