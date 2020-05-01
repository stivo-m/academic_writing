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

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="new-tab" data-toggle="tab" href="#newOrder" role="tab" aria-controls="settings" aria-selected="false">
                                        <i class="material-icons">add</i> New Order
                                    </a>
                                </li>
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
                        <div class="tab-pane" id="newOrder" role="tabpanel" aria-labelledby="new-tab">
                            <div class="container">
                                <div class="msg_holder">
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input id="title" type="text" name="title" class="validate form-control">
                                            <label class="bmd-label-floating" for="title">Order Title</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <input id="pages" type="number" name="pages" class="validate form-control">
                                            <label class="bmd-label-floating" for="pages">Order Pages</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" id="spacing">
                                                <option value="0" disabled selected>
                                                    Select Order Spacing
                                                </option>

                                                <option value="1">Single (550 Words / Page)</option>
                                                <option value="2">Double (275 Words / Page)</option>
                                                <option value="3">Double (300 Words / Page)</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">

                                            <select class="form-control" id="format">
                                                <option value="0" disabled selected>Select Order Format</option>

                                                <option value="1">APA</option>
                                                <option value="2">MLA</option>
                                                <option value="3">Havard</option>
                                                <option value="4">Chicago / Turabian</option>
                                                <option value="5">Other</option>
                                            </select>

                                        </div>
                                    </div>


                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <input id="date_deadline" type="date" name="date_deadline" class="datepicker validate form-control">
                                            <label class="" for="date_deadline">Order Date</label>
                                        </div>
                                    </div>





                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" id="level">
                                                <option value="0" disabled selected>Chose Order Level</option>
                                                <option value="1">High School</option>
                                                <option value="2">College</option>
                                                <option value="3">University</option>
                                                <option value="3">Masters</option>
                                                <option value="3">P.hD</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <input id="time_date" type="time" name="time_date" class="timepicker validate form-control">
                                            <label class="" for="time_date">Order Time</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" id="sources">
                                                <option value="0" disabled selected>
                                                    Select Number of Sources
                                                </option>

                                                <?php for ($i = 1; $i < 20; $i++) : ?>
                                                    <option value="<?= $i; ?>"><?= $i ?> Sources</option>
                                                <?php endfor; ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <textarea name="instructions" class="form-control" id="instructions">
                                            </textarea>
                                            <label class="bmd-label-floating" for="orderInstructions">Order Instructions</label>
                                        </div>
                                        <button class="btn btn-primary right" id="btn_add_order">Add Order</button>
                                    </div>
                                </div>


                            </div>
                        </div>
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