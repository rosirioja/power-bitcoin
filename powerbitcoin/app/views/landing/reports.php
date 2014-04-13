<div class="row-fluid row-report">
	<div class="span8 offset2 well">
		<ul class="nav nav-tabs nav-justified ">
			<li><a class="li-sp">Bitcoin Rim</a></li>
			<li><a class="li-bb">Transactions</a></li>
		</ul>

		<div class="table-btc">
		<table class="table table-striped">
        <thead>
          <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Voltage</th>
            <th>Current</th>
            <th>Power</th>
            <th>Temperature</th>
          </tr>
        </thead>
        <tbody>
<?php
 
  foreach ($data1 as $row) {?>
          <tr>
            <td><?php echo $row->date; ?></td>
            <td><?php echo $row->time; ?></td>
            <td><?php echo $row->voltage; ?></td>
            <td><?php echo $row->current; ?></td>
            <td><?php echo $row->power; ?></td>
            <td><?php echo $row->temperature; ?></td>
          </tr>
  <?php }
?>
        </tbody>
      </table>
		</div>


		<div class="table-trans" style="display:hidden">
		<table class="table table-striped">
        <thead>
          <tr>
            <th>Date</th>
            <th>Bitcoin Address</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
<?php
  foreach ($data2 as $row) { ?>
          <tr>
            <td><?php echo $row->date; ?></td>
            <td><?php echo $row->bitcoinaddress; ?></td> 
            <td><?php echo $row->amount; ?></td>
          </tr>
    
<?php
  }
?>
        </tbody>
      </table>

		</div>
	</div>
	<div class="span2"></div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.table-btc').show();
		$('.table-trans').hide();

		$('.li-sp').click(function(){
			$('.table-btc').show();
			$('.table-trans').hide();
		});

		$('.li-bb').click(function(){
			$('.table-btc').hide();
			$('.table-trans').show();
		});
	});
</script>