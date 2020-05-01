<?php if (!$this->session->userdata["writer_data"]["writer_login_status"]) : ?>
  <?php
  $url = base_url("writers");
  redirect($url);
  ?>
<?php endif; ?>

<div class="content">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Active Writers</h4>
          <p class="card-category">You have <?php echo count($writers) ?> active writers</p>
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