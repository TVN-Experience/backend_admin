$(document).ready(function() {
	google.charts.load('current', {packages: ['corechart', 'bar', 'timeline']});

	google.charts.setOnLoadCallback(showTimeAtApartmentTypeChart);
	google.charts.setOnLoadCallback(showTimeAtApartmentChart);
	google.charts.setOnLoadCallback(showPersonsAtApartmentTimeLine);
});

function showTimeAtApartmentTypeChart() {
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'Appartement type');
	data.addColumn('number', 'Minuten');

	data.addRows([
		["S", 11],
		["S+", 24],
		["M", 18],
		["L", 42],
		["XL", 5],
		["XXL", 36],
		["Compact", 7],
		["Special", 4],
		["Connect", 11],
		["Central", 2],
	]);

	var options = {
	hAxis: {
		title: 'Appartementtype',
	},
	vAxis: {
		title: 'Aantal minuten'
	},
	colors: ["red"]
	};

	var chart = new google.visualization.ColumnChart(
	document.getElementById('timeAtApartmentTypeChart'));

	chart.draw(data, options);
}

function showTimeAtApartmentChart() {
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'Appartement');
	data.addColumn('number', 'Minuten');

	data.addRows([
		["3", 34],
		["4", 284],
		["5", 351],
		["6", 5],
		["7", 51],
		["8", 366],
		["9", 4],
		["10", 1],
		["12", 0],
		["13", 468],
		["14", 31],
		["15", 898],
		["16", 46],
		["17", 78],
		["18", 78],
		["19", 768],
		["Special", 46],
	]);

	var options = {
	hAxis: {
		title: 'Appartement',
	},
	vAxis: {
		title: 'Aantal minuten'
	},
	colors: ["green"]
	};

	var chart = new google.visualization.ColumnChart(
	document.getElementById('timeAtApartmentChart'));

	chart.draw(data, options);
}

function showPersonsAtApartmentTimeLine() {
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'MAC-adres');
	data.addColumn('date', 'Starttijd');
	data.addColumn('date', 'Eindtijd');

	data.addRows([
		["04:D3:CF:EC:16:4C", new Date(0, 0, 0, 12, 11, 0), new Date(0, 0, 0, 12, 50, 0)],
		["0D:32:19:19:89:9B", new Date(0, 0, 0, 09, 00, 0), new Date(0, 0, 0, 09, 12, 0)],
		["2F:AB:BF:A2:DC:52", new Date(0, 0, 0, 14, 24, 0), new Date(0, 0, 0, 15, 48, 0)]
	]);

	var options = {
	vAxis: {
		title: 'Aantal minuten'
	},
	colors: ["blue"]
	};

	var chart = new google.visualization.Timeline(
	document.getElementById('personsAtApartmentTimeLine'));

	chart.draw(data, options);
}