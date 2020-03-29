<div class="container">
    <div class="row">
        <div class="col s12">
            <h5 class="card-text">
                Check Your Order before making the Payment
            </h5>
        </div>
    </div>

    <div class="row">
        <div class="card">
            <div class="card-content">
                <label for="" class="small">Topic</label>
                <p class="card-title"><?=$topic?></p>
                    <br>
                <div class="row">
                    <div class="col s3">
                        <label for="" class="small">SUBJECT</label>
                        <p class="card-text"><?=$topic?></p>
                    </div>

                    <div class="col s3">
                        <label for="" class="small">PAGES</label>
                        <p class="card-text"><?=$pages?> Pages / 825 Words</p>
                    </div>

                    <div class="col s3">
                        <label for="" class="small">DEADLINE</label>
                        <p class="card-text"><?=$date?> - <?=$time?></p>
                    </div>

                    <div class="col s3">
                        <label for="" class="small">Writer</label>
                        <p class="card-text">Prof. Shally</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <p class="card-title">
                        Order Summary
                    </p>

                    <div class="row">
                        <div class="col s8">
                            <h6>Total Price</h6>
                        </div>

                        <div class="col s4">
                            <h6 class="green-text">
                                $60.50
                            </h6>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 m12 l8">
                            <label for="" class="small">Pay for Your Order</label>
                        </div>

                        <div class="col s12 m12 l4">
                            <a href="<?php echo base_url("customer/processPayment/1")?>" 
                            class="btn btn-green white-text">
                            Pay Order
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>