<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller{
    //Dashboard
    public function index(){
        $data["title"] = "Customer | Dashboard";

        $this->load->view('templetes/customer/header', $data);
        $this->load->view('templetes/customer/nav', $data);
        $this->load->view('customers/dashboard', $data);
        $this->load->view('templetes/customer/footer');
    }

    public function auth($page){
        if($page === "register"){}
        else  if($page === "login"){
            $data["title"] = "Customer | Login";

            $email = $this->input->post("email");
            $password = $this->input->post("password");

            $enc_password = md5($password);

            
            $validate = $this->Customer_Model->customer_login($email, $enc_password);

            if($validate){
                $userdata = $this->Customer_Model->get_customer_data($email);
                $customer_data = array(
                    'customer_nickname' => $userdata['nickname'],
                    'customer_id' => $userdata['id'],
                    'customer_name' => $userdata['name'], 
                    'customeremail' => $userdata['email'],
                    'customer_level' => $userdata['level'],
                    'customer_number' => $userdata['number'],
                    'customer_login_status' => true
                );

                $this->session->set_userdata("customer_data", $customer_data);
                $this->session->set_flashdata("customer_login", "You are now Logged In!");
                $url = base_url("customer");
                redirect($url);

                //redirect to dashboard page
            }else{
                $data['title'] = "Customer | Login";
                $data['error'] = "User does not Exist";
                

                $this->load->view('templetes/customer/header', $data);
                $this->load->view('templetes/customer/nav', $data);
                $this->load->view('customers/login', $data);
                $this->load->view('templetes/customer/footer');
            }

            
        }
        else if($page === "logout"){
            $customer_data = array(
                'customer_login_status' => false
            );

            $this->session->unset_userdata("customer_data");
            $this->session->set_flashdata("customer_login", "You are now Logged Out!");
            $url = base_url("customer/auth/login");
            redirect($url);
        }
    }

    public function order($page, $order = null){
        if($page === "view" && $order != null){

            $data["title"] = "Customer | Orders";

            $this->load->view('templetes/customer/header', $data);
            $this->load->view('templetes/customer/nav', $data);
            $this->load->view('customers/view', $data);
            $this->load->view('templetes/customer/footer');
        }else if($page === "add" && $order === null){
            $data["title"] = "Customer | Add New Order";

            $this->load->view('templetes/customer/header', $data);
            $this->load->view('templetes/customer/nav', $data);
            $this->load->view('customers/add', $data);
            $this->load->view('templetes/customer/footer');
        }else if($page === "confirm" && $order == null){
            $data["title"] = "Customer | Confirm and Pay Order";

            $orderInfo = $this->input->post();

            $data["date"] = $orderInfo["date"]; 
            $data["time"] = $orderInfo["time"]; 
            $data["pages"] = $orderInfo["pages"]; 
            $data["topic"] = $orderInfo["topic"]; 
            $data["instructions"] = $orderInfo["instructions"]; 
            
            $this->load->view('templetes/customer/header', $data);
            $this->load->view('templetes/customer/nav', $data);
            $this->load->view('customers/confirm', $data);
            $this->load->view('templetes/customer/footer');
            
        }else if($page === "success" && $order !=NULL){
            // Get the transaction data
            $paypalInfo = $this->input->post(); 
           
            $data["title"]          = "Customer | Payment Success";
            $data['item_name']      = $paypalInfo['item_name'];
            $data['item_number']    = $paypalInfo['item_number'];
            $data['txn_id']         = $paypalInfo["txn_id"];
            $data['payment_amt']    = $paypalInfo["payment_gross"];
            $data['currency_code']  = $paypalInfo["mc_currency"];
            $data['status']         = $paypalInfo["payment_status"];
            $data["pay_date"]       = $paypalInfo["payment_date"];

            if(!empty($paypalInfo)){
                // Insert the transaction data in the database
                $txn_info['user_id']        = $paypalInfo["custom"];
                $txn_info['order_id']        = $paypalInfo["item_number"];
                $txn_info['txn_id']            = $paypalInfo["txn_id"];
                $txn_info['payment_gross']    = $paypalInfo["payment_gross"];
                $txn_info['currency_code']    = $paypalInfo["mc_currency"];
                $txn_info['payer_email']    = $paypalInfo["payer_email"];
                $txn_info['payment_status'] = $paypalInfo["payment_status"];

                $this->Admin_Model->insertTransaction($txn_info);
                // Validate and get the ipn response
                $ipnCheck = false;//$this->paypal_lib->validate_ipn($paypalInfo);

                // Check whether the transaction is valid
                if($ipnCheck){
                    // // Insert the transaction data in the database
                    // $data['user_id']        = $paypalInfo["custom"];
                    // $data['order_id']        = $paypalInfo["item_number"];
                    // $data['txn_id']            = $paypalInfo["txn_id"];
                    // $data['payment_gross']    = $paypalInfo["payment_gross"];
                    // $data['currency_code']    = $paypalInfo["mc_currency"];
                    // $data['payer_email']    = $paypalInfo["payer_email"];
                    // $data['payment_status'] = $paypalInfo["payment_status"];

                    // $this->Admin_Model->insertTransaction($data);
                }
            }
            
            // Pass the transaction data to view
            $this->load->view('templetes/customer/header', $data);
            $this->load->view('templetes/customer/nav', $data);
            $this->load->view('customers/paypal/success', $data);
            $this->load->view('templetes/customer/footer');
        }else if($page === "cancel" && $order !=NULL){
            // Get the transaction data
            $paypalInfo = $this->input->post();
            $data["title"]          = "Customer | Payment Canceled";
        
            // Pass the transaction data to view
            $this->load->view('templetes/customer/header', $data);
            $this->load->view('templetes/customer/nav', $data);
            $this->load->view('customers/paypal/cancel', $data);
            $this->load->view('templetes/customer/footer');
        }else if($page === "ipn"){
            // Paypal posts the transaction data
            $paypalInfo = $this->input->post();
            
            
        }
    }


    public function processPayment($id){
        //Set variables for paypal form
        $returnURL = base_url().'customer/order/success/1';
        $cancelURL = base_url().'customer/order/cancel/1';
        $notifyURL = base_url().'customer/order/ipn';
        
        // Get product data from the database
        $product = $id;//$this->product->getRows($id);
        
        // Get current user ID from the session
        $userID = "1";
        
        // Add fields to paypal form
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', "Order Topic");
        $this->paypal_lib->add_field('custom', $userID);
        $this->paypal_lib->add_field('item_number',  "1");
        $this->paypal_lib->add_field('amount',  "50");
        
        // Render paypal form
        $this->paypal_lib->paypal_auto_form();

    }

    public function orders(){
        $data["title"] = "Customer | Orders";

        $this->load->view('templetes/customer/header', $data);
        $this->load->view('templetes/customer/nav', $data);
        $this->load->view('customers/orders', $data);
        $this->load->view('templetes/customer/footer');
    }
}