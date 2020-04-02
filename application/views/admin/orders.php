<?php if (!$this->session->userdata["admin_data"]["admin_login_status"]) : ?>
    <?php
    $url = base_url("admin");
    redirect($url);
    ?>
<?php endif; ?>
<div class="content">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">
                                New Order
                            </span>
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

                                <li class="nav-item">
                                    <a class="nav-link" id="finished-tab" data-toggle="tab" href="#finished" role="tab" aria-controls="settings" aria-selected="false">Finished</a>
                                </li>
                            </ul>
                        </div>
                    </div>
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
                                                <td><?php echo $order['pages'] ?> Pages</td>
                                                <td><?php echo $order['date_deadline'] . " : " . $order['time_deadline'] ?></td>
                                                <td>Ksh. <?php echo $order['cost'] ?></td>
                                                <td><a class="btn btn-primary" href="<?php echo base_url('admin/orders/' . $order['id']) ?>"> View</a></td>

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
                                                    <td><?php echo $order['pages'] ?> Pages</td>
                                                    <td><?php echo $order['date_deadline'] . " : " . $order['time_deadline'] ?></td>
                                                    <td>Ksh. <?php echo $order['cost'] ?></td>
                                                    <td><a class="btn btn-rounded" href="<?php echo base_url('admin/orders/' . $order['id']) ?>"> View</a></td>
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
                                                    <td><?php echo $order['pages'] ?> Pages</td>
                                                    <td><?php echo $order['date_deadline'] . " : " . $order['time_deadline'] ?></td>
                                                    <td>Ksh. <?php echo $order['cost'] ?></td>
                                                    <td><a class="btn btn-rounded" href="<?php echo base_url('admin/orders/' . $order['id']) ?>"> View</a></td>
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
                                                    <td><?php echo $order['pages'] ?> Pages</td>
                                                    <td><?php echo $order['date_deadline'] . " : " . $order['time_deadline'] ?></td>
                                                    <td>Ksh. <?php echo $order['cost'] ?></td>
                                                    <td><a class="btn btn-rounded" href="<?php echo base_url('admin/orders/' . $order['id']) ?>"> View</a></td>
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

                        <div class="tab-pane" id="finished" role="tabpanel" aria-labelledby="finished-tab">
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
                                        <?php foreach ($finished as $order) : ?>
                                            <a href="http://">
                                                <tr>
                                                    <td><?php echo $order['id'] ?></td>
                                                    <td><?php echo $order['title'] ?></td>
                                                    <td><?php echo $order['pages'] ?> Pages</td>
                                                    <td>
                                                        <span class="deadline">
                                                            <script>
                                                                getDeadline('.deadline', '<?php echo $order['date_deadline'] . ' ' . $order['time_deadline']; ?>');
                                                            </script>
                                                        </span></td>
                                                    <td>Ksh. <?php echo $order['cost'] ?></td>
                                                    <td><a class="btn btn-rounded" href="<?php echo base_url('admin/orders/' . $order['id']) ?>"> View</a></td>
                                                </tr>
                                            </a>

                                        <?php endforeach; ?>

                                        <tr>
                                            <td colspan="5">
                                                <?php if (empty($finished)) : ?>
                                                    <p class="card-text">No Finished Orders</p>
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