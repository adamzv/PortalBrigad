<?php defined('BASEPATH') or exit('No direct script access allowed');

class Brigada_student_model extends CI_Model
{
  public function __construct()
  { }

  function getRows($id = "")
  {
    if (!empty($id)) {
      $query = $this->db->get_where('brigady_has_studenti', array('id' => $id));
      return $query->row_array();
    } else {
      $query = $this->db->get('brigady_has_studenti');
      return $query->result_array();
    }
  }

  public function insert($data = array())
  {
    $insert = $this->db->insert('brigady_has_studenti', $data);
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
      $update = $this->db->update('brigady_has_studenti', $data, array('id' => $id));
      return $update ? true : false;
    } else {
      return false;
    }
  }
  // odstranenie zaznamu
  public function delete($id)
  {
    $delete = $this->db->delete('brigady_has_studenti', array('id' => $id));
    return $delete ? true : false;
  }

  public function getBrigadyStudenta($id)
  {
    if (!empty($id)) {
      $query = $this->db->get_where('brigady_has_studenti', array('idstudenti' => $id));
      return $query->result_array();
    } else {
      return false;
    }
  }
}
