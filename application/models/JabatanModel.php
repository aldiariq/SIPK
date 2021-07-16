<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class JabatanModel extends CI_Model {

    public function ambildataJabatan()
    {
        $data_jabatan = $this->db->get('Jabatan');
        return $data_jabatan->result_array();
    }

}

/* End of file JabatanModel.php */
