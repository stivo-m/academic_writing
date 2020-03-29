<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Writer_Model extends CI_Model
{

    public function loginWriter($email, $password)
    {
        $this->db->where("email", $email);
        $this->db->where("password", $password);
        $result = $this->db->get("writers");

        if ($result->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function registerWriter($writerData)
    { }

    public function getOrders($status, $writer = NULL)
    {
        $result = null;
        $this->db->order_by('added_on', 'DESC');
        if ($writer == NULL) {
            $result = $this->db->get_where("orders", array("status" => $status));
        } else {
            $result = $this->db->get_where("orders", array("status" => $status, "writer_id" => $writer));
        }

        return $result->result_array();
    }

    //ajaxified method
    public function getOrdersbyAjax($status, $writer = NULL)
    {
        $result = null;
        $this->db->order_by('added_on', 'DESC');
        if ($writer == NULL) {
            $result = $this->db->get_where("orders", array("status" => $status));
        } else {
            $result = $this->db->get_where("orders", array("status" => $status, "writer_id" => $writer));
        }


        $arr = $result->result_array();
        $output = '';
        foreach ($arr as $order) {
            $output .= '
            <a class="black-text" href="' . base_url("writers/orders/" . $order['id']) . '">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title left">' . $order['title'] . '</span>
                        <span class="card-text right"> ' . $order['pages'] . ' Pages </span>
                    </div>
                    
                    <div class="card-content">
                        <span class="card-text left">
                        Ksh. ' . $order['cost'] . '
                        </span> 
                        <span class="card-text right">Deadline: ' . $order['date_deadline'] . ' : ' . $order['time_deadline'] . '</span>                                            
                    </div>

                    <div class="card-content">
                        <p class="card-text"><b>Instructions:</b><br>
                            ' . word_limiter($order['instructions'], 50) . '
                        </p>                                            
                    </div>
                </div>
            </a>
            ';
        }

        if (empty($arr)) {
            $output .= '
            <p class="card-text">No Available Orders</p>
            ';
        }

        echo $output;

        //return $result->result_array();
    }



    public function getOrder($id, $writer = NULL)
    {
        $result = null;

        if ($writer == null) {
            $result = $this->db->get_where("orders", array("id" => $id));
        } else {
            $result = $this->db->get_where("orders", array("id" => $id, "writer_id" => $writer));
        }

        return $result->row_array();
    }

    public function getProfile($email)
    {
        $this->db->where("email", $email);
        $result = $this->db->get("writers");

        return $result->row_array();
    }

    public function completeOrder($order)
    {
        $this->db->where("id", $order);
        $updates = array(
            "status" => "completed",
            "complete_date" => now()
        );
        $result = $this->db->update("orders", $updates);
        echo $result ? "<p class='green center white-text p-2'>Order Successfully Completed</p>" 
        : "<p class='red center white-text p-2'>An Error Occured</p>";
    }


    public function uploadFiles($upload_info){
        return $this->db->insert("files", $upload_info);
    }

    public function getInvoices($id){
        $this->db->where("writer_id", $id);
        $result = $this->db->get("invoice_list");
        return $result->result_array();
    }

    public function getInvoicedOrders($id){
        $this->db->where("writer_id", $id);
        $this->db->where("status", "finished");
        $this->db->where("invoiced", "1");
        $result = $this->db->get("orders");
        return $result->result_array();
    }

    public function getOrderFiles($id){
        $this->db->where("order_id", $id);
        $result = $this->db->get("files");
        return $result->result_array();
    }

    public function takeOrder($id, $writer)
    {
        $maxLimit = 2;
        $orders = $this->db->get_where("orders", array("status" => "available", "writer_id" => $writer));
        $revisions = $this->db->get_where("orders", array("status" => "revision", "writer_id" => $writer));

        $currentOrders = $orders->result_array();
        $currentRevisions = $revisions->result_array();

        $totalOrders = (count($currentOrders) + count($currentRevisions));

        //limit number of takes to 2 per writer, unless otherwise
        if (count($currentOrders) >= $maxLimit) {
            echo "<p class='red center white-text p-2'>Please Finish Processing Orders First</p>";
            return;
        } else if ($totalOrders >= $currentOrders) {
            echo "<p class='red center white-text p-2'>Please Finish Revision Orders First</p>";
            return;
        }

        $this->db->where("id", $id);
        $updates = array(
            "status" => "processing",
            "writer_id" => $writer
        );

        $result = $this->db->update("orders", $updates);
        echo $result ? "<p class='green center white-text p-2'>Order Successfully Taken</p>" : "<p class='red center white-text p-2'>An Error Occured</p>";
    }

}
