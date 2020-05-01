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
          <div class="card-header card-header-tabs card-header-primary">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <span class="nav-tabs-title">Stats:</span>
                <ul class="nav nav-tabs" data-tabs="tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="#processing" data-toggle="tab">
                      <i class="material-icons">autorenew</i> Processing
                      <div class="ripple-container"></div>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#revision" data-toggle="tab">
                      <i class="material-icons">error_outline</i> Revision
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#completed" data-toggle="tab">
                      <i class="material-icons">playlist_add_check</i> Completed
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#paid" data-toggle="tab">
                      <i class="material-icons">check_circle_outline</i> Paid
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body">

          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="javascript:;">
              <img class="img" src="https://i.ya-webdesign.com/images/placeholder-image-png-19.png" />
            </a>
          </div>
          <div class="card-body">
            <h6 class="card-category text-gray">Writer: <?= $writer["id"] ?></h6>
            <h4 class="card-title"><?= $writer["name"] ?></h4>
            <h5 class="card-title"><?= $writer["email"] ?></h5>
            <p class="card-description">
              <?php $current = 0;
              $revisions = 0;
              $completed = 0;
              $paid = 0; ?>

              <?php foreach ($writer_orders as $order) : ?>

                <?php if ($order["status"] == "processing") : ?>
                  <?php
                  $current++;
                  ?>
                <?php endif; ?>

                <?php if ($order["status"] == "completed") : ?>
                  <?php
                  $completed++;
                  ?>
                <?php endif; ?>

                <?php if ($order["status"] == "paid") : ?>
                  <?php
                  $paid++;
                  ?>
                <?php endif; ?>

                <?php if ($order["status"] == "revision") : ?>
                  <?php
                  $revisions++;
                  ?>
                <?php endif; ?>
              <?php endforeach; ?>
              <hr>
              <b>Current Orders: </b><?= $current ?> Orders
              <hr>
              <b>Revision Orders: </b><?= $revisions ?> Orders
              <hr>
              <b>Completed Orders: </b><?= $completed ?> Orders
              <hr>
              <b>Paid Orders: </b><?= $paid ?> Orders
            </p>
            <a href="javascript:;" class="btn btn-primary btn-round">Edit</a>
            <a href="javascript:;" class="btn btn-default btn-round">Delete</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>