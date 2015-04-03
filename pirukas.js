google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Erakond', 'Soovitatud'],
        ['Keskerakond',     11],
        ['Reformierakond',      2],
        ['Isamaa ja Respublica liit',  2],
        ['Vabaerakond', 2],
        ['Sotsiaaldemokraadid',    7],
        ['EKR', 1],
        ['Rohelised', 5]
    ]);

    var options = {
        pieHole: 0.4,
        chartArea:{left:40,top:0,width:'85%',height:'85%'},
        legend: 'none'
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
}