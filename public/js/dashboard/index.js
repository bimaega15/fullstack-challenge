// "use strict";
var baseurl = $('.baseurl').data('value');
var statusGrafik = $('.statusGrafik').data('value');
console.log(statusGrafik);
$(document).ready(function () {
    const createPieChart = (ctx, data) => {
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: Object.keys(data),
                datasets: [{
                    data: Object.values(data),
                    backgroundColor: ['#4caf50', '#ff9800', '#f44336', '#2196f3']
                }]
            }
        });
    };

    createPieChart(document.getElementById('pieChartBagus'), statusGrafik.bagus);
    createPieChart(document.getElementById('pieChartRusak'), statusGrafik.rusak);
    createPieChart(document.getElementById('pieChartPerluPerbaikan'), statusGrafik.perluPerbaikan);
    createPieChart(document.getElementById('pieChartDalamPerbaikan'), statusGrafik.dalamPerbaikan);
});
