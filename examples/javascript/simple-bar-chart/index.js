(function ($) {
	$.simple_bar_chart = function (options) {
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


		chart.legend = new am4charts.Legend();

		chart.data = setting.am4charts.data;

		chart.innerRadius = am4core.percent(40);

		var series = chart.series.push(new am4charts.PieSeries3D());
		series.dataFields.value = setting.am4charts.value;
		series.dataFields.category = setting.am4charts.category;
	};
})(jQuery);

/*am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv7", am4charts.XYChart);


chart.colors.saturation = 0.4;

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


var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.minGridDistance = 20;

var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.maxLabelPosition = 0.98;

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryY = "country";
series.dataFields.valueX = "visits";
series.tooltipText = "{valueX.value}";
series.sequencedInterpolation = true;
series.defaultState.transitionDuration = 1000;
series.sequencedInterpolationDelay = 100;
series.columns.template.strokeOpacity = 0;

chart.cursor = new am4charts.XYCursor();
chart.cursor.behavior = "panY";


// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function (fill, target) {
	return chart.colors.getIndex(target.dataItem.index);
});*/