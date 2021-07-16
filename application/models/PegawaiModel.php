<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PegawaiModel extends CI_Model
{

    public function jumlahPegawai()
    {
        $pegawai = $this->db->select('*');
        $pegawai = $this->db->from('Pegawai');
        $pegawai = $this->db->join('Jabatan', 'Jabatan.Idjabatan = Pegawai.Idjabatan');
        $pegawai = $this->db->where("Jabatan.Jabatan = 'PEGAWAI'");
        $pegawai = $this->db->get();
        return $pegawai->num_rows();
    }
}

/* End of file PegawaiModel.php */
