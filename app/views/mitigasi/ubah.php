<link rel="stylesheet" href="<?=BASEURL;?>/css/form.css" />
<form action="<?=BASEURL;?>/mitigasi/updated" method="post">    
<input type="hidden" name="id" value="<?=$data['mitigasi'][0]['id'];?>">        
    <div class="form-group">
        <div class="row">
            <div class="col-md-12" >
            <label for="risk_event" class="form-label">Peristiwa</label>
            <input type="text" class="form-control" id="risk_event" name="risk_event" required autocomplete="off" value="<?=$data['mitigasi'][0]['risk_event'];?>">
            </div>
        </div>
    </div>
            <!-- section -->
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label for="rencana_mitigasi" class="form-label">Rencana Mitigasi</label>
                <textarea class="form-control" id="rencana_mitigasi" name="rencana_mitigasi" rows="3" required autocomplete="off"><?=$data['mitigasi'][0]['risk_event'];?></textarea>
            </div>
            <div class="col-md-6">
                <label for="evidence" class="form-label">Bukti</label>
                <textarea class="form-control" id="evidence" name="evidence" rows="3" required autocomplete="off"><?=$data['mitigasi'][0]['risk_event'];?></textarea>
            </div>
        </div>
    </div>


    <div class="form-group">
    <div class="row">
    <div class="col-md-12">
        <label for="pemilik_resiko">Pemilik resiko</label>
        <select class="form-select " id="pemilik_resiko" name="pemilik_resiko" aria-label="Default select example">
        <option value="satuan pengawas internal" selected>satuan pengawas internal</option>
        <option value="keuangan dan akuntasi">keuangan dan akuntasi</option>
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
    </div>
    </div>
    <div class="form-group">
  <div class="row">
    <div class="col-md-6">
      <label for="bulan">Pilih Bulan Pelaksanaan</label>
      <div id="bulan" class="checkbox-grid" >
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
    </div>
    
    <div class="col-md-6">
      <label for="eksekusi">Pilih Bulan Eksekusi</label>
      <div id="eksekusi" class="checkbox-grid">
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
    </div>
  </div>
</div>

    <div class="form-group mt-4">
    <div class="d-flex justify-content-end">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
