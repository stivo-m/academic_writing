<div class="sidebar" data-color="purple" data-background-color="white" data-image="<?php echo base_url("assets/writers/img/sidebar-1.jpg") ?>">
  <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
  <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
      Curtsy Writing
    </a></div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item <?php if ($this->uri->uri_string() == "writers/dashboard") {
                            echo "active";
                          } ?>">
        <a class="nav-link" href="<?php echo base_url('writers/dashboard') ?>">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>

      </li>


      <li class="nav-item <?php if ($this->uri->uri_string() == "writers/orders" || $this->uri->uri_string() == "writers/orders/" . $id) {
                            echo "active";
                          } ?>">
        <a class="nav-link" href="<?php echo base_url('writers/orders') ?>">
          <i class="material-icons">content_paste</i>
          <p>All Orders</p>
        </a>
      </li>

      <li class="nav-item 
      <?php if ($this->uri->uri_string() == "writers/finances" || $this->uri->uri_string() == "writers/finances/" . $id) {
        echo "active";
      } ?>">
        <a class="nav-link" href="<?php echo base_url('writers/finances') ?>">
          <i class="material-icons">attach_money</i>
          <p>Finances</p>
        </a>
      </li>

      <li class="nav-item <?php if ($this->uri->uri_string() == "writers/settings") {
                            echo "active";
                          } ?>">
        <a class="nav-link" href="<?php echo base_url('writers/settings') ?>">
          <i class="material-icons">settings</i>
          <p>Settings</p>
        </a>
      </li>
    </ul>
  </div>
</div>