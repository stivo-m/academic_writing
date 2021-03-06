<?php if (isset($this->session->userdata["writer_data"]["writer_login_status"])) : ?>
    <?php if ($this->session->userdata["writer_data"]["writer_login_status"]) : ?>
        <?php
        $url = base_url("writers/dashboard");
        redirect($url);
        ?>
    <?php endif; ?>
<?php endif; ?>

<div class="container-fluid">
    <div class="content">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-12 text-center">
                <img src="<?php echo base_url('assets/images/icon.png') ?>" alt="" class="logo center">
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Writer Login</h4>
                        <p class="card-category">
                            Please Login Below
                            <br>
                            <span class="text-warning"><?= $error; ?></span>
                        </p>
                    </div>
                    <div class="card-body">
                        <?php echo form_open('writers/login'); ?>
                        <div class="form-group">
                            <input id="email" type="email" name="email" class="validate form-control">
                            <label class="bmd-label-floating" for="email">Enter Email</label>
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" name="password" class="validate form-control">
                            <label class="bmd-label-floating" for="password">Enter Password</label>
                        </div>
                        <br>

                        <button class="btn btn-primary " type="submit" style="width: 100%">Login</button>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>