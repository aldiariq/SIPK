<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VariabelModel extends CI_Model
{
    public function jumlahVariabel()
    {
        $variabel = $this->db->get('Indikator');
        return $variabel->num_rows();
    }
}

/* End of file VariabelModel.php */
