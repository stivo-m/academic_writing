<?php if (!$this->session->userdata["customer_data"]["customer_login_status"]) : ?>
    <?php
    $url = base_url("customer/auth/login");
    redirect($url);
    ?>
<?php endif; ?>


<div class="container">
    <div class="row card card-content">
        <div class="col s12">
            <div class="card blue-grey darken-1">
                <div class="card-content center white-text small" style="padding: 10px">
                    <p>Need an expert writer? There are 9 writers waiting for you.  
                        <a href="<?php echo base_url("customer/order/add");?>"
                         class="btn btn-outline blue-grey darken-3 waves-effect waves-light">
                         Place New Order</a></p>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="card">
                <div class="card-content medium white-text">
                    <span class="card-title black-text">Statistics</span>
                    <div class="row">
                        <div class="col s3 m3 l3">
                            <div class="card blue-grey darken-2 center">
                                <div class="card-content small">
                                    <span class="card-title">0</span>
                                    <p class="card-text">
                                        Orders in Bidding
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col s3 m3 l3">
                            <div class="card blue-grey darken-2 center">
                                <div class="card-content small">
                                    <span class="card-title">0</span>
                                    <p class="card-text">
                                        Orders in Progress
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col s3 m3 l3">
                            <div class="card blue-grey darken-2 center">
                                <div class="card-content small">
                                    <span class="card-title">0</span>
                                    <p class="card-text">
                                        Completed Orders
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col s3 m3 l3">
                            <div class="card blue-grey darken-2 center">
                                <div class="card-content small">
                                    <span class="card-title">0</span>
                                    <p class="card-text">
                                        Cancelled orders
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <div class="row">
        <div class="card col s12">
            <div class="card-content">
                <span class="card-title">Orders</span>
                <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#in-progress">In Progress</a></li>
                    <li class="tab col s3"><a href="#completed">Completed</a></li>
                    
                    
                </ul>
                <table class="responsive-table bordered striped " id="in-progress">
                    <thead>
                        <tr>
                            <th>ORDER NO.</th>
                            <th>TOPIC</th>
                            <th>STATUS</th>
                            <th>TYPE </th>
                            <th>PAGES</th>
                            <th>AMOUNT</th>
                            <th>WRITER</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- <tr>
                            <td colspan="8">
                                <p class="p-2 center ">
                                    No Orders Found!
                                </p>
                            </td>
                        </tr> -->

                        <tr>
                            <td>#28932</td>
                            <td>Community Development</td>
                            <td class="blue-text">Processing</td>
                            <td>Essay</td>
                            <td>5 / 1375 Words</td>
                            <td>03 Days: 02 Hours: 24 Sec</td>
                            <td>John</td>
                        </tr>
                    </tbody>
                </table>

                <table class="responsive-table bordered striped " id="completed">
                    <thead>
                        <tr>
                            <th>ORDER NO.</th>
                            <th>TOPIC</th>
                            <th>STATUS</th>
                            <th>TYPE </th>
                            <th>PAGES</th>
                            <th>AMOUNT</th>
                            <th>WRITER</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- <tr>
                            <td colspan="8">
                                <p class="p-2 center ">
                                    No Orders Found!
                                </p>
                            </td>
                        </tr> -->

                        <tr>
                            <td>#28932</td>
                            <td>Community Development</td>
                            <td class="green-text">Completed</td>
                            <td>Essay</td>
                            <td>5 / 1375 Words</td>
                            <td>03 Days: 02 Hours: 24 Sec</td>
                            <td>Anne</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>