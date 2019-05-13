<?php defined('BASEPATH') or exit('No direct script access allowed');

class Zamestnavatel_model extends CI_Model
{
    public function __construct()
    { }

    function getRows($id = "")
    {
        if (!empty($id)) {
            $query = $this->db->get_where('zamestnavatelia', array('id' => $id));
            return $query->row_array();
        } else {
            $query = $this->db->get('zamestnavatelia');
            return $query->result_array();
        }
    }

    public function insert($data = array())
    {
        $insert = $this->db->insert('zamestnavatelia', $data);
        if ($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    // aktualizacia zaznamu
    public function update($data, $id)
    {
        if (!empty($data) && !empty($id)) {
            $update = $this->db->update('zamestnavatelia', $data, array('id' => $id));
            return $update ? true : false;
        } else {
            return false;
        }
    }
    // odstranenie zaznamu
    public function delete($id)
    {
        $delete = $this->db->delete('zamestnavatelia', array('id' => $id));
        return $delete ? true : false;
    }

    public function getPocetZamestnavatelov()
    {
        $this->db->select('COUNT(*) as pocet');
        $this->db->from('zamestnavatelia');
        $query = $this->db->get();
        return $query->row_array();
    }
}
