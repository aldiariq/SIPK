<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PegawaiModel extends CI_Model
{

    public function aksitambahpegawai($data_pegawai)
    {
        $this->db->insert('Pegawai', $data_pegawai);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function jumlahPegawai()
    {
        $pegawai = $this->db->select('*');
        $pegawai = $this->db->from('Pegawai');
        $pegawai = $this->db->join('Jabatan', 'Jabatan.Idjabatan = Pegawai.Idjabatan');
        $pegawai = $this->db->where("Jabatan.Jabatan != 'ADMIN'");
        $pegawai = $this->db->get();
        return $pegawai->num_rows();
    }

    public function pegawai()
    {
        $pegawai = $this->db->select('*');
        $pegawai = $this->db->from('Pegawai');
        $pegawai = $this->db->join('Jabatan', 'Jabatan.Idjabatan = Pegawai.Idjabatan');
        $pegawai = $this->db->where("Jabatan.Jabatan != 'ADMIN'");
        $pegawai = $this->db->get();
        return $pegawai->result_array();
    }

    public function lihatpegawai($Idpegawai)
    {
        $pegawai = $this->db->select('*');
        $pegawai = $this->db->from('Pegawai');
        $pegawai = $this->db->join('Jabatan', 'Jabatan.Idjabatan = Pegawai.Idjabatan');
        $pegawai = $this->db->where("Pegawai.Idpegawai = '".$Idpegawai."'");
        $pegawai = $this->db->get();
        return $pegawai->result_array();
    }

    public function aksiubahprofil($data_profil)
    {
        $this->db->trans_begin();
        $this->db->where(['Idpegawai' => $data_profil['Idpegawai']]);
        $this->db->update('Pegawai', $data_profil);
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        } else {
            return false;
        }
    }

    public function aksihapuspegawai($data_pegawai)
    {
        $this->db->trans_begin();
        $this->db->where($data_pegawai);
        $this->db->delete('Pegawai');
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        } else {
            return false;
        }
    }
}

/* End of file PegawaiModel.php */
