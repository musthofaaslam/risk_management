<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash();?>
    </div>
</div>
<a href="<?=BASEURL;?>/risk/buat">Tambah resiko</a>
<!-- <?php foreach( $data['identity'] as $identity) :?>
        <p><?=$identity['username'];?></p>
        <p><?=$identity['role'];?></p>
        <p><?=$identity['email'];?></p>
        <p><?=$identity['jabatan'];?></p>
<?php endforeach;?> -->
<h2>analisis</h2>
<?php foreach( $data['analisis'] as $analisis) :?>
        <p><?=$analisis['tujuan'];?></p>
        <p><?=$analisis['pemilik_resiko'];?></p>
        <p><?=$analisis['user_id'];?></p>
        <p><?=$analisis['pembuatan'];?></p>
        <a href="<?=BASEURL;?>/risk/detail/<?=$analisis['id']?>">Detail</a>
        <a href="<?=BASEURL;?>/risk/ubah/<?=$analisis['id']?>" class="tampilUbah">ubah</a>
        <a href="<?=BASEURL;?>/risk/hapus/<?=$analisis['id']?>" onclick="return confirm('yakin????');">Hapus</a>
<?php endforeach;?>
