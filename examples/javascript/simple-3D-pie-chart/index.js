(function ($) {
    $.simple_3D_pie_chart = function (options) {
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

        var chart = am4core.create(setting.am4charts.position, am4charts.PieChart3D);


        chart.legend = new am4charts.Legend();

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

        chart.innerRadius = am4core.percent(40);

        var series = chart.series.push(new am4charts.PieSeries3D());
        series.dataFields.value = setting.am4charts.value;
        series.dataFields.category = setting.am4charts.category;
    };
})(jQuery);

/*am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv6", am4charts.PieChart3D);


chart.legend = new am4charts.Legend();

chart.data = [{
    "country": "Lithuania",
    "litres": 501.9
}, {
    "country": "Czech Republic",
    "litres": 301.9
}, {
    "country": "Ireland",
    "litres": 201.1
}, {
    "country": "Germany",
    "litres": 165.8
}, {
    "country": "Australia",
    "litres": 139.9
}, {
    "country": "Austria",
    "litres": 128.3
}, {
    "country": "UK",
    "litres": 99
}, {
    "country": "Belgium",
    "litres": 60
}, {
    "country": "The Netherlands",
    "litres": 50
}];

chart.innerRadius = am4core.percent(40);

var series = chart.series.push(new am4charts.PieSeries3D());
series.dataFields.value = "litres";
series.dataFields.category = "country";*/