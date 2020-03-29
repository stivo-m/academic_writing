
<?php if(isset($this->session->userdata["admin_data"]["admin_login_status"])) : ?>
    <?php if($this->session->userdata["admin_data"]["admin_login_status"]) : ?>
        <?php 
            $url = base_url("admin/dashboard");
            redirect($url);
        ?>
        
    <?php endif; ?>
<?php endif; ?>

<div class="row animated fadeIn" style="padding-top: 70px">
    <div class="col s12 m5 offset-m4">
        <div class="card teal darken-1">
            <div class="card-content white black-text">      
                <span class="card-title teal-text">Admin Login</span>
                <p class="card-text red-text">
                    <?=$error; ?>
                </p>
                <br>

                <?php echo form_open('admin/login'); ?>
                    <div class="input-field">
                        <input id="email" type="email" name="email" class="validate">
                        <label for="email">Enter Email</label>
                    </div>

                    <div class="input-field">
                        <input id="password" type="password" name="password" class="validate">
                        <label for="password">Enter Password</label>
                    </div>
                

                <button class="btn-large waves-effect waves-effect" type="submit" style="width: 100%">Login</button>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
        