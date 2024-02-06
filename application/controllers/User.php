<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'third_party/google/autoload.php';

use Google\Client;
use Google\Service\Drive;

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Biodata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $kode                   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa']          = $this->M_Siswa->detail($kode['email'])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }


    public function edit2()
    {
        $data['title'] = 'Edit Biodata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = '2048';
                $config['upload_path']      = './assets/img/profiles/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profiles/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }


    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function info()
    {
        $data['title'] = 'Informasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['info'] = $this->M_Siswa->news()->result_array();
        $data['info2'] = $this->M_Siswa->news2()->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/info', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Biodata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $kode                   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa']          = $this->M_Siswa->detail($kode['email'])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/biodata/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit_tinggal()
    {
        $data['title'] = 'Edit Biodata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $kode                   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa']          = $this->M_Siswa->detail($kode['email'])->row_array();

        $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
        $data['provinsi'] = $get_prov->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/biodata/tinggal', $data);
        $this->load->view('templates/footer');
    }

    public function edit_ortu()
    {
        $data['title'] = 'Edit Biodata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $kode                   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa']          = $this->M_Siswa->detail($kode['email'])->row_array();

        $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
        $data['provinsi'] = $get_prov->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/biodata/ortu', $data);
        $this->load->view('templates/footer');
    }

    public function edit_ortu2()
    {
        $data['title'] = 'Edit Biodata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $kode                   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa']          = $this->M_Siswa->detail($kode['email'])->row_array();

        $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
        $data['provinsi'] = $get_prov->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/biodata/ortu2', $data);
        $this->load->view('templates/footer');
    }

    public function edit_wali()
    {
        $data['title'] = 'Edit Biodata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $kode                   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa']          = $this->M_Siswa->detail($kode['email'])->row_array();

        $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
        $data['provinsi'] = $get_prov->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/biodata/wali', $data);
        $this->load->view('templates/footer');
    }

    public function edit_skolah()
    {
        $data['title'] = 'Edit Biodata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $kode                   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa']          = $this->M_Siswa->detail($kode['email'])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/biodata/sekolah', $data);
        $this->load->view('templates/footer');
    }

    public function edit_dok()
    {
        $data['title'] = 'Edit Biodata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $kode                   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa']          = $this->M_Siswa->detail($kode['email'])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/biodata/dok', $data);
        $this->load->view('templates/footer');
    }

    public function upload()
    {
        $data['title'] = 'Edit Biodata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $kode                   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa']          = $this->M_Siswa->detail($kode['email'])->row_array();
        $data['prestasi']       = $this->M_Siswa->prestasi2($kode['email'])->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/biodata/upload', $data);
        $this->load->view('templates/footer');
    }











    public function kunci()
    {
        $data['title'] = 'Kunci Biodata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $kode                   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa']          = $this->M_Siswa->detail($kode['email'])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/biodata/kunci', $data);
        $this->load->view('templates/footer');
    }

    public function kartu()
    {
        $data['title'] = 'Cetak Kartu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $kode                   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa']          = $this->M_Siswa->detail($kode['email'])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/biodata/kartu', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_kartu()
    {
        $data['title'] = 'Cetak Kartu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $kode                   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa']          = $this->M_Siswa->detail($kode['email'])->row_array();

        $this->load->view('user/biodata/cetak', $data);
    }

    // Aksi Edit Perubahan Data siswa

    public function upbiodata() // Update Data Biodata
    {
        $nisn               = $this->input->post('nisn');
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
        $biaya_sekolah               = $this->input->post('biaya_sekolah');


        $data = array(
            'nisn'          => $nisn,
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
        redirect('user/edit_tinggal');
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
        redirect('user/edit_ortu');
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
        $no_hp_ayah               = $this->input->post('no_hp_ayah');
        $alamat_ayah                = $this->input->post('alamat_ayah');
        $warga_ayah                = $this->input->post('warga_ayah');

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
            'no_hp_ayah'              => $no_hp_ayah,
            'warga_ayah'              => $warga_ayah,

        );

        $this->db->where('nisn', $nisn);
        $this->db->update('detail_siswa', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Biodata Berhasil di Update Silahkan Lanjutkan Identitas Ibu </div>');
        redirect('user/edit_ortu2');
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
        redirect('user/edit_wali');
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
        redirect('user/edit_skolah');
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
        redirect('user/edit_dok');
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
        redirect('user/info');
    }

    public function submit_prestasi()
    {
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
                redirect('user/upload');
            }

            if ($fileSize > 10 * 1024 * 1024) {
                // File terlalu besar (lebih dari 10 MB)
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ukuran file maksimal 7 MB</div>');
                redirect('user/upload');
            }

            // Mengambil nilai dari form
            $siswa_id           = $this->input->post('siswa_id');
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
            redirect('user/upload');
        } catch (\Exception $e) {
            echo "Error Message: " . $e->getMessage();
        }
    }


































    public function bio_kunci() // Kunci Biodata
    {
        $nisn               = $this->input->post('nisn');
        $kunci              = $this->input->post('kunci');


        $data = array(
            'nisn'              => $nisn,
            'kunci'             => $kunci

        );

        $this->db->where('nisn', $nisn);
        $this->db->update('detail_siswa', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Biodata Berhasil di Kunci Silahkan Silahkan Cetak Kartu PPDB </div>');
        redirect('user/kunci');
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

    public function tes()
    {
        $data['title'] = 'Informasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/biodata/tes', $data);
        $this->load->view('templates/footer');
    }


    public function AksiTes() // Kunci Biodata
    {
        $status               = $this->input->post('status');
        $satu               = $this->input->post('satu');
        $dua               = $this->input->post('dua');


        $data = array(
            'status'              => $status,
            'satu'              => $satu,
            'dua'              => $dua,

        );

        $this->db->insert('tes', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Biodata Berhasil di Kunci Silahkan Silahkan Cetak Kartu PPDB </div>');
        redirect('user/tes');
    }
}
