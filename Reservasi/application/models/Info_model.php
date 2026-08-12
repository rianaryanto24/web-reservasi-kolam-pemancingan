<?php
class Info_model extends CI_Model {

    public function get_info()
    {
        return $this->db->get('info_kolam')->row();
    }

    public function update_info($data)
    {
        $this->db->where('id', 1); // ambil data id 1
        $this->db->update('info_kolam', $data);
    }
}