<?php if (!$this->session->userdata["writer_data"]["writer_login_status"]) : ?>
    <?php
    $url = base_url("writers");
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
                            <span class="<?php if ($order["status"] == "completed") {
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
                        </span>
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
                                <b>Cost: </b> Ksh. <?php echo number_format($order['cost']) ?>
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

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Action Center</h4>
                        <p class="card-category">Carry out relevant actions here</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="card-content">
                                    <b>Order Files [<?php echo count($files) ?>]</b>
                                </p>
                                <div class="container" style="height: 200px; overflow-y:scroll;">
                                    <?php if (!empty($files)) : ?>
                                        <?php foreach ($files as $file) : ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <small class="card-text">
                                                        <a href="<?php echo base_url() . 'writers/download/' . $file["filename"] ?>">
                                                            <?php echo $file["filename"] ?>
                                                        </a>
                                                    </small>
                                                </div>

                                                <div class="col-md-12">
                                                    <small class="right">
                                                        By <?php echo
                                                                $file["uploaded_by"] == "admin" ?
                                                                    "<span class='text-success'>" . ucfirst($file["uploaded_by"]) . "</span>"
                                                                    : "<span class='text-info'>" . ucfirst($file["uploaded_by"]) . "</span>"
                                                            ?> on

                                                        <?php echo ucfirst($file["uploaded_on"]) ?>
                                                    </small>
                                                </div>
                                            </div>
                                            <hr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>

                                <?php if (empty($files)) : ?>
                                    <div class="blue white-text badge center" id="filesMsg" style="width: 100%">
                                        No Files for this Order
                                    </div>
                                <?php endif; ?>

                                <div class="blue white-text badge center" id="filesMsg" style="width: 100%"></div>
                            </div>




                            <?php if ($order["status"] == "processing" || $order["status"] == "revision") : ?>
                                <div class="col-md-12 file-field input-field">
                                    <div class="btn">

                                        <input type="file" id="file_input" name="files[]" multiple>
                                    </div>

                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="hidden" placeholder="Upload one or more files">
                                    </div>

                                    <button class="btn btn-info btn-small waves-effect blue white-text" id="saveFiles">Save Files</button>
                                </div>
                            <?php endif; ?>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">

                                <input type="hidden" value="<?php echo $order['id'] ?>" id="orderId" />
                                <?php if ($order["status"] == "available") : ?>
                                    <?php if (count($processing) >= 1) : ?>
                                        <p class="text-center card-text text-danger">
                                            Finish Orders in Progress First
                                            before you can take other tasks
                                        </p>
                                    <?php endif; ?>
                                    <?php if (count($processing) <= 0) : ?>
                                        <button class="btn btn-primary right btn-md waves-effect blue white-text" id="btnTakeOrder">Take Order</button>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if ($order["status"] == "processing" || $order["status"] == "revision") : ?>
                                    <button class="btn btn-success right btn-md waves-effect teal white-text" disabled id="btnCompleteOrder">Complete Order</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
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