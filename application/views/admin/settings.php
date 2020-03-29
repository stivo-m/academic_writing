<?php if(!$this->session->userdata["admin_data"]["admin_login_status"]) : ?>
    <?php 
        $url = base_url("admin");
        redirect($url);
    ?>
<?php endif; ?>


<div class="container row animated fadeIn">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <h5 class="center heading-content">Site Settings</h5>
                <br>

                <ul class="collection">
                    <li class="collection-item">Writer Registration: 
                        <span class="right">
                            <div class="switch">
                                <label>off
                                    <input type="checkbox" 
                                        <?php 
                                            echo $settings["writer_registration"] ? "checked='checked'" : "";
                                        ?>
                                    >
                                    <span class="lever"></span>on
                                </label>
                            </div>
                        </span>
                    </li>


                    <li class="collection-item">Site Notifications: 
                        <span class="right">
                            <div class="switch">
                                <label>off
                                    <input type="checkbox" 
                                        <?php 
                                            if($settings["notifications"] == 1)
                                            {
                                                echo "checked='checked'";
                                            }
                                        ?>
                                    >
                                    <span class="lever"></span>on
                                </label>
                            </div>
                        </span>
                    </li>


                    <li class="collection-item">Writer Login: 
                        <span class="right">
                            <div class="switch">
                                <label>off
                                    <input type="checkbox" 
                                        <?php 
                                            if($settings["writer_login"] == 1)
                                            {
                                                echo "checked='checked'";
                                            }
                                        ?>
                                    >
                                    <span class="lever"></span>on
                                </label>
                            </div>
                        </span>
                    </li>


                    <li class="collection-item">Writers Access to Orders: 
                        <span class="right">
                            <div class="switch">
                                <label>off
                                    <input type="checkbox" 
                                        <?php 
                                            if($settings["order_access"] == 1)
                                            {
                                                echo "checked='checked'";
                                            }
                                        ?>
                                    >
                                    <span class="lever"></span>on
                                </label>
                            </div>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>