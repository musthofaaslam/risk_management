const barData = {
    labels: chartData.map((_, index) => `Risk ${index + 1}`), // Label berdasarkan jumlah data
    datasets: [
        {
            label: 'Inherit Level',
            data: chartData, // Data level langsung dari PHP
            backgroundColor: 'rgb(255, 99, 132)', // Warna bar
        }
    ]
};

const levelCategories = ['Sangat Rendah', 'Rendah', 'Sedang', 'Tinggi', 'Sangat Tinggi'];

const ctx = document.getElementById('barChart').getContext('2d');
const barChart = new Chart(ctx, {
    type: 'bar',
    data: barData,
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
                max: levelCategories.length + 1,
                ticks: {
                    stepSize: 1,
                    callback: function(value) {
                        return levelCategories[value - 1] || ''; // Konversi angka ke kategori
                    }
                },
                title: {
                    display: true,
                    text: 'Risk Levels' // Label sumbu Y
                }
            }
        },
        plugins: {
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const level = levelCategories[context.raw - 1] || 'Tidak Diketahui';
                        return `Inherit Level: ${level}`;
                    }
                }
            }
        }
    }
});
