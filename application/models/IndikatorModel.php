<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IndikatorModel extends CI_Model
{

    public function jumlahIndikator()
    {
        $indikator = $this->db->get('Indikator');
        return $indikator->num_rows();
    }
}

/* End of file IndikatorModel.php */
