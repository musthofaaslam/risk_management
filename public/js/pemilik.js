const pemilikCounts = pemilikData.reduce((acc, pemilik) => {
    acc[pemilik] = (acc[pemilik] || 0) + 1;
    return acc;
}, {});

const pemilikLabels = Object.keys(pemilikCounts);
const pemilikDataValues = Object.values(pemilikCounts);

const pemilikChartData = {
    labels: pemilikLabels,
    datasets: [{
        data: pemilikDataValues,
        backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(75, 192, 192)', 'rgb(153, 102, 255)', 'rgb(255, 159, 64)']
    }]
};

const pemilikCtx = document.getElementById('doughnutChart').getContext('2d');
new Chart(pemilikCtx, {
    type: 'doughnut',
    data: pemilikChartData,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            tooltip: {
                callbacks: {
                    label: function(tooltipItem) {
                        return tooltipItem.label + ': ' + tooltipItem.raw + ' occurrences';
                    }
                }
            }
        }
    }
});