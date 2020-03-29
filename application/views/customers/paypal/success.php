

<div class="row center">
<div class="col s12 md3 l3"></div>
<div class="col s12 md6 l6">
    <div class="card cardHover" style="padding: 10px 5px;">
        <div class="card-header center" style="font-size: 30">
            <i class="material-icons">check</i>
        </div>

        <div class="card-header center">
            <h5 class="center card-title">Thank you! Your payment was successful.</h5>
        </div>

        <div class="card-body" style="padding: 5px;">
            <p class=" card-text" style="font-size: 14px;">
                <p>Item Name : <span><?php echo $item_name; ?></span></p>
                <p>Item Number : <span><?php echo $item_number; ?></span></p>
                <p>TXN ID : <span><?php echo $txn_id; ?></span></p>
                <p>Amount Paid : <span>$<?php echo $payment_amt.' '.$currency_code; ?></span></p>
                <p>Payment Status : <span><?php echo $status; ?></span></p>
                <p>Payment Date : <span><?php echo $pay_date; ?></span></p>
                <a href="<?php echo base_url('customer'); ?>">Back to your Account</a>
            </p>
        </div>
    </div>
</div>
<div class="col s12 md3 l3"></div>
</div>