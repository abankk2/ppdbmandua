<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panitia extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $data['rank_sekolah'] = $this->M_Siswa->rank_sekolah()->result_array();
        // $data['admin'] = $this->M_Siswa->jm_admin();
        // $data['siswa'] = $this->M_Siswa->jm_daftar();
        // $data['sekolah'] = $this->M_Siswa->jml_sekolah();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('panitia/index', $data);
        $this->load->view('templates/footer');
    }

    public function siswa()
    {
        $data['title'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $data['siswa'] = $this->db->get('detail_siswa')->result_array();
        $data['siswa'] = $this->M_Siswa->cekin()->result_array();
        $data['daftar'] = $this->M_Siswa->jm_daftar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('panitia/siswa', $data);
        $this->load->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['daftar'] = $this->M_Siswa->jm_daftar();

        $keyword = $this->input->post('keyword');
        $data['siswa'] = $this->M_Siswa->cari_siswa($keyword);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('panitia/siswa', $data);
        $this->load->view('templates/footer');
    }

    public function cari2()
    {
        $data['title'] = 'Wawancara';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['daftar'] = $this->M_Siswa->jm_daftar();

        $keyword = $this->input->post('keyword');
        $data['siswa'] = $this->M_Siswa->cari_siswa2($keyword);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('panitia/wawancara', $data);
        $this->load->view('templates/footer');
    }

    public function Dsiswa($nisn)
    {
        $data['title'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['siswa']          = $this->M_Siswa->Dsiswa($nisn)->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('panitia/d_siswa', $data);
        $this->load->view('templates/footer');
    }

    public function validasi()
    {
        $data['title'] = 'Validasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('panitia/validasi', $data);
        $this->load->view('templates/footer');
    }

    // public function wawancara()
    // {
    //     $data['title'] = 'Wawancara';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //     $data['siswa'] = $this->M_Siswa->wawancara()->result_array();
    //     $data['daftar'] = $this->M_Siswa->jm_daftar();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('panitia/wawancara', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function Wainput($slug)
    // {
    //     $data['title'] = 'Wawancara';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //     $data['siswa']   = $this->M_Siswa->Dwawancara($slug)->row_array();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('panitia/input', $data);
    //     $this->load->view('templates/footer');
    // }
}
