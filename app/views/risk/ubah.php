<form action="<?=BASEURL;?>/risk/updated" method="post">
  <input type="hidden" name="id" value="<?=$data['analisis'][0]['id'];?>">
  <div class="form-group">
    <label for="tujuan" class="form-label">Tujuan</label>
      <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?=$data['analisis'][0]['tujuan'];?>" required autocomplete="off">
  </div>
  <div class="form-group">
    <label for="proses_bisnis">Proses bisnis</label>
    <select class="form-select " id="proses_bisnis" name="proses_bisnis" aria-label="Default select example">
      <option value="Keuangan" selected>Keuangan</option>
      <option value="Akademik">Akademik</option>
      <option value="Kepegawaian">kepegawaian</option>
    </select>
  </div>
  <!-- <div class="form-group">
    <label for="risk_category">Kategori resiko</label>
    <select class="form-select " id="risk_category" name="risk_category" aria-label="Default select example">
      <option value="Finansial" selected>Finansial</option>
      <option value="operasional">operasional</option>
      <option value="tujuan">Tujuan</option>
      <option value="reputasi">Reputasi</option>
      <option value="keluhan_pelanggan">Keluhan Pelanggan</option>
      <option value="kepegawaian">Kepegawaian</option>
      <option value="daring">Sistem Daring</option>
      <option value="peringatan">Peringatan</option>
      <option value="keselamatan">keselamatan</option>
    </select>
  </div> -->
  <div class="form-group">
    <label for="risk_category">Kategori resiko</label>
    <select class="form-select" id="risk_category" name="risk_category" aria-label="Default select example">
      <option value="Finansial" <?php echo ($data['analisis'][0]['risk_category'] == 'Finansial') ? 'selected' : ''; ?>>Finansial</option>
      <option value="operasional" <?php echo ($data['analisis'][0]['risk_category'] == 'operasional') ? 'selected' : ''; ?>>Operasional</option>
      <option value="tujuan" <?php echo ($data['analisis'][0]['risk_category'] == 'tujuan') ? 'selected' : ''; ?>>Tujuan</option>
      <option value="reputasi" <?php echo ($data['analisis'][0]['risk_category'] == 'reputasi') ? 'selected' : ''; ?>>Reputasi</option>
      <option value="keluhan_pelanggan" <?php echo ($data['analisis'][0]['risk_category'] == 'keluhan_pelanggan') ? 'selected' : ''; ?>>Keluhan Pelanggan</option>
      <option value="kepegawaian" <?php echo ($data['analisis'][0]['risk_category'] == 'kepegawaian') ? 'selected' : ''; ?>>Kepegawaian</option>
      <option value="daring" <?php echo ($data['analisis'][0]['risk_category'] == 'daring') ? 'selected' : ''; ?>>Sistem Daring</option>
      <option value="peringatan" <?php echo ($data['analisis'][0]['risk_category'] == 'peringatan') ? 'selected' : ''; ?>>Peringatan</option>
      <option value="keselamatan" <?php echo ($data['analisis'][0]['risk_category'] == 'keselamatan') ? 'selected' : ''; ?>>Keselamatan</option>
    </select>
</div>

  <div class="form-group">
    <label for="uraian_resiko" class="form-label" >Uraian resiko</label>
    <textarea class="form-control" id="uraian_resiko" name="uraian_resiko" rows="2" required autocomplete="off"><?=$data['analisis'][0]['tujuan'];?></textarea>
  </div>
  <div class="form-group">
    <label for="penyebab_resiko" class="form-label">Penyebab resiko</label>
    <textarea class="form-control" id="penyebab_resiko" name="penyebab_resiko" rows="2" required autocomplete="off"><?=$data['analisis'][0]['penyebab_resiko'];?></textarea>
  </div>
  <div class="form-group">
    <label for="sumber_resiko">Kategori resiko</label>
    <select class="form-select " id="sumber_resiko" name="sumber_resiko" aria-label="Default select example">
      <option value="Internal" selected>Internal</option>
      <option value="Eksternal">Eksternal</option>
    </select>
  </div>
  <div class="form-group">
    <label for="kerugian_kualitatif" class="form-label">Kerugian kualitatif</label>
    <textarea class="form-control" id="kerugian_kualitatif" name="kerugian_kualitatif" rows="2" required autocomplete="off"><?=$data['analisis'][0]['penyebab_resiko'];?></textarea>
  </div>
  <div class="form-group">
    <label for="kerugian_finansial">Kerugian kerugian_finansial</label>
    <select class="form-select " id="kerugian_finansial" name="kerugian_finansial" aria-label="Default select example">
      <option value="Tidak ada" >Tidak ada</option>
      <option value="<=10 juta"><=10 juta</option>
      <option value="10 juta s/d 50 juta">10 juta s/d 50 juta</option>
      <option value="50 juta s/d 200 juta">50 juta s/d 200 juta</option>
      <option value="200 juta s/d 600 juta">200 juta s/d 400 juta</option>
      <option value=">600 juta">>600 juta</option>
    </select>
  </div>
  <!-- <div class="form-group">
    <label for="pemilik_resiko" >Pemilik resiko</label>
    <input type="text" class="form-control" id="pemilik_resiko" name="pemilik_resiko" value="<?=$data['analisis'][0]['pemilik_resiko'];?>">
  </div> -->
  <div class="col-md-6">
    <label for="pemilik_resiko">Pemilik resiko</label>
    <select class="form-select " id="pemilik_resiko" name="pemilik_resiko" aria-label="Default select example">
      <option value="satuan pengawas internal" selected>satuan pengawas internal</option>
      <option value="keuangan dan akuntasi" selected>keuangan dan akuntasi</option>
      <option value="organisasi, kepegawaian, dan hukum">organisasi, kepegawaian, dan hukum</option>
      <option value="rumah tangga">rumah tangga</option>
      <option value="tata usaha">tata usaha</option>
      <option value="akademik">akademik</option>
      <option value="kemahasiswaan">kemahasiswaan</option>
      <option value="kerjasama dan kelembagaan">kerjasama dan kelembagaan</option>
      <option value="lembaga penelitian dan pengabdian masyarakat">lembaga penelitian dan pengabdian masyarakat</option>
      <option value="pusat teknologi dan informasi">pusat teknologi dan informasi</option>
      <option value="pengembangan bahasa">pengembangan bahasa</option>
    </select>
  </div>
  <div class="form-group">
    <label for="unit_terkait" value="<?=$data['analisis'][0]['unit_terkait'];?>">Unit terkait</label>
    <input type="text" class="form-control" id="unit_terkait" name="unit_terkait" value="<?=$data['analisis'][0]['unit_terkait'];?>" required autocomplete="off">
  </div>
  <div class="form-group">
    <label for="inherit_likelihood">kemungkinan terjadi sebelum mitigasi</label>
    <select class="form-select " id="inherit_likelihood" name="inherit_likelihood" aria-label="Default select example">
      <option value="1" selected>Maksimum 1 kali dalam sebulan</option>
      <option value="2">Maksimum 5 kali dalam sebulan</option>
      <option value="3">Maksimum 10 kali dalam sebulan</option>
      <option value="4">Maksimum 15 kali dalam sebulan</option>
      <option value="5">Lebih dari 20 kali dalam sebulan</option>
    </select>
  </div>
  <div class="form-group">
    <label for="inherit_impact">Dampak resiko sebelum mitigasi</label>
    <select class="form-select " id="inherit_impact" name="inherit_impact" aria-label="Default select example">
      <option value="1" selected><=10 juta</option>
      <option value="2">10 juta s/d 50 juta</option>
      <option value="3">50 juta s/d 200 juta</option>
      <option value="4">200 juta s/d 600 juta</option>
      <option value="5">>600 juta</option>
    </select>
  </div>

  <!-- <div class="form-group">
    <label for="inherit_level">level resiko sebelum mitigasi</label>
    <input type="number" id="inherit_level" name="inherit_level" min="1" max="25" required>
  </div> -->
  <div class="form-group">
    <label for="pengendalian_ada">Apakah ada pengendalian</label>
    <select class="form-select " id="pengendalian_ada" name="pengendalian_ada" aria-label="Default select example">
      <option value="Ada" selected>Ada</option>
      <option value="Tidak">Tidak</option>
    </select>
  </div>
  <div class="form-group">
    <label for="pengendalian_sudah">Apakah sudah memadai</label>
    <select class="form-select " id="pengendalian_sudah" name="pengendalian_sudah" aria-label="Default select example">
      <option value="Memadai" selected>Memadai</option>
      <option value="Belum">Belum memadai</option>
    </select>
  </div>
  <div class="form-group">
    <label for="pengendalian_max">Apakah sudah maksimal</label>
    <select class="form-select " id="pengendalian_max" name="pengendalian_max" aria-label="Default select example">
      <option value="Dijalankan 100%" selected>Dijalankan 100%</option>
      <option value="Belum 100%">Belum dijalankan 100%</option>
    </select>
  </div>
  <div class="form-group">
    <label for="residual_likelihood">kemungkinan terjadi setelah mitigasi</label>
    <select class="form-select " id="residual_likelihood" name="residual_likelihood" aria-label="Default select example">
      <option value="1" selected>Maksimum 1 kali dalam sebulan</option>
      <option value="2">Maksimum 5 kali dalam sebulan</option>
      <option value="3">Maksimum 10 kali dalam sebulan</option>
      <option value="4">Maksimum 15 kali dalam sebulan</option>
      <option value="5">Lebih dari 20 kali dalam sebulan</option>
    </select>
  </div>
  <div class="form-group">
    <label for="residual_impact">Dampak resiko setelah mitigasi</label>
    <select class="form-select " id="residual_impact" name="residual_impact" aria-label="Default select example">
      <option value="1" selected><=10 juta</option>
      <option value="2">10 juta s/d 50 juta</option>
      <option value="3">50 juta s/d 200 juta</option>
      <option value="4">200 juta s/d 600 juta</option>
      <option value="5">>600 juta</option>
    </select>
  </div>
  <!-- <div class="form-group">
    <label for="residual_level">level resiko setelah mitigasi</label>
    <input type="number" id="residual_level" name="residual_level" min="1" max="25" required>
  </div> -->
  <div class="form-group">
    <label for="trait_risk">Opsi perlakuan resiko</label>
    <select class="form-select " id="trait_risk" name="trait_risk" aria-label="Default select example">
      <option value="Accept" selected>Accept</option>
      <option value="Reduce">Reduce</option>
    </select>
  </div>
  <div class="form-group">
    <label for="trait_desc">deskripsi tindakan mitigasi</label>
    <textarea class="form-control" id="trait_desc" name="trait_desc" rows="2" required autocomplete="off"><?=$data['analisis'][0]['trait_desc'];?></textarea>
  </div>
  <div class="form-group">
    <label for="target_likelihood">kemungkinan terjadi setelah mitigasi lanjutan</label>
    <select class="form-select " id="target_likelihood" name="target_likelihood" aria-label="Default select example">
      <option value="1" selected>Maksimum 1 kali dalam sebulan</option>
      <option value="2">Maksimum 5 kali dalam sebulan</option>
      <option value="3">Maksimum 10 kali dalam sebulan</option>
      <option value="4">Maksimum 15 kali dalam sebulan</option>
      <option value="5">Lebih dari 20 kali dalam sebulan</option>
    </select>
  </div>
  <div class="form-group">
    <label for="target_impact">Dampak resiko setelah mitigasi lanjutan</label>
    <select class="form-select " id="target_impact" name="target_impact" aria-label="Default select example">
      <option value="1" selected><=10 juta</option>
      <option value="2">10 juta s/d 50 juta</option>
      <option value="3">50 juta s/d 200 juta</option>
      <option value="4">200 juta s/d 600 juta</option>
      <option value="5">>600 juta</option>
    </select>
  </div>
  <!-- <div class="form-group">
    <label for="target_level">level resiko setelah mitigasi lanjutan</label>
    <input type="number" id="target_level" name="target_level" min="1" max="25" required>
  </div> -->
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </form>
</div>


