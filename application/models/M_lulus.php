<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_lulus extends CI_Model
{

    public function get_by_nisn($nisn)
    {
        return $this->db->get_where('kelulusan', ['nisn' => $nisn])->row();
    }
}
