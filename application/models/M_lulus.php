<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_lulus extends CI_Model
{
    // Ganti URL dengan link export CSV dari Google Sheet
    private $sheet_url = 'https://docs.google.com/spreadsheets/d/1iXIikoeQch52rhOQEajcPgsxa9dSQFsaTxXzhKNxzPI/export?format=csv';

    public function get_all_data()
    {
        $csv = @file_get_contents($this->sheet_url);
        if (!$csv) return []; // Antisipasi error

        $lines = array_map('str_getcsv', explode("\n", $csv));
        $headers = array_map('trim', $lines[0]);
        $data = [];

        for ($i = 1; $i < count($lines); $i++) {
            if (count($lines[$i]) < count($headers)) continue;
            $row = array_combine($headers, $lines[$i]);
            $data[] = $row;
        }

        return $data;
    }

    public function cari_nisn($nisn)
    {
        $data = $this->get_all_data();
        foreach ($data as $row) {
            if (isset($row['NISN']) && trim($row['NISN']) == trim($nisn)) {
                return $row;
            }
        }
        return null;
    }
}
