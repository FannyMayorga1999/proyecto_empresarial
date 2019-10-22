(function ($) {
	$.stacked_3D_column_chart = function (options) {
		var setting = {

			am4charts: {
				data: '',
				value_max: 0,
				category: '',
				value1: '',
				value2: '',
				value3: '',
				value4: '',
				title: '',
				title_fontSize: 0,
				title_marginBottom: 0,
				position: '',
			}

		}


		$.extend(setting, options);
		am4core.useTheme(am4themes_animated);

		var chart = am4core.create(setting.am4charts.position, am4charts.XYChart);


		chart.data = setting.am4charts.data;
		chart.padding(30, 30, 10, 30);
		chart.legend = new am4charts.Legend();

		chart.colors.step = 2;
		let title = chart.titles.create();
        title.text = setting.am4charts.title;
        title.fontSize = setting.am4charts.title_fontSize;
        title.marginBottom = setting.am4charts.title_marginBottom;


		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = setting.am4charts.category;
		categoryAxis.renderer.minGridDistance = 60;
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.interactionsEnabled = false;
		categoryAxis.renderer.labels.template.rotation = 90;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.tooltip.disabled = true;
		valueAxis.renderer.grid.template.strokeOpacity = 0.05;
		valueAxis.renderer.minGridDistance = 20;
		valueAxis.interactionsEnabled = false;
		valueAxis.min = 0;
		valueAxis.renderer.minWidth = 35;

		var series1 = chart.series.push(new am4charts.ColumnSeries());
		series1.columns.template.width = am4core.percent(80);
		series1.columns.template.tooltipText = "{name}: {valueY.value}";
		series1.name = setting.am4charts.value1;
		series1.dataFields.categoryX = setting.am4charts.category;
		series1.dataFields.valueY = setting.am4charts.value1;
		series1.stacked = true;

		var series2 = chart.series.push(new am4charts.ColumnSeries());
		series2.columns.template.width = am4core.percent(80);
		series2.columns.template.tooltipText = "{name}: {valueY.value}";
		series2.name = setting.am4charts.value2;
		series2.dataFields.categoryX = setting.am4charts.category;
		series2.dataFields.valueY = setting.am4charts.value2;
		series2.stacked = true;

		var series3 = chart.series.push(new am4charts.ColumnSeries());
		series3.columns.template.width = am4core.percent(80);
		series3.columns.template.tooltipText = "{name}: {valueY.value}";
		series3.name = setting.am4charts.value3;
		series3.dataFields.categoryX = setting.am4charts.category;
		series3.dataFields.valueY = setting.am4charts.value3;
		series3.stacked = true;

		var series4 = chart.series.push(new am4charts.ColumnSeries());
		series4.columns.template.width = am4core.percent(80);
		series4.columns.template.tooltipText = "{name}: {valueY.value}";
		series4.name = setting.am4charts.value4;
		series4.dataFields.categoryX = setting.am4charts.category;
		series4.dataFields.valueY = setting.am4charts.value4;
		series4.stacked = true;

		chart.scrollbarX = new am4core.Scrollbar();
	};
})(jQuery);


/*am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv9", am4charts.XYChart);


chart.data = [{
	"category": "One",
	"value1": 1,
	"value2": 5,
	"value3": 3,
	"value4": 3
}, {
	"category": "Two",
	"value1": 2,
	"value2": 5,
	"value3": 3,
	"value4": 4
}, {
	"category": "Three",
	"value1": 3,
	"value2": 5,
	"value3": 4,
	"value4": 4
}, {
	"category": "Four",
	"value1": 4,
	"value2": 5,
	"value3": 6,
	"value4": 4
}, {
	"category": "Five",
	"value1": 3,
	"value2": 5,
	"value3": 4,
	"value4": 4
}, {
	"category": "Six",
	"value1": 8,
	"value2": 7,
	"value3": 10,
	"value4": 4
}, {
	"category": "Seven",
	"value1": 10,
	"value2": 8,
	"value3": 6,
	"value4": 4
}]

chart.padding(30, 30, 10, 30);
chart.legend = new am4charts.Legend();

chart.colors.step = 2;

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.minGridDistance = 60;
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.interactionsEnabled = false;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.tooltip.disabled = true;
valueAxis.renderer.grid.template.strokeOpacity = 0.05;
valueAxis.renderer.minGridDistance = 20;
valueAxis.interactionsEnabled = false;
valueAxis.min = 0;
valueAxis.renderer.minWidth = 35;

var series1 = chart.series.push(new am4charts.ColumnSeries());
series1.columns.template.width = am4core.percent(80);
series1.columns.template.tooltipText = "{name}: {valueY.value}";
series1.name = "Series 1";
series1.dataFields.categoryX = "category";
series1.dataFields.valueY = "value1";
series1.stacked = true;

var series2 = chart.series.push(new am4charts.ColumnSeries());
series2.columns.template.width = am4core.percent(80);
series2.columns.template.tooltipText = "{name}: {valueY.value}";
series2.name = "Series 2";
series2.dataFields.categoryX = "category";
series2.dataFields.valueY = "value2";
series2.stacked = true;

var series3 = chart.series.push(new am4charts.ColumnSeries());
series3.columns.template.width = am4core.percent(80);
series3.columns.template.tooltipText = "{name}: {valueY.value}";
series3.name = "Series 3";
series3.dataFields.categoryX = "category";
series3.dataFields.valueY = "value3";
series3.stacked = true;

var series4 = chart.series.push(new am4charts.ColumnSeries());
series4.columns.template.width = am4core.percent(80);
series4.columns.template.tooltipText = "{name}: {valueY.value}";
series4.name = "Series 4";
series4.dataFields.categoryX = "category";
series4.dataFields.valueY = "value4";
series4.stacked = true;

chart.scrollbarX = new am4core.Scrollbar();*/