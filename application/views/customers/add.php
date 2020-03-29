<?php if (!$this->session->userdata["customer_data"]["customer_login_status"]) : ?>
    <?php
    $url = base_url("customer/auth/login");
    redirect($url);
    ?>
<?php endif; ?>


<style>
    .input-field .prefix.right{
        right: 0;
    }

    .btn-small .custom{
        font-size: 12px !important;
    }

    .custom .active{
        background-color: green;
    }

    .row{
        margin-bottom: 5px !important;
    }

    .orderInstructions{
        height: 250px;
        overflow-y: scroll;
        padding: 10px 15px;
        border-radius: 8px;
        border-color: #26a69a;
        resize: none;
    }

    .fixed{
        position: fixed;
        z-index: 1000000;
        top: 90px;
        right: 10px;
    }

    .fixed p{
        padding: 20px 10px;
        border-radius: 50%;
    }
</style>

<div class="container customized" onload="updateWpp()">
<div class="row">
    <div class="col s12">
        <div class="right">
            <div class="fixed">
                <p class="badge red white-text" id="price_tag">
                    $00.00
                </p>
            </div>
        </div>
    </div>
    <div class="col s12 m12 l5">
        <div class="row">
            <div class="col s12">
                    <label for="" class="small mb-3">Type of Service</label>
                    <br>
                    <div class="row">
                        <button class="btn btn-small custom blue-grey darken-2  white-text btn-flat active btn-med col s4">
                            Writing
                        </button>
                        <button class="btn btn-small custom btn-flat btn-med col s4">
                            Rewriting
                        </button>
                        <button class="btn btn-small custom btn-flat btn-med col s4">
                            Editing
                        </button>
                    </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <label for="" class="small">Your Deadline</label>
                <div class="row">
                    <div class="col s7 input-field">
                        <input type="text" id="date" placeholder="Date" 
                        class="datepicker">
                    </div>
                    <div class="col s5 input-field">
                        <input type="text" id="time" placeholder="Time" 
                        class="timepicker">
                    </div>
                </div>
        </div>
        </div>

        <div class="row">
            <div class="col s12">
                <label for="" class="small">Number of Pages</label>
                <div class="input-group row">
                    <div class="input-group-btn col s2">
                        <button id="down" class="btn btn-default blue-grey darken-2 " 
                            onclick=" down('1')">
                            -
                        </button>
                    </div>

                    <input type="number"  id="pages"
                    class="col s2 center" onchange="updateWpp()"
                    value="1" min="1" max="50"/>
                    
                    <div class="input-group-btn col s2">
                        <button id="up" class="btn btn-default blue-grey darken-2 " 
                            onclick="up('50')">
                        +
                        </button>
                    </div>
                    <div class="col s1"></div>
                    <label id="wpp" class="small col s5">
                        275 Words (Double Spaced)
                    </label>
                </div>
        </div>
        </div>

        <div class="row">
            <div class="col s12">
                <label for="" class="small">Select Your Subject</label>
                <div class="input-field">
                    <select id="subject">
                        <option value="0" selected>Other</option>
                        <option value="1">English</option>
                        <option value="2">History</option>
                        <option value="3">Nursing</option>
                        <option value="3">Education</option>
                        <option value="3">Psychology</option>
                        <option value="3">Nursing</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <label for="" class="small">Topic</label>
                <div class="input-field">
                    <input type="text"  id="topic" placeholder="Order Topic" >
                </div>
            </div>
        </div>
    </div>

    <div class="col s12 l2"></div>

    <div class="col s12 m12 l5">
        <div class="row">
            <div class="col s12">
                <label for="" class="small">Your Order Instructions</label>
                <div class="input-field col s12">
                    <textarea id="instructions"
                     class="orderInstructions"
                    placeholder="Any Special information about the oder that we should know? Here you can give detailed instructions"
                     ></textarea>
                </div>
            </div>

            <div class="col s12">
                <label for="" class="small ">Your Files</label>
                <form action="#">
                    <div class="file-field input-field ">
                        <div class="btn blue-grey darken-2">
                            <span cl>Files</span>
                            <input type="file" multiple>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload one or more files">
                        </div>
                    </div>
                </form>
            </div>

            <div class="col s12 center">
                <button id="continue" class="btn btn-wide blue-grey darken-2  waves-effect waves-light">
                    Get Writer's Offers
                    <i class="material-icons right">chevron_right</i>
                </button>
            </div>
        </div>
    </div>
</div>

    
</div>
