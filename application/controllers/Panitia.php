<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Worksheet\ColumnDimension;

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
        $mapel2             = $this->input->post('mapel2');
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
        $oleh               = $this->input->post('oleh');
        $date_created       = $this->input->post('date_created');

        $data = array(
            'id_siswa'          => $id_siswa,
            'nama'          => $nama,
            'mapel'         => $mapel,
            'mapel2'        => $mapel2,
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
            'date_created'  => $date_created


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

    public function print()
    {
        $data['title'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jml']        = $this->M_Siswa->Pjm();
        $data['siswa']      = $this->M_Siswa->Pcetak();
        $data['tbsm']       = $this->M_Siswa->Rtbsm();
        $data['tata']       = $this->M_Siswa->Rtata();
        $data['multi']      = $this->M_Siswa->Rmulti();
        $data['teksan']      = $this->M_Siswa->Rteksan();
        $data['agama']      = $this->M_Siswa->Ragama();
        $data['kes']      = $this->M_Siswa->Rkesehatan();
        $data['guru']      = $this->M_Siswa->Rkeguruan();
        $data['human']      = $this->M_Siswa->Rhumaniora();
        $data['kerja']      = $this->M_Siswa->Rkerja();

        $this->load->view('panitia/print', $data);
    }

    public function rekapprestasi()
    {
        $data['title'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['siswa']      = $this->M_Rekap->prestasi();


        $this->load->view('panitia/rekap_prestasi', $data);
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

    public function pdf()
    {
        $data['title'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jml']        = $this->M_Rekap->Pjm();
        $data['siswa']      = $this->M_Rekap->Pcetak();
        $data['tbsm']       = $this->M_Rekap->Rtbsm();
        $data['tata']       = $this->M_Rekap->Rtata();
        $data['multi']      = $this->M_Rekap->Rmulti();
        $data['teksan']     = $this->M_Rekap->Rteksan();
        $data['agama']      = $this->M_Rekap->Ragama();
        $data['kes']        = $this->M_Rekap->Rkesehatan();
        $data['guru']       = $this->M_Rekap->Rkeguruan();
        $data['human']      = $this->M_Rekap->Rhumaniora();
        $data['kerja']      = $this->M_Rekap->Rkerja();

        $this->load->view('panitia/print', $data);
    }

    public function pdf2()
    {

        $data['siswa'] = $this->M_Siswa->bl_wawancara()->result_array();

        $this->load->view('panitia/pdf2', $data);
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
        $sheet->setCellValue('A1', "DATA SISWA WAWANCARA PPDB TAHUN 2023/2024"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A3', "NO");
        $sheet->setCellValue('B3', "NO DAFTAR");
        $sheet->setCellValue('C3', "NISN");
        $sheet->setCellValue('D3', "NAMA SISWA");
        $sheet->setCellValue('E3', "MAPEL 1");
        $sheet->setCellValue('F3', "MAPEL 2");
        $sheet->setCellValue('G3', "KETERAMPILAN 1");
        $sheet->setCellValue('H3', "KETERAMPILAN 2");
        $sheet->setCellValue('I3', "KETERAMPILAN 3");
        $sheet->setCellValue('J3', "RENCANA");
        $sheet->setCellValue('K3', "PTN 1");
        $sheet->setCellValue('L3', "BID STUDI");
        $sheet->setCellValue('M3', "PTN 2");
        $sheet->setCellValue('N3', "BID STUDI");
        $sheet->setCellValue('O3', "BTQ TULIS");
        $sheet->setCellValue('P3', "BTQ BACA");


        // Apply style header yang telah kita buat tadi ke masing-masing kolom header

        $col_start = 'A'; // Kolom pertama
        $col_end = 'P'; // Kolom terakhir
        $row = 3; // Baris ke-3

        $range = $col_start . $row . ':' . $col_end . $row; // range yang akan diberi style
        $sheet->getStyle($range)->applyFromArray($style_col);

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $siswa = $this->M_Rekap->view(); /////////////////////////////////////////////////////

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($siswa as $data) { // Lakukan looping pada variabel siswa

            // Date 

            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $data->no_daftar);
            $sheet->setCellValue('C' . $numrow, $data->id_siswa);
            $sheet->setCellValue('D' . $numrow, $data->nama);
            $sheet->setCellValue('E' . $numrow, $data->mapel);
            $sheet->setCellValue('F' . $numrow, $data->mapel2);
            $sheet->setCellValue('G' . $numrow, $data->keterampilan1);
            $sheet->setCellValue('H' . $numrow, $data->keterampilan2);
            $sheet->setCellValue('I' . $numrow, $data->keterampilan3);
            $sheet->setCellValue('J' . $numrow, $data->rencana);
            $sheet->setCellValue('K' . $numrow, $data->ptn1);
            $sheet->setCellValue('L' . $numrow, $data->jurusan1);
            $sheet->setCellValue('M' . $numrow, $data->ptn2);
            $sheet->setCellValue('N' . $numrow, $data->jurusan2);
            $sheet->setCellValue('O' . $numrow, $data->baca);
            $sheet->setCellValue('P' . $numrow, $data->tulis);



            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            for ($i = 'A'; $i != 'P'; $i++) {
                $sheet->getStyle($i . $numrow)->applyFromArray($style_row);
            }

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }

        // Set width kolom
        for ($col = 'A'; $col !== 'P'; $col++) {
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
        header('Content-Disposition: attachment; filename="Data Siswa Wawancara.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function export_siswa()
    {

        $data['siswa'] = $this->M_Siswa->data()->result_array();

        $this->load->view('panitia/export', $data);
    }
}
