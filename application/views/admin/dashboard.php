<?php if (!$this->session->userdata["admin_data"]["admin_login_status"]) : ?>
  <?php
  $url = base_url("admin");
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
              <i class="material-icons text-danger">warning</i>
              <a href="javascript:;">View Available</a>
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
              <a href="javascript:;">View Processing</a>
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
              <a href="javascript:;">Check Revisions</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="fa fa-users"></i>
            </div>
            <p class="card-category">Writers</p>
            <h3 class="card-title"><?php echo count($writers); ?> Active</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="javascript:;">View Writers</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Employees Stats</h4>
            <p class="card-category">Top Writers</p>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-hover">
              <thead class="text-warning">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Options</th>
              </thead>
              <tbody>
                <?php foreach ($writers as $writer) : ?>
                  <tr>
                    <td>
                      <?php echo $writer["id"] ?>
                    </td>


                    <td>
                      <?php echo $writer["name"] ?>
                    </td>

                    <td>
                      <?php echo $writer["email"] ?>
                    </td>

                    <td>
                      <?php echo ($writer["status"] ? "<span class='badge badge-green green-text'>Verified</span>" : "<span class='badge badge-red red-text'>Unverified</span>"); ?>
                    </td>

                    <td>
                      <input type="hidden" id="writerId" value="<?php echo $writer['id'] ?>" />
                      <a href="<?php echo base_url("admin/writers/" . $writer['id']) ?>" class="btn btn-md green white-text">View</a>
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