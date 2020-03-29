
<div class="row"></div>
<div class="row center">
<div class="col s12 md4 l4"></div>
<div class="col s12 md4 l4">
    <div class="card cardHover" style="padding: 10px 5px;">


        <div class="card-header center">
            <h5 class="center card-title">Login Below</h5>
             <p class="card-text red-text" style="font-size: 14px;"><?=$error;?></p>
        </div>

        <div class="card-body" style="padding: 5px;">
            <p class=" card-text" style="font-size: 14px;">
                
                <?php echo form_open('customer/auth/login'); ?>
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
            </p>
        </div>
    </div>
</div>
<div class="col s12 md4 l4"></div>
</div>