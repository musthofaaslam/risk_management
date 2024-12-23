const baruData = {
    labels: chartData.inherit.map((_, index) => `Risk ${index + 1}`), // Label berdasarkan jumlah data
    datasets: [
        {
            label: 'Inherit Level',
            data: chartData.inherit, // Data level inherit
            backgroundColor: 'rgb(255, 99, 132)', // Warna bar inherit
        },
        {
            label: 'Residual Level',
            data: chartData.residual, // Data level residual
            backgroundColor: 'rgb(54, 162, 235)', // Warna bar residual
        },
        {
            label: 'Target Level',
            data: chartData.target, // Data level target
            backgroundColor: 'rgb(75, 192, 192)', // Warna bar target
        }
    ]
};

const ctxyz = document.getElementById('impactChart').getContext('2d');
const baruChart = new Chart(ctxyz, {
    type: 'bar',
    data: baruData,
    options: {
        responsive: true,
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Risks' // Label sumbu X
                }
            },
            y: {
                beginAtZero: true,
                max: 25, // Misalnya 25 untuk jumlah tingkat
                ticks: {
                    stepSize: 1,
                },
                title: {
                    display: true,
                    text: 'Risk Levels' // Label sumbu Y
                }
            }
        }
    }
});

