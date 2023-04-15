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
            'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
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


        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);
        $sheet->getStyle('F3')->applyFromArray($style_col);
        $sheet->getStyle('G3')->applyFromArray($style_col);
        $sheet->getStyle('H3')->applyFromArray($style_col);
        $sheet->getStyle('I3')->applyFromArray($style_col);
        $sheet->getStyle('J3')->applyFromArray($style_col);
        $sheet->getStyle('K3')->applyFromArray($style_col);
        $sheet->getStyle('L3')->applyFromArray($style_col);
        $sheet->getStyle('M3')->applyFromArray($style_col);
        $sheet->getStyle('N3')->applyFromArray($style_col);
        $sheet->getStyle('O3')->applyFromArray($style_col);
        $sheet->getStyle('P3')->applyFromArray($style_col);
        $sheet->getStyle('Q3')->applyFromArray($style_col);
        $sheet->getStyle('R3')->applyFromArray($style_col);
        $sheet->getStyle('S3')->applyFromArray($style_col);
        $sheet->getStyle('T3')->applyFromArray($style_col);
        $sheet->getStyle('U3')->applyFromArray($style_col);
        $sheet->getStyle('V3')->applyFromArray($style_col);
        $sheet->getStyle('W3')->applyFromArray($style_col);
        $sheet->getStyle('X3')->applyFromArray($style_col);
        $sheet->getStyle('Y3')->applyFromArray($style_col);
        $sheet->getStyle('Z3')->applyFromArray($style_col);
        $sheet->getStyle('AA3')->applyFromArray($style_col);
        $sheet->getStyle('AB3')->applyFromArray($style_col);
        $sheet->getStyle('AC3')->applyFromArray($style_col);
        $sheet->getStyle('AD3')->applyFromArray($style_col);
        $sheet->getStyle('AE3')->applyFromArray($style_col);
        $sheet->getStyle('AF3')->applyFromArray($style_col);
        $sheet->getStyle('AG3')->applyFromArray($style_col);
        $sheet->getStyle('AH3')->applyFromArray($style_col);
        $sheet->getStyle('AI3')->applyFromArray($style_col);
        $sheet->getStyle('AJ3')->applyFromArray($style_col);
        $sheet->getStyle('AK3')->applyFromArray($style_col);
        $sheet->getStyle('AL3')->applyFromArray($style_col);
        $sheet->getStyle('AM3')->applyFromArray($style_col);
        $sheet->getStyle('AN3')->applyFromArray($style_col);

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

            // $sheet->setCellValueExplicit('E' . $numrow, $data->no_kk, DataType::TYPE_STRING);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('G' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('H' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('I' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('J' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('K' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('L' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('M' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('N' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('O' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('P' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('Q' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('R' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('S' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('T' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('U' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('V' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('W' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('X' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('Y' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('Z' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('AA' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('AB' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('AC' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('AD' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('AE' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('AF' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('AG' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('AH' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('AI' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('AJ' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('AK' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('AL' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('AM' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('AN' . $numrow)->applyFromArray($style_row);


            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);
        $sheet->getColumnDimension('J')->setAutoSize(true);
        $sheet->getColumnDimension('K')->setAutoSize(true);
        $sheet->getColumnDimension('L')->setAutoSize(true);
        $sheet->getColumnDimension('M')->setAutoSize(true);
        $sheet->getColumnDimension('N')->setAutoSize(true);
        $sheet->getColumnDimension('O')->setAutoSize(true);
        $sheet->getColumnDimension('P')->setAutoSize(true);
        $sheet->getColumnDimension('Q')->setAutoSize(true);
        $sheet->getColumnDimension('R')->setAutoSize(true);
        $sheet->getColumnDimension('S')->setAutoSize(true);
        $sheet->getColumnDimension('T')->setAutoSize(true);
        $sheet->getColumnDimension('U')->setAutoSize(true);
        $sheet->getColumnDimension('V')->setAutoSize(true);
        $sheet->getColumnDimension('W')->setAutoSize(true);
        $sheet->getColumnDimension('X')->setAutoSize(true);
        $sheet->getColumnDimension('Y')->setAutoSize(true);
        $sheet->getColumnDimension('Z')->setAutoSize(true);
        $sheet->getColumnDimension('AA')->setAutoSize(true);
        $sheet->getColumnDimension('AB')->setAutoSize(true);
        $sheet->getColumnDimension('AC')->setAutoSize(true);
        $sheet->getColumnDimension('AD')->setAutoSize(true);
        $sheet->getColumnDimension('AE')->setAutoSize(true);
        $sheet->getColumnDimension('AF')->setAutoSize(true);
        $sheet->getColumnDimension('AG')->setAutoSize(true);
        $sheet->getColumnDimension('AH')->setAutoSize(true);
        $sheet->getColumnDimension('AI')->setAutoSize(true);
        $sheet->getColumnDimension('AJ')->setAutoSize(true);
        $sheet->getColumnDimension('AK')->setAutoSize(true);
        $sheet->getColumnDimension('AL')->setAutoSize(true);
        $sheet->getColumnDimension('AM')->setAutoSize(true);
        $sheet->getColumnDimension('AN')->setAutoSize(true);


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
