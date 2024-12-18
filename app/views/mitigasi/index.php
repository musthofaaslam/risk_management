<?php foreach( $data['mitigasi'] as $mitigasi) :?>
        <p><?=$mitigasi['risk_owner'];?></p>
        <p><?=$mitigasi['risk_event'];?></p>
        <a href="<?=BASEURL;?>/mitigasi/detail/<?=$mitigasi['id']?>">Detail</a>
        <a href="<?=BASEURL;?>/mitigasi/ubah/<?=$mitigasi['id']?>" class="tampilUbah">ubah</a>
        <a href="<?=BASEURL;?>/mitigasi/hapus/<?=$mitigasi['id']?>" onclick="return confirm('yakin????');">Hapus</a>    
  <?php endforeach;?>
  