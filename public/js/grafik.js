// Mengecek apakah chartData sudah diterima dari PHP
console.log(chartData);  // Pastikan chartData ada

// Membuat bubble chart data
const bubbleData = {
    datasets: [
        {
            label: 'Inherit Risks',
            data: chartData.inherit,  // Data untuk inherit risk
            backgroundColor: 'rgb(255, 99, 132)', // Merah
        },
        {
            label: 'Residual Risks',
            data: chartData.residual,  // Data untuk residual risk
            backgroundColor: 'rgb(54, 162, 235)', // Biru
        },
        {
            label: 'Target Risks',
            data: chartData.target,  // Data untuk target risk
            backgroundColor: 'rgb(75, 192, 192)', // Hijau
        }
    ]
};

const likelihoodLabels = ['Sangat Rendah', 'Rendah', 'Sedang', 'Tinggi', 'Sangat Tinggi'];
const impactLabels = ['Sangat Rendah', 'Rendah', 'Sedang', 'Tinggi', 'Sangat Tinggi'];

// Fungsi untuk menentukan level berdasarkan likelihood dan impact
function determineRiskLevel(likelihood, impact) {
if (impact === 'Sangat Rendah' && likelihood === 'Sangat Rendah') return 'Sangat Rendah';
if (impact === 'Sangat Rendah' && likelihood === 'Rendah') return 'Sangat Rendah';
if (impact === 'Sangat Rendah' && likelihood === 'Sedang') return 'Sangat Rendah';
if (impact === 'Sangat Rendah' && likelihood === 'Tinggi') return 'Sangat Rendah';
if (impact === 'Sangat Rendah' && likelihood === 'Sangat Tinggi') return 'Sedang';

if (impact === 'Rendah' && likelihood === 'Sangat Rendah') return 'Sangat Rendah';
if (impact === 'Rendah' && likelihood === 'Rendah') return 'Sangat Rendah';
if (impact === 'Rendah' && likelihood === 'Sedang') return 'Rendah';
if (impact === 'Rendah' && likelihood === 'Tinggi') return 'Rendah';
if (impact === 'Rendah' && likelihood === 'Sangat Tinggi') return 'Sedang';

if (impact === 'Sedang' && likelihood === 'Sangat Rendah') return 'Sangat Rendah';
if (impact === 'Sedang' && likelihood === 'Rendah') return 'Rendah';
if (impact === 'Sedang' && likelihood === 'Sedang') return 'Rendah';
if (impact === 'Sedang' && likelihood === 'Tinggi') return 'Sedang';
if (impact === 'Sedang' && likelihood === 'Sangat Tinggi') return 'Sedang';

if (impact === 'Tinggi' && likelihood === 'Sangat Rendah') return 'Sangat Rendah';
if (impact === 'Tinggi' && likelihood === 'Rendah') return 'Rendah';
if (impact === 'Tinggi' && likelihood === 'Sedang') return 'Sedang';
if (impact === 'Tinggi' && likelihood === 'Tinggi') return 'Tinggi';
if (impact === 'Tinggi' && likelihood === 'Sangat Tinggi') return 'Tinggi';

if (impact === 'Sangat Tinggi' && likelihood === 'Sangat Rendah') return 'Sedang';
if (impact === 'Sangat Tinggi' && likelihood === 'Rendah') return 'Sedang';
if (impact === 'Sangat Tinggi' && likelihood === 'Sedang') return 'Sedang';
if (impact === 'Sangat Tinggi' && likelihood === 'Tinggi') return 'Tinggi';
if (impact === 'Sangat Tinggi' && likelihood === 'Sangat Tinggi') return 'Sangat Tinggi';

return 'Tidak Dikenal';
}
const ctx = document.getElementById('bubbleChart').getContext('2d');
const bubbleChart = new Chart(ctx, {
    type: 'bubble',
    data: bubbleData,
    options: {
        responsive: true,
        scales: {
            x: {
                min: 0, 
                max: 6, 
                title: {
                    display: true,
                    text: 'Likelihood'
                },
                ticks: {
                        callback: function(value) {
                    // Konversi angka ke label Likelihood
                    const likelihoodLabels = ['Sangat Rendah', 'Rendah', 'Sedang', 'Tinggi', 'Sangat Tinggi'];
                    return likelihoodLabels[value - 1]; // Index dimulai dari 0
                    }
                }
            },
            
            y: {
                min: 0, 
                max: 6, 
                title: {
                    display: true,
                    text: 'Impact'
                },
                ticks: {
                        callback: function(value) {
                      // Konversi angka ke label Impact
                      const impactLabels = ['Sangat Rendah', 'Rendah', 'Sedang', 'Tinggi', 'Sangat Tinggi'];
                      return impactLabels[value - 1]; // Index dimulai dari 0
                  }
                }
            }
        },
        plugins: {
              tooltip: {
                  callbacks: {
                      label: function(context) {
                          // const risk = risks[context.dataIndex];
                          // const likelihoodLabels = ['Sangat Rendah', 'Rendah', 'Sedang', 'Tinggi', 'Sangat Tinggi'];
                          // const impactLabels = ['Sangat Rendah', 'Rendah', 'Sedang', 'Tinggi', 'Sangat Tinggi'];

                          // return `${risk.label} (Likelihood: ${likelihoodLabels[risk.x - 1]}, Impact: ${impactLabels[risk.y - 1]})`;
                          const dataPoint = context.raw; // Ambil data titik saat ini
                const likelihoodLabels = ['Sangat Rendah', 'Rendah', 'Sedang', 'Tinggi', 'Sangat Tinggi'];
                const impactLabels = ['Sangat Rendah', 'Rendah', 'Sedang', 'Tinggi', 'Sangat Tinggi'];
                    
                // Buat label untuk tooltip
                const likelihood = likelihoodLabels[dataPoint.x - 1]; // Data x untuk Likelihood
                const impact = impactLabels[dataPoint.y - 1]; // Data y untuk Impact
                const level = determineRiskLevel(impact, likelihood);
                // Kembalikan informasi untuk tooltip
                return `${context.dataset.label}: (Likelihood: ${likelihood}, Impact: ${impact}, level: ${level})`;
                      }
                  }
              }
          }
    }
});