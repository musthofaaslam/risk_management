<section class="hero" id="Home">
      <h1>Selamat Datang di Web Risk Management</h1>
      <p>Ini Output Dari Data Risk Management</p>
    </section>

    <!-- Main Content -->
    <div class="container mt-5">
      <!-- Baris pertama -->
      <div class="row mb-4">
        <div class="col-md-6 bg-light p-4 shadow-sm">
          <h4 class="text-center">Resiko dan Mitigasi</h4>
          <ul>
            <li><h6>Total Keseluruhan Resiko : <?=$data['total_resiko'];?></h6></li>
            <li><h6>Total Keseluruhan Mitigasi : <?=$data['total_mitigasi'];?></h6></li>
          </ul>
        </div>
        <div class="col-md-6 bg-light p-4 shadow-sm text-center">
          <h4>Aksi Cepat</h4>
          <a href="<?=BASEURL;?>/risk/buat" class="btn btn-primary">Tambah Risiko Baru</a>
          <a href="<?=BASEURL;?>/mitigasi/buat" class="btn btn-secondary">Tambah Mitigasi Baru</a>
        </div>
      </div>

    <div class="container mt-5">
      <!-- Baris kedua -->
      <div class="row mb-4">
        <div class="col-md-6">
          <h4>Risiko Berdasarkan Level</h4>
          <canvas id="barChart"></canvas>
        </div>
        <div class="col-md-6">
          <h4>Dampak Resiko</h4>
          <canvas id="impactChart"></canvas>
        </div>
      </div>
    <div class="container mt-5">
      <!-- Baris kedua -->
      <div class="row mb-4">
      <div class="col-md-6">
          <h4>Risiko Berdasarkan Pemilik</h4>
          <canvas id="doughnutChart"></canvas>
        </div>
        <div class="col-md-6">
          <h4>Risiko Berdasarkan Kategori</h4>
          <canvas id="pieChart"></canvas>
        </div>
      </div>
  </div></div>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?=BASEURL;?>/js/level.js"></script>
    <script src="<?=BASEURL;?>/js/impact.js"></script>
    <script src="<?=BASEURL;?>/js/category.js"></script>
    <script src="<?=BASEURL;?>/js/pemilik.js"></script>
