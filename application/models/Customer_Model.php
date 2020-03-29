<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_Model extends CI_Model
{
    public function customer_login($email, $password){
        $this->db->where("email", $email);
        $this->db->where("password", $password);
        $result = $this->db->get("customer");

        if($result->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }

    public function get_customer_data($email){
        $admin = $this->db->get_where("customer", array('email' => $email));
        return $admin->row_array();
    }
}