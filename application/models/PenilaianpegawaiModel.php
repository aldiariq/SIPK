<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenilaianpegawaiModel extends CI_Model
{

    public function aksitambahpenilaianpegawai($data_penilaianpegawai)
    {
        $this->db->insert('Penilaianpegawai', $data_penilaianpegawai);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function lihatpenilaianpegawai($where_penilaianpegawai)
    {
        $penilaianpegawai = $this->db->select('*');
        $penilaianpegawai = $this->db->from('Penilaianpegawai');
        $penilaianpegawai = $this->db->join('Pegawai', 'Pegawai.Idpegawai = Penilaianpegawai.Idpegawai');
        $penilaianpegawai = $this->db->join('Indikator', 'Indikator.Idindikator = Penilaianpegawai.Idindikator');
        $penilaianpegawai = $this->db->join('Jabatan', 'Jabatan.Idjabatan = Pegawai.Idjabatan');
        $penilaianpegawai = $this->db->where("Pegawai.Idpegawai = '".$where_penilaianpegawai['Idpegawai']."' AND Penilaianpegawai.Tanggallaporan BETWEEN '".$where_penilaianpegawai['Tanggalmulai']."' AND '".$where_penilaianpegawai['Tanggalselesai']."'");
        $penilaianpegawai = $this->db->get();
        return $penilaianpegawai->result_array();
    }
}

/* End of file PenilaianpegawaiModel.php */
