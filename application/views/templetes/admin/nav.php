<nav class="nav-wrapper teal">
    <div class="container">
        <a class="brand-logo" href="#" style="font-size: 20px">
            <small>
                Welcome, <?php echo $this->session->userdata["admin_data"]["admin_name"] ?>
            </small>
        </a>
        <a class="sidenav-trigger" data-target="mobile-links" href="#">
            <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
            <li><a href="<?php echo base_url("admin/dashboard"); ?>">Dashboard</a></li>
            <li><a href="<?php echo base_url("admin/orders"); ?>">Orders</a></li>
            <li><a href="<?php echo base_url("admin/writers"); ?>">Writers</a></li>
            <li><a href="<?php echo base_url("admin/finances"); ?>">Finances</a></li>
            <li><a href="<?php echo base_url("admin/settings"); ?>">Settings</a></li>
            <li><a class="red white-text" href="<?php echo base_url("admin/logout"); ?>">Logout</a></li>
        </ul>
    </div>
</nav>

<ul class="sidenav" id="mobile-links">
    <li class="mb-5"></li>
    <li><a href="<?php echo base_url("admin/dashboard"); ?>">Dashboard</a></li>
    <li><a href="<?php echo base_url("admin/orders"); ?>">Orders</a></li>
    <li><a href="<?php echo base_url("admin/writers"); ?>">Writers</a></li>
    <li><a href="<?php echo base_url("admin/finances"); ?>">Finances</a></li>
    <li><a href="<?php echo base_url("admin/settings"); ?>">Settings</a></li>
    <li><a class="red white-text" href="<?php echo base_url("admin/logout"); ?>">Logout</a></li>
</ul>
</div>