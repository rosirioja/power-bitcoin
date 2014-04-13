
<!-- Current Status -->
<div class="row-fluid row-status">
	<div class="current span12">
		<div class="letterS">
			<img id="letter" src="assets/images/bitcoin.png" alt="" width="100">
		</div>
		<!-- php codes -->
		<div class="status">
			<h4>System Current Status:</h4>
			<!-- corrent wattage -->
			<?php
				$sumpower = $data2;
				$sumPeso = $sumpower * 5.99;
				$sumDollar = $sumPeso / 44.63;
				$sumBtc = $sumDollar * 555.9;
			?>
			<h3 class="watt">Accumulating P<?php echo number_format((float)$sumPeso, 2, '.', ''); ?> / $<?php echo number_format((float)$sumDollar, 2, '.', ''); ?> / <?php echo number_format((float)$sumBtc, 2, '.', ''); ?>BTC</h3>
			<p>As of: <?php date_default_timezone_set('Asia/Manila'); echo date('l F d, Y'); ?> &nbsp; <?php echo date('h:i A'); ?></p>
		</div>
	</div>
</div>
<!-- end of Current Status -->

<!-- body -->
<div class="row-fluid whole">
	
	<div class="span1">

	</div>
	<div class="span10 span-box">
		<div class="box1">
			<div class="box1_bot">
				<div class="pad">
					<div class="pad1">
						<div class="sp-graph"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="span1">
	</div>

</div>
<!-- end of body -->

<!-- SHOULD BE ABLE TO LOAD GRAPHS! -->
<script type="text/javascript">
	$(document).ready(function(){
		$('.sp-graph').load("/btcgraph");
	});
</script>