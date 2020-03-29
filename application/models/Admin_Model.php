<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
    public function admin_login($email, $password){
        $this->db->where("email", $email);
        $this->db->where("password", $password);
        $result = $this->db->get("admin");

        if($result->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }

    public function get_admin_data($email){
        $admin = $this->db->get_where("admin", array('email' => $email));
        return $admin->row_array();
    }

    public function get_orders($status){
        $this->db->where("status", $status);
        $this->db->order_by('added_on','DESC');
        $orders = $this->db->get("orders");
        return $orders->result_array();
    }

    public function get_order($id){
        $this->db->where("id", $id);
        $orders = $this->db->get("orders");
        return $orders->row_array();
    }


    public function get_writers(){
        $result = $this->db->get("writers");
        return $result->result_array();
    }


    public function get_writer($id){
        $this->db->where("id", $id);
        $result = $this->db->get("writers");
        return $result->row_array();
    }


    public function add_order($order_data){
        return $this->db->insert("orders", $order_data);
    }


    public function assignOrder($order, $writer){
        $this->db->where("id", $order);
        $data = array(
            'writer_id' => $writer,
            'status' => 'processing'
        );

        $result = $this->db->update("orders", $data);
        echo $result ? "<p class='green center white-text p-2 animated fadeIn'><small>Order Successfully Assigned</small></p>" :
         "<p class='red center white-text p-2 animated fadeIn'><small>An Error Occured</small></p>";
    }

    public function re_assignOrder($order){
        $this->db->where("id", $order);
        $data = array(
            'writer_id' => "0",
            'status' => 'available'
        );

        $result = $this->db->update("orders", $data);
        echo $result ? "<p class='green center white-text p-2 animated fadeIn'><small>Order Reassigned</small></p>" :
         "<p class='red center white-text p-2 animated fadeIn'><small>An Error Occured</small></p>";
    }


    public function setOnRevision($order){
        $this->db->where("id", $order);
        $data = array(
            'status' => 'revision'
        );

        $result = $this->db->update("orders", $data);
        echo $result ? "<p class='green center white-text p-2 animated fadeIn'><small>Order Set on Revision</small></p>" :
         "<p class='red center white-text p-2 animated fadeIn'><small>An Error Occured</small></p>";
    }


    public function setOnDispute($order){
        $this->db->where("id", $order);
        $data = array(
            'status' => 'dispute'
        );

        $result = $this->db->update("orders", $data);
        echo $result ? "<p class='green center white-text p-2 animated fadeIn'><small>Order Set on Dispute!</small></p>" :
         "<p class='red center white-text p-2 animated fadeIn'><small>An Error Occured</small></p>";
    }


    public function finishOrder($order){
        $this->db->where("id", $order);
        $data = array(
            'status' => 'finished'
        );

        $result = $this->db->update("orders", $data);
        echo $result ? "<p class='green center white-text p-2 animated fadeIn'><small>Order Finished</small></p>" :
         "<p class='red center white-text p-2 animated fadeIn'><small>An Error Occured</small></p>";
    }

    public function updateOrderInfo($order, $updates){
        $this->db->where("id", $order);
        
        $result = $this->db->update("orders", $updates);
        return $result;
    }


    public function deleteOrder($order){
        $this->db->where("id", $order);
        $result = $this->db->delete("orders");
        echo $result ? "<p class='green center white-text p-2 animated fadeIn'><small>Order Deleted</small></p>" :
         "<p class='red center white-text p-2 animated fadeIn'><small>An Error Occured</small></p>";
    }


    public function payOrder($order){
        $this->db->where("id", $order);
        $data = array(
            'status' => 'paid',
            'payment_date' => now()
        );

        $result = $this->db->update("orders", $data);
        echo $result ? "<p class='green center white-text p-2 animated fadeIn'><small>Order Paid</small></p>" :
         "<p class='red center white-text p-2 animated fadeIn'><small>An Error Occured</small></p>";
    }

    public function createInvoice($invoiceData){
    
        $this->db->where("status", "finished");
        $this->db->where("writer_id", $invoiceData["writer_id"]);
        
        $result = $this->db->insert("invoice_list", $invoiceData);

        // if(!$result){
        //     $this->db->where("writer_id", $invoiceData["writer_id"]);
        //     $info = $this->db->get("invoice_list");
        //     $data = array();

        //     foreach($info->result_array() as $d){
        //         $data["id"] = $d["id"];
        //     };

        //     foreach($finished as $order){
        //         $updateData = array(
        //             'invoice_id' => $data["id"][0],
        //             "order_id" => $order["id"]
        //         );
        //         $this->db->insert("invoices", $updateData);
        //     }
        // }

        
        echo $result ? "<p class='green center white-text p-2 animated fadeIn'><small>Invoice Successfully Created</small></p>" :
         "<p class='red center white-text p-2 animated fadeIn'><small>An Error Occured</small></p>";
    }

    public function payInvoice($invoiceId, $invoiceData){
        $result = null;
        if($invoiceData != null && $invoiceId != null){
            $this->db->where("id", $invoiceId);
            $result = $this->db->update("invoice_list", $invoiceData);
        }

        echo $result ? "<p class='green center white-text p-2 animated fadeIn'><small>Invoice Paid</small></p>" :
        "<p class='red center white-text p-2 animated fadeIn'><small>An Error Occured</small></p>";

    }

    public function getInvoicedOrders($id = NULL){
        $result = null;
        if($id == NULL){
            $this->db->where("status", "finished");
            $this->db->where("invoiced", "1");
            $result = $this->db->get("orders");
        }
        else{
            $this->db->where("writer_id", $id);
            $this->db->where("status", "finished");
            $this->db->where("invoiced", "1");
            $result = $this->db->get("orders");
        }
        
        return $result->result_array();
    }

    public function getInvoices($id = NULL){
        $result = null;
       if($id == NULL){
            $result = $this->db->get("invoice_list");
       }else{
            $this->db->where("writer_id", $id);
            $result = $this->db->get("invoice_list");
       }
        return $result->result_array();
    }

    //writers
    public function setWriterOnProbation($writer){
        $this->db->where("id", $writer);
        $data = array(
            //probation Status
            'status' => '3',
        );

        $result = $this->db->update("writers", $data);
        echo $result ? "Writer Status is now Probation" : "An Error Occured";
    }

    public function removeWriter($writer){
        $this->db->where("id", $writer);
        $result = $this->db->delete("writers", $writer);
        echo $result ? "Writer Status is now Removed" : "An Error Occured";
    }

    public function updateWriterInfo($writer, $updates){
        $this->db->where("id", $writer);
        $result = $this->db->update("writers", $updates);
        echo $result ? "Writer Updated" : "An Error Occured";
    }

    //site settings
    public function setWriterLoginStatus($value){
        $data = array(
            'writer_login' => $value,
        );

        $result = $this->db->update("settings", $data);
        echo $result ? "Settings Updated" : "An Error Occured";
    }

    public function setWriterRegistrationStatus($value){
        $data = array(
            'writer_registration' => $value,
        );

        $result = $this->db->update("settings", $data);
        echo $result ? "Settings Updated" : "An Error Occured";
    }

    public function setOrderAccessStatus($value){
        $data = array(
            'order_access' => $value,
        );

        $result = $this->db->update("settings", $data);
        echo $result ? "Settings Updated" : "An Error Occured";
    }

    public function getSettings(){
        $result = $this->db->get("settings");
        return $result->row_array();
    }

    public function uploadFiles($upload_info){
        return $this->db->insert("files", $upload_info);
    }

    public function getOrderFiles($id){
        $this->db->where("order_id", $id);
        $result = $this->db->get("files");
        return $result->result_array();
    }

    public function insertTransaction($data){
        $insert = $this->db->insert("payments", $data);
        return $insert?true:false;
    }
    
    
}
