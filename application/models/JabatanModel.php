<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JabatanModel extends CI_Model
{

    public function aksitambahjabatan($data_jabatan)
    {
        $this->db->trans_begin();
        $this->db->insert('Jabatan', $data_jabatan);
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        } else {
            return false;
        }
    }

    public function jumlahJabatan()
    {
        $jabatan = $this->db->get('Jabatan');
        return $jabatan->num_rows();
    }

    public function ambildataJabatan()
    {
        $jabatan = $this->db->select('*');
        $jabatan = $this->db->from('Jabatan');
        $jabatan = $this->db->where("Jabatan.Jabatan != 'ADMIN'");
        $jabatan = $this->db->get();
        return $jabatan->result_array();
    }

    public function lihatjabatan($Idjabatan)
    {
        $jabatan = $this->db->select('*');
        $jabatan = $this->db->from('Jabatan');
        $jabatan = $this->db->where("Jabatan.Idjabatan = '" . $Idjabatan . "'");
        $jabatan = $this->db->get();
        return $jabatan->result_array();
    }

    public function aksiubahjabatan($data_jabatan)
    {
        $this->db->trans_begin();
        $this->db->where(['Idjabatan' => $data_jabatan['Idjabatan']]);
        $this->db->update('Jabatan', $data_jabatan);
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        } else {
            return false;
        }
    }

    public function aksihapusjabatan($Idjabatan)
    {
        $this->db->trans_begin();
        $this->db->where("Jabatan.Idjabatan = '" . $Idjabatan . "'");
        $this->db->delete('Jabatan');
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        } else {
            return false;
        }
    }
}

/* End of file JabatanModel.php */
