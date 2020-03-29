<?php if(!$this->session->userdata["admin_data"]["admin_login_status"]) : ?>
    <?php 
        $url = base_url("admin");
        redirect($url);
    ?>
<?php endif; ?>


<div class="row container animated fadeIn">
    <div class="col s12">
        <div class="card">  
            <div class="card-content">
                <h3 class="card-title">
                    Writers
                </h3>

                <span class="badge right green white-text"><?php echo count($writers)?> Total Writers</span>

                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>STATUS</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($writers as $writer) : ?>
                            <tr>
                                <td>
                                    <?php echo $writer["id"]?>
                                </td>


                                <td>
                                    <?php echo $writer["name"]?>
                                </td>

                                <td>
                                    <?php echo $writer["email"]?>
                                </td>

                                <td>
                                    <?php echo ($writer["status"] ? "<span class='badge badge-green green-text'>Verified</span>" : "<span class='badge badge-red red-text'>Unverified</span>"); ?>
                                </td>

                                <td>
                                    <input type="hidden" id="writerId" value="<?php echo $writer['id']?>"/>
                                    <a href="<?php echo base_url("admin/writers/" . $writer['id']) ?>" class="btn btn-md green white-text">View</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="fixed-action-btn">
  <a class="btn-floating btn-large red">
    <i class="large material-icons">add</i>
  </a>

  <ul>
    <li><a class="btn-floating red tooltipped modal-trigger" href="#add_writer" data-position="left" data-tooltip="Add new Writer"><i class="material-icons">person_add</i></a></li>
    <li><a class="btn-floating blue tooltipped modal-trigger" href="#inviteWriter" data-position="left" data-tooltip="Invite New Writer"><i class="material-icons">insert_link</i></a></li>
    <li><a class="btn-floating green tooltipped modal-trigger" href="#sendGlobalMessage" data-position="left" data-tooltip="Send Global Message"><i class="material-icons">email</i></a></li>
  </ul>

</div>
      
<!-- Add Writer Modal Structure -->
<div id="add_writer" class="modal">
    <div class="modal-content">
      <h4>Add New Writer</h4>
      <p class="center" id="writer_reg_message"></p>
      <hr>
        <?php echo form_open('admin/add_writer'); ?>
            <div class="row">
                <div class="col s12">
                    <div class="input-field">
                        <input id="writerName" type="text" name="writerName" class="validate">
                        <label for="writerName">Writer Name</label>
                    </div>
                </div>

                <div class="col s12 m6 l6">
                    <div class="input-field">
                        <input id="writerEmail" type="email" name="writerEmail" class="validate">
                        <label for="writerEmail">Writer Email</label>
                    </div>
                </div>
                <div class="col s12 m6 l6">
                    <div class="input-field">
                        <input id="writerNumber" type="number" name="writerNumber" class="validate">
                        <label for="writerNumber">Mobile Number</label>
                    </div>
                </div>

            </div>
        <?php echo form_close(); ?>
    </div>
    <div class="modal-footer">
      <a href="#!" class="waves-effect waves-green blue white-text btn-flat" id="btn_add_writer">Add Writer</a>
    </div>
</div>



<!-- Invite Writer Modal Structure -->
<div id="inviteWriter" class="modal">
    <div class="modal-content">
      <h4>Invite New Writer</h4>
      <p class="center" id="writer_reg_message"></p>
      <hr>
        <?php echo form_open('admin/invite'); ?>
            <div class="row">
                <div class="col s12">
                    <div class="input-field">
                        <input id="inviteEmail" type="email" name="inviteEmail" class="validate">
                        <label for="inviteEmail">Writer Email</label>
                    </div>
                </div>
                
                <div class="col s12">
                    <div class="input-field">
                        <textarea id="inviteMessage" class="materialize-textarea"></textarea>
                        <label for="inviteMessage">Invitation Message</label>
                    </div>
                </div>

            </div>
        <?php echo form_close(); ?>
    </div>
    <div class="modal-footer">
      <a href="#!" class="waves-effect waves-green blue white-text btn-flat" id="btnInviteWriter">Invite Writer</a>
    </div>
</div>



<div id="sendGlobalMessage" class="modal">
    <div class="modal-content">
      <h4 class=""center>Send Global Message</h4>
      <p class="center" id="writer_reg_message"></p>

        <?php echo form_open('admin/sendGlobalMessage'); ?>
            <div class="card">
                <div class="card-content">
                    <h6 class="center card-heading">
                        Enter Message Details
                    </h6>

                    <div class="row">
                        <div class="col s12">
                            <div class="input-field">
                                <input id="msgTitle" type="text" name="msgTitle" class="validate">
                                <label for="msgTitle">Message Title</label>
                            </div>
                        </div>
                        
                        <div class="col s12">
                            <div class="input-field">
                                <textarea id="msg" class="materialize-textarea"></textarea>
                                <label for="msg">Message Body</label>
                            </div>
                        </div>
                    </div>

                    <a href="#!" class="waves-effect waves-green blue white-text btn-flat" id="btnSendGlobalMessage">Send Message</a>
      <?php echo form_close(); ?>
                </div>
            </div>
        
    </div>

</div>
