<form method="post" action="<?=BASEURL;?>/mitigasi/identifikasi">
        <div class="form-group">
              <label for="risk_event" class="form-label">Tujuan</label>
          <input type="text" class="form-control" id="risk_event" name="risk_event">
        </div>
        <div class="form-group">
              <label for="rencana_mitigasi" class="form-label">Tujuan</label>
          <input type="text" class="form-control" id="rencana_mitigasi" name="rencana_mitigasi">
        </div>
        <div class="form-group">
  <label><input type="checkbox" name="bulan[]" value="Januari"> Januari</label>
  <label><input type="checkbox" name="bulan[]" value="Februari"> Februari</label>
  <label><input type="checkbox" name="bulan[]" value="Maret"> Maret</label>
  <label><input type="checkbox" name="bulan[]" value="April"> April</label>
  <label><input type="checkbox" name="bulan[]" value="Mei"> Mei</label>
  <label><input type="checkbox" name="bulan[]" value="Juni"> Juni</label>
  <label><input type="checkbox" name="bulan[]" value="Juli"> Juli</label>
  <label><input type="checkbox" name="bulan[]" value="Agustus"> Agustus</label>
  <label><input type="checkbox" name="bulan[]" value="September"> September</label>
  <label><input type="checkbox" name="bulan[]" value="Oktober"> Oktober</label>
  <label><input type="checkbox" name="bulan[]" value="November"> November</label>
  <label><input type="checkbox" name="bulan[]" value="Desember"> Desember</label>
  </div>
  <div class="form-group">
  <label><input type="checkbox" name="eksekusi[]" value="Januari"> Januari</label>
  <label><input type="checkbox" name="eksekusi[]" value="Februari"> Februari</label>
  <label><input type="checkbox" name="eksekusi[]" value="Maret"> Maret</label>
  <label><input type="checkbox" name="eksekusi[]" value="April"> April</label>
  <label><input type="checkbox" name="eksekusi[]" value="Mei"> Mei</label>
  <label><input type="checkbox" name="eksekusi[]" value="Juni"> Juni</label>
  <label><input type="checkbox" name="eksekusi[]" value="Juli"> Juli</label>
  <label><input type="checkbox" name="eksekusi[]" value="Agustus"> Agustus</label>
  <label><input type="checkbox" name="eksekusi[]" value="September"> September</label>
  <label><input type="checkbox" name="eksekusi[]" value="Oktober"> Oktober</label>
  <label><input type="checkbox" name="eksekusi[]" value="November"> November</label>
  <label><input type="checkbox" name="eksekusi[]" value="Desember"> Desember</label>
  </div>

        <div class="form-group">
            <label for="evidence" class="form-label">Tujuan</label>
          <input type="text" class="form-control" id="evidence" name="evidence">
        </div>
        <div class="form-group">
            <label for="risk_owner" class="form-label">Tujuan</label>
          <input type="text" class="form-control" id="risk_owner" name="risk_owner">
        </div>
  <button type="submit">Kirim</button>
</form>
