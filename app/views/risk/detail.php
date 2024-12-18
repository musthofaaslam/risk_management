<?php foreach( $data['analisis'] as $analisis) :?>
        <p><?=$analisis['tujuan'];?></p>
        <p><?=$analisis['proses_bisnis'];?></p>
        <p><?=$analisis['risk_category'];?></p>
        <p><?=$analisis['uraian_resiko'];?></p>
        <p><?=$analisis['kerugian_kualitatif'];?></p>
        <p><?=$analisis['inherit_level'];?></p>
        <p><?=$analisis['residual_level'];?></p>
<?php endforeach;?>
<div class="chart-container" style="position: relative; height:40vh; width:80vw">
        <canvas id="bubbleChart"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?=BASEURL;?>/js/grafik.js"></script>

<style>
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>
