

var options = {
	chart: {
		height: 350,
		type: 'bar',
	},
	plotOptions: {
		bar: {
			horizontal: false,
			endingShape: 'rounded',
			columnWidth: '35%',
		},
	},
	dataLabels: {
		enabled: false
	},
	stroke: {
		show: true,
		width: 2,
		colors: ['transparent']
	},
	series: [{
		name: 'Net Profit',
		data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
	}, {
		name: 'Revenue',
		data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
	}, {
		name: 'Free Cash Flow',
		data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
	}],
	xaxis: {
		categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
	},
	yaxis: {
		title: {
			text: '$ (thousands)'
		}
	},
	fill: {
		opacity: 1
	},
	tooltip: {
		y: {
			formatter: function(val) {
				return "$ " + val + " thousands"
			}
		}
	},
	grid: {
		row: {
			colors: ['#f4f5fb', '#ffffff'], // takes an array which will be repeated on columns
			opacity: 0.5
		},
	},
	colors: ['#f8bb7a', '#f5936c', '#f26665', '#e53c51', '#a51225', '#670613'],
}
var chart = new ApexCharts(
	document.querySelector("#basic-column-graph"),
	options
);
chart.render();
