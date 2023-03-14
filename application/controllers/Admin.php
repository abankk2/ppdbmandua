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
}
