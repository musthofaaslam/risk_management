<link rel="stylesheet" href="<?=BASEURL;?>/css/homeindex.css">
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h4>Total Risiko Aktif</h4>
      <p><strong></strong></p>
    </div>
    <div class="col-md-6">
      <h4>Risiko Berdasarkan Kategori</h4>
      <canvas id="categoryChart"></canvas> <!-- Pie chart untuk kategori risiko -->
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <h4>Risiko Berdasarkan Level</h4>
      <canvas id="levelChart"></canvas> <!-- Bar chart untuk level risiko -->
    </div>
    <div class="col-md-6">
      <h4>Risiko yang Memerlukan Tindakan Segera</h4>
      <p><strong>10 Risiko</strong></p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <h4>Risiko dengan Mitigasi</h4>
      <p><strong>60%</strong> dari risiko memiliki mitigasi yang diterapkan</p>
    </div>
    <div class="col-md-6">
      <h4>Tren Risiko</h4>
      <canvas id="trendChart"></canvas> <!-- Grafik tren risiko -->
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <h4>Risiko Tertinggi</h4>
      <ul>
        <li>Keuangan Kritis - Dampak: >600 juta</li>
        <li>Kepegawaian - Dampak: 200 juta s/d 600 juta</li>
        <!-- Daftar risiko tertinggi -->
      </ul>
    </div>
    <div class="col-md-6">
      <h4>Aksi Cepat</h4>
      <a href="/risk/add" class="btn btn-primary">Tambah Risiko Baru</a>
      <a href="/mitigation/add" class="btn btn-secondary">Tambah Mitigasi Baru</a>
    </div>
  </div>
</div>
