<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IndikatorModel extends CI_Model
{

    public function jumlahIndikator()
    {
        $indikator = $this->db->get('Indikator');
        return $indikator->num_rows();
    }

    public function ambildataIndikator()
    {
        $indikator = $this->db->select('*');
        $indikator = $this->db->from('Indikator');
        $indikator = $this->db->join('Variabel', 'Variabel.Idvariabel = Indikator.Idvariabel');
        $indikator = $this->db->get();
        return $indikator->result_array();
    }

    public function lihatindikator($Idindikator){
        $indikator = $this->db->select('*');
        $indikator = $this->db->from('Indikator');
        $indikator = $this->db->join('Variabel', 'Variabel.Idvariabel = Indikator.Idvariabel');
        $indikator = $this->db->where("Indikator.Idindikator = '".$Idindikator."'");
        $indikator = $this->db->get();
        return $indikator->result_array();
    }

    public function aksitambahindikator($data_indikator)
    {
        $this->db->trans_begin();
        $this->db->insert('Indikator', $data_indikator);
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        } else {
            return false;
        }
    }

    public function aksihapusindikator($Idindikator)
    {
        $this->db->trans_begin();
        $this->db->where("Indikator.Idindikator = '".$Idindikator."'");
        $this->db->delete('Indikator');
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        } else {
            return false;
        }
    }

    public function aksiubahindikator($data_indikator)
    {
        $this->db->trans_begin();
        $this->db->where(['Idindikator' => $data_indikator['Idindikator']]);
        $this->db->update('Indikator', $data_indikator);
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        } else {
            return false;
        }
    }
}

/* End of file IndikatorModel.php */
