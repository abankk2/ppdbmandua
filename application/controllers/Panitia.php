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

        $data['siswa'] = $this->M_Siswa->jm_daftar();
        $data['jm_wawancara'] = $this->M_Siswa->jm_wawancara();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('panitia/index', $data);
        $this->load->view('templates/footer');
    }


    public function wawancara()
    {
        $data['title'] = 'Wawancara';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['daftar'] = $this->M_Siswa->jm_daftar();

        $keyword = $this->input->post('keyword');
        $data['siswa'] = $this->M_Siswa->cari_siswa($keyword);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('panitia/siswa', $data);
        $this->load->view('templates/footer');
    }

    public function sudah_wawancara()
    {
        $data['title'] = 'Wawancara';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['siswa'] = $this->M_Siswa->sd_wawancara()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('panitia/siswa', $data);
        $this->load->view('templates/footer');
    }

    public function bl_wawancara()
    {
        $data['title'] = 'Wawancara';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $keyword = $this->input->post('keyword');
        $data['siswa'] = $this->M_Siswa->cari_siswa($keyword);

        $data['siswa'] = $this->M_Siswa->bl_wawancara()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('panitia/siswa', $data);
        $this->load->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Wawancara';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $keyword = $this->input->post('keyword');
        $data['siswa'] = $this->M_Siswa->cari_siswa2($keyword);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('panitia/siswa', $data);
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


    public function input($nisn)
    {
        $data['title'] = 'Wawancara';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['siswa']          = $this->M_Siswa->wawancara($nisn)->row_array();
        $data['prestasi']       = $this->M_Siswa->prestasi($nisn)->result_array();
        $data['tbsm']           = $this->M_Siswa->tbsm();
        $data['tata']           = $this->M_Siswa->tata();
        $data['multimedia']     = $this->M_Siswa->multimedia();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('panitia/wawancara', $data);
        $this->load->view('templates/footer');
    }

    public function post() // Update Data Wawancara
    {
        $id_siswa           = $this->input->post('nisn');
        $nama               = $this->input->post('nama');
        $mapel              = $this->input->post('mapel');
        $ekskul1            = $this->input->post('ekskul1');
        $ekskul2            = $this->input->post('ekskul2');
        $keterampilan1      = $this->input->post('keterampilan1');
        $keterampilan2      = $this->input->post('keterampilan2');
        $keterampilan3      = $this->input->post('keterampilan3');
        $rencana            = $this->input->post('rencana');
        $ptn1               = $this->input->post('ptn1');
        $jurusan1           = $this->input->post('jurusan1');
        $ptn2               = $this->input->post('ptn2');
        $jurusan2           = $this->input->post('jurusan2');
        $baca               = $this->input->post('baca');
        $tulis              = $this->input->post('tulis');
        $oleh              = $this->input->post('oleh');

        $data = array(
            'id_siswa'          => $id_siswa,
            'nama'          => $nama,
            'mapel'         => $mapel,
            'ekskul1'       => $ekskul1,
            'ekskul2'       => $ekskul2,
            'keterampilan1' => $keterampilan1,
            'keterampilan2' => $keterampilan2,
            'keterampilan3' => $keterampilan3,
            'rencana'       => $rencana,
            'ptn1'          => $ptn1,
            'jurusan1'      => $jurusan1,
            'ptn2'          => $ptn2,
            'jurusan2'      => $jurusan2,
            'baca'          => $baca,
            'tulis'         => $tulis,
            'oleh'          => $oleh,
            'date_created'  => time()


        );

        $this->db->where('id_siswa', $id_siswa);
        $this->db->update('wawancara', $data);

        $nisn           = $this->input->post('nisn');

        $data2 = array(
            'nisn'          => $nisn,
            'kunci'         => 2
        );

        $this->db->where('nisn', $nisn);
        $this->db->update('detail_siswa', $data2);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Wawancara Berhasil di Simpan </div>');
        redirect('panitia/input/' . $id_siswa);
    }

    public function prestasi()
    {
        $siswa_id           = $this->input->post('siswa_id');
        $siswa              = $this->input->post('siswa');
        $kegiatan           = $this->input->post('kegiatan');
        $peringkat          = $this->input->post('peringkat');
        $tingkat            = $this->input->post('tingkat');
        $tahun              = $this->input->post('tahun');


        $data = [
            'siswa_id'      => $siswa_id,
            'siswa'         => $siswa,
            'kegiatan'      => $kegiatan,
            'peringkat'     => $peringkat,
            'tingkat'       => $tingkat,
            'tahun'         => $tahun,

        ];
        $this->db->insert('prestasi', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Prestasi Berhasil di Tambahkan</div>');
        redirect('panitia/input/' . $siswa_id);
    }

    function get_tbsm() // Get Data kec
    {
        $data   = $this->M_Siswa->tbsm();
        echo json_encode($data);
    }

    function get_tata() // Get Data kec
    {
        $data   = $this->M_Siswa->tata();
        echo json_encode($data);
    }

    function get_multi() // Get Data kec
    {
        $data   = $this->M_Siswa->multimedia();
        echo json_encode($data);
    }
}
