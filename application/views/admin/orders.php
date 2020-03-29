


<div class="main-panel">
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">All Orders</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="<?php echo base_url("admin/settings"); ?>">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo base_url("admin/logout"); ?>">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
    </nav>  
    <div class="content">
        <div class="container-fluid">
            <div class="tab-content">
              <div class="card">
                <div class="card-header card-header-primary">
                     <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Available</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Processing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Revision</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Completed</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="">
                                        <th>
                                        ID
                                        </th>
                                        <th>
                                        Title
                                        </th>
                                        <th>
                                        Pages
                                        </th>
                                        <th>
                                        Deadline
                                        </th>
                                        <th>
                                        Salary
                                        </th>
                                        <th>
                                        Action
                                        </th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($available as $order) : ?>
                                            
                                                <tr>
                                                    
                                                    <td><?php echo $order['id'] ?></td>
                                                    <td><?php echo $order['title'] ?></td>
                                                    <td><?php echo $order['pages']?> Pages</td>
                                                    <td><?php echo $order['date_deadline'] . " : " . $order['time_deadline'] ?></td>
                                                    <td>Ksh. <?php echo $order['cost'] ?></td>
                                                    <td><a class="btn btn-primary" href="<?php echo base_url('admin/orders/' . $order['id'] )?>"> View</a></td>
                                                    
                                                </tr>
                                           
                                            
                                        <?php endforeach; ?>

                                       <tr>
                                            <td colspan="5">
                                                <?php if (empty($available)) : ?>
                                                    <p class="card-text">No Available Orders</p>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="">
                                        <th>
                                        ID
                                        </th>
                                        <th>
                                        Title
                                        </th>
                                        <th>
                                        Pages
                                        </th>
                                        <th>
                                        Deadline
                                        </th>
                                        <th>
                                        Salary
                                        </th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($processing as $order) : ?>
                                            <a href="http://">
                                                <tr>
                                                    <td><?php echo $order['id'] ?></td>
                                                    <td><?php echo $order['title'] ?></td>
                                                    <td><?php echo $order['pages']?> Pages</td>
                                                    <td><?php echo $order['date_deadline'] . " : " . $order['time_deadline'] ?></td>
                                                    <td>Ksh. <?php echo $order['cost'] ?></td>
                                                    <td><a class="btn btn-rounded" href="<?php echo base_url('admin/orders/' . $order['id'] )?>"> View</a></td>
                                                </tr>
                                            </a>
                                            
                                        <?php endforeach; ?>
                                        <tr>
                                            <td colspan="5">
                                                <?php if (empty($processing)) : ?>
                                                    <p class="card-text">No Processing Orders</p>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="">
                                        <th>
                                        ID
                                        </th>
                                        <th>
                                        Title
                                        </th>
                                        <th>
                                        Pages
                                        </th>
                                        <th>
                                        Deadline
                                        </th>
                                        <th>
                                        Salary
                                        </th>
                                        <th>Action </th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($revisions as $order) : ?>
                                            <a href="http://">
                                                <tr>
                                                    <td><?php echo $order['id'] ?></td>
                                                    <td><?php echo $order['title'] ?></td>
                                                    <td><?php echo $order['pages']?> Pages</td>
                                                    <td><?php echo $order['date_deadline'] . " : " . $order['time_deadline'] ?></td>
                                                    <td>Ksh. <?php echo $order['cost'] ?></td>
                                                    <td><a class="btn btn-rounded" href="<?php echo base_url('admin/orders/' . $order['id'] )?>"> View</a></td>
                                                </tr>
                                            </a>
                                            
                                        <?php endforeach; ?>

                                        <tr>
                                            <td colspan="5">
                                                <?php if (empty($revisions)) : ?>
                                                    <p class="card-text">No Revision Orders</p>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="">
                                        <th>
                                        ID
                                        </th>
                                        <th>
                                        Title
                                        </th>
                                        <th>
                                        Pages
                                        </th>
                                        <th>
                                        Deadline
                                        </th>
                                        <th>
                                        Salary
                                        </th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($completed as $order) : ?>
                                            <a href="http://">
                                                <tr>
                                                    <td><?php echo $order['id'] ?></td>
                                                    <td><?php echo $order['title'] ?></td>
                                                    <td><?php echo $order['pages']?> Pages</td>
                                                    <td><?php echo $order['date_deadline'] . " : " . $order['time_deadline'] ?></td>
                                                    <td>Ksh. <?php echo $order['cost'] ?></td>
                                                    <td><a class="btn btn-rounded" href="<?php echo base_url('admin/orders/' . $order['id'] )?>"> View</a></td>
                                                </tr>
                                            </a>
                                            
                                        <?php endforeach; ?>

                                        <tr>
                                           <td colspan="5">
                                                <?php if (empty($completed)) : ?>
                                                    <p class="card-text">No Completed Orders</p>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
                    
                
               
            </div>
        </div>
    </div>
</div>



