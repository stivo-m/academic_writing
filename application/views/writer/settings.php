<?php if (!$this->session->userdata["writer_data"]["writer_login_status"]) : ?>
    <?php
    $url = base_url("writers");
    redirect($url);
    ?>
<?php endif; ?>


<div class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Writer Settings</h4>
                    <p class="card-category">Registration and levels</p>
                </div>
                <div class="card-body">
                    <table class="table">
                        <p class="card-text">
                            Writer's Access to the System
                        </p>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    Are new writers allowed to register in the platform?
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    Can Writers login to the platform?
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    Must writers take a test to join the platform?
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table">
                        <p class="card-text">
                            Writer Levels available in the System
                        </p>
                        <thead>
                            <th>
                                Level 1
                            </th>
                            <th>
                                Level 2
                            </th>
                            <th>
                                Level 3
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>

                                        Probation Level
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                        Junior Level
                                    </div>
                                </td>

                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                        Senior Level
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Order Settings</h4>
                    <p class="card-category">CPP, Acces, and others</p>
                </div>
                <div class="card-body">
                    <table class="table">
                        <p class="card-text">The CPP for Orders in the System</p>
                        <tbody>
                            <tr>
                                <td>Normal Orders | <small>More than 12 hours</small></td>
                                <td>Ksh. 200 / Page</td>
                                <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" title="Edit Option" class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>Urgent Orders | <small>Between 5 - 12 hours</small></td>
                                <td>Ksh. 250 / Page</td>
                                <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" title="Edit Option" class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>Super Urgent Orders | <small>Below 3.5 hours</small></td>
                                <td>Ksh. 300 / Page</td>
                                <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" title="Edit Option" class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table">
                        <p class="card-title">
                            Access to Orders
                        </p>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    Can Probation writers take orders?
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    Can Junior writers take at least 2 orders?
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    Can Senior writers take at least 3 orders?
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>