<?php if (!$this->session->userdata["admin_data"]["admin_login_status"]) : ?>
    <?php
    $url = base_url("admin");
    redirect($url);
    ?>
<?php endif; ?>

<div class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Order <?= $order["id"] ?></h4>
                        <p class="card-category">Order Status: <?php echo ucfirst($order["status"]) ?></p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <b>Title: </b> <?php echo $order['title'] ?>
                            </div>
                            <div class="col-md-6">
                                <b>Pages: </b> <?php echo $order['pages'] ?> pages
                            </div>

                            <div class="col-md-6">
                                <b>Sources: </b> <?php echo $order['sources'] ?> sources
                            </div>
                            <div class="col-md-6">
                                <b>Format: </b> <?php echo $order['format'] ?>
                            </div>

                            <div class="col-md-6">
                                <b>Level: </b> <?php echo $order['level'] ?>
                            </div>
                            <div class="col-md-6">
                                <b>Spacing: </b> <?php echo $order['spacing'] ?>
                            </div>

                            <div class="col-md-6">
                                <b>Deadline: </b>
                                <span class="deadline">
                                </span>
                            </div>
                            <div class="col-md-6">
                                <b>Cost: </b> Ksh. <?php echo $order['cost'] ?>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="card-title">
                                    <b>Order Instructions</b>
                                </h5>
                            </div>

                            <div class="col-md-12">
                                <br>
                                <p class="card-content">
                                    <?php echo $order['instructions'] ?>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p class="card-content">
                                    <b>Order Files</b>
                                </p>
                                <?php if (!empty($files)) : ?>
                                    <ul class="collection" style="max-height: 300px; overflow-y: scroll">
                                        <?php foreach ($files as $file) : ?>
                                            <li class="collection-item">
                                                <a href="<?php echo base_url() . 'writers/download/' . $file["filename"] ?>">
                                                    <?php echo $file["filename"] ?>
                                                </a>

                                                <small class="right"> Uploaded By:
                                                    <?php echo
                                                        $file["uploaded_by"] == "admin" ?
                                                            "<span class='green-text'>" . ucfirst($file["uploaded_by"]) . "</span>"
                                                            : "<span class='blue-text'>" . ucfirst($file["uploaded_by"]) . "</span>"
                                                    ?>
                                                </small>
                                                <br>
                                                <small class="green-text">
                                                    Uploaded On: <?php echo ucfirst($file["uploaded_on"]) ?>
                                                </small>

                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                                <?php if (empty($files)) : ?>
                                    <div class="blue white-text badge center" id="filesMsg" style="width: 100%">
                                        No Files for this Order
                                    </div>
                                <?php endif; ?>

                                <div class="blue white-text badge center" id="filesMsg" style="width: 100%"></div>
                            </div>

                            <div class="col-md-12 file-field input-field">
                                <div class="btn">

                                    <input type="file" id="file_input" name="files[]" multiple>
                                </div>

                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="hidden" placeholder="Upload one or more files">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Admin Actions</h4>
                        <p class="card-category">Assess and Edit the Work Below</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php if ($order["status"] == "available") : ?>
                                <div class="col s3">
                                    <button class="waves-effect btn btn-md purple white-text" id="editBtn">Edit</button>
                                </div>
                            <?php endif; ?>


                            <?php if ($order["status"] == "completed") : ?>
                                <div class="col s3">
                                    <button class="waves-effect btn btn-md purple white-text" id="revisionOrderBtn">Revision</button>
                                </div>
                            <?php endif; ?>

                            <?php if ($order["status"] == "processing" || $order["status"] == "revision" || $order["status"] == "completed") : ?>
                                <div class="col s3">
                                    <button class="waves-effect btn btn-md blue white-text" id="reasignOrderBtn">Reasign</button>
                                </div>
                            <?php endif; ?>

                            <div class="col s3">
                                <button class="waves-effect btn btn-md red white-text" id="deleteOrderBtn">Delete</button>
                            </div>

                            <?php if ($order["status"] == "completed") : ?>
                                <div class="col s3">
                                    <button class="waves-effect btn btn-md yellow black-text" id="disputeOrderBtn">Dispute</button>
                                </div>

                                <div class="col s3">
                                    <button class="waves-effect btn btn-md green white-text" id="finishOrderBtn">Finish</button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                <input type="hidden" id="oId" value="<?php echo $order['id'] ?>" />
                                <?php if ($order['status'] == "available") : ?>
                                    <label class="bmd-label-floating">Select Writer to Assign Order</label>
                                    <div class="form-group">
                                        <select class="form-control" id="selectedWriter">
                                            <option value="" id="format" name="format" disabled selected>Chose Writer to Assign Order</option>
                                            <?php foreach ($writers as $writer) : ?>
                                                <?php if ($writer["status"] != 0) : ?>
                                                    <option value="<?php echo $writer["id"] ?>">Writer <?php echo $writer["id"] ?>: <?php echo $writer["email"] ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>

                                        <button class="waves-effect btn btn-md blue white-text" id="assignOrderBtn">Assign</button>

                                        <hr>
                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- <script src="<?php echo base_url('assets/admin/js/plugins/jquery.countdown.js') ?>"></script>
    <script type="text/javascript">
        
    </script> -->