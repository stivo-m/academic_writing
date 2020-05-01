<?php if (!$this->session->userdata["writer_data"]["writer_login_status"]) : ?>
    <?php
    $url = base_url("writers");
    redirect($url);
    ?>
<?php endif; ?>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">Invoices:</span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#profile" data-toggle="tab">
                                        <i class="material-icons">event_busy</i> Unpaid
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#messages" data-toggle="tab">
                                        <i class="material-icons">file_copy</i> Paid
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                            <?php if (empty($invoices)) : ?>
                                <p class="card-content">Nothing to show...</p>
                            <?php endif; ?>

                            <?php if (!empty($singleInvoice)) : ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                Invoice No.
                                            </th>

                                            <th>
                                                No. of Orders
                                            </th>

                                            <th>
                                                Payment Status
                                            </th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($singleInvoice as $invoice) : ?>
                                            <tr>
                                                <td>
                                                    #<?= $invoice["invoice_id"] ?>
                                                </td>

                                                <td>
                                                    <?= $invoice["orders"] ?> orders
                                                </td>

                                                <td>
                                                    <?= ucfirst($invoice["payment_status"]) ?>
                                                </td>
                                                <td class="td-actions text-right">

                                                    <a href="<?php echo base_url('writers/finances/' . $invoice["writer_id"]) ?>" type="button" rel="tooltip" title="View Invoice" class="btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">remove_red_eye</i>
                                                    </a>

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>

                        </div>
                        <div class="tab-pane" id="messages">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade hidden" id="viewInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="viewInvoiceModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>