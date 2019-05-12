<?php defined('BASEPATH') or exit('No direct script access allowed');

class Student_model extends CI_Model
{
  public function __construct()
  { }

  function getRows($id = "")
  {
    if (!empty($id)) {
      $query = $this->db->get_where('studenti', array('idstudenti' => $id));
      return $query->row_array();
    } else {
      $query = $this->db->get('studenti');
      return $query->result_array();
    }
  }

  public function insert($data = array())
  {
    $insert = $this->db->insert('studenti', $data);
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
      $update = $this->db->update('studenti', $data, array('idstudenti' => $id));
      return $update ? true : false;
    } else {
      return false;
    }
  }
  // odstranenie zaznamu
  public function delete($id)
  {
    $delete = $this->db->delete('studenti', array('idstudenti' => $id));
    return $delete ? true : false;
  }

  public function getZrucnosti($id = "")
  {
    if (!empty($id)) {
      $this->db->select('zrucnost');
      $this->db->from('zrucnosti');
      $this->db->join('studenti_has_zrucnosti', 'studenti_has_zrucnosti.zrucnosti_idzrucnosti = idzrucnosti', 'inner');
      $this->db->join('studenti', 'studenti_has_zrucnosti.studenti_idstudenti = studenti.idstudenti', 'inner');
      $this->db->where('studenti.idstudenti = ' . $id);
      $query = $this->db->get();
      return $query;
    } else {
      $this->load->model('zrucnost_model', 'zrucnosti');
      return $this->zrucnosti->getRows();
    }
  }

  public function insertZrucnosti($id, $zrucnosti)
  {
    foreach ($zrucnosti as $zrucnost) {
      $data[] = array(
        'studenti_idstudenti' => $id,
        'zrucnosti_idzrucnosti' => $zrucnost
      );
    }
    $this->db->insert_batch('studenti_has_zrucnosti', $data);
    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function updateZrucnosti($id, $update, $zrucnosti)
  {
    if ($update) {
      $this->db->delete('studenti_has_zrucnosti', array('studenti_idstudenti' => $id));
      $this->db->flush_cache();
      foreach ($zrucnosti as $zrucnost) {
        $data[] = array(
          'studenti_idstudenti' => $id,
          'zrucnosti_idzrucnosti' => $zrucnost
        );
      }
      $this->db->insert_batch('studenti_has_zrucnosti', $data);
      if ($this->db->affected_rows() > 0) {
        return TRUE;
      } else {
        return FALSE;
      }
    }
  }

  public function getPocetStudentov()
  {
    $this->db->select('COUNT(*) as pocet');
    $this->db->from('studenti');
    $query = $this->db->get();
    return $query->row_array();
  }
}
