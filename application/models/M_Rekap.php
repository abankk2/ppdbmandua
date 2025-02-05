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

    public function data()
    {
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->order_by('id', 'asc');
        return $this->db->get();
    }

    // function search_blog($title)
    // {
    //     $this->db->like('id_skolah', $title, 'both');
    //     $this->db->order_by('id_skolah', 'ASC');
    //     $this->db->limit(10);
    //     return $this->db->get('sekolah')->result();
    // }

    function search_blog($title)
    {
        // Query pertama ke tabel 'sekolah'
        $this->db->select('id_skolah, nama_sekolah, nsm, status');
        $this->db->from('sekolah');
        $this->db->like('id_skolah', $title, 'both');
        $this->db->order_by('id_skolah', 'ASC');
        $this->db->limit(10);
        $query1 = $this->db->get();

        // Query kedua ke tabel 'sekolah_baru'
        $this->db->select('id_skolah, nama_sekolah, nsm, status');
        $this->db->from('sekolah_baru');
        $this->db->like('id_skolah', $title, 'both');
        $this->db->order_by('id_skolah', 'ASC');
        $this->db->limit(10);
        $query2 = $this->db->get();

        // Menggabungkan hasil dari kedua query
        $result = array_merge($query1->result(), $query2->result());

        return $result;
    }


    function get_school_by_npsn($npsn)
    {
        $this->db->where('id_skolah', $npsn);
        $query = $this->db->get('sekolah');
        return $query->row_array();
    }


    public function Sekolah($npsn = NULL)
    {
        $query = $this->db->get_where('sekolah', array('id_skolah' => $npsn));
        return $query;
    }
}
