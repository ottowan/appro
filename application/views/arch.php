<div>
<?PHP 
if(isset($header))echo $header;
?>
</div>
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style>
  .container {
    max-width: 100%;
  }
</style>
<div style="overflow-x: scroll;">
<?php echo $output; ?>
</div>
