<?php if (!$this->session->userdata["admin_data"]["admin_login_status"]) : ?>
    <?php
    $url = base_url("admin");
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
                            <span class="nav-tabs-title">Orders in the Invoice</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                            <?php if (empty($invoices)) : ?>
                                <p class="card-content">Nothing to show...</p>
                            <?php endif; ?>

                            <?php if (!empty($invoices)) : ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                Order Number
                                            </th>
                                            <th>
                                                Invoice No.
                                            </th>

                                            <th>
                                                Title
                                            </th>

                                            <th>Pages</th>
                                            <th>Price</th>

                                            <th>Pay Status</th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($invoices as $invoice) : ?>
                                            <tr>
                                                <td>
                                                    #<?= $invoice["id"] ?>
                                                </td>
                                                <td>
                                                    #<?= $invoice["invoice_id"] ?>
                                                </td>
                                                <td>
                                                    <?= $invoice["title"] ?>
                                                </td>
                                                <td>
                                                    <?= $invoice["pages"] ?> Pages
                                                </td>

                                                <td>
                                                    Ksh. <?= number_format($invoice["cost"]) ?>
                                                </td>

                                                <td>
                                                    <?php echo ucfirst($invoice["payment_status"]) ?>
                                                </td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Order" class="btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </button>

                                                    <button type="button" rel="tooltip" title="Delete Order" class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                    <tbody>
                                        <tr>
                                            <td colspan="5">
                                                <?php $orderTotals = 0; ?>
                                                <?php foreach ($invoices as $invoice) : ?>
                                                    <?php
                                                    $orderTotals += $invoice["cost"];
                                                    ?>
                                                <?php endforeach; ?>

                                                <h3 class="text-default bold float-right pull-right">
                                                    Totals to Pay: <b>Ksh. <?= number_format($orderTotals); ?></b>
                                                </h3>
                                            </td>

                                            <td colspan="2">
                                                <button class="btn btn-info">Mark as Paid</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php endif; ?>

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