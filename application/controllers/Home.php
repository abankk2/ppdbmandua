<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'PPDB | MAN 2 Kota Cirebon';

        $data['daftar'] = $this->M_Siswa->jm_daftar();

        $this->load->view('templates/home_header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/home_footer');
    }

    public function data()
    {
        $data['title'] = 'PPDB | MAN 2 Kota Cirebon';

        $data['siswa'] = $this->db->get('detail_siswa')->result_array();

        $this->load->view('templates/home_header', $data);
        $this->load->view('home/data', $data);
        $this->load->view('templates/home_footer');
    }

    public function cari()
    {
        $data['title'] = 'PPDB | MAN 2 Kota Cirebon';

        $keyword = $this->input->post('keyword');
        $data['siswa'] = $this->M_Siswa->cari_siswa($keyword);

        $this->load->view('templates/home_header', $data);
        $this->load->view('home/data', $data);
        $this->load->view('templates/home_footer');
    }

    public function kontak()
    {
        $data['title'] = 'PPDB | MAN 2 Kota Cirebon';

        $this->load->view('templates/home_header', $data);
        $this->load->view('home/kontak', $data);
        $this->load->view('templates/home_footer');
    }
}
