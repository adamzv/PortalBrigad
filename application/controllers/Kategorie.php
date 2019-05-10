<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategorie extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('form_validation');
    $this->load->model('Kategoria_model');
    $this->load->library('pagination');
  }
  public function index()
  {
    $data = array();
    $data['kategorie'] = $this->Kategoria_model->getRows();
    //$data['graf'] = json_encode($this->Kategoria_model->getChartData()->result());
    $data['title'] = 'Kategórie | PortalBrigad';

    $this->load->view('templates/header', $data);
    $this->load->view('templates/menu');
    $this->load->view('kategorie/index', $data);
    $this->load->view('templates/footer');
  }

  // pridanie zaznamu
  public function add()
  {
    $postData = array();

    $this->form_validation->set_error_delimiters('', '<br>');

    $this->form_validation->set_rules('kategoria', 'kategória', 'trim|required|min_length[3]|max_length[25]');
    if ($this->form_validation->run() === TRUE) {
      $postData = array(
        'kategoria' => $this->input->post('kategoria'),
      );
      $insert = $this->Kategoria_model->insert($postData);
      if ($insert) {
        echo json_encode(TRUE);
      }
    } else {
      echo json_encode(FALSE);
    }
  }

  // odstranenie dat
  public function delete($id)
  {
    //overenie, ci id nie je prazdne
    if ($id) {
      //odstranenie zaznamu
      $delete = $this->Kategoria_model->delete($id);
      if ($delete) {
        $this->session->set_userdata('success_msg', 'Kategória bol vymazaná.');
      } else {
        $this->session->set_userdata('error_msg', 'Pri vymazávaní nastala chyba, skúste znova.');
      }
    }
    redirect('/kategorie');
  }
}
