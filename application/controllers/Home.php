<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'PPDB | MAN 2 Kota Cirebon';

        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('home/index', $data);
        // $this->load->view('templates/footer');
    }
}
