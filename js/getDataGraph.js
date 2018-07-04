$(document).ready(function() {
    $.ajax({
        url: "http://localhost/cashflow/dataGraph.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Seb', 'Oct', 'Nov', 'Dec'];
            var totalPerMonth = [];

            for (var i in data) {
                totalPerMonth.push(data[i]);
            }
            console.log(totalPerMonth);

            var chartdata = {
                labels: months,
                datasets: [{
                    label: 'รายรับ',
                    data: totalPerMonth,
                    backgroundColor: 'rgba(255, 99, 132, 1)',
                    borderColor: 'rgba(200, 200, 200, 0.75)',
                    hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                    hoverBorderColor: 'rgba(200, 200, 200, 1)',

    
                }]
            };

            var ctx = $("#mycanvas");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    fontColor: 'white'
                                },
                                gridLines: {
                                    display: false,
                                    color: "#111"
                                },
                            }],
                            xAxes: [{
                                ticks: {
                                    fontColor: 'white'
                                },
                                gridLines: {
                                    display: false,
                                    color: "#111"
                                },
                            }]
                        },
                        legend: {
                            labels: {
                                // This more specific font property overrides the global property
                                fontColor: 'white'
                            }
                        }
                    }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});