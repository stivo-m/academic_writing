<?php if(!$this->session->userdata["admin_data"]["admin_login_status"]) : ?>
    <?php 
        $url = base_url("admin");
        redirect($url);
    ?>
<?php endif; ?>
<?php $orderCount = 0; $invoiceId = array(); ?>


<div class="container row animated fadeIn">
    <div class="col s12">
        <div class="card row">
            <div class="card-content col s12">
                <h5 class="center card-heading">
                    Financial Overview
                </h5>

                <ul class="collection">
                    <li class="collection-item">
                        Available Orders Totals: 
                        <span class="right">
                            <?php
                                $count = 0;
                                foreach($available as $order){
                                    $count += $order['cost'];
                                }

                                echo "Ksh. " . number_format($count);
                            ?>
                        </span>
                    </li>
                    
                    <li class="collection-item">
                        Processing Orders Totals: 
                        <span class="right">
                            <?php
                                $count = 0;
                                foreach($processing as $order){
                                    $count += $order['cost'];
                                }

                                echo "Ksh. " . number_format($count);
                            ?>
                        </span>
                    </li>

                    <li class="collection-item">
                        Revision Orders Totals: 
                        <span class="right">
                            <?php
                                $count = 0;
                                foreach($revisions as $order){
                                    $count += $order['cost'];
                                }

                                echo "Ksh. " . number_format($count);
                            ?>
                        </span>
                    </li>

                    <li class="collection-item">
                        Completed Orders Totals: 
                        <span class="right">
                            <?php
                                $count = 0;
                                foreach($completed as $order){
                                    $count += $order['cost'];
                                }

                                echo "Ksh. " . number_format($count);
                            ?>
                        </span>
                    </li>


                    <li class="collection-item">
                        Finished Orders Totals: 
                        <span class="right">
                            <?php
                                $count = 0;
                                foreach($finished as $order){
                                    $count += $order['cost'];
                                }

                                echo "Ksh. " . number_format($count);
                            ?>
                        </span>
                    </li>

                    <li class="collection-item">
                        Disputed Orders Totals: 
                        <span class="right">
                            <?php
                                $count = 0;
                                foreach($disputed as $order){
                                    $count += $order['cost'];
                                }

                                echo "Ksh. " . number_format($count);
                            ?>
                        </span>
                    </li>

                </ul>
            </div>
        </div>

        <div class="card row">
            <div class="card-content col s12">
                <h5 class="card-heading center"> Pending Invoices</h5>

                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Created At</th>
                            <th>Orders</th>
                            <th>Amount</th>
                            <th>Pay Status</th>
                            <th>Pay Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($invoices as $invoice) : ?>
                        <?php array_push($invoiceId, $invoice["id"]);?>
                            <tr>
                                <td><?php echo $invoice["id"]?></td>
                                <td><?php echo $invoice["created_at"]?></td>
                                <td><?php echo $invoice["total_orders"]?></td>
                                <td><?php echo $invoice["totals"]?></td>
                                <td>
                                    <?php if($invoice["pay_status"] == 0) : ?>
                                        <span class="red-text">Not Paid</span>
                                    <?php endif; ?>

                                    <?php if($invoice["pay_status"] == 1) : ?>
                                        <span class="green-text">Paid</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $invoice["pay_date"]?></td>
                                <td><button class="btn btn-small green waves-effect modal-trigger" 
                                href="#viewInvoiceModal" id="btnViewInvoice">View Invoice</button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <h6 class="center card-heading">
                    Create Writer Invoices
                </h6>

                <div class="row">
                    <div class="col s12">
                    <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>FINISHED</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($writers as $writer) : ?>
                            <tr>
                                <td>
                                    <?php echo $writer["id"]?>
                                </td>


                                <td>
                                    <?php echo $writer["name"]?>
                                </td>

                                <td>
                                    <?php echo $writer["email"]?>
                                </td>

                                <td>
                                    <?php 
                                        foreach($finished as $order){
                                            if($order['writer_id'] == $writer["id"] && $order['invoiced'] == "0"){
                                                $orderCount++;
                                            }
                                        }

                                        echo $orderCount . " Orders";
                                    ?>
                                </td>

                                <td>
                                    <input type="hidden" id="writerId" value="<?php echo $writer['id']?>"/>
                                    <?php if($orderCount > 0) : ?>
                                        <a  href="<?php echo base_url("admin/invoices/" . $writer['id']) ?>" 
                                            class="btn btn-small green white-text">Create Invoice</a>
                                    <?php endif; ?>

                                    <?php if($orderCount == 0) : ?>
                                        <a disabled href="<?php echo base_url("admin/invoices/" . $writer['id']) ?>" 
                                            class="btn btn-small green white-text">Create Invoice</a>
                                    <?php endif; ?>
                                    
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Invoice Modal Structure -->
<div id="viewInvoiceModal" class="modal">
    <div class="modal-content">
        <h5>View Invoice</h5>
        <p class="center" id="writer_message"></p>
        <div class="row">
            <div class="col s12">
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Pages</th>
                            <th>Finish Date</th>
                            <th>Cost</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($invoiced as $order) : ?>
                            <tr>
                                <td><?php echo $order["id"]?></td>
                                <td><?php echo $order["title"]?></td>
                                <td><?php echo $order["pages"]?> Pages</td>
                                <td><?php echo $order["complete_date"]?></td>
                                <td><?php echo "Ksh. " . number_format($order["cost"])?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <div class="row">
          <div class="col s6">
            <p class="center">
                <?php
                    $count = 0;
                    foreach($invoiced as $order){
                        $count += $order['cost'];
                    }
                    echo "Totals Payable: Ksh. " . number_format($count);
                ?>
            </p>
          </div>

          <div class="col s6">
          <input type="hidden" id="writer_id" value="<?=$writer["id"]?>"/>
          <input type="hidden" id="invoiceId" value="<?php echo "22"//base64_encode(serialize($invoiceId))?>"/>
          <td><button class="btn btn-small green waves-effect"
             id="payInvoices">Pay Invoice</button>
          </div>
      </div>
    </div>
</div>