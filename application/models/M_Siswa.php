<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Siswa extends CI_Model
{
    public function detail($kode)
    {
        $this->db->select('*');
        $this->db->from('detail_siswa');
        $this->db->join('user', 'user.id_siswa = detail_siswa.nik', 'inner');
        $this->db->where('user.id_siswa', $kode);
        return $this->db->get();
    }
}
