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

    public function data()
    {
        $this->db->select('*');
        $this->db->from('detail_siswa');
        $this->db->order_by('id', 'asc');
        return $this->db->get();
    }

    public function sekolah()
    {
        $this->db->select('*');
        $this->db->from('sekolah');
        $this->db->join('wilayah_kecamatan', 'wilayah_kecamatan.id = sekolah.id_kec', 'inner');
        $this->db->join('wilayah_kabupaten', 'wilayah_kabupaten.id = wilayah_kecamatan.kabupaten_id', 'inner');
        $this->db->join('wilayah_provinsi', 'wilayah_provinsi.id = wilayah_kabupaten.provinsi_id', 'inner');
        $this->db->limit(10);
        return $this->db->get()->result_array();
    }

    public function jm_admin() //Hitung Jumlah Admin
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_id', 1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jm_sekolah() //Hitung Jumlah Sekolah
    {
        $this->db->select('*');
        $this->db->from('sekolah');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jm_daftar() //Hitung Jumlah Daftar
    {
        $this->db->select('*');
        $this->db->from('detail_siswa');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jm_l() //Hitung Jumlah Admin
    {
        $this->db->select('*');
        $this->db->from('detail_siswa');
        $this->db->where('jk', 1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jm_p() //Hitung Jumlah Admin
    {
        $this->db->select('*');
        $this->db->from('detail_siswa');
        $this->db->where('jk', 2);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function cari_siswa($keyword) //Cari 
    {
        $this->db->select('*');
        $this->db->from('detail_siswa');
        $this->db->like('nama_siswa', $keyword);

        return $this->db->get()->result_array();
    }

    public function cari_siswa2($keyword) //Cari 
    {
        $this->db->select('*');
        $this->db->from('detail_siswa');
        $this->db->like('nama_siswa', $keyword);

        return $this->db->get()->result_array();
    }

    public function cari_sekolah($keyword) //Cari 
    {
        $this->db->select('*');
        $this->db->from('sekolah');
        $this->db->join('wilayah_kecamatan', 'wilayah_kecamatan.id = sekolah.id_kec', 'inner');
        $this->db->join('wilayah_kabupaten', 'wilayah_kabupaten.id = wilayah_kecamatan.kabupaten_id', 'inner');
        $this->db->join('wilayah_provinsi', 'wilayah_provinsi.id = wilayah_kabupaten.provinsi_id', 'inner');
        $this->db->limit(10);
        $this->db->like('id_skolah', $keyword);
        return $this->db->get()->result_array();
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
        $kodejadi = "PPDBM2024-" . $kodemax;    // hasilnya PPDB2023-0001 dst.
        return $kodejadi;
    }


    public function get_prov($prov)
    {
        $hasil = $this->db->query("SELECT * FROM wilayah_provinsi WHERE id ='$prov'");
        if ($hasil->num_rows() > 0) {
            foreach ($hasil->result() as $data) {
                $hasil = array(
                    'provinsi'  => $data->provinsi,
                );
            }
        }
        return $hasil;
    }

    public function get_kab($kab)
    {
        $hasil = $this->db->query("SELECT * FROM wilayah_kabupaten WHERE id ='$kab'");
        if ($hasil->num_rows() > 0) {
            foreach ($hasil->result() as $data) {
                $hasil = array(
                    'kabupaten'  => $data->kabupaten,
                );
            }
        }
        return $hasil;
    }

    public function get_kec($kec)
    {
        $hasil = $this->db->query("SELECT * FROM wilayah_kecamatan WHERE id ='$kec'");
        if ($hasil->num_rows() > 0) {
            foreach ($hasil->result() as $data) {
                $hasil = array(
                    'kecamatan'  => $data->kecamatan,
                );
            }
        }
        return $hasil;
    }

    public function get_des($des)
    {
        $hasil = $this->db->query("SELECT * FROM wilayah_desa WHERE id ='$des'");
        if ($hasil->num_rows() > 0) {
            foreach ($hasil->result() as $data) {
                $hasil = array(
                    'desa'  => $data->desa,
                );
            }
        }
        return $hasil;
    }

    public function get_sekolah($sekolah)
    {
        $hasil = $this->db->query("SELECT * FROM sekolah WHERE id_skolah ='$sekolah'");
        if ($hasil->num_rows() > 0) {
            foreach ($hasil->result() as $data) {
                $hasil = array(
                    'id_skolah'  => $data->id_skolah,
                    'nama_sekolah'  => $data->nama_sekolah,
                );
            }
        }
        return $hasil;
    }

    public function view()
    {
        return $this->db->get('detail_siswa')->result(); // Tampilkan semua data yang ada di tabel siswa
    }

    function rank_sekolah() //Renk Sekolah
    {
        $query = $this->db->query('SELECT asal_sekolah, COUNT(asal_sekolah) AS jumlah FROM detail_siswa GROUP BY asal_sekolah ORDER BY jumlah DESC');
        return $query;
    }

    function jml_sekolah() //Renk Sekolah
    {
        $query = $this->db->query('SELECT asal_sekolah, COUNT(asal_sekolah) AS jumlah FROM detail_siswa GROUP BY asal_sekolah');

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function Dsiswa($nisn = NULL)
    {
        $query = $this->db->get_where('detail_siswa', array('nisn' => $nisn));
        return $query;
    }

    public function news()
    {
        $this->db->select('*');
        $this->db->from('info');
        $this->db->limit(1);
        $this->db->order_by('id', 'desc');
        return $this->db->get();
    }

    public function news2()
    {
        $this->db->select('*');
        $this->db->from('info');
        $this->db->order_by('id', 'desc');
        $this->db->limit(10, 1);
        return $this->db->get();
    }

    public function wawancara($nisn)
    {
        $this->db->select('*');
        $this->db->from('detail_siswa');
        $this->db->join('wawancara', 'wawancara.id_siswa = detail_siswa.nisn', 'inner');
        $this->db->where('wawancara.id_siswa', $nisn);
        return $this->db->get();
    }

    public function prestasi($nisn)
    {
        $this->db->select('*');
        $this->db->from('detail_siswa');
        $this->db->join('prestasi', 'prestasi.siswa_id = detail_siswa.nisn', 'inner');
        $this->db->where('prestasi.siswa_id', $nisn);
        return $this->db->get();
    }

    public function prestasi2($kode)
    {
        $this->db->select('*');
        $this->db->from('prestasi');
        $this->db->join('user', 'user.email = prestasi.siswa_id', 'inner');
        $this->db->where('user.email', $kode);
        return $this->db->get();
    }


    function keterampilan() //jm keterampilan
    {
        $query = $this->db->query('SELECT keterampilan1, COUNT(keterampilan1) AS jumlah FROM wawancara GROUP BY keterampilan1 ');
        return $query;
    }

    public function tbsm() //Hitung Jumlah Admin
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

    public function tata() //Hitung Jumlah Admin
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

    public function multimedia() //Hitung Jumlah Admin
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

    public function jm_wawancara() //Hitung Jumlah Admin
    {
        $this->db->select('*');
        $this->db->from('detail_siswa');
        $this->db->where('kunci', 2);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function sd_wawancara()
    {
        $this->db->select('*');
        $this->db->from('detail_siswa');
        $this->db->where('kunci', '2');
        return $this->db->get();
    }

    public function bl_wawancara()
    {
        $query = $this->db->query('SELECT * FROM detail_siswa WHERE kunci = 0 OR kunci = 1');
        return $query;
    }

    public function Pcetak()
    {
        $tgl = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('detail_siswa');
        $this->db->join('wawancara', 'wawancara.id_siswa = detail_siswa.nisn', 'inner');
        $this->db->where('wawancara.date_created', $tgl);
        return $this->db->get()->result_array();
    }

    public function Pjm()
    {
        $tgl = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('detail_siswa');
        $this->db->join('wawancara', 'wawancara.id_siswa = detail_siswa.nisn', 'inner');
        $this->db->where('wawancara.date_created', $tgl);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function Rtbsm() //Hitung Jumlah Admin
    {
        $tgl = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where('keterampilan1', "TBSM");
        $this->db->where('wawancara.date_created', $tgl);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function Rtata() //Hitung Jumlah Admin
    {
        $tgl = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where('keterampilan1', "Tata Boga");
        $this->db->where('wawancara.date_created', $tgl);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function Rmulti() //Hitung Jumlah Admin
    {
        $tgl = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where('keterampilan1', "Multimedia");
        $this->db->where('wawancara.date_created', $tgl);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function Rteksan() //Hitung Jumlah Admin
    {
        $tgl = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where('mapel', "Teknik Sains");
        $this->db->where('wawancara.date_created', $tgl);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function Ragama() //Hitung Jumlah Admin
    {
        $tgl = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where('mapel', "Keagamaan");
        $this->db->where('wawancara.date_created', $tgl);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function Rkesehatan() //Hitung Jumlah Admin
    {
        $tgl = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where('mapel', "Kesehatan");
        $this->db->where('wawancara.date_created', $tgl);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function Rkeguruan() //Hitung Jumlah Admin
    {
        $tgl = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where('mapel', "Keguruan");
        $this->db->where('wawancara.date_created', $tgl);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function Rhumaniora() //Hitung Jumlah Admin
    {
        $tgl = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where('mapel', "Humaniora");
        $this->db->where('wawancara.date_created', $tgl);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function Rkerja() //Hitung Jumlah Admin
    {
        $tgl = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where('mapel', "Kerja");
        $this->db->where('wawancara.date_created', $tgl);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
