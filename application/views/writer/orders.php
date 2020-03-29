<?php if (!$this->session->userdata["writer_data"]["writer_login_status"]) : ?>
    <?php
    $url = base_url("writers");
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

                        <div class="" id="availableOrdersHolder"></div>

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
                            <a class="black-text" href="<?php echo base_url("writers/orders/" . $order['id']); ?>">
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
                            <a class="black-text" href="<?php echo base_url("writers/orders/" . $order['id']); ?>">
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
                            <a class="black-text" href="<?php echo base_url("writers/orders/" . $order['id']); ?>">
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
</div>