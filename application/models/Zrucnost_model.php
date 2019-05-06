<?php defined('BASEPATH') or exit('No direct script access allowed');

class Zrucnost_model extends CI_Model
{
  public function __construct()
  { }

  function getRows($id = "")
  {
    if (!empty($id)) {
      $query = $this->db->get_where('zrucnosti', array('idzrucnosti' => $id));
      return $query->row_array();
    } else {
      $query = $this->db->get('zrucnosti');
      return $query->result_array();
    }
  }

  public function insert($data = array())
  {
    $insert = $this->db->insert('zrucnosti', $data);
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
      $update = $this->db->update('zrucnosti', $data, array('idzrucnosti' => $id));
      return $update ? true : false;
    } else {
      return false;
    }
  }
  // odstranenie zaznamu
  public function delete($id)
  {
    $delete = $this->db->delete('zrucnosti', array('idzrucnosti' => $id));
    return $delete ? true : false;
  }

  public function getChartData()
  {
    $this->db->select('zrucnost, count(zrucnost) as pocet');
    $this->db->from('zrucnosti');
    $this->db->join('studenti_has_zrucnosti', 'studenti_has_zrucnosti.zrucnosti_idzrucnosti = idzrucnosti', 'inner');
    $this->db->group_by('zrucnost');
    $query = $this->db->get();
    return $query;
  }
}
