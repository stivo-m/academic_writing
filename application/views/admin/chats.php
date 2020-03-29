<?php if(!$this->session->userdata["admin_data"]["admin_login_status"]) : ?>
    <?php 
        $url = base_url("admin");
        redirect($url);
    ?>
<?php endif; ?>

<div class="container-fluid row animated fadeIn" style="padding: 10px 20px !important;">
    <div class="col s12 m5 l5 hide-on-med-and-down">
        <div class="card">
            <div class="card-content chat_list">
                <h6 class="card-heading center">Chat List</h6>
                <ul class="collection holder" style="max-height: 450px; height: 450px; overflow-y: scroll; overflow-x: hidden">

                    <li class="collection-item avatar">
                        <a href="#" class="black-text">
                            <i class="material-icons circle">message</i>
                            <span class="title">Request for Information</span>
                            <p> 
                                <small>Order: #55231
                                <br>
                                Writer: Writer@gmail.com</small>
                            </p>
                            <p class="secondary-content">
                                <span class="new badge green white-text center">0</span>
                            </p>
                        </a>
                    </li>

                    <li class="collection-item avatar">
                        <a href="#" class="black-text">
                            <i class="material-icons circle">message</i>
                            <span class="title">Reassign Reuquest</span>
                            <p> 
                                <small>Order: #2803
                                <br>
                                Writer: dflaj@gmail.com</small>
                            </p>
                            <p class="secondary-content">
                                <span class="new badge green white-text center">0</span>
                            </p>
                        </a>
                    </li>  

                    <li class="collection-item avatar">
                        <a href="#" class="black-text">
                            <i class="material-icons circle">message</i>
                            <span class="title">Request for Files</span>
                            <p> 
                                <small>Order: #85662
                                <br>
                                Writer: dafda@test.com</small>
                            </p>
                            <p class="secondary-content">
                                <span class="new badge green white-text center">0</span>
                            </p>
                        </a>
                    </li> 
                    
                    <li class="collection-item avatar">
                        <a href="#" class="black-text">
                            <i class="material-icons circle">message</i>
                            <span class="title">Request for Information</span>
                            <p> 
                                <small>Order: #55231
                                <br>
                                Writer: Writer@gmail.com</small>
                            </p>
                            <p class="secondary-content">
                                <span class="new badge green white-text center">0</span>
                            </p>
                        </a>
                    </li>

                    <li class="collection-item avatar">
                        <a href="#" class="black-text">
                            <i class="material-icons circle">message</i>
                            <span class="title">Reassign Reuquest</span>
                            <p> 
                                <small>Order: #2803
                                <br>
                                Writer: dflaj@gmail.com</small>
                            </p>
                            <p class="secondary-content">
                                <span class="new badge green white-text center">0</span>
                            </p>
                        </a>
                    </li>  

                    <li class="collection-item avatar">
                        <a href="#" class="black-text">
                            <i class="material-icons circle">message</i>
                            <span class="title">Request for Files</span>
                            <p> 
                                <small>Order: #85662
                                <br>
                                Writer: dafda@test.com</small>
                            </p>
                            <p class="secondary-content">
                                <span class="new badge green white-text center">0</span>
                            </p>
                        </a>
                    </li>           
                    
                </ul>
            </div>
        </div>
    </div>


    <div class="col s12 m 12 l7 ">
        <div class="card">
            <div class="card-content">
                <div class="chatbox">
                    <div class="chatlogs" id="messageHolder"></div>

                    <div class="chat-form">
                        <div class="input-field">
                            <textarea name="messageInput" id="messageInput" class="materialize-textarea"></textarea>
                            <label for="messageInput">Your Message</label>

                            <input type="hidden" value="admin" id="messageSender">
                            <input type="hidden" value="writer" id="messageRecipient">
                            <input type="hidden" value="<?=$id; ?>" id="orderId">
                            <input type="hidden" value="<?=$writerId?>" id="writerId">
                        </div>
                        <button class="btn btn-md green white-text" id="sendOrderMessage">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>