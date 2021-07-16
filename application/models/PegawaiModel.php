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

    public function aksiubahprofil($data_profil)
    {
        $this->db->where(['Idpegawai' => $data_profil['Idpegawai']]);
        $this->db->update('Pegawai', $data_profil);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
}

/* End of file PegawaiModel.php */
