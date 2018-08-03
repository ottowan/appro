<div class="w3-bar w3-border w3-black">
  <div class="w3-bar-item"><a href="<?=base_url('ccase')?>" class="el el-home"></a></div>
  <?PHP
  foreach($menu as $bar){
    if(!empty($bar['link']))
        echo '<div class="w3-bar-item">>></div>';
    
    echo '<div class="w3-bar-item">';
    echo $bar['text'];
    echo '</div>';
  }
  ?>
</div>