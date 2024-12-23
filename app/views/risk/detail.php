<div class="container mt-5">
  <!-- Analisis Risiko -->
  <div class="row mb-4">
    <div class="col-12">
      <h3 class="text-center mb-4 ">Detail Analisis Risiko</h3>
      <div class="card shadow p-4">
        <table class="table table-striped">
          <tbody>
            <?php foreach ($data['analisis'] as $analisis) : ?>
              <tr>
                <th>Tujuan</th>
                <td><?= $analisis['tujuan']; ?></td>
              </tr>
              <tr>
                <th>Proses Bisnis</th>
                <td><?= $analisis['proses_bisnis']; ?></td>
              </tr>
              <tr>
                <th>Kategori Risiko</th>
                <td><?= $analisis['risk_category']; ?></td>
              </tr>
              <tr>
                <th>Uraian Risiko</th>
                <td><?= $analisis['uraian_resiko']; ?></td>
              </tr>
              <tr>
                <th>Penyebab Risiko</th>
                <td><?= $analisis['penyebab_resiko']; ?></td>
              </tr>
              <tr>
                <th>Sumber Risiko</th>
                <td><?= $analisis['sumber_resiko']; ?></td>
              </tr>
              <tr>
                <th>Kerugian Kualitatif</th>
                <td><?= $analisis['kerugian_kualitatif']; ?></td>
              </tr>
              <tr>
                <th>Unit Terkait</th>
                <td><?= $analisis['unit_terkait']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-12">
      <h3 class="text-center mb-4 ">Detail Analisis Risiko</h3>
      <div class="card shadow p-4">
        <table class="table table-striped">
          <tbody>
            <?php foreach ($data['analisis'] as $analisis) : ?>
              <tr>
                <th>Inherit Likelihood</th>
                <td><?= $analisis['inherit_likelihood']; ?></td>
              </tr>
              <tr>
                <th>Inherit Impact</th>
                <td><?= $analisis['inherit_likelihood']; ?></td>
              </tr>
              <tr>
                <th>Inherit Level</th>
                <td><?= $analisis['inherit_level']; ?></td>
              </tr>
              <tr>
                <th>Ada Pengendalian</th>
                <td><?php if($analisis['pengendalian_ada'] == 0){
                  echo "ada";
                }else{
                  echo "tidak ada";
                }; ?></td>
              </tr>
              <tr>
                <th>Pengendalian Memadai</th>
                <td><?php if($analisis['pengendalian_sudah'] == 0){
                  echo "sudah";
                }else{
                  echo "belum";
                }; ?></td>
              </tr>
              <tr>
                <th>Pengendalian Maksimal</th>
                <td><?php if($analisis['pengendalian_max'] == 0){
                  echo "sudah ";
                }else{
                  echo "belum ";
                }; ?></td>
              </tr>

            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Analisis Risiko -->
  <div class="row mb-4">
    <div class="col-12">
      <h3 class="text-center mb-4">Resiko Bawaan</h3>
      <div class="card shadow p-4">
        <table class="table table-striped">
          <tbody>
            <?php foreach ($data['analisis'] as $analisis) : ?>
              <tr>
                <th>Residual Likelihood</th>
                <td><?= $analisis['residual_likelihood']; ?></td>
              </tr>
              <tr>
                <th>Residual Impact</th>
                <td><?= $analisis['residual_likelihood']; ?></td>
              </tr>
              <tr>
                <th>Residual Level</th>
                <td><?= $analisis['residual_level']; ?></td>
              </tr>
              <tr>
                <th>Trait Risk</th>
                <td><?php if($analisis['trait_risk'] == 0){
                  echo "accept ";
                }else{
                  echo "reduce ";
                }; ?></td>
              </tr>
              <tr>
                <th>Trait Description</th>
                <td><?= $analisis['trait_desc']; ?></td>
              </tr>
              <tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-12">
        <h3  class="text-center mb-4 colo">Detail Analisis Risiko</h3>
        <div class="card shadow p-4">
          <table class="table table-striped">
            <tbody>
              <?php foreach ($data['analisis'] as $analisis) : ?>
                <th>Target Likelihood</th>
                <td><?= $analisis['target_level']; ?></td>
              </tr>
              <tr>
                <th>Target Impact</th>
                <td><?= $analisis['target_impact']; ?></td>
              </tr>
              <tr>
                <th>Target Level</th>
                <td><?= $analisis['target_level']; ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Grafik -->
  <div class="row">
    <div class="col-12">
      <h3 class="text-center mb-4">Visualisasi Risiko</h3>
      <div class="chart-container bg-light shadow-sm" style="width: 70%; margin: 0 auto; padding: 10px;">
        <canvas id="bubbleChart"></canvas>
      </div>
    </div>
  </div>
</div>

<!-- Tambahkan jarak bawah -->
<div style="height: 50px;"></div>

<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?= BASEURL; ?>/js/grafik.js"></script>

<!-- Custom Style -->
<style>
  .chart-container {
    max-width: 500px; /* Membatasi lebar maksimal */
    border: 1px solid #ddd; /* Tambahkan border tipis */
    border-radius: 8px; /* Membuat sudut kotak sedikit melengkung */
    padding: 10px; /* Mengurangi padding di dalam box */
    background-color: #f8f9fa; /* Warna latar belakang kotak */
    margin-bottom: 30px; /* Tambahkan jarak bawah */
  }
</style>
