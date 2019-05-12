<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kategoria_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  function getRows($id = "")
  {
    if (!empty($id)) {
      $query = $this->db->get_where('kategorie', array('idkategorie' => $id));
      return $query->row_array();
    } else {
      $query = $this->db->get('kategorie');
      return $query->result_array();
    }
  }

  public function insert($data = array())
  {
    $insert = $this->db->insert('kategorie', $data);
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
      $update = $this->db->update('kategorie', $data, array('idkategorie' => $id));
      return $update ? true : false;
    } else {
      return false;
    }
  }
  // odstranenie zaznamu
  public function delete($id)
  {
    $delete = $this->db->delete('kategorie', array('idkategorie' => $id));
    return $delete ? true : false;
  }

  public function getPocetKategoriiZaRok($rok)
  {
    $this->db->select('MONTH(od) mesiac, count(*) pocet');
    $this->db->from('brigady');
    $this->db->where('YEAR(od) = ' . $rok);
    $this->db->group_by('mesiac');
    $query = $this->db->get();
    return $query;
  }
}

/*
SELECT MONTH(od) mesiac, kategorie.kategoria, COUNT(*) FROM brigady
 INNER JOIN kategorie ON kategorie.idkategorie = brigady.idkategorie 
 WHERE YEAR(brigady.od) = 2019 GROUP BY mesiac, brigady.idkategorie
*/
