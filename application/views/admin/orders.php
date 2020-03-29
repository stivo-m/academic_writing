<?php if (!$this->session->userdata["admin_data"]["admin_login_status"]) : ?>
    <?php
    $url = base_url("admin");
    redirect($url);
    ?>
<?php endif; ?>


<div class="row container animated fadeIn">
    <div class="col s12">
        <ul class="tabs tabs-fixed-width ">
            <li class="tab col s3"><a class="active" href="#available">Available <span class="new badge grey"><?php echo count($available); ?></span></a></li>
            <li class="tab col s3"><a href="#processing">Processing <span class="new badge blue"><?php echo count($processing); ?></span></a></li>
            <li class="tab col s3"><a href="#revisions">Revisions <span class="new badge red "><?php echo count($revisions); ?></span></a></li>
            <li class="tab col s3"><a href="#completed">Completed <span class="new badge "><?php echo count($completed); ?></span></a></li>
        </ul>
    </div>
    <div id="available" class="col s12">
        <div class="row">
            <div class="col s12">
                <div class="card white black-text">
                    <div class="card-content">
                        <h3 class="card-title p3">Available Orders</h3>


                        <?php foreach ($available as $order) : ?>
                            <a class="black-text" href="<?php echo base_url("admin/orders/" . $order['id']); ?>">
                                <div class="card">
                                    <div class="card-content">
                                        <span class="card-title left"><?php echo $order['title'] ?></span>
                                        <span class="card-text right"><?php echo $order['pages'] ?> Pages </span>
                                    </div>

                                    <div class="card-content">
                                        <span class="card-text left">
                                            Ksh. <?php echo $order['cost'] ?>
                                        </span>
                                        <span class="card-text right">Deadline: <?php echo $order['date_deadline'] . " : " . $order['time_deadline'] ?></span>
                                    </div>

                                    <div class="card-content">
                                        <p class="card-text"><b>Instructions:</b><br>
                                            <?php echo word_limiter($order['instructions'], 50) ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>

                        <?php if (empty($available)) : ?>
                            <p class="card-text">No Available Orders</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="processing" class="col s12">
        <div class="row">
            <div class="col s12">
                <div class="card white black-text">
                    <div class="card-content">
                        <h3 class="card-title p3">Processing Orders </h3>

                        <?php foreach ($processing as $order) : ?>
                            <a class="black-text" href="<?php echo base_url("admin/orders/" . $order['id']); ?>">
                                <div class="card">
                                    <div class="card-content">
                                        <span class="card-title left"><?php echo $order['title'] ?></span>
                                        <span class="card-text right"><?php echo $order['pages'] ?> Pages </span>
                                    </div>

                                    <div class="card-content">
                                        <span class="card-text left">
                                            Ksh. <?php echo $order['cost'] ?>
                                        </span>
                                        <span class="card-text right">Deadline: <?php echo $order['date_deadline'] . " : " . $order['time_deadline'] ?></span>
                                    </div>

                                    <div class="card-content">
                                        <p class="card-text"><b>Instructions:</b><br>
                                            <?php echo word_limiter($order['instructions'], 50) ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>

                        <?php if (empty($processing)) : ?>
                            <p class="card-text">No Processing Orders</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="revisions" class="col s12">
        <div class="row">
            <div class="col s12">
                <div class="card white black-text">
                    <div class="card-content">
                        <h3 class="card-title p3">Revision Orders </h3>

                        <?php foreach ($revisions as $order) : ?>
                            <a class="black-text" href="<?php echo base_url("admin/orders/" . $order['id']); ?>">
                                <div class="card">
                                    <div class="card-content">
                                        <span class="card-title left"><?php echo $order['title'] ?></span>
                                        <span class="card-text right"><?php echo $order['pages'] ?> Pages </span>
                                    </div>

                                    <div class="card-content">
                                        <span class="card-text left">
                                            Ksh. <?php echo $order['cost'] ?>
                                        </span>
                                        <span class="card-text right">Deadline: <?php echo $order['date_deadline'] . " : " . $order['time_deadline'] ?></span>
                                    </div>

                                    <div class="card-content">
                                        <p class="card-text"><b>Instructions:</b><br>
                                            <?php echo word_limiter($order['instructions'], 50) ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>

                        <?php if (empty($revisions)) : ?>
                            <p class="card-text">No Revision Orders</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="completed" class="col s12">
        <div class="row">
            <div class="col s12">
                <div class="card white black-text">
                    <div class="card-content">
                        <h3 class="card-title p3">Completed Orders</h3>

                        <?php foreach ($completed as $order) : ?>
                            <a class="black-text" href="<?php echo base_url("admin/orders/" . $order['id']); ?>">
                                <div class="card">
                                    <div class="card-content">
                                        <span class="card-title left"><?php echo $order['title'] ?></span>
                                        <span class="card-text right"><?php echo $order['pages'] ?> Pages </span>
                                    </div>

                                    <div class="card-content">
                                        <span class="card-text left">
                                            Ksh. <?php echo $order['cost'] ?>
                                        </span>
                                        <span class="card-text right">Deadline: <?php echo $order['date_deadline'] . " : " . $order['time_deadline'] ?></span>
                                    </div>

                                    <div class="card-content">
                                        <p class="card-text"><b>Instructions:</b><br>
                                            <?php echo word_limiter($order['instructions'], 50) ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>

                        <?php if (empty($completed)) : ?>
                            <p class="card-text">No Completed Orders</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">add</i>
        </a>

        <ul>
            <li><a class="btn-floating red tooltipped modal-trigger" href="#add_order" data-position="left" data-tooltip="Add New Order"><i class="material-icons">add_circle</i></a></li>
        </ul>

    </div>
</div>

<!-- Add Order Modal Structure -->
<div id="add_order" class="modal">
    <div class="modal-content">
        <h4>Add New Order</h4>
        <p class="center" id="order_message"></p>
        <br>
        <div class="row">
            <div class="col s12">
                <div class="input-field">
                    <input id="title" type="text" name="title" class="validate">
                    <label for="title">Enter Title</label>
                </div>
            </div>
            <div class="col s12 m6 l6">
                <div class="input-field">
                    <input id="subject" type="text" name="subject" class="validate">
                    <label for="subject">Enter Subject</label>
                </div>
            </div>

            <div class="col s12 m6 l6">
                <div class="input-field">
                    <input id="sources" type="number" name="sources" class="validate">
                    <label for="sources">Enter Sources</label>
                </div>
            </div>
            <div class="col s12 m6 l6">
                <div class="input-field">
                    <select id="spacing" name="spacing">
                        <option value="" disabled selected>Order Spacing</option>
                        <option value="1">Single (550 Words / Page)</option>
                        <option value="2">Double (275 Words / Page)</option>
                        <option value="3">Double (300 Words / Page)</option>
                    </select>
                    <label>Spacing</label>
                </div>
            </div>

            <div class="col s12 m6 l6 left">
                <div class="input-field">
                    <select id="format" name="format">
                        <option value="" disabled selected>Order Format</option>
                        <option value="1">APA</option>
                        <option value="2">MLA</option>
                        <option value="3">Havard</option>
                        <option value="4">Chicago / Turabian</option>
                        <option value="5">Other</option>
                    </select>
                    <label>Format</label>
                </div>
            </div>
            <div class="col s12 m6 l6">
                <div class="input-field">
                    <input id="date_deadline" type="text" name="date_deadline" class="datepicker validate">
                    <label for="date_deadline">Enter Date</label>
                </div>
            </div>

            <div class="col s12 m6 l6">
                <div class="input-field">
                    <input id="time_date" type="text" name="time_date" class="timepicker validate">
                    <label for="time_date">Enter Time</label>
                </div>
            </div>
            <div class="col s12 m6 l6">
                <div class="input-field">
                    <input id="price" type="number" name="price" class="validate">
                    <label for="price">Enter Price</label>
                </div>
            </div>

            <div class="col s12 m6 l6">
                <div class="input-field">
                    <input id="pages" type="number" name="pages" class="validate">
                    <label for="pages">Enter Pages</label>
                </div>
            </div>
            <div class="col s12 m6 l6">
                <div class="input-field">
                    <select id="level" name="level">
                        <option value="" disabled selected>Order Level</option>
                        <option value="1">High School</option>
                        <option value="2">College</option>
                        <option value="3">University</option>
                        <option value="3">Masters</option>
                        <option value="3">P.hD</option>
                    </select>
                    <label>Spacing</label>
                </div>
            </div>
            <div class="col s12 m6 l6">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Order Files</span>
                        <input type="file" id="file_input" name="files[]" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                    </div>
                </div>
            </div>

            <div class="col s12">
                <div class="input-field">
                    <textarea id="instructions" class="materialize-textarea"></textarea>
                    <label for="instructions">Your Instructions</label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="waves-effect waves-green blue white-text btn-flat" id="btn_add_order">Add Order</a>
    </div>
</div>

</div>