<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Siswa extends CI_Model
{
    public function detail($kode)
    {
        $this->db->select('*');
        $this->db->from('detail_siswa');
        $this->db->join('user', 'user.email = detail_siswa.nisn', 'inner');
        $this->db->where('user.email', $kode);
        return $this->db->get();
    }

    // Buat Kode PPDB
    public function buat_kode()
    {
        $this->db->select('RIGHT(detail_siswa.id,4) as kode', FALSE);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('detail_siswa');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 5 menunjukkan jumlah digit angka 0
        $kodejadi = "PPDB2023-" . $kodemax;    // hasilnya PPDB2023-0001 dst.
        return $kodejadi;
    }
}
