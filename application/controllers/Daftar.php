<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->M_Rekap->search_blog($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'         => $row->id_skolah,
                        'description'   => $row->nama_sekolah,
                        'status'        => $row->status,
                        'nsm'           => $row->nsm,
                    );
                echo json_encode($arr_result);
            }
        }
    }

    public function daftar_sekolah()
    {
        $data['title'] = 'Cek NPSN';

        $this->load->view('templates/auth_header', $data);
        $this->load->view('daftar/daftar_sekolah');
        $this->load->view('templates/auth_footer');
    }

    public function tb_sekolah1()
    {
        $nsm                = $this->input->post('nsm');
        $id_skolah          = $this->input->post('id_skolah');
        $nama_sekolah       = $this->input->post('nama_sekolah');
        $status             = $this->input->post('status');

        $data = [
            'nsm'               => $nsm,
            'id_skolah'         => $id_skolah,
            'nama_sekolah'      => $nama_sekolah,
            'status'            => $status,

        ];
        $this->db->insert('sekolah_baru', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Sekolah Berhasil di Tambahkan</div>');
        redirect('daftar');
    }

    public function tb_sekolah()
    {
        $this->form_validation->set_rules('id_skolah', 'NPSN/NSM', 'required|trim|is_unique[sekolah_baru.id_skolah]', [
            'is_unique' => 'NPSN/NSM ini Sudah Terdaftar!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> NPSN/NSM Sudah Terdaftar SIlahkan Lanjutkan Pendaftaran !!!
            </div>');
            redirect('daftar/registration');
        } else {

            $nsm                = $this->input->post('nsm');
            $id_skolah          = $this->input->post('id_skolah');
            $nama_sekolah       = $this->input->post('nama_sekolah');
            $status             = $this->input->post('status');

            $data = [
                'nsm'               => $nsm,
                'id_skolah'         => $id_skolah,
                'nama_sekolah'      => $nama_sekolah,
                'status'            => $status,

            ];
            $this->db->insert('sekolah_baru', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Sekolah Berhasil di Tambahkan</div>');
            redirect('daftar/registration');
        }
    }



    public function registration()
    {

        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        // $this->form_validation->set_rules('id_skolah', 'NPSN', 'required|trim');
        // $this->form_validation->set_rules('jalur', 'Jalur Masuk', 'required|trim');
        $this->form_validation->set_rules('email', 'NISN', 'required|trim|is_unique[user.email]|min_length[10]|max_length[10]', [
            'is_unique' => 'NISN ini Sudah Terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Pendaftaran';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('daftar/form_siswa');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);

            $data2 = [
                'nama_siswa'        => htmlspecialchars($this->input->post('name', true)),
                'nisn'              => htmlspecialchars($email),
                'asal_sekolah'      => $this->input->post('description'),
                'nsm'               => $this->input->post('nsm'),
                'jalur'             => $this->input->post('jalur'),
                'npsn_sekolah'      => $this->input->post('title'),
                'jk'                => $this->input->post('jk'),
                'no_hp'             => $this->input->post('no_hp'),
                'kunci'             => 0,
                'date_created'      => time(),
                'no_daftar'         => $this->M_Siswa->buat_kode(),

            ];
            $this->db->insert('detail_siswa', $data2);

            $data3 = [
                'nama'                  => htmlspecialchars($this->input->post('name', true)),
                'id_siswa'              => htmlspecialchars($email),

            ];
            $this->db->insert('wawancara', $data3);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran Berhasil' . '<br>Username Anda : ' . $email . '</div>');
            redirect('auth');
        }
    }
}
