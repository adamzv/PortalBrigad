<?php defined('BASEPATH') or exit('No direct script access allowed');

class Brigada_model extends CI_Model
{
  public function __construct()
  { }

  function getRows($id = "")
  {
    if (!empty($id)) {
      $query = $this->db->select('brigady.idzamestnavatelia as idzamestnavatelia, brigady.idkategorie as idkategorie, zamestnavatelia.nazov as zamestnavatel, kategoria, idbrigady, brigady.nazov as nazov, popis, hod_mzda, od, aktivna');
      $query = $this->db->join('zamestnavatelia', 'zamestnavatelia.id = brigady.idzamestnavatelia', 'inner');
      $query = $this->db->join('kategorie', 'kategorie.idkategorie = brigady.idkategorie', 'inner');
      $query = $this->db->get_where('brigady', array('idbrigady' => $id));
      return $query->row_array();
    } else {
      $query = $this->db->select('brigady.idzamestnavatelia as idzamestnavatelia, brigady.idkategorie as idkategorie, zamestnavatelia.nazov as zamestnavatel, kategoria, idbrigady, brigady.nazov as nazov, popis, hod_mzda, od, aktivna');
      $query = $this->db->join('zamestnavatelia', 'zamestnavatelia.id = brigady.idzamestnavatelia', 'inner');
      $query = $this->db->join('kategorie', 'kategorie.idkategorie = brigady.idkategorie', 'inner');
      $query = $this->db->get('brigady');
      return $query->result_array();
    }
  }

  public function insert($data = array())
  {
    $insert = $this->db->insert('brigady', $data);
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
      $update = $this->db->update('brigady', $data, array('idbrigady' => $id));
      return $update ? true : false;
    } else {
      return false;
    }
  }
  // odstranenie zaznamu
  public function delete($id)
  {
    $delete = $this->db->delete('brigady', array('idbrigady' => $id));
    return $delete ? true : false;
  }

  public function getPocetBrigad()
  {
    $this->db->select('COUNT(*) as pocet');
    $this->db->from('brigady');
    $query = $this->db->get();
    return $query->row_array();
  }
}
