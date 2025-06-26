<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'PPDB | MAN 2 Kota Cirebon';

        $data['daftar'] = $this->M_Siswa->jm_daftar();

        $this->load->view('templates/home_header', $data);
        $this->load->view('home/pengumuman', $data);
        $this->load->view('templates/home_footer');
    }

    public function cari()
    {
        $nisn = $this->input->post('nisn');
        $data = $this->M_lulus->get_by_nisn($nisn);

        if ($data) {
            $this->load->view('home/kelulusan/lulus', ['siswa' => $data]);
        } else {
            $this->load->view('home/kelulusan/tidak_lulus', ['nisn' => $nisn]);
        }
    }
}
