<?php if (!$this->session->userdata["writer_data"]["writer_login_status"]) : ?>
  <?php
  $url = base_url("writers");
  redirect($url);
  ?>
<?php endif; ?>


<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">content_copy</i>
            </div>
            <p class="card-category">Available</p>
            <h3 class="card-title"><?php echo count($available); ?>
              <small>Order(s)</small>
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">

              <a href="javascript:;">
                <?php echo count($available) == 0 ? "No Available" : "Check Available"; ?>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="fa fa-spinner"></i>
            </div>
            <p class="card-category">Processing</p>
            <h3 class="card-title"><?php echo count($processing); ?>
              <small>Order(s)</small>
            </h3>

          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="javascript:;">
                <?php echo count($processing) == 0 ? "No Processing" : "Check Processing"; ?>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
              <i class="material-icons">info_outline</i>
            </div>
            <p class="card-category">Revisions</p>
            <h3 class="card-title"><?php echo count($revisions); ?>
              <small>Order(s)</small>
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="javascript:;">

                <?php echo count($revisions) == 0 ? "No Revisions" : "<i class='material-icons text-danger'>warning</i> <span class='text-danger'>Check Revisions</span>"; ?>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">

              <i class="material-icons">check_circle</i>
            </div>
            <p class="card-category">Completed</p>
            <h3 class="card-title"><?php echo count($completed); ?> Orders</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="javascript:;">
                <?php echo count($completed) == 0 ? "No Completed" : "Check Completed"; ?>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Available Orders</h4>
            <p class="card-category">Most Recent Orders</p>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-hover">
              <thead class="text-warning">
                <th>ID</th>
                <th>Title</th>
                <th>Pages</th>
                <th>Deadline </th>
                <th>Cost</th>
                <th>Options</th>
              </thead>
              <tbody>
                <?php foreach ($available as $order) : ?>
                  <tr>
                    <td>
                      <?php echo $order["id"] ?>
                    </td>


                    <td>
                      <?php echo $order["title"] ?>
                    </td>

                    <td>
                      <?php echo $order["pages"] ?> Pages
                    </td>

                    <td>
                      <?php echo $order["date_deadline"] . " at " . $order["time_deadline"]; ?>
                    </td>

                    <td>
                      Ksh. <?php echo number_format($order['cost']); ?>
                    </td>

                    <td>
                      <input type="hidden" id="orderId" value="<?php echo $order['id'] ?>" />
                      <a href="<?php echo base_url("writers/orders/" . $order['id']) ?>" class="btn btn-md green white-text">View</a>
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