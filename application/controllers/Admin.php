<?php
defined('BASEPATH') or exit('No direct script access allowed');


require APPPATH . 'third_party/google/autoload.php';

use Google\Client;
use Google\Service\Drive;

class Admin extends CI_Controller
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

        $data['rank_sekolah'] = $this->M_Siswa->rank_sekolah()->result_array();
        $data['admin'] = $this->M_Siswa->jm_admin();
        $data['siswa'] = $this->M_Siswa->jm_daftar();
        $data['laki'] = $this->M_Siswa->jm_l();
        $data['perempuan'] = $this->M_Siswa->jm_p();
        $data['sekolah'] = $this->M_Siswa->jml_sekolah();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function siswa()
    {
        $data['title'] = 'Daftar Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['siswa'] = $this->db->get('detail_siswa')->result_array();
        $data['daftar'] = $this->M_Siswa->jm_daftar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/siswa/index', $data);
        $this->load->view('templates/footer');
    }

    public function Dsiswa($nisn)
    {
        $data['title'] = 'Daftar Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['siswa']          = $this->M_Siswa->Dsiswa($nisn)->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/siswa/detail', $data);
        $this->load->view('templates/footer');
    }

    public function Esiswa($nisn)
    {
        $data['title'] = 'Daftar Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['siswa']          = $this->M_Siswa->Dsiswa($nisn)->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/siswa/edit', $data);
        $this->load->view('templates/footer');
    }

    public function Ksiswa($nisn)
    {
        $data['title'] = 'Kunci Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['siswa']          = $this->M_Siswa->Dsiswa($nisn)->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/siswa/kunci', $data);
        $this->load->view('templates/footer');
    }


    public function info()
    {
        $data['title'] = 'Informasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $data['informasi'] = $this->db->order_by('info', 'DESC')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/info', $data);
        $this->load->view('templates/footer');
    }

    public function registrasi()
    {
        $data['title'] = 'Registrasi Panitia';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['admin'] = $this->db->get_where('user', ['role_id' => 1])->result_array();

        $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
        $data['provinsi'] = $get_prov->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/regis', $data);
        $this->load->view('templates/footer');
    }

    public function cetak()
    {
        $data['title'] = 'Cetak';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/cetak', $data);
        $this->load->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Cetak';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['daftar'] = $this->M_Siswa->jm_daftar();

        $keyword = $this->input->post('keyword');
        $data['siswa'] = $this->M_Siswa->cari_siswa($keyword);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/siswa/index', $data);
        $this->load->view('templates/footer');
    }


    // Aksi
    public function registration2()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'NISN', 'required|trim|is_unique[user.email]|min_length[10]|max_length[10]', [
            'is_unique' => 'Email ini Sudah Terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        $email = $this->input->post('email', true);
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 1,
            'is_active' => 1,
            'date_created' => time()
        ];

        $this->db->insert('user', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran Berhasil </div>');
        redirect('admin/registrasi');
    }
    public function registration()
    {

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('id_skolah', 'NPSN', 'required|trim');
        $this->form_validation->set_rules('jalur', 'Jalur Masuk', 'required|trim');
        $this->form_validation->set_rules('email', 'NISN', 'required|trim|is_unique[user.email]|min_length[10]|max_length[10]', [
            'is_unique' => 'NISN ini Sudah Terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NISN ini Sudah Terdaftar!</div>');
            redirect('admin/registrasi');
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
                'asal_sekolah'      => $this->input->post('nama_sekolah'),
                'npsn_sekolah'      => htmlspecialchars($this->input->post('id_skolah', true)),
                'jk'                => $this->input->post('jk'),
                'prov_sekolah'      => $this->input->post('prov_sekolah'),
                'kab_sekolah'       => $this->input->post('kab_sekolah'),
                'kec_sekolah'       => $this->input->post('kec_sekolah'),
                'no_hp'             => $this->input->post('no_hp'),
                'jalur'             => htmlspecialchars($this->input->post('jalur', true)),
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
            redirect('admin/registrasi');
        }
    }

    public function aksi_info() // Update Data Ayah
    {
        $judul           = $this->input->post('judul');
        $isi           = $this->input->post('isi');
        $admin           = $this->input->post('admin');



        $data = array(
            'judul'             => $judul,
            'isi'               => $isi,
            'admin'             => $admin,
            'date_created'      => time()

        );

        $this->db->insert('info', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Informasi Berhasil di Kirim</div>');
        redirect('admin/info');
    }





    public function pdf()
    {

        $data['siswa'] = $this->db->get('detail_siswa')->result_array();

        $this->load->view('admin/siswa/pdf', $data);
    }

    public function sekolah()
    {

        $data['title'] = 'Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jm_sekolah'] = $this->M_Siswa->jm_sekolah();
        $data['sekolah'] = $this->M_Siswa->sekolah();

        $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
        $data['provinsi'] = $get_prov->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/sekolah', $data);
        $this->load->view('templates/footer');
    }

    public function cari_sekolah()
    {
        $data['title'] = 'Cetak';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jm_sekolah'] = $this->M_Siswa->jm_sekolah();

        $keyword = $this->input->post('keyword');
        $data['sekolah'] = $this->M_Siswa->cari_sekolah($keyword);

        $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
        $data['provinsi'] = $get_prov->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/sekolah', $data);
        $this->load->view('templates/footer');
    }


    public function aksi_sekolah()
    {

        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required|trim');
        $this->form_validation->set_rules('id_skolah', 'NPSN/NSM', 'required|trim|is_unique[sekolah.id_skolah]', [
            'is_unique' => 'NPSN/NSM ini Sudah Terdaftar!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> NPSN/NSM Sudah Terdaftar atau Pilih Kecamatan Terlebih dahulu !!!
            </div>');
            redirect('admin/sekolah');
        } else {

            $id_kec           = $this->input->post('kecamatan');
            $id_skolah        = $this->input->post('id_skolah');
            $nama_sekolah      = $this->input->post('nama_sekolah');

            $data = [
                'id_kec'            => $id_kec,
                'id_skolah'         => $id_skolah,
                'nama_sekolah'      => $nama_sekolah,

            ];
            $this->db->insert('sekolah', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Sekolah Berhasil di Tambahkan</div>');
            redirect('admin/sekolah');
        }
    }


    // Edit Siswa


    public function edit_tinggal($nisn)
    {
        $data['title'] = 'Edit Biodata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['siswa']          = $this->M_Siswa->Dsiswa($nisn)->row_array();

        $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
        $data['provinsi'] = $get_prov->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/biodata/tinggal', $data);
        $this->load->view('templates/footer');
    }

    public function edit_ortu($nisn)
    {
        $data['title'] = 'Edit Biodata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['siswa']          = $this->M_Siswa->Dsiswa($nisn)->row_array();

        $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
        $data['provinsi'] = $get_prov->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/biodata/ortu', $data);
        $this->load->view('templates/footer');
    }

    public function edit_ortu2($nisn)
    {
        $data['title'] = 'Edit Biodata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['siswa']          = $this->M_Siswa->Dsiswa($nisn)->row_array();

        $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
        $data['provinsi'] = $get_prov->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/biodata/ortu2', $data);
        $this->load->view('templates/footer');
    }

    public function edit_wali($nisn)
    {
        $data['title'] = 'Edit Biodata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['siswa']          = $this->M_Siswa->Dsiswa($nisn)->row_array();

        $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
        $data['provinsi'] = $get_prov->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/biodata/wali', $data);
        $this->load->view('templates/footer');
    }

    public function edit_sekolah($nisn)
    {
        $data['title'] = 'Edit Biodata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['siswa']          = $this->M_Siswa->Dsiswa($nisn)->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/biodata/sekolah', $data);
        $this->load->view('templates/footer');
    }

    public function edit_dok($nisn)
    {
        $data['title'] = 'Edit Biodata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['siswa']          = $this->M_Siswa->Dsiswa($nisn)->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/biodata/dok', $data);
        $this->load->view('templates/footer');
    }

    public function upload($nisn)
    {
        $data['title'] = 'Edit Biodata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['siswa']          = $this->M_Siswa->Dsiswa($nisn)->row_array();
        $data['prestasi']       = $this->M_Siswa->prestasi2($nisn)->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/biodata/upload', $data);
        $this->load->view('templates/footer');
    }
    // Controler AKSI siswa 

    public function upbiodata() // Update Data Biodata
    {
        $nisn               = $this->input->post('nisn');
        $nama_siswa         = $this->input->post('nama_siswa');
        $tempat_lahir       = $this->input->post('tempat_lahir');
        $tgl_lahir          = $this->input->post('tgl_lahir');
        $jk                 = $this->input->post('jk');
        $golongandarah      = $this->input->post('golongandarah');
        $nik                = $this->input->post('nik');
        $agama              = $this->input->post('agama');
        $anak_ke            = $this->input->post('anak_ke');
        $saudara            = $this->input->post('saudara');
        $cita               = $this->input->post('cita');
        $hobi               = $this->input->post('hobi');
        $no_hp              = $this->input->post('no_hp');
        $emails             = $this->input->post('emails');
        $biaya_sekolah      = $this->input->post('biaya_sekolah');


        $data = array(
            'nisn'          => $nisn,
            'nama_siswa'    => $nama_siswa,
            'tempat_lahir'  => $tempat_lahir,
            'tgl_lahir'     => $tgl_lahir,
            'jk'            => $jk,
            'golongandarah' => $golongandarah,
            'nik'           => $nik,
            'agama'         => $agama,
            'anak_ke'       => $anak_ke,
            'saudara'       => $saudara,
            'cita'          => $cita,
            'hobi'          => $hobi,
            'no_hp'         => $no_hp,
            'emails'        => $emails,
            'biaya_sekolah'        => $biaya_sekolah,

        );

        $this->db->where('nisn', $nisn);
        $this->db->update('detail_siswa', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Biodata Berhasil di Update Silahkan Lanjutkan Data Tempat Tinggal Siswa </div>');
        redirect('admin/edit_tinggal/' . $nisn);
    }

    public function uptinggal() // Update Data Tinggal
    {
        $nisn                   = $this->input->post('nisn');
        $status_tinggal_siswa   = $this->input->post('status_tinggal_siswa');
        $prov                   = $this->input->post('prov');
        $kab                    = $this->input->post('kab');
        $kec                    = $this->input->post('kec');
        $desa                   = $this->input->post('desa');
        $kodepos_siswa          = $this->input->post('kodepos_siswa');
        $alamat_siswa           = $this->input->post('alamat_siswa');
        $kordinat               = $this->input->post('kordinat');
        $jarak               = $this->input->post('jarak');
        $waktu               = $this->input->post('waktu');

        $data = array(
            'nisn'                  => $nisn,
            'status_tinggal_siswa'  => $status_tinggal_siswa,
            'prov'                  => $prov,
            'kab'                   => $kab,
            'kec'                   => $kec,
            'desa'                  => $desa,
            'kodepos_siswa'         => $kodepos_siswa,
            'alamat_siswa'          => $alamat_siswa,
            'kordinat'              => $kordinat,
            'jarak'                 => $jarak,
            'waktu'                 => $waktu,

        );

        $this->db->where('nisn', $nisn);
        $this->db->update('detail_siswa', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Biodata Berhasil di Update Silahkan Lanjutkan Identitas Ayah </div>');
        redirect('admin/edit_ortu/' . $nisn);
    }

    public function uportu() // Update Data Ayah
    {
        $nisn                       = $this->input->post('nisn');
        $no_kk                      = $this->input->post('no_kk');
        $nik_ayah                   = $this->input->post('nik_ayah');
        $kepala_keluarga            = $this->input->post('kepala_keluarga');
        $nama_ayah                  = $this->input->post('nama_ayah');
        $status_ayah                = $this->input->post('status_ayah');
        $tempat_lahir_ayah          = $this->input->post('tempat_lahir_ayah');
        $tgl_lahir_ayah             = $this->input->post('tgl_lahir_ayah');
        $pendidikan_ayah            = $this->input->post('pendidikan_ayah');
        $pekerjaan_ayah             = $this->input->post('pekerjaan_ayah');
        $penghasilan_ayah           = $this->input->post('penghasilan_ayah');
        $status_tmp_tinggal_ayah    = $this->input->post('status_tmp_tinggal_ayah');
        $prov_ayah                  = $this->input->post('prov');
        $kab_ayah                   = $this->input->post('kab');
        $kec_ayah                   = $this->input->post('kec');
        $desa_ayah                  = $this->input->post('desa');
        $kodepos_ayah               = $this->input->post('kodepos_ayah');
        $no_hp_ayah                 = $this->input->post('no_hp_ayah');
        $alamat_ayah                = $this->input->post('alamat_ayah');
        $warga_ayah                 = $this->input->post('warga_ayah');

        $data = array(
            'nisn'                      => $nisn,
            'no_kk'                     => $no_kk,
            'nik_ayah'                  => $nik_ayah,
            'kepala_keluarga'           => $kepala_keluarga,
            'nama_ayah'                 => $nama_ayah,
            'status_ayah'               => $status_ayah,
            'tempat_lahir_ayah'         => $tempat_lahir_ayah,
            'tgl_lahir_ayah'            => $tgl_lahir_ayah,
            'pendidikan_ayah'           => $pendidikan_ayah,
            'pekerjaan_ayah'            => $pekerjaan_ayah,
            'penghasilan_ayah'          => $penghasilan_ayah,
            'status_tmp_tinggal_ayah'   => $status_tmp_tinggal_ayah,
            'prov_ayah'                 => $prov_ayah,
            'kab_ayah'                  => $kab_ayah,
            'kec_ayah'                  => $kec_ayah,
            'desa_ayah'                 => $desa_ayah,
            'alamat_ayah'               => $alamat_ayah,
            'kodepos_ayah'              => $kodepos_ayah,
            'no_hp_ayah'                => $no_hp_ayah,
            'warga_ayah'                => $warga_ayah,

        );

        $this->db->where('nisn', $nisn);
        $this->db->update('detail_siswa', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Biodata Berhasil di Update Silahkan Lanjutkan Identitas Ibu </div>');
        redirect('admin/edit_ortu2/' . $nisn);
    }

    public function uportu2() // Update Data Ayah
    {
        $nisn                       = $this->input->post('nisn');
        $nik_ibu                    = $this->input->post('nik_ibu');
        $kepala_keluarga            = $this->input->post('kepala_keluarga');
        $nama_ibu                   = $this->input->post('nama_ibu');
        $warga_ibu                  = $this->input->post('warga_ibu');
        $status_ibu                = $this->input->post('status_ibu');
        $tempat_lahir_ibu          = $this->input->post('tempat_lahir_ibu');
        $tgl_lahir_ibu             = $this->input->post('tgl_lahir_ibu');
        $pendidikan_ibu            = $this->input->post('pendidikan_ibu');
        $pekerjaan_ibu             = $this->input->post('pekerjaan_ibu');
        $penghasilan_ibu           = $this->input->post('penghasilan_ibu');
        $status_tmp_tinggal_ibu    = $this->input->post('status_tmp_tinggal_ibu');
        $prov_ibu                  = $this->input->post('prov');
        $kab_ibu                   = $this->input->post('kab');
        $kec_ibu                   = $this->input->post('kec');
        $desa_ibu                  = $this->input->post('desa');
        $kodepos_ibu               = $this->input->post('kodepos_ibu');
        $no_hp_ibu                  = $this->input->post('no_hp_ibu');
        $alamat_ibu                = $this->input->post('alamat_ibu');

        $data = array(
            'nisn'                     => $nisn,
            'warga_ibu'                => $warga_ibu,
            'nik_ibu'                  => $nik_ibu,
            'kepala_keluarga'          => $kepala_keluarga,
            'nama_ibu'                 => $nama_ibu,
            'status_ibu'               => $status_ibu,
            'tempat_lahir_ibu'         => $tempat_lahir_ibu,
            'tgl_lahir_ibu'            => $tgl_lahir_ibu,
            'pendidikan_ibu'           => $pendidikan_ibu,
            'pekerjaan_ibu'            => $pekerjaan_ibu,
            'penghasilan_ibu'          => $penghasilan_ibu,
            'status_tmp_tinggal_ibu'   => $status_tmp_tinggal_ibu,
            'prov_ibu'                 => $prov_ibu,
            'kab_ibu'                  => $kab_ibu,
            'kec_ibu'                  => $kec_ibu,
            'desa_ibu'                 => $desa_ibu,
            'alamat_ibu'               => $alamat_ibu,
            'kodepos_ibu'              => $kodepos_ibu,
            'no_hp_ibu'                => $no_hp_ibu,

        );

        $this->db->where('nisn', $nisn);
        $this->db->update('detail_siswa', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Biodata Berhasil di Update Silahkan Lanjutkan Identitas Wali </div>');
        redirect('admin/edit_wali/' . $nisn);
    }

    public function upwali() // Update Data Ayah
    {
        $nisn                       = $this->input->post('nisn');
        $kepala_keluarga            = $this->input->post('kepala_keluarga');
        $nama_wali                   = $this->input->post('nama_wali');
        $nik_wali                   = $this->input->post('nik_wali');
        $warga_wali                  = $this->input->post('warga_wali');
        $status_wali                = $this->input->post('status_wali');
        $tempat_lahir_wali          = $this->input->post('tempat_lahir_wali');
        $tgl_lahir_wali             = $this->input->post('tgl_lahir_wali');
        $pendidikan_wali            = $this->input->post('pendidikan_wali');
        $pekerjaan_wali             = $this->input->post('pekerjaan_wali');
        $penghasilan_wali           = $this->input->post('penghasilan_wali');
        $status_tmp_tinggal_wali    = $this->input->post('status_tmp_tinggal_wali');
        $prov_wali                  = $this->input->post('prov');
        $kab_wali                   = $this->input->post('kab');
        $kec_wali                   = $this->input->post('kec');
        $desa_wali                  = $this->input->post('desa');
        $kodepos_wali               = $this->input->post('kodepos_wali');
        $no_hp_wali               = $this->input->post('no_hp_wali');
        $alamat_wali                = $this->input->post('alamat_wali');

        $data = array(
            'nisn'                     => $nisn,
            'warga_wali'                => $warga_wali,
            'nik_wali'                => $nik_wali,
            'kepala_keluarga'          => $kepala_keluarga,
            'nama_wali'                 => $nama_wali,
            'status_wali'               => $status_wali,
            'tempat_lahir_wali'         => $tempat_lahir_wali,
            'tgl_lahir_wali'            => $tgl_lahir_wali,
            'pendidikan_wali'           => $pendidikan_wali,
            'pekerjaan_wali'            => $pekerjaan_wali,
            'penghasilan_wali'          => $penghasilan_wali,
            'status_tmp_tinggal_wali'   => $status_tmp_tinggal_wali,
            'prov_wali'                 => $prov_wali,
            'kab_wali'                  => $kab_wali,
            'kec_wali'                  => $kec_wali,
            'desa_wali'                 => $desa_wali,
            'alamat_wali'               => $alamat_wali,
            'kodepos_wali'              => $kodepos_wali,
            'no_hp_wali'              => $no_hp_wali,

        );

        $this->db->where('nisn', $nisn);
        $this->db->update('detail_siswa', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Biodata Berhasil di Update Silahkan Lanjutkan Identitas Sekolah Asal </div>');
        redirect('admin/edit_sekolah/' . $nisn);
    }

    public function upskolah() // Update Data Ayah
    {
        $nisn           = $this->input->post('nisn');
        $tahun_lulus    = $this->input->post('tahun_lulus');
        $no_skhun       = $this->input->post('no_skhun');
        $seri_ijazah    = $this->input->post('seri_ijazah');


        $data = array(
            'nisn'              => $nisn,
            'tahun_lulus'       => $tahun_lulus,
            'no_skhun'          => $no_skhun,
            'seri_ijazah'       => $seri_ijazah,

        );

        $this->db->where('nisn', $nisn);
        $this->db->update('detail_siswa', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Biodata Berhasil di Update Silahkan Lanjutkan Informasi Lainnya </div>');
        redirect('admin/edit_dok/' . $nisn);
    }

    public function uplainnya() // Update Data Ayah
    {
        $nisn               = $this->input->post('nisn');
        $tk                 = $this->input->post('tk');
        $paud                 = $this->input->post('paud');
        $no_kip             = $this->input->post('no_kip');
        $no_kks             = $this->input->post('no_kks');
        $no_pkh             = $this->input->post('no_pkh');
        $keb_khusus         = $this->input->post('keb_khusus');
        $keb_disabilitas    = $this->input->post('keb_disabilitas');
        $hepatitis          = $this->input->post('hepatitis');
        $polio              = $this->input->post('polio');
        $bcg                = $this->input->post('bcg');
        $campak             = $this->input->post('campak');
        $dpt                = $this->input->post('dpt');
        $covid              = $this->input->post('covid');

        $data = array(
            'nisn'              => $nisn,
            'tk'                => $tk,
            'paud'                => $paud,
            'no_kip'            => $no_kip,
            'no_kks'            => $no_kks,
            'no_pkh'            => $no_pkh,
            'keb_khusus'        => $keb_khusus,
            'keb_disabilitas'   => $keb_disabilitas,
            'hepatitis'         => $hepatitis,
            'polio'             => $polio,
            'bcg'               => $bcg,
            'campak'            => $campak,
            'dpt'               => $dpt,
            'covid'             => $covid,

        );

        $this->db->where('nisn', $nisn);
        $this->db->update('detail_siswa', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Biodata Berhasil di Update Silahkan Menunggu Informasi Dari Panitia PPDB </div>');
        redirect('admin/info/' . $nisn);
    }


    public function submit_prestasi()
    {

        $siswa_id           = $this->input->post('siswa_id');
        try {
            $client = new Client();
            putenv('GOOGLE_APPLICATION_CREDENTIALS=./credentials.json');
            $client->useApplicationDefaultCredentials();
            $client->addScope(Drive::DRIVE);
            $driveService = new Drive($client);

            $uploadedFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $mimeType = mime_content_type($uploadedFile);
            $fileSize = $_FILES['file']['size']; // Ukuran file dalam byte

            if ($fileExtension !== 'pdf' || $mimeType !== 'application/pdf') {
                // File yang diunggah bukan file PDF
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File yang diunggah harus berformat PDF</div>');
                redirect('admin/upload/' . $siswa_id);
            }

            if ($fileSize > 10 * 1024 * 1024) {
                // File terlalu besar (lebih dari 10 MB)
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ukuran file maksimal 7 MB</div>');
                redirect('admin/upload/' . $siswa_id);
            }

            // Mengambil nilai dari form
            $siswa              = $this->input->post('siswa');
            $kegiatan           = $this->input->post('kegiatan');
            $peringkat          = $this->input->post('peringkat');
            $tingkat            = $this->input->post('tingkat');
            $tahun              = $this->input->post('tahun');

            $fileMetadata = new Drive\DriveFile(array(
                'name'      => $fileName,
                'parents'   => ['1fKoE12ybnPWzna07O0UmTR_6qs-BoGWY']
            ));
            $content = file_get_contents($uploadedFile);
            $file = $driveService->files->create($fileMetadata, array(
                'data'          => $content,
                'mimeType'      => $mimeType,
                'uploadType'    => 'multipart',
                'fields'        => 'id' // Only request the 'id' field
            ));

            // Insert file information into your database
            $this->load->database(); // Load the database library
            $data = array(
                'oleh'              => $file->id,
                'siswa_id'          => $siswa_id,
                'siswa'             => $siswa,
                'kegiatan'          => $kegiatan,
                'peringkat'         => $peringkat,
                'tingkat'           => $tingkat,
                'tahun'             => $tahun,

            );
            $this->db->insert('prestasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Prestasi Berhasil ditambahkan</div>');
            redirect('admin/upload/' . $siswa_id);
        } catch (\Exception $e) {
            echo "Error Message: " . $e->getMessage();
        }
    }


    public function Bkunci() // Update Data Biodata
    {
        $nisn               = $this->input->post('nisn');
        $kunci         = $this->input->post('kunci');

        $data = array(
            'nisn'          => $nisn,
            'kunci'    => $kunci,
        );

        $this->db->where('nisn', $nisn);
        $this->db->update('detail_siswa', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Edit Kunci Berhasil di simpan</div>');
        redirect('admin/siswa');
    }

    public function Jalur() // Update Data Biodata
    {
        $nisn               = $this->input->post('nisn');
        $jalur              = $this->input->post('jalur');

        $data = array(
            'nisn'          => $nisn,
            'jalur'         => $jalur,
        );

        $this->db->where('nisn', $nisn);
        $this->db->update('detail_siswa', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Edit Jalur Pendaftaran Berhasil di simpan</div>');
        redirect('admin/siswa');
    }



















    public function HpsSiswa($nisn)
    {

        $this->db->where('nisn', $nisn);
        $this->db->delete('detail_siswa');

        $this->db->where('email', $nisn);
        $this->db->delete('user');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data Siswa Berhasil Di Hapus</div>');
        redirect('admin/siswa');
    }

    function add_ajax_kab($id_prov)
    {
        $query = $this->db->get_where('wilayah_kabupaten', array('provinsi_id' => $id_prov));
        $data = "<option value=''>- Select Kabupaten -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id . "'>" . $value->kabupaten . "</option>";
        }
        echo $data;
    }

    function add_ajax_kec($id_kab)
    {
        $query = $this->db->get_where('wilayah_kecamatan', array('kabupaten_id' => $id_kab));
        $data = "<option value=''> - Pilih Kecamatan - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id . "'>" . $value->kecamatan . "</option>";
        }
        echo $data;
    }

    function add_ajax_des($id_kec)
    {
        $query = $this->db->get_where('wilayah_desa', array('kecamatan_id' => $id_kec));
        $data = "<option value=''> - Pilih Desa - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id . "'>" . $value->desa . "</option>";
        }
        echo $data;
    }

    function get_prov() // Get Data prov
    {
        $prov  = $this->input->post('provinsi');
        $data   = $this->M_Siswa->get_prov($prov);
        echo json_encode($data);
    }

    function get_kab() // Get Data kab
    {
        $kab  = $this->input->post('kabupaten');
        $data   = $this->M_Siswa->get_kab($kab);
        echo json_encode($data);
    }

    function get_kec() // Get Data kec
    {
        $kec  = $this->input->post('kecamatan');
        $data   = $this->M_Siswa->get_kec($kec);
        echo json_encode($data);
    }

    function get_des() // Get Data kec
    {
        $des  = $this->input->post('desa');
        $data   = $this->M_Siswa->get_des($des);
        echo json_encode($data);
    }
}
