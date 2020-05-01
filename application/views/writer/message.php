<?php if (!$this->session->userdata["writer_data"]["writer_login_status"]) : ?>
  <?php
    $url = base_url("writers");
    redirect($url);
    ?>
<?php endif; ?>