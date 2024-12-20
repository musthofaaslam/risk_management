<section class="hero" id="Home">
      <h1>Selamat Datang di Web Risk Management</h1>
      <p>Ini Output Dari Data Risk Management</p>
    </section>

    <!-- Main Content -->
    <div class="container mt-5">
      <!-- Baris pertama -->
      <div class="row mb-4">
        <div class="col-md-6">
          <h4>Total Risiko Aktif</h4>
          <p><strong>50 Risiko</strong></p>
        </div>
        <div class="col-md-6">
          <h4>Risiko Berdasarkan Kategori</h4>
          <canvas id="barChart"></canvas>
        </div>
      </div>

      <!-- Baris kedua -->
      <div class="row mb-4">
        <div class="col-md-6">
          <h4>Risiko Berdasarkan Level</h4>
          <canvas id="levelChart"></canvas>
        </div>
        <div class="col-md-6">
          <h4>Risiko yang Memerlukan Tindakan Segera</h4>
          <p><strong>10 Risiko</strong></p>
        </div>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-md-6 bg-light p-4 shadow-sm">
        <h4>Risiko dengan Mitigasi</h4>
        <p>
          <strong>60%</strong> dari risiko memiliki mitigasi yang diterapkan.
        </p>
      </div>
      <div class="col-md-6 bg-light p-4 shadow-sm">
        <h4>Tren Risiko</h4>
        <canvas id="trendChart"></canvas>
      </div>
    </div>
<!-- Row 4 -->
    <div class="row mb-4">
      <div class="col-md-6 bg-light p-4 shadow-sm">
        <h4>Risiko Tertinggi</h4>
        <ul>
          <li>Keuangan Kritis - Dampak: >600 juta</li>
          <li>Kepegawaian - Dampak: 200 juta s/d 600 juta</li>
        </ul>
      </div>
      <div class="col-md-6 bg-light p-4 shadow-sm text-center">
        <h4>Aksi Cepat</h4>
        <a href="/risk/add" class="btn btn-primary">Tambah Risiko Baru</a>
        <a href="/mitigation/add" class="btn btn-secondary"
          >Tambah Mitigasi Baru</a
        >
      </div>
    </div>
  </div>
    <!-- Footer -->
    <footer>
      <p>&copy; 2024 Web Risk Management. All rights reserved.</p>
    </footer>

    <script>
      // placeholder data untuk chart
      const categoryData = {
        labels: ["Keuangan", "Operasional", "Teknologi"],
        datasets: [
          {
            data: [30, 50, 20],
            backgroundColor: ["#007bff", "#28a745", "#ffc107"],
          },
        ],
      };

      const levelData = {
        labels: ["Tinggi", "Sedang", "Rendah"],
        datasets: [
          {
            label: "Jumlah Risiko",
            data: [10, 25, 15],
            backgroundColor: ["#dc3545", "#ffc107", "#28a745"],
          },
        ],
      };
      
      const trendData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May"],
        datasets: [
          {
            label: "Jumlah Risiko",
            data: [40, 35, 30, 45, 50],
            borderColor: "#007bff",
            fill: false,
          },
        ],
      };

//untuk chart
      new Chart(document.getElementById("categoryChart"), {
        type: "pie",
        data: categoryData,
      });

      new Chart(document.getElementById("levelChart"), {
        type: "bar",
        data: levelData,
      });
      
      new Chart(document.getElementById("trendChart"), {
        type: "line",
        data: trendData,
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?=BASEURL;?>/js/level.js"></script>
