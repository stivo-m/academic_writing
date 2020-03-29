<nav class="nav-wrapper blue-grey darken-1">
    <div class="container">
        <a class="brand-logo" href="#" style="font-size: 20px">
            <small>
                Welcome, 
            </small>
        </a>
        <a class="sidenav-trigger" data-target="mobile-links" href="#">
            <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
            <li><a href="<?php echo base_url("customer/"); ?>">Dashboard</a></li>
            <li><a href="<?php echo base_url("customer/orders"); ?>">Orders</a></li>
            <li><a href="<?php echo base_url("customer/writers"); ?>">Writers</a></li>
            <li><a href="<?php echo base_url("customer/finances"); ?>">Finances</a></li>
            <li><a href="<?php echo base_url("customer/settings"); ?>">Settings</a></li>
            <li><a class="red white-text" href="<?php echo base_url("customer/auth/logout"); ?>">Logout</a></li>
        </ul>
    </div>
</nav>

<div class="sidenav show-on-med-and-down" id="mobile-links">
    <div class="profile teal">
        <div class="profile-text white-text">User Profile</div>
    </div>    
<ul  class="">
        <li><a href="<?php echo base_url("customer/"); ?>">Dashboard</a></li>
        <li><a href="<?php echo base_url("customer/orders"); ?>">Orders</a></li>
        <li><a href="<?php echo base_url("customer/writers"); ?>">Writers</a></li>
        <li><a href="<?php echo base_url("customer/finances"); ?>">Finances</a></li>
        <li><a href="<?php echo base_url("customer/settings"); ?>">Settings</a></li>
        <li><a class="red white-text" href="<?php echo base_url("customer/auth/logout"); ?>">Logout</a></li>
    </ul>
</div>
</div>