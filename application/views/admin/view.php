<?php if (!$this->session->userdata["admin_data"]["admin_login_status"]) : ?>
    <?php
    $url = base_url("admin");
    redirect($url);
    ?>
<?php endif; ?>


<div class="main-panel">
     <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Order <?=$order["id"]?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="<?php echo base_url("admin/settings"); ?>">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo base_url("admin/logout"); ?>">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
    </nav>  


    <!-- End of Nav -->
<div class="content">

<div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Order <?=$order["id"]?></h4>
                  <p class="card-category">Order Status: <?php echo ucfirst($order["status"])?></p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <b>Title: </b> <?php echo $order['title'] ?>
                        </div>
                         <div class="col-md-6">
                            <b>Pages: </b> <?php echo $order['pages'] ?> pages
                        </div>
                        
                        <div class="col-md-6">
                            <b>Sources: </b> <?php echo $order['sources'] ?> sources
                        </div>
                         <div class="col-md-6">
                            <b>Format: </b> <?php echo $order['format'] ?>
                        </div>

                        <div class="col-md-6">
                            <b>Level: </b> <?php echo $order['level'] ?>
                        </div>
                        <div class="col-md-6">
                            <b>Spacing: </b> <?php echo $order['spacing'] ?>
                        </div>

                        <div class="col-md-6">
                            <b>Deadline: </b> <?php echo $order['date_deadline'] . " : " . $order['time_deadline'] ?>
                        </div>
                        <div class="col-md-6">
                            <b>Cost: </b> Ksh. <?php echo $order['cost'] ?>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="card-title">
                                <b>Order Instructions</b>
                            </h5>
                        </div>

                        <div class="col-md-12">
                            <br>
                            <p class="card-content">
                                <?php echo $order['instructions'] ?>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <p class="card-content">
                                <b>Order Files</b>
                            </p>
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

                            <div class="blue white-text badge center" id="filesMsg" style="width: 100%"></div>
                        </div>

                        <div class="col-md-12 file-field input-field">
                            <div class="btn">
                                
                                <input type="file" id="file_input" name="files[]" multiple>
                            </div>

                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="hidden" placeholder="Upload one or more files">
                            </div>
                        </div>
                        
                    </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Admin Actions</h4>
                  <p class="card-category">Assess and Edit the Work Below</p>
                </div>
                <div class="card-body">
                    <div class="row">
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


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <input type="hidden" id="oId" value="<?php echo $order['id'] ?>" />
                            <?php if ($order['status'] == "available") : ?>
                                <label class="bmd-label-floating">Select Writer to Assign Order</label>
                                <div class="form-group">
                                    <select class="form-control" id="selectedWriter">
                                        <option value="" id="format" name="format" disabled selected>Chose Writer to Assign Order</option>
                                        <?php foreach ($writers as $writer) : ?>
                                            <?php if ($writer["status"] != 0) : ?>
                                                <option class="form-control"  value="<?php echo $writer["id"] ?>">#<?php echo $writer["id"] ?>: <?php echo $writer["name"] ?>: <?php echo $writer["email"] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    

                                    <button class="waves-effect btn btn-md blue white-text" id="assignOrderBtn">Assign</button>

                                    <hr>
                                </div>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>

              </div>
            </div>
          </div>
        </div>
</div>