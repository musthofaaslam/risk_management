// Hitung frekuensi setiap kategori
const categoryCounts = categoryData.reduce((acc, category) => {
    acc[category] = (acc[category] || 0) + 1;
    return acc;
}, {});

// Persiapkan data untuk grafik pie
const labels = Object.keys(categoryCounts);
const dataValues = Object.values(categoryCounts);

// Menyediakan warna dinamis jika kategori lebih banyak dari warna yang tersedia
const backgroundColors = [
    'rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(75, 192, 192)', 
    'rgb(153, 102, 255)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)', 
    'rgb(231, 233, 237)', 'rgb(141, 198, 63)', 'rgb(238, 193, 140)', 
    'rgb(240, 100, 100)', 'rgb(30, 136, 229)', 'rgb(255, 87, 34)'
];

const pieData = {
    labels: labels, // Nama kategori
    datasets: [{
        data: dataValues, // Jumlah masing-masing kategori
        backgroundColor: backgroundColors.slice(0, labels.length), // Menyesuaikan jumlah warna dengan jumlah kategori
    }]
};

const cth = document.getElementById('pieChart').getContext('2d');
const pieChart = new Chart(cth, {
    type: 'pie',
    data: pieData,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            tooltip: {
                callbacks: {
                    label: function(tooltipItem) {
                        return `${tooltipItem.label}: ${tooltipItem.raw} occurrences`; // Menampilkan jumlah di tooltip
                    }
                }
            }
        }
    }
});