// se realiza una funcion en jquery 

(function ($) {

	// se realiza una construtor para incializar las variables 
	$.amcharts3 = function (options) {
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

		//se instancia a la clase del graficos
		var chart = am4core.create(setting.am4charts.position, am4charts.XYChart);

		//se instancia a la clase de exportar 
		chart.exporting.menu = new am4core.ExportMenu();
		chart.exporting.menu.align = "rigth";
		chart.exporting.menu.verticalAlign = "top"
		chart.exporting.menu.items[0].icon = "https://static.thenounproject.com/png/36971-200.png";

		//se instancia a la clase de  los titulos 		
		let title = chart.titles.create();
		title.text = setting.am4charts.title;
		title.fontSize = setting.am4charts.title_fontSize;
		title.marginBottom = setting.am4charts.title_marginBottom;

		// lee la data 
		chart.data = setting.am4charts.data;

		chart.padding(40, 40, 40, 40);

		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.renderer.grid.template.location = 0;
		
		//es la clasificacion de los datos 
		categoryAxis.dataFields.category = setting.am4charts.category;
		categoryAxis.renderer.minGridDistance = 60;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

		var series = chart.series.push(new am4charts.ColumnSeries());
		series.dataFields.categoryX = setting.am4charts.category;
		
		// evalua los datos para su representacion 
		series.dataFields.valueY = setting.am4charts.value;
		series.tooltipText = "{valueY.value}"
		series.columns.template.strokeOpacity = 0;

		// instancia la clases de los legends 
		chart.cursor = new am4charts.XYCursor();

		// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
		series.columns.template.adapter.add("fill", function (fill, target) {
			return chart.colors.getIndex(target.dataItem.index);
		});


	};
})(jQuery);





/*am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv1", am4charts.XYChart);

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

chart.padding(40, 40, 40, 40);

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.minGridDistance = 60;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryX = "country";
series.dataFields.valueY = "visits";
series.tooltipText = "{valueY.value}"
series.columns.template.strokeOpacity = 0;

chart.cursor = new am4charts.XYCursor();

// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function (fill, target) {
	return chart.colors.getIndex(target.dataItem.index);
});*/
