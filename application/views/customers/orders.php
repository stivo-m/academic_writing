<?php if (!$this->session->userdata["customer_data"]["customer_login_status"]) : ?>
    <?php
    $url = base_url("customer/auth/login");
    redirect($url);
    ?>
<?php endif; ?>



<style>
    /* .body{
        padding-bottom: 10px;
        border: 1px solid green;
        border-top-color: transparent;
        border-radius: 5px;
    } */

    .custom-card{
        color: #000;
    }

    .custom-card .top{
        padding: 8px 20px;
        font-size: 18px;
        border radius: 5px 5px 0 0;
    }

    .custom-card .top.smaller{
        font-size: 14px !important;
    }

    .custom-card .top i{
        font-size: 30px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col s12 m8 l8">
            <h5>My Orders</h5>
        </div>

        <div class="col s12 m4 l4">
            <button class="btn">
                Place Order
            </button>
        </div>
    </div>


    <div class="col s12">
        <ul class="tabs">
                <li class="tab col s3"><a class="active" href="#in-progress">In Progress</a></li>
                <li class="tab col s3"><a href="#completed">Completed</a></li>
                <li class="tab col s3"><a href="#cancelled">Cancelled</a></li>
                    
                </ul>
                <table class="responsive-table bordered striped" id="in-progress">
                    <thead>
                        <tr>
                            <th>ORDER NO.</th>
                            <th>TOPIC</th>
                            <th>STATUS</th>
                            <th>TYPE</th>
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

                <table class="responsive-table bordered striped" id="completed">
                    <thead>
                        <tr>
                            <th>ORDER NO.</th>
                            <th>TOPIC</th>
                            <th>STATUS</th>
                            <th>TYPE</th>
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

                <table class="responsive-table bordered striped" id="cancelled">
                    <thead>
                        <tr>
                            <th>ORDER NO.</th>
                            <th>TOPIC</th>
                            <th>STATUS</th>
                            <th>TYPE OF PAPER</th>
                            <th>PAGES</th>
                            <th>AMOUNT</th>
                            <th>WRITER</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td colspan="7">
                                <p class="p-2 center ">
                                    No Orders Found!
                                </p>
                            </td>
                        </tr>

                    </tbody>
                </table>
    </div>
</div>