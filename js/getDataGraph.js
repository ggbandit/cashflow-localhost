$(document).ready(function() {
    $.ajax({
        url: "http://synerry.com/cash-flow/dataGraph.php",
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
                        gridLines: {
                            display: false,
                            color: "#ffffff"
                        },
                    }],
                    yAxes: 
                    [{
                        gridLines: {
                            display: false,
                            color: "#ffffff"
                        },
                        id: "y-axis-income",
                        id: "y-axis-moneyout"
                   	}],
                    legend: {
                            labels: {
                                // This more specific font property overrides the global property
                                fontColor: "#ffffff"
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