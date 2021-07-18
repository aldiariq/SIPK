<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VariabelModel extends CI_Model
{
    public function jumlahVariabel()
    {
        $variabel = $this->db->get('Variabel');
        return $variabel->num_rows();
    }

    public function ambildataVariabel()
    {
        $variabel = $this->db->get('Variabel');
        return $variabel->result_array();
    }

    public function aksitambahvariabel($data_variabel)
    {
        $this->db->trans_begin();
        $this->db->insert('Variabel', $data_variabel);
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        } else {
            return false;
        }
    }

    public function lihatvariabel($Idvariabel)
    {
        $variabel = $this->db->select('*');
        $variabel = $this->db->from('Variabel');
        $variabel = $this->db->where("Variabel.Idvariabel = '".$Idvariabel."'");
        $variabel = $this->db->get();
        return $variabel->result_array();
    }

    public function aksihapusvariabel($Idvariabel)
    {
        $this->db->trans_begin();
        $this->db->where("Variabel.Idvariabel = '".$Idvariabel."'");
        $this->db->delete('Variabel');
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        } else {
            return false;
        }
    }

    public function aksiubahvariabel($data_variabel)
    {
        $this->db->trans_begin();
        $this->db->where(['Idvariabel' => $data_variabel['Idvariabel']]);
        $this->db->update('Variabel', $data_variabel);
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        } else {
            return false;
        }
    }
}

/* End of file VariabelModel.php */
