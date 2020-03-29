<?php if (!$this->session->userdata["writer_data"]["writer_login_status"]) : ?>
    <?php
    $url = base_url("writers/login");
    redirect($url);
    ?>
<?php endif; ?>


<div class="row container-fluid animated fadeIn" style="padding: 5px 10px !important">
    <div class="col s2 md2 l2"></div>
    <div class="col s12 m12 l8">
        <div class="card">
            
            <div class="card-content">
            <div class="card-header">
                <h5 class="center">Order #<?=$order["id"]?></h5>
            </div>
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


                    <?php if ($order["status"] == "processing" || $order["status"] == "revision") : ?>
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
                                <button class="btn btn-small waves-effect blue white-text" id="saveFiles">Save Files</button>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <tr>
                        <td colspan="5">
                            <div id="msg_holder"></div>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="7">
                            <input type="hidden" value="<?php echo $order['id'] ?>" id="orderId" />
                            <?php if ($order["status"] == "available") : ?>
                                <?php if(count($processing) >= 1) : ?>
                                <p class="center red-text"><small>Finish Orders in Progress First
                                    before you can take other tasks
                                </small></p>
                                  <button class="btn right btn-md waves-effect blue white-text"
                                  disabled id="btnTakeOrder">Take Order</button>
                                <?php endif; ?>
                                <?php if(count($processing) == 0) : ?>
                                    
                                  <button class="btn right btn-md waves-effect blue white-text"
                                  id="btnTakeOrder">Take Order</button>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if ($order["status"] == "processing" || $order["status"] == "revision") : ?>
                                <button class="btn right btn-md waves-effect teal white-text" disabled id="btnCompleteOrder">Complete Order</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col s2 md2 l2"></div>
</div>



<div id="messagesModal" class="modal chatbox">

    <div class="chatlogs" id="messageHolder"></div>

    <div class="chat-form">
        <?php if ($order["status"] == "processing" || $order["status"] == "revision") : ?>
            <div class="input-field">
                <textarea name="messageInput" id="messageInput" class="materialize-textarea"></textarea>
                <label for="messageInput">Your Message</label>

                <input type="hidden" value="writer" id="messageSender">
                <input type="hidden" value="admin" id="messageRecipient">
                <input type="hidden" value="<?= $id; ?>" id="orderId">
                
                <input type="hidden" value="<?php echo $this->session->userdata["writer_data"]["writer_id"] ?>" id="writerId">
            </div>
            <button class="btn btn-md green white-text" id="sendOrderMessage">Send</button>
        <?php endif; ?>
    </div>


    <div class="modal-footer">
        <?php if ($order["status"] == "available" || $order["status"] == "disputed" || $order["status"] == "finished") : ?>
            <p class="center green p2 white-text">You Can only Send Messages if you are Assigned this Order</p>
        <?php endif; ?>
    </div>
</div>