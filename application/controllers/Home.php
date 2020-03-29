<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index()
	{
		$data['title'] = "Curtsy Writings";

        $this->load->view('templetes/home/header', $data);
        $this->load->view('templetes/home/nav', $data);
		$this->load->view('home', $data);
		$this->load->view('templetes/home/footer');
	}

}