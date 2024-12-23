<div class="container mt-5">
  <!-- mitigasi Risiko -->
  <div class="row mb-4">
    <div class="col-12">
      <h3 class="text-center mb-4">Detail Mitigasi Risiko</h3>
      <div class="card shadow p-4">
        <table class="table table-striped">
          <tbody>
            <?php foreach ($data['mitigasi'] as $mitigasi) : ?>
              <tr>
                <th>Peristiwa</th>
                <td><?= $mitigasi['risk_event']; ?></td>
              </tr>
              <tr>
                <th>Pemilik Resiko</th>
                <td><?= $mitigasi['pemilik_resiko']; ?></td>
              </tr>
              <tr>
                <th>Rencana Mitigasi</th>
                <td><?= $mitigasi['rencana_mitigasi']; ?></td>
              </tr>
              <tr>
                <th>Bulan Perencanaan</th>
                <td><?= $mitigasi['bulan']; ?></td>
              </tr>
              <tr>
                <th>Bulan Eksekusi</th>
                <td><?= $mitigasi['eksekusi']; ?></td>
              </tr>
              <tr>
                <th>Bukti</th>
                <td><?= $mitigasi['evidence']; ?></td>
              </tr>
              <tr>
                <th>Pembuatan</th>
                <td><?= $mitigasi['pembuatan']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

