<?php if(!$this->session->userdata["writer_data"]["writer_login_status"]) : ?>
    <?php 
        $url = base_url("writers");
        redirect($url);
    ?>
<?php endif; ?>

<div class="container animated fadeIn">
    <div class="row">
        <div class="col s12 m4 l4">
            <div class="card">
                <div class="card-content">
                    <h5 class="card-heading center">
                        Writer Profile
                        <br>
                    </h5>
                    <div class="row">
                        <div class="col s12">
                            <img class="responsive-img circle" src="http://www.american.edu/uploads/profiles/large/chris_palmer_profile_11.jpg">
                        </div>

                        <div class="col s12">
                            <br>
                            <p class="card-text">
                                <b>Writer Id: </b>#<?=$writer["id"]?>
                            </p><br>
                            <p class="card-text">
                                <b>Name:</b> <?=$writer["name"]?>
                            </p><br>

                            <p class="card-text">
                                <b>Email:</b> <?=$writer["email"]?>
                            </p><br>

                            <p class="card-text">
                                <b>Number:</b> 0<?=$writer["number"]?>
                            </p><br>

                            <p class="card-text">
                                <b>Status:</b> <?php echo $writer["status"] == 1 ? "<span class='green-text'>Verified</span>" : "<span class='red-text'>Unverified | Probation</span>"?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col s12">
                            <button style="width: 100%" class="btn btn-medium blue white-text waves-effect">Edit Profile</button>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>


        <div class="col s12 m8 l8">
            <div class="card">
                <div class="card-content">
                    <h5 class="card-heading center">
                        Statistics
                        <br>
                    </h5>

                    <ul class="collection">
                        <li class="collection-item">Current Orders: <span class="right"><?php echo count($processing)?> Orders</span></li>
                        <li class="collection-item">Revision Orders: <span class="right"><?php echo count($revisions)?> Orders</span></li>
                        <li class="collection-item">Completed Orders: <span class="right"><?php echo count($completed)?> Orders</span></li>
                        <li class="collection-item">Disputed Orders: <span class="right"><?php echo count($disputes)?> Orders</span></li>
                        <li class="collection-item">Finished Orders: <span class="right"><?php echo count($finished)?> Orders</span></li>
                    </ul>

                    <h5 class="card-heading center">
                        Finances
                    </h5>

                    <ul class="collection">
                        <li class="collection-item">Current Orders Totals: 
                            <span class="right">Ksh. 
                                <?php 
                                    $total = 0;
                                    foreach($processing as $order){
                                        $total += $order["cost"];
                                    }

                                    echo number_format($total);
                                ?>
                            </span>
                        </li>
                        
                        <li class="collection-item">Pending Payments Totals: 
                            <span class="right">Ksh. 
                                <?php 
                                    $total = 0;
                                    foreach($completed as $order){
                                        $total += $order["cost"];
                                    }

                                    echo number_format($total);
                                ?>
                            </span>
                        </li>

                        <li class="collection-item">Revision Orders Totals: 
                            <span class="right">Ksh. 
                                <?php 
                                    $total = 0;
                                    foreach($revisions as $order){
                                        $total += $order["cost"];
                                    }

                                    echo number_format($total);
                                ?>
                            </span>
                        </li>

                        <li class="collection-item">Disputed Orders Totals: 
                            <span class="right">Ksh. 
                                <?php 
                                    $total = 0;
                                    foreach($disputes as $order){
                                        $total += $order["cost"];
                                    }

                                    echo number_format($total);
                                ?>
                            </span>
                        </li>

                        <li class="collection-item">Totals Made: 
                            <span class="right">Ksh. 
                                <?php 
                                    $total = 0;
                                    foreach($finished as $order){
                                        $total += $order["cost"];
                                    }

                                    echo number_format($total);
                                ?>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


