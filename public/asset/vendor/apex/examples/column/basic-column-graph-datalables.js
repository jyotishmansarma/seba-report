
var date = <?php echo json_encode($date, JSON_NUMERIC_CHECK); ?>;
var user = <?php echo json_encode($user, JSON_NUMERIC_CHECK); ?>;
var options = {
	chart: {
		height: 350,
		type: 'bar',
	},
	plotOptions: {
		bar: {
			dataLabels: {
				position: 'top', // top, center, bottom
			},
		}
	},
	dataLabels: {
		enabled: true,
		formatter: function (val) {
			return val + "%";
		},
		offsetY: -20,
		style: {
			fontSize: '12px',
			colors: ["#304758"]
		}
	},
	series: [{
		name: 'Inflation',
		data: date
	}],
	xaxis: {
		categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		position: 'top',
		labels: {
			offsetY: -18,
		},
		axisBorder: {
			show: false
		},
		axisTicks: {
			show: false
		},
		crosshairs: {
			fill: {
				type: 'gradient',
				gradient: {
					colorFrom: '#D8E3F0',
					colorTo: '#BED1E6',
					stops: [0, 100],
					opacityFrom: 0.4,
					opacityTo: 0.5,
				}
			}
		},
		tooltip: {
			enabled: true,
			offsetY: -35,
		}
	},
	fill: {
		gradient: {
			shade: 'light',
			type: "horizontal",
			shadeIntensity: 0.25,
			gradientToColors: undefined,
			inverseColors: true,
			opacityFrom: 1,
			opacityTo: 1,
			stops: [50, 0, 100, 100]
		},
	},
	yaxis: {
		axisBorder: {
			show: false
		},
		axisTicks: {
			show: false,
		},
		labels: {
			show: false,
			formatter: function (val) {
				return val + "%";
			}
		}

	},
	title: {
		text: 'Monthly Inflation in Argentina, 2018',
		floating: true,
		offsetY: 320,
		align: 'center',
		style: {
			color: '#444'
		}
	},
	colors: ['#f8bb7a', '#f5936c', '#f26665', '#e53c51', '#a51225', '#670613'],
}
var chart = new ApexCharts(
	document.querySelector("#basic-column-graph-datalables"),
	options
);
chart.render();
