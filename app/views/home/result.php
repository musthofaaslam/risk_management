<?php foreach($data['identity'] as $datauser) :?>
    <li><?= $datauser['username'];?></li>
    <li><?= $datauser['email'];?></li>
    <li><?= $datauser['jabatan'];?></li>
<?php endforeach; ?>
<h1>analisis</h1>
<?php foreach($data['analisis'] as $dataanalisis) :?>
    <li><?= $dataanalisis['tujuan'];?></li>
    <li><?= $dataanalisis['proses_bisnis'];?></li>
    <li><?= $dataanalisis['risk_category'];?></li>
    <li><?= $dataanalisis['uraian_resiko'];?></li>
    <li><?= $dataanalisis['penyebab_resiko'];?></li>
    <li><?= $dataanalisis['sumber_resiko'];?></li>
    <li><?= $dataanalisis['kerugian_kualitatif'];?></li>
    <li><?= $dataanalisis['kerugian_finansial'];?></li>
    <li><?= $dataanalisis['pemilik_resiko'];?></li>
    <li><?= $dataanalisis['unit_terkait'];?></li>
<?php endforeach; ?>
<h1>mitigasi</h1>
<?php foreach($data['mitigasi'] as $datamitigasi) :?>
    <li><?= $datamitigasi['inherit_likelihood'];?></li>
    <li><?= $datamitigasi['inherit_impact'];?></li>
    <li><?= $datamitigasi['inherit_level'];?></li>
    <li><?= $datamitigasi['pengendalian_ada'];?></li>
    <li><?= $datamitigasi['pengendalian_sudah'];?></li>
    <li><?= $datamitigasi['pengendalian_max'];?></li>
    <li><?= $datamitigasi['residual_likelihood'];?></li>
    <li><?= $datamitigasi['residual_impact'];?></li>
    <li><?= $datamitigasi['residual_level'];?></li>
    <li><?= $datamitigasi['trait_risk'];?></li>
    <li><?= $datamitigasi['trait_desc'];?></li>
    <li><?= $datamitigasi['target_likelihood'];?></li>
    <li><?= $datamitigasi['target_impact'];?></li>
    <li><?= $datamitigasi['target_level'];?></li>
<?php endforeach; ?>