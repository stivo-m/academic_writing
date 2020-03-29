<?php if(!$this->session->userdata["admin_data"]["admin_login_status"]) : ?>
    <?php 
        $url = base_url("admin");
        redirect($url);
    ?>
<?php endif; ?>


<?php $orderCount = 0; ?>

<div class="container animated fadeIn">
    <div class="card row">
        <div class="card-content">
        <div class="col s12 card-header">
            <h5 class="center">Create Invoice for <?=$writer["name"]?></h5>
            <br>
            <p class="center" id="writer_message"></p>
        </div>

        <div class="col s12">
            <table> 
                <thead>
                    <tr>
                        <th>Writer #</th>
                        <th>Writer Name</th>
                        <th>Total Orders</th>
                        <th>Total Amount</th>
                        <th>Generate Invoice</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            <input type="hidden" id="writer_id" value="<?=$writer["id"]?>"/>
                            <?=$writer["id"]?>
                        </td>

                        <td>
                            <?=$writer["name"]?>
                        </td>

                        <td id="total_orders">
                            <?php 
                                
                                foreach($finished as $order){
                                    if($order['writer_id'] == $writer["id"] && $order['invoiced'] == 0){
                                        $orderCount++;
                                    }
                                }

                                echo $orderCount . " Orders";
                            ?>
                        </td>

                        <td id="totals"> Ksh. 
                            <?php
                                $count = 0;
                                foreach($finished as $order){
                                    if($order["writer_id"] === $writer["id"] && $order['invoiced'] == 0){
                                        $count += $order['cost'];
                                    }
                                }

                                echo number_format($count);
                            ?>
                        </td>

                        <td>
                            <?php if($orderCount > 0) : ?>
                                <button class="waves-effect btn btn-md green white-text" id="generateInvoice">Generate Invoice</button>
                            <?php endif; ?>

                            <?php if($orderCount == 0) : ?>
                                <button class="waves-effect btn btn-md green white-text" disabled id="generateInvoice">Generate Invoice</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <?php if($orderCount > 0) : ?>
            <div class="col s12">
                <h5 class="center">Finished Orders</h5>
            </div>
            <div class="col s12">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TITLE</th>
                                <th>PAGES</th>
                                <th>COST</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($finished as $order) : ?>
                                <?php if($order["writer_id"] === $writer["id"]) : ?>
                                    <tr>
                                        <td>
                                            <?php echo $order["id"]?>
                                        </td>

                                        <td>
                                            <?php echo $order["title"]?>
                                        </td>

                                        <td>
                                            <?php echo $order["pages"]?>
                                        </td>

                                        <td>
                                            <?php echo $order["cost"]?>
                                        </td>

                                        <td>
                                        <button class="waves-effect btn btn-md red white-text" id="removeFromInvoice">Remove</button>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
        <?php endif; ?>
        </div>
    </div>
</div>