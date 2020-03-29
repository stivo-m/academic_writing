<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Messages_Model extends CI_Model
{
    public function sendNewMessage($messageInfo)
    {
        $result = $this->db->insert("messages", $messageInfo);
        //$updates = array("is_read" => true);
        $output = '';
        if ($result) {
            $this->db->where("order_id", $messageInfo["order_id"]);
            $this->db->order_by('sent_at', 'ASC');
            $msgList = $this->db->get("messages");
            $messagesHolder = $msgList->result_array();
            //$this->db->update("messages", $updates);

            foreach ($messagesHolder as $msg) {
                if ($msg['sender'] == "admin") {
                    $output .= '
                        <div class="chat admin animated fadeIn">
                            <div class="user-photo center">A</div>
                            <p class="chat-message">' . $msg["message"] . '
                            <br>
                                <small class="message_time right">Sent: ' . $msg["sent_at"] . ' <i class="material-icons small-icons">done_all</i> </small>
                            </p>
                        </div>
                    ';
                } else if ($msg['sender'] == "writer") {
                    $output .= '
                        <div class="chat writer animated fadeIn">
                            <div class="user-photo center">W</div>
                            <p class="chat-message">' . $msg["message"] . '
                            <br>
                                <small class="message_time right">Sent: ' . $msg["sent_at"] . ' <i class="material-icons small-icons">done_all</i> </small>
                            </p>
                        </div>
                    ';
                }
            }

            if (empty($messagesHolder)) {
                $output = '
                    <p class="center animated fadeInUp">
                        No Messages for This Order
                    </p>
                ';
            }
        } else {
            $output = '
                <p class="center animated fadeInUp">
                    No Messages for This Order
                </p>
            ';
        }

        echo $output;
    }

    //messages with a given writer and in a given order
    public function getMessages($order, $writer = NULL)
    {
        $result = NULL;
        $output = '';
        $this->db->where("order_id", $order);
        $this->db->order_by('sent_at', 'ASC');
        $result = $this->db->get("messages");

        if ($result) {
            //$this->db->where("order_id", $order);
            $msgList = $this->db->get_where("messages", array("order_id" => $order));

            $messagesHolder = $msgList->result_array();

            foreach ($messagesHolder as $msg) {
                if ($msg['sender'] == "admin") {
                    $output .= '
                        <div class="chat admin animated ">
                            <div class="user-photo center">A</div>
                            <p class="chat-message">' . $msg["message"] . '
                            <br>
                                <small class="message_time right">Sent: ' . $msg["sent_at"] . ' <i class="material-icons small-icons">done_all</i> </small>
                            </p>
                        </div>
                    ';
                } else if ($msg['sender'] == "writer") {
                    $output .= '
                        <div class="chat writer animated ">
                            <div class="user-photo center">W</div>
                            <p class="chat-message">' . $msg["message"] . '
                            <br>
                                <small class="message_time right">Sent: ' . $msg["sent_at"] . ' <i class="material-icons small-icons">done_all</i> </small>
                            </p>
                        </div>
                    ';
                }
            }

            if (empty($messagesHolder)) {
                $output = '
                    <p class="center green p-2 white-text animated">
                        No Messages for This Order
                    </p>
                ';
            }
        } else {
            $output = '
                <p class="center">
                    No Messages for This Order
                </p>
            ';
        }

        echo $output;
    }

    public function getUnreadMessages($writer =  NULL, $admin = NULL)
    {
        $result = NULL;
        $output = '';


        if ($admin == NULL) {
            $this->db->where("recipient", "writer");
            $this->db->where("writer_id", $writer);
            $this->db->where("is_read", "0");
            $this->db->order_by('sent_at', 'ASC');
            $messages = $this->db->get("messages");
            $msglist = $messages->result_array();

            foreach ($msglist as $msg) {
                $output .= '
                    <li>
                        <a href="' . base_url("writers/orders/" . $msg["order_id"]) . '" class="black-text">
                            <input type="hidden" id="msgId" value=' . $msg["id"] . '>
                            <b>Message from Admin</b>
                            <br>
                            <small><b>Order ID: </b>#' . $msg["order_id"] .  '</small>
                            <br>
                            <small> <b>Message: </b>' . word_limiter($msg["message"], 20) . ' </small>
                        </a>
                    </li>

                    <li class="divider" tabindex="-1"></li>
                ';
            }

            if (empty($msglist)) {
                $output .= '
                    <li>
                        <a href="#" class="black-text">
                            <b>No New Messages</b>
                            <br>
                            Please Check back Later
                        </a>
                    </li>

                    <li class="divider" tabindex="-1"></li>
                ';
            }
        }

        echo $output;
    }


    public function getNotifsCunt($writer)
    {
        $this->db->where("recipient", "writer");
        $this->db->where("writer_id", $writer);
        $this->db->where("is_read", "0");
        $messages = $this->db->get("messages");
        $msglist = $messages->result_array();

        return $msglist;
    }
}
