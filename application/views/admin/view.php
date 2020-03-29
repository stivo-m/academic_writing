<?php if (!$this->session->userdata["admin_data"]["admin_login_status"]) : ?>
    <?php
    $url = base_url("admin");
    redirect($url);
    ?>
<?php endif; ?>


<div class="row container-fluid" style="padding: 5px 10px !important">
    <div class="col s12 m12 l7">
        <div class="card animated fadeIn">
            <div class="card-content">
                <table class="responsive-table">
                    <span class="badge right blue white-text">Status: <?php echo ucfirst($order['status']) ?></span>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>LEVEL</th>
                            <th>DEADLINE</th>
                            <th>SPACING</th>
                            <th>PAGES</th>
                            <th>SOURCES</th>
                            <th>FORMAT</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>#<?php echo $order['id'] ?></td>
                            <td><?php echo $order['level'] ?></td>
                            <td><?php echo $order['date_deadline'] . " : " . $order['time_deadline'] ?></td>
                            <td><?php echo $order['spacing'] ?></td>
                            <td><?php echo $order['pages'] ?> Pages <small>(<?php echo $order['pages'] * 275 ?> Words Per Page)</small></td>
                            <td><?php echo $order['sources'] ?> Sources</td>
                            <td><?php echo $order['format'] ?></td>
                        </tr>
                    </tbody>
                </table>

                <table>
                    <tr>
                        <td colspan="7"><b>Title: </b><?php echo $order['title'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="7"><b>Instructions: </b><br><?php echo $order['instructions'] ?></td>
                    </tr>

                    <tr>
                    <td colspan="7"><b>Files: <?php echo count($files)?></b>
                            <br> 
                            <?php if(!empty($files)) : ?>
                            <ul class="collection" style="max-height: 300px; overflow-y: scroll">
                                <?php foreach($files as $file) : ?>
                                    <li class="collection-item">
                                        <a href="<?php echo base_url(). 'writers/download/'.$file["filename"]?>" >
                                            <?php echo $file["filename"]?>
                                        </a>

                                        <small class="right"> Uploaded By: 
                                        <?php echo 
                                            $file["uploaded_by"] == "admin" ? 
                                            "<span class='green-text'>" . ucfirst($file["uploaded_by"]) ."</span>" 
                                            : "<span class='blue-text'>" . ucfirst($file["uploaded_by"]) ."</span>" 
                                        ?> 
                                        </small>
                                        <br>
                                        <small class="green-text"> 
                                        Uploaded On: <?php echo ucfirst($file["uploaded_on"]) ?>
                                        </small>
                                    
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>

                            <?php if(empty($files)) : ?>
                                <div class="blue white-text badge center" id="filesMsg" style="width: 100%">
                                    No Files for this Order
                                </div>
                            <?php endif; ?>

                            <div class="blue white-text badge center" id="filesMsg" style="width: 100%">
                                    
                                </div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="5">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Order Files</span>
                                    <input type="file" id="file_input" name="files[]" multiple>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload one or more files">
                                </div>
                            </div>
                        </td>

                        <td colspan="2">
                        <input type="hidden" value="<?php echo $order['id'] ?>" id="orderId" />
                            <button class="btn btn-small waves-effect blue white-text" id="saveFiles">Save Files</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- <div class="col s12 m5 l5">
        <div class="card animated fadeIn">
            <div class="card-content">
                <h6 class="card-title">Order Messages</h6>
                <div class="chatbox">
                    <div class="chatlogs" id="messageHolder"></div>

                    <div class="chat-form">
                        <div class="input-field">
                            <textarea name="messageInput" id="messageInput" class="materialize-textarea"></textarea>
                            <label for="messageInput">Your Message</label>

                            <input type="hidden" value="admin" id="messageSender">
                            <input type="hidden" value="writer" id="messageRecipient">
                            <input type="hidden" value="<?php echo $order["id"] ?>" id="orderId">
                            <input type="hidden" value="<?php echo $order["writer_id"] ?>" id="writerId">

                           
                        </div>
                        <button class="btn btn-md green white-text" id="sendOrderMessage">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="col s12 m12 l5">
        <div class="container">
            <div class="card-content">
                <h5 class="card-title">
                    Quick Actions
                    <br>
                    <p class="center" id="writer_message"></p>
                </h5>

                <input type="hidden" id="oId" value="<?php echo $order['id'] ?>" />
                <?php if ($order['status'] == "available") : ?>
                    <div class="input-field">
                        <select id="selectedWriter">
                            <option value="" id="format" name="format" disabled selected>Chose Writer to Assign Order</option>
                            <?php foreach ($writers as $writer) : ?>
                                <?php if ($writer["status"] != 0) : ?>
                                    <option value="<?php echo $writer["id"] ?>">#<?php echo $writer["id"] ?>: <?php echo $writer["name"] ?>: <?php echo $writer["email"] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <label>Select Writer to Assign Order</label>

                        <button class="waves-effect btn btn-md blue white-text" id="assignOrderBtn">Assign</button>

                        <hr>
                    </div>

                <?php endif; ?>

                <div class="row center">
                    <?php if ($order["status"] == "available") : ?>
                        <div class="col s3">
                            <button class="waves-effect btn btn-md purple white-text" id="editBtn">Edit</button>
                        </div>
                    <?php endif; ?>


                    <?php if ($order["status"] == "completed") : ?>
                        <div class="col s3">
                            <button class="waves-effect btn btn-md purple white-text" id="revisionOrderBtn">Revision</button>
                        </div>
                    <?php endif; ?>

                    <?php if ($order["status"] == "processing" || $order["status"] == "revision" || $order["status"] == "completed") : ?>
                        <div class="col s3">
                            <button class="waves-effect btn btn-md blue white-text" id="reasignOrderBtn">Reasign</button>
                        </div>
                    <?php endif; ?>

                    <div class="col s3">
                        <button class="waves-effect btn btn-md red white-text" id="deleteOrderBtn">Delete</button>
                    </div>

                    <?php if ($order["status"] == "completed") : ?>
                        <div class="col s3">
                            <button class="waves-effect btn btn-md yellow black-text" id="disputeOrderBtn">Dispute</button>
                        </div>

                        <div class="col s3">
                            <button class="waves-effect btn btn-md green white-text" id="finishOrderBtn">Finish</button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>