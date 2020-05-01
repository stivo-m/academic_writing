<div class="sidebar" data-color="purple" data-background-color="white" data-image="<?php echo base_url("assets/admin/img/sidebar-1.jpg") ?>">
  <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
  <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
      Curtsy Writing
    </a></div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item <?php if ($this->uri->uri_string() == "admin/dashboard") {
                            echo "active";
                          } ?>">
        <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item <?php if ($this->uri->uri_string() == "admin/orders" || $this->uri->uri_string() == "admin/orders/" . $id) {
                            echo "active";
                          } ?>">
        <a class="nav-link" href="<?php echo base_url('admin/orders') ?>">
          <i class="material-icons">content_paste</i>
          <p>All Orders</p>
        </a>
      </li>

      <li class="nav-item <?php if ($this->uri->uri_string() == "admin/writers" || $this->uri->uri_string() == "admin/writers/" . $id) {
                            echo "active";
                          } ?>">
        <a class="nav-link" href="<?php echo base_url('admin/writers') ?>">
          <i class="material-icons">person</i>
          <p>Writers</p>
        </a>
      </li>

      <li class="nav-item 
      <?php if ($this->uri->uri_string() == "admin/finances" || $this->uri->uri_string() == "admin/finances/" . $id) {
        echo "active";
      } ?>">
        <a class="nav-link" href="<?php echo base_url('admin/finances') ?>">
          <i class="material-icons">attach_money</i>
          <p>Finances</p>
        </a>
      </li>

      <li class="nav-item <?php if ($this->uri->uri_string() == "admin/settings") {
                            echo "active";
                          } ?>">
        <a class="nav-link" href="<?php echo base_url('admin/settings') ?>">
          <i class="material-icons">settings</i>
          <p>Settings</p>
        </a>
      </li>
    </ul>
  </div>
</div>