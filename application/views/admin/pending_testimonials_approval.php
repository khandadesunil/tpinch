<?php
	require_once 'header.php';
?>
	<div id="content" class="xfluid">
		<style>
			.myAltRowClass { background-color: #DDDDDC; background-image: none; }
		</style>
		<div style="margin:10px">
		<?php echo $out?>
		</div>
	</div>
<?php
	require_once 'footer.php';
?>
<script>$(document).ready(function() {$('#userstab').addClass(' mega-current');});	</script>