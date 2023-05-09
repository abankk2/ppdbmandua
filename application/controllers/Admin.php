<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Worksheet\ColumnDimension;

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
    public function registration()
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

    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = [
            'font'          => ['bold' => true], // Set font nya jadi bold
            'alignment'     => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical'  => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders'       => [
                'top'       => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right'     => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom'    => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left'      => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '32CD32']
            ]
        ];
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
            'alignment'     => [
                'vertical'      => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders'       => [
                'top'       => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right'     => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom'    => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left'      => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        $sheet->setCellValue('A1', "DATA SISWA PPDB TAHUN 2023/2024"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A3', "NO");
        $sheet->setCellValue('B3', "NISN");
        $sheet->setCellValue('C3', "NO DAFTAR");
        $sheet->setCellValue('D3', "NAMA SISWA");
        $sheet->setCellValue('E3', "NIK");
        $sheet->setCellValue('F3', "TEMPAT LAHIR");
        $sheet->setCellValue('G3', "TGL. LAHIR");
        $sheet->setCellValue('H3', "L/P");
        $sheet->setCellValue('I3', "ANAK KE");
        $sheet->setCellValue('J3', "SAUDARA");
        $sheet->setCellValue('K3', "AGAMA");
        $sheet->setCellValue('L3', "CITA-CITA");
        $sheet->setCellValue('M3', "HOBI");
        $sheet->setCellValue('N3', "NO WHATSAPP");
        $sheet->setCellValue('O3', "EMAIL");
        $sheet->setCellValue('P3', "STATUS TINGGAL");
        $sheet->setCellValue('Q3', "PROVINSI");
        $sheet->setCellValue('R3', "KAB/KOTA");
        $sheet->setCellValue('S3', "KECAMATAN");
        $sheet->setCellValue('T3', "KEL/DESA");
        $sheet->setCellValue('U3', "ALAMAT");
        $sheet->setCellValue('V3', "KORDINAT");
        $sheet->setCellValue('W3', "JARAK");
        $sheet->setCellValue('X3', "WAKTU");
        $sheet->setCellValue('Y3', "BIAYA SEKOLAH");
        $sheet->setCellValue('Z3', "KEB. KHUSUS");
        $sheet->setCellValue('AA3', "KEB. DISABILITAS");
        $sheet->setCellValue('AB3', "TK");
        $sheet->setCellValue('AC3', "PAUD");
        $sheet->setCellValue('AD3', "HEPATITIS");
        $sheet->setCellValue('AE3', "POLIO");
        $sheet->setCellValue('AF3', "BCG");
        $sheet->setCellValue('AG3', "CAMPAK");
        $sheet->setCellValue('AH3', "DPT");
        $sheet->setCellValue('AI3', "COVID");
        $sheet->setCellValue('AJ3', "NO KIP");
        $sheet->setCellValue('AK3', "NO KKS");
        $sheet->setCellValue('AL3', "NO PKH");
        $sheet->setCellValue('AM3', "NO KK");
        $sheet->setCellValue('AN3', "KEPALA KELUARGA");
        $sheet->setCellValue('AO3', "NPSN/NSM");
        $sheet->setCellValue('AP3', "NAMA SEKOLAH");
        $sheet->setCellValue('AQ3', "TAHUN LULUS");
        $sheet->setCellValue('AR3', "PROVINSI SEKOLAH");
        $sheet->setCellValue('AS3', "KAB/KOTA SEKOLAH");
        $sheet->setCellValue('AT3', "KECAMATAN SEKOLAH");

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header

        $col_start = 'A'; // Kolom pertama
        $col_end = 'AT'; // Kolom terakhir
        $row = 3; // Baris ke-3

        $range = $col_start . $row . ':' . $col_end . $row; // range yang akan diberi style
        $sheet->getStyle($range)->applyFromArray($style_col);

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $siswa = $this->M_Siswa->view();

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($siswa as $data) { // Lakukan looping pada variabel siswa

            // Date 
            $date = date('d-m-Y', strtotime($data->tgl_lahir)); //tgl siswa

            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $data->nisn);
            $sheet->setCellValue('C' . $numrow, $data->no_daftar);
            $sheet->setCellValue('D' . $numrow, $data->nama_siswa);
            $sheet->setCellValueExplicit('E' . $numrow, $data->nik, DataType::TYPE_STRING);
            $sheet->setCellValue('F' . $numrow, $data->tempat_lahir);
            $sheet->setCellValue('G' . $numrow, $date); //tgl siswa
            $sheet->setCellValue('H' . $numrow, $data->jk);
            $sheet->setCellValue('I' . $numrow, $data->anak_ke);
            $sheet->setCellValue('J' . $numrow, $data->saudara);
            $sheet->setCellValue('K' . $numrow, $data->agama);
            $sheet->setCellValue('L' . $numrow, $data->cita);
            $sheet->setCellValue('M' . $numrow, $data->hobi);
            $sheet->setCellValueExplicit('N' . $numrow, $data->no_hp, DataType::TYPE_STRING);
            $sheet->setCellValue('O' . $numrow, $data->emails);
            $sheet->setCellValue('P' . $numrow, $data->status_tinggal_siswa);
            $sheet->setCellValue('Q' . $numrow, $data->prov);
            $sheet->setCellValue('R' . $numrow, $data->kab);
            $sheet->setCellValue('S' . $numrow, $data->kec);
            $sheet->setCellValue('T' . $numrow, $data->desa);
            $sheet->setCellValue('U' . $numrow, $data->alamat_siswa);
            $sheet->setCellValue('V' . $numrow, $data->kordinat);
            $sheet->setCellValue('W' . $numrow, $data->jarak);
            $sheet->setCellValue('X' . $numrow, $data->waktu);
            $sheet->setCellValue('Y' . $numrow, $data->biaya_sekolah);
            $sheet->setCellValue('Z' . $numrow, $data->keb_khusus);
            $sheet->setCellValue('AA' . $numrow, $data->keb_disabilitas);
            $sheet->setCellValue('AB' . $numrow, $data->tk);
            $sheet->setCellValue('AC' . $numrow, $data->paud);
            $sheet->setCellValue('AD' . $numrow, $data->hepatitis);
            $sheet->setCellValue('AE' . $numrow, $data->polio);
            $sheet->setCellValue('AF' . $numrow, $data->bcg);
            $sheet->setCellValue('AG' . $numrow, $data->campak);
            $sheet->setCellValue('AH' . $numrow, $data->dpt);
            $sheet->setCellValue('AI' . $numrow, $data->covid);
            $sheet->setCellValueExplicit('AJ' . $numrow, $data->no_kip, DataType::TYPE_STRING);
            $sheet->setCellValueExplicit('AK' . $numrow, $data->no_kks, DataType::TYPE_STRING);
            $sheet->setCellValueExplicit('AL' . $numrow, $data->no_pkh, DataType::TYPE_STRING);
            $sheet->setCellValueExplicit('AM' . $numrow, $data->no_kk, DataType::TYPE_STRING);
            $sheet->setCellValue('AN' . $numrow, $data->kepala_keluarga);
            $sheet->setCellValueExplicit('AO' . $numrow, $data->npsn_sekolah, DataType::TYPE_STRING);
            $sheet->setCellValue('AP' . $numrow, $data->asal_sekolah);
            $sheet->setCellValue('AQ' . $numrow, $data->tahun_lulus);
            $sheet->setCellValue('AR' . $numrow, $data->prov_sekolah);
            $sheet->setCellValue('AS' . $numrow, $data->kab_sekolah);
            $sheet->setCellValue('AT' . $numrow, $data->kec_sekolah);

            // $sheet->setCellValueExplicit('E' . $numrow, $data->no_kk, DataType::TYPE_STRING);


            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            for ($i = 'A'; $i != 'AU'; $i++) {
                $sheet->getStyle($i . $numrow)->applyFromArray($style_row);
            }


            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }

        // Set width kolom
        for ($col = 'A'; $col !== 'AU'; $col++) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Laporan Data Siswa");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Siswa.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
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

    public function aksi_upload() // Update CS
    {
        $nisn   = $this->input->post('nisn');

        $config['upload_path']          = './assets/dokumen/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 2000;


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> File Berbentuk Pdf max 1 Mb</div>');
            redirect('admin/upload');
        } else {
            $data = array(
                'file'              => $this->upload->data('file_name'),
                'nisn'              => $nisn,

            );

            $this->db->where('nisn', $nisn);
            $this->db->update('detail_siswa', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Dokumen Berhasil di Upload</div>');
            redirect('admin/upload/' . $nisn);
        }
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
