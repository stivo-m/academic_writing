<?php if (!$this->session->userdata["customer_data"]["customer_login_status"]) : ?>
    <?php
    $url = base_url("customer/auth/login");
    redirect($url);
    ?>
<?php endif; ?>

<style>
    .card-text{
        font-size: 25px;
        font-weight: lighter;
        color: #26a69a;
    }

    .card-text.small{
        font-size: 17px;
        font-weight: lighter;
    }

    .card-text.medium{
        font-size: 23px;
        font-weight: lighter;
    }
   

fieldset, label { margin: 0; padding: 0; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 2px 0.5px;
  font-size: 1em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
    
    .bids{
        border: 1px solid #26a69a;
        border-radius: 10px;
        padding: 10px 20px;
        margin: 10px 5px;
    }

    .bids .profile i{
        font-size: 70px;
    }

    .bids .profile a{
        color: #26a69a;
    }

    .bids .name{
        font-size: 20px;
    }

    .bids .row{
        margin-bottom: 5px !important;
    }

    .bids .msg_count{
        background-color: red;
        color: #fff;
        border-radius: 50%;
        padding: 4px 8px;
    }

    .close{
        position: relative;
        right: 5px;
        top: 5px;
        display: none;
    }

    @media only screen and (max-width: 600px)
    {
        .profile{
            height: 50px;
        }
    }
</style>

<div class="container">
    <div class="row">
        <div class="col s12 m9 l9">
            <h5 class="card-text">
            Find the best writer for your paper below.
            </h5>
        </div>

        <div class="col s12 m3 l3">
            <span class="right">
                <a href="">Edit Order</a>
            </span>
        </div>
    </div>

    <div class="row">
        <label for="" class="small">Your Paper</label>
        <h6>Essay Type: Other</h6>
        <hr>
        <p class="card-text small">View the writers who best meet your project requirements.</p>

        <div class="col s12 m6 l6">
           <div class="bids">
               <div class="close">X</div>
            <div class="row">
                <div class="col s4 center profile">
                        <i class="material-icons">person</i>
                        <br>
                        <label for="" class="small">
                            <a href="#">View Profile</a>
                        </label>
                    </div>

                    <div class="col s8">
                        <h6 class="name">Prof. Shally</h6>
                        <label for="" class="small">45 finished Orders</label>
                        <br>
                        <label for="" class="small">
                            <div class="row">
                                <div class="col s2 center">
                                    90% 
                                </div>
                                <div class="col s10">
                                    <fieldset class="rating">
                                        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                        <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                        <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                        <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                        <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                    </fieldset>
                                    </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s4">
                        <button class="btn btn-flat disabled green-text card-text medium">
                            $69.00
                        </button>
                    </div>

                    <div class="col s4">
                        <button class="btn-small white black-text waves-effect waves-dark">
                            Chat
                            
                        </button>
                    </div>

                    <div class="col s4">
                        <button class="btn-small green white-text waves-effect waves-dark">
                            Accept
                        </button>
                    </div>
                </div>
           </div>
        </div>
        <div class="col s12 m6 l6">
           <div class="bids">
            <div class="row">
                <div class="col s4 center profile">
                        <i class="material-icons">person</i>
                        <br>
                        <label for="" class="small">
                            <a href="#">View Profile</a>
                        </label>
                    </div>

                    <div class="col s8">
                        <h6 class="name">Prof. Shally</h6>
                        <label for="" class="small">45 finished Orders</label>
                        <br>
                        <label for="" class="small">
                            <div class="row">
                                <div class="col s2 center">
                                    90% 
                                </div>
                                <div class="col s10">
                                    <fieldset class="rating">
                                        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                        <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                        <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                        <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                        <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                    </fieldset>
                                    </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s4">
                        <button class="btn btn-flat disabled green-text card-text medium">
                            $69.00
                        </button>
                    </div>

                    <div class="col s4">
                        
                        <button class="btn-small white black-text waves-effect waves-dark">
                            Chat
                            <span class="msg_count">2</span>
                        </button>
                    </div>

                    <div class="col s4">
                        <button class="btn-small green white-text waves-effect waves-dark">
                            Accept
                        </button>
                    </div>
                </div>
           </div>
        </div>
        <div class="col s12 m6 l6">
           <div class="bids">
            <div class="row">
                <div class="col s4 center profile">
                        <i class="material-icons">person</i>
                        <br>
                        <label for="" class="small">
                            <a href="#">View Profile</a>
                        </label>
                    </div>

                    <div class="col s8">
                        <h6 class="name">Prof. Shally</h6>
                        <label for="" class="small">45 finished Orders</label>
                        <br>
                        <label for="" class="small">
                            <div class="row">
                                <div class="col s2 center">
                                    90% 
                                </div>
                                <div class="col s10">
                                    <fieldset class="rating">
                                        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                        <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                        <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                        <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                        <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                    </fieldset>
                                    </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s4">
                        <button class="btn btn-flat disabled green-text card-text medium">
                            $69.00
                        </button>
                    </div>

                    <div class="col s4">
                        <button class="btn-small white black-text waves-effect waves-dark">
                            Chat
                            <span class="msg_count">2</span>
                        </button>
                    </div>

                    <div class="col s4">
                        <button class="btn-small green white-text waves-effect waves-dark">
                            Accept
                        </button>
                    </div>
                </div>
           </div>
        </div>
    </div>
</div>