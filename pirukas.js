var ctx = document.getElementById("pirukas").getContext("2d");

options = {
    percentageInnerCutout: 30
};

$.getJSON('\\ajax\\pieData.php', function(data) {
    new Chart(ctx).Doughnut(data, options);
});
