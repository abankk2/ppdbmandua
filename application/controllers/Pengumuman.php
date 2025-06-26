<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_lulus'); // Model kamu namanya 'M_lulus'
    }

    public function index()
    {
        $data['title'] = 'PPDB | MAN 2 Kota Cirebon';

        if ($this->input->post('nisn')) {
            $nisn = $this->input->post('nisn');
            $hasil = $this->M_lulus->cari_nisn($nisn);

            if ($hasil) {
                $status = strtolower(trim($hasil['Status']));
                // Simpan data ke session jika ingin ditampilkan nanti di halaman redirect
                $this->session->set_userdata('hasil', $hasil);

                if ($status == 'lulus') {
                    redirect('pengumuman/lulus');
                } else {
                    redirect('pengumuman/tidak_lulus');
                }
            } else {
                $this->session->set_flashdata('error', 'NISN tidak ditemukan.');
                redirect('pengumuman/tidak_lulus');
            }
        }

        $this->load->view('templates/home_header', $data);
        $this->load->view('home/pengumuman', $data);
        $this->load->view('templates/home_footer');
    }

    public function lulus()
    {
        $data['title'] = 'PPDB | MAN 2 Kota Cirebon';

        $data['hasil'] = $this->session->userdata('hasil');
        $this->load->view('home/kelulusan/lulus', $data);
    }

    public function tidak_lulus()
    {
        $data['title'] = 'PPDB | MAN 2 Kota Cirebon';

        $data['hasil'] = $this->session->userdata('hasil');
        $this->load->view('templates/home_header', $data);
        $this->load->view('home/kelulusan/tidak_lulus', $data);
        $this->load->view('templates/home_footer');
    }

    public function cek_lulus($nisn = null)
    {
        $data['title'] = 'PPDB | MAN 2 Kota Cirebon';
        if (!$nisn) {
            show_404();
        }

        $hasil = $this->M_lulus->cari_nisn($nisn);

        if ($hasil) {
            $data['hasil'] = $hasil;
            $this->load->view('home/kelulusan/lulus', $data);
        } else {
            $this->load->view('home/kelulusan/tidak_lulus', $data);
        }
    }
}
