<?php if(!$this->session->userdata["admin_data"]["admin_login_status"]) : ?>
    <?php 
        $url = base_url("admin");
        redirect($url);
    ?>
<?php endif; ?>


<style>
    .large-text{
        font-size: 60px;
    }
</style>
<div class="row container center animated fadeIn">
    <div class="col s12 m3">
        <div class="card">
            <div class="card-content">
                <p class="large-text"><?php echo count($available);?></p>
                <p class="card-text">Available Orders</p>
            </div>
        </div>
    </div>
    <div class="col s12 m3">
        <div class="card">
            <div class="card-content">
                <p class="large-text"><?php echo count($processing);?></p>
                <p class="card-text">Processing Orders</p>
            </div>
        </div>
    </div>
    <div class="col s12 m3">
        <div class="card">
            <div class="card-content">
                <p class="large-text"><?php echo count($completed);?></p>
                <p class="card-text">Waiting Approval</p>
            </div>
        </div>
    </div>
    <div class="col s12 m3">
        <div class="card">
            <div class="card-content">
                <p class="large-text"><?php echo count($writers);?></p>
                <p class="card-text">Writers Available</p>
            </div>
        </div>
    </div>

    <div class="col s12 card">
        <div class="card-content">
            <h5 class="card-text">Site Statistics</h5>
            <hr>
            <table class="responsive-table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Number</th>
                        <th>Total Price</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            Orders in Progress
                        </td>

                        <td>
                            <?php echo count($processing);?> Orders
                        </td>

                        <td>
                            <?php 
                                $cost = 0;

                                foreach($processing as $order){
                                    $cost += $order["cost"];
                                }

                                echo "Ksh. " . number_format($cost);
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Orders in Revision
                        </td>

                        <td>
                            <?php echo count($revisions);?> Orders
                        </td>

                        <td>
                            <?php 
                                $cost = 0;

                                foreach($revisions as $order){
                                    $cost += $order["cost"];
                                }

                                echo "Ksh. " . number_format($cost);
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Waiting Approval
                        </td>

                        <td>
                            <?php echo count($completed);?> Orders
                        </td>

                        <td>
                            <?php 
                                $cost = 0;

                                foreach($completed as $order){
                                    $cost += $order["cost"];
                                }

                                echo "Ksh. " . number_format($cost);
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Waiting Payments
                        </td>

                        <td>
                            <?php echo count($finished);?> Orders
                        </td>

                        <td>
                            <?php 
                                $cost = 0;

                                foreach($finished as $order){
                                    $cost += $order["cost"];
                                }

                                echo "Ksh. " . number_format($cost);
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Add Order Modal Structure -->
<div id="add_order" class="modal">
    <div class="modal-content">
      <h4>Add New Order</h4>
      <p class="center" id="order_message"></p>
      <hr>
            <div class="row">
                <div class="col s12">
                    <div class="input-field">
                        <input id="title" type="text" name="title" class="validate">
                        <label for="title">Enter Title</label>
                    </div>
                </div>
                <div class="col s12 m6 l6">
                    <div class="input-field">
                        <input id="subject" type="text" name="subject" class="validate">
                        <label for="subject">Enter Subject</label>
                    </div>
                </div>

                <div class="col s12 m6 l6">
                    <div class="input-field">
                        <input id="sources" type="number" name="sources" class="validate">
                        <label for="sources">Enter Sources</label>
                    </div>
                </div>
                <div class="col s12 m6 l6">
                    <div class="input-field">
                        <select  id="spacing" name="spacing" >
                            <option value="" disabled selected>Order Spacing</option>
                            <option value="1">Single (550 Words / Page)</option>
                            <option value="2">Double (275 Words / Page)</option>
                            <option value="3">Double (300 Words / Page</option>
                        </select>
                        <label>Spacing</label>
                    </div>
                </div>

                <div class="col s12 m6 l6 left">
                    <div class="input-field">
                        <select id="format" name="format">
                                <option value="" disabled selected>Order Format</option>
                                <option value="1">APA</option>
                                <option value="2">MLA</option>
                                <option value="3">Havard</option>
                                <option value="4">Chicago / Turabia</option>
                                <option value="5">Other</option>
                            </select>
                        <label>Format</label>
                    </div>
                </div>
                <div class="col s12 m6 l6">
                    <div class="input-field">
                        <input id="date_deadline" type="text" name="date_deadline" class="datepicker validate">
                        <label for="date_deadline">Enter Date</label>
                    </div>
                </div>

                <div class="col s12 m6 l6">
                    <div class="input-field">
                        <input id="time_date" type="text" name="time_date" class="timepicker validate">
                        <label for="time_date">Enter Time</label>
                    </div>
                </div>
                <div class="col s12 m6 l6">
                    <div class="input-field">
                        <input id="price" type="number" name="price" class="validate">
                        <label for="price">Enter Price</label>
                    </div>
                </div>

                <div class="col s12 m6 l6">
                    <div class="input-field">
                        <input id="pages" type="number" name="pages" class="validate">
                        <label for="pages">Enter Pages</label>
                    </div>
                </div>
                <div class="col s12 m6 l6">
                    <div class="input-field">
                        <select  id="level" name="level" >
                            <option value="" disabled selected>Order Level</option>
                            <option value="1">High School</option>
                            <option value="2">College</option>
                            <option value="3">University</option>
                            <option value="3">Masters</option>
                            <option value="3">P.hD</option>
                        </select>
                        <label>Spacing</label>
                    </div>
                </div>
                <div class="col s12 m6 l6">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Order Files</span>
                            <input type="file" multiple>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload one or more files">
                        </div>
                    </div>
                </div>

                <div class="col s12">
                    <div class="input-field">
                        <textarea id="instructions" class="materialize-textarea"></textarea>
                        <label for="instructions">Your Instructions</label>
                    </div>
                </div>
            </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="waves-effect waves-green blue white-text btn-flat" id="btn_add_order">Add Order</a>
    </div>
</div>