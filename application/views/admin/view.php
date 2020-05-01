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
                        <p class="card-category">
                            Order Status:
                            <span class=" 
                                <?php if ($order["status"] == "completed") {
                                    echo "text-default";
                                } else if ($order["status"] == "available" || $order["status"] == "finished" || $order["status"] == "processing") {
                                    echo "text-warning";
                                } else {
                                    echo "text-danger";
                                }

                                ?>">
                                <?php echo ucfirst($order["status"]) ?>
                            </span>

                        </p>
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

                                <span id="cntdwn" class="text-danger"> </span>
                            </div>
                            <div class="col-md-6">
                                <b>Cost: </b> Ksh. <?php echo $order['cost'] ?>
                            </div>
                        </div>

                        <hr>
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
                                <hr>
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
                                    <button class="btn btn-info purple white-text" id="editBtn" data-toggle="modal" data-target="#editOrderModal">Edit</button>
                                </div>
                            <?php endif; ?>


                            <?php if ($order["status"] == "completed") : ?>
                                <div class="col s3">
                                    <button class="btn btn-warning purple white-text" id="revisionOrderBtn">Revision</button>
                                </div>
                            <?php endif; ?>

                            <?php if ($order["status"] == "processing" || $order["status"] == "revision" || $order["status"] == "completed") : ?>
                                <div class="col s3">
                                    <button class="btn btn-warning white-text" id="reasignOrderBtn">Reasign</button>
                                </div>
                            <?php endif; ?>

                            <div class="col s3">
                                <button class="waves-effect btn btn-danger red white-text" id="deleteOrderBtn">Delete</button>
                            </div>

                            <?php if ($order["status"] == "completed") : ?>
                                <div class="col s3">
                                    <button class="waves-effect btn btn-danger yellow black-text" id="disputeOrderBtn">Dispute</button>
                                </div>

                                <div class="col s3">
                                    <button class="waves-effect btn btn-success green white-text" id="finishOrderBtn">Finish</button>
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
                                            <option value="" id="selectedWriter" name="selectedWriter" disabled selected>Chose Writer to Assign Order</option>
                                            <?php foreach ($writers as $writer) : ?>
                                                <?php if ($writer["status"] != 0) : ?>
                                                    <option value="<?php echo $writer["id"] ?>">Writer <?php echo $writer["id"] ?>: <?php echo $writer["email"] ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>

                                        <button class="btn btn-success blue white-text" id="assignOrderBtn">Assign</button>

                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="editOrderModal" tabindex="-1" role="dialog" aria-labelledby="editOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOrderModalLabel">
                        Edit Order <?= $order["id"] ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input id="title" type="text" name="title" class="validate form-control" value="<?= $order["title"] ?>">
                                    <label class="bmd-label-floating" for="title">Order Title</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input id="pages" type="number" name="pages" class="validate form-control" value="<?= $order["pages"] ?>">
                                    <label class="bmd-label-floating" for="pages">Order Pages</label>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input id="price" type="number" name="price" class="validate form-control" value="<?= $order["cost"] ?>">
                                    <label class="bmd-label-floating" for="price">Order Cost</label>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <label class="bmd-label-floating">Order Spacing</label>
                                <div class="form-group">
                                    <select class="form-control" id="spacing">
                                        <option value="0" id="orderSpacing" name="orderSpacing" disabled selected>
                                            <?= $order["spacing"] ?>
                                        </option>

                                        <option value="1">Single (550 Words / Page)</option>
                                        <option value="2">Double (275 Words / Page)</option>
                                        <option value="3">Double (300 Words / Page)</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label class="bmd-label-floating">Order Formating</label>
                                <div class="form-group">

                                    <select class="form-control" id="format">
                                        <option value="0" id="format" name="format" disabled selected><?= $order["format"] ?></option>

                                        <option value="1">APA</option>
                                        <option value="2">MLA</option>
                                        <option value="3">Havard</option>
                                        <option value="4">Chicago / Turabian</option>
                                        <option value="5">Other</option>
                                    </select>

                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <label class="bmd-label-floating">Order Sources</label>
                                <div class="form-group">
                                    <select class="form-control" id="sources">
                                        <option value="0" id="orderSources" name="orderSources" disabled selected>
                                            <?= $order["sources"] ?> Sources
                                        </option>

                                        <?php for ($i = 1; $i < 20; $i++) : ?>
                                            <option value="<?= $i; ?>"><?= $i ?> Sources</option>
                                        <?php endfor; ?>
                                    </select>

                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label class="bmd-label-floating">Order Level</label>
                                <div class="form-group">

                                    <select class="form-control" id="level">
                                        <option value="0" id="orderLevel" name="orderLevel" disabled selected><?= $order["level"] ?></option>

                                        <option value="1">High School</option>
                                        <option value="2">College</option>
                                        <option value="3">University</option>
                                        <option value="3">Masters</option>
                                        <option value="3">P.hD</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m6 l6">
                                <div class="form-group">
                                    <input id="date_deadline" type="date" name="date_deadline" value="<?= $order["date_deadline"] ?>" class="datepicker validate form-control">
                                    <label class="bmd-label-floating" for="date_deadline">Order Date</label>
                                </div>
                            </div>

                            <div class="col s12 m6 l6">
                                <div class="form-group">
                                    <input id="time_date" type="time" name="time_date" value="<?= $order["time_deadline"] ?>" class="timepicker validate form-control">
                                    <label class="bmd-label-floating" for="time_date">Order Time</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m6 l6">
                                <div class="form-group">
                                    <textarea name="instructions" class="form-control" id="instructions" style="height: 200px !important; overflow-y: scroll;">
                                        <?= $order["instructions"] ?>
                                    </textarea>
                                    <label class="bmd-label-floating" for="orderInstructions">Order Instructions</label>

                                </div>
                            </div>

                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn_update_order">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


        <script language="JavaScript">
            TargetDate = "<?php echo $order['date_deadline'] ?> <?php echo $order['time_deadline'] ?>";
            BackColor = "palegreen";
            ForeColor = "navy";
            CountActive = true;
            CountStepper = -1;
            LeadingZero = true;
            DisplayFormat = "%%D%% Days, %%H%% Hrs, %%M%% Mins, %%S%% Secs";
            FinishMessage = `<span class="card-text text-danger">Deadline is Over</span>`;
        </script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/countdown.js') ?>">
        </script>