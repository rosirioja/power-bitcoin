<div class="row-fluid row-payment">
  <div class="span8 offset2 well">

                <div class = "pull-right">
                  <?php
                    $wallet = 0; 
                    foreach ($data1 as $row) {
                      $wallet = $row->wallet;
                    }
                    $walletDollar = $wallet*555.9;
                    $walletPeso = $wallet*24809.817;
                   ?>
                   <span>
                   <h4><?php echo number_format((float)$wallet, 2, '.', ''); ?> BTC</h4>
                   <h5>$ <?php echo number_format((float)$walletDollar, 2, '.', ''); ?></h5>
                   <h5>P <?php echo number_format((float)$walletPeso, 2, '.', ''); ?></h5>
                   </span>
                </div>

    <h4>Pay your electric bill using your bitcoin<br/>
        <small>Kindly indicate your bitcoin address and the bitcoin amount you're going to pay.</small>
    </h4>

    <div class="form-horizontal">
        <div class="recipient-container">
            <div class="recipient">
                <div class="control-group bit-address">
                    <label class="control-label pop" title="To Address" data-content="This is the Bitcoin Address of the recipient.">Bitcoin Address:</label>

                    <div class="controls">
                       <input class="btc-address" placeholder="Bitcoin Address" name="send-to-address" type="text"/>
                    </div>
                </div>


                <div class="control-group bit-amount">
                    <label class="control-label pop" title="Amount" data-content="The Amount in Bitcoins to Send">Amount:</label>

                    <div class="controls">

                        <div class="input-prepend btc-input">
                            <span class="add-on">BTC</span><input class="btc-input span2" name="send-value" placeholder="0.0" type="text" style="width:90px;"/>
                        </div>

                        <b>=</b>

                        <div class="input-prepend dollar-input">
                            <span class="add-on">$</span><input class="dollar-input span2" placeholder="0.0" type="text" style="width:90px;"/>
                        </div>

                        <b>=</b>

                        <div class="input-prepend peso-input">
                            <span class="add-on peso">P</span><input class="peso-input span2" placeholder="0.0" type="text" style="width:90px;"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-actions">
            <button class="btn btn-info pull-right send-payment" title="Send Payment"><i class="icon-hand-right"></i> Send Payment</button>
        </div>
    </div>

  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){

    $('.btc-input').on('keyup', '.btc-input', function(){
  btcVal = $(this).val();
  dollarVal = btcVal * 555.9;
  pesoVal = btcVal * 24809.817;
  console.log(dollarVal);
  $(this).parent().next().next().find('.dollar-input').val(parseFloat(dollarVal).toFixed(4));
  $(this).parent().next().next().next().next().find('.peso-input').val(parseFloat(pesoVal).toFixed(4));
  
});

    $('.dollar-input').on('keyup', '.dollar-input', function(){
  dollarVal = $(this).val();
  pesoVal = dollarVal * 44.63;
  btcVal = dollarVal / 555.9;
  console.log(dollarVal);
  $(this).parent().prev().prev().find('.btc-input').val(parseFloat(btcVal).toFixed(4));
  $(this).parent().next().next().find('.peso-input').val(parseFloat(pesoVal).toFixed(4));
  
});

    $('.peso-input').on('keyup', '.peso-input', function(){
  pesoVal = $(this).val();
  dollarVal = pesoVal / 44.63;
  btcVal = pesoVal / 24809.817;
  console.log(dollarVal);
  $(this).parent().prev().prev().find('.dollar-input').val(parseFloat(dollarVal).toFixed(4));
  $(this).parent().prev().prev().prev().prev().find('.btc-input').val(parseFloat(btcVal).toFixed(4));
  
});

    $('.send-payment').click(function(){
      btcAddress = $(this).parent().prev().find('.bit-address').find('.controls').find('.btc-address').val();
      amount = $(this).parent().prev().find('.bit-amount').find('.controls').find('.peso-input').find('.peso-input').val();
      btcamount = $(this).parent().prev().find('.bit-amount').find('.controls').find('.btc-input').find('.btc-input').val();

      alert($(this).parent().prev().find('.bit-amount').find('.controls').find('.btc-input').find('.btc-input').val());

      x = confirm("Assess Payment? Note: Order Details can no longer be changed after assessment.");

       $.ajax({
        url : "save/payment",
        type : "POST",
        data : {
          btcAddress : btcAddress,
          amount: amount,
          btcamount: btcamount
        },
        success : function(){
            
            alert("Successly assessed the payment");

            setTimeout(function(){
              window.location.reload()

            },2000);
        }
      });

    });

  });
</script>