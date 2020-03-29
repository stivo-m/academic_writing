<?php
    class App_api extends CI_Controller
    {
        public function get_available(){
            $result = $this->Admin_Model->get_orders("available");
            echo json_encode($result, JSON_PRETTY_PRINT);
        }

        public function get_revisions($id=NULL){
            $result = $this->Admin_Model->get_orders("revision");
            echo json_encode($result);
        }

        public function get_processing($id=NULL){
            $result = $this->Admin_Model->get_orders("processing");
            echo json_encode($result);
        }

        public function get_order($id){
            $result = $this->Admin_Model->get_order($id);
            echo json_encode($result);
        }

        public function profile($id=NULL){

        }

        public function finances($id=NULL){

        }
    }
    