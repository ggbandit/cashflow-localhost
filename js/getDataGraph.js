$(document).ready(function() {
    $.ajax({
        url: "http://localhost/cashflow/dataGraph.php",
        method: "GET",
        success: function(data) {
            var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Seb', 'Oct', 'Nov', 'Dec'];
            var totalPerMonth = [];

            for (var i in data) {
                totalPerMonth.push(data[i]);
            }
            console.log(totalPerMonth);

            var incomeChartData = {
                label: 'รายรับ',
                data: totalPerMonth[0],
                backgroundColor: 'rgba(72, 189, 194, 1)',
                borderColor: 'rgba(72, 189, 194, 1)',
                hoverBackgroundColor: 'rgba(72, 189, 194, 1)',
                hoverBorderColor: 'rgba(72, 189, 194, 1)',
                yAxesID: "y-axis-income"
            };

            var moneyoutChartData = {
                label: 'รายจ่าย',
                data: totalPerMonth[1],
                backgroundColor: 'rgba(255, 99, 132, 1)',
                borderColor: 'rgba(255, 99, 132, 1)',
                hoverBackgroundColor: 'rgba(255, 99, 132, 1)',
                hoverBorderColor: 'rgba(255, 99, 132, 1)',
                yAxesID: "y-axis-moneyout"
            };

            var cashflow = {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Seb", "Oct", "Nov", "Dec"],
                datasets: [incomeChartData, moneyoutChartData]
            };
            var chartOptions = {
                scales: {
                    xAxes: [{
                        ticks: {
                            fontColor: 'white'
                        },
                        gridLines: {
                            display: false,
                            color: "#111"
                        },
                    }],
                    yAxes: 
                    [{
                        ticks: {
                            fontColor: 'white'
                        },
                        gridLines: {
                            display: false,
                            color: "#111"
                        },
                        id: "y-axis-income",
                        id: "y-axis-moneyout"
                   	}],
                    legend: {
                            labels: {
                                // This more specific font property overrides the global property
                                fontColor: '#ffffff'
                            }
                        }
                }

            };

            var ctx = $("#mycanvas");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: cashflow,
                options: chartOptions
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});