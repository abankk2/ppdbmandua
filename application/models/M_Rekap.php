<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Rekap extends CI_Model
{

    public function bl_wawancara()
    {
        $query = $this->db->query('SELECT * FROM detail_siswa WHERE kunci = 0 OR kunci = 1');
        return $query;
    }

    public function Pcetak()
    {
        $this->db->select('*');
        $this->db->from('detail_siswa');
        $this->db->join('wawancara', 'wawancara.id_siswa = detail_siswa.nisn', 'inner');
        $this->db->where('detail_siswa.kunci', 2);
        return $this->db->get()->result_array();
    }

    public function prestasi()
    {
        $this->db->select('*');
        $this->db->from('detail_siswa');
        $this->db->join('prestasi', 'prestasi.siswa_id = detail_siswa.nisn', 'inner');
        return $this->db->get()->result_array();
    }

    public function Pjm()
    {
        $this->db->select('*');
        $this->db->from('detail_siswa');
        $this->db->join('wawancara', 'wawancara.id_siswa = detail_siswa.nisn', 'inner');
        $this->db->where('detail_siswa.kunci', 2);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function Rtbsm() //Hitung Jumlah Admin
    {
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where('keterampilan1', "TBSM");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function Rtata() //Hitung Jumlah Admin
    {
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where('keterampilan1', "Tata Boga");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function Rmulti() //Hitung Jumlah Admin
    {
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where('keterampilan1', "Multimedia");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function Rteksan() //Hitung Jumlah Admin
    {
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where('mapel', "Teknik Sains");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function Ragama() //Hitung Jumlah Admin
    {
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where('mapel', "Keagamaan");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function Rkesehatan() //Hitung Jumlah Admin
    {
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where('mapel', "Kesehatan");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function Rkeguruan() //Hitung Jumlah Admin
    {
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where('mapel', "Keguruan");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function Rhumaniora() //Hitung Jumlah Admin
    {
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where('mapel', "Humaniora");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function Rkerja() //Hitung Jumlah Admin
    {
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where('mapel', "Kerja");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function view()
    {
        $this->db->select('*');
        $this->db->from('detail_siswa');
        $this->db->join('wawancara', 'wawancara.id_siswa = detail_siswa.nisn', 'inner');
        $this->db->where('detail_siswa.kunci', 2);
        return $this->db->get()->result();
    }
}
