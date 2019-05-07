<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Zrucnosti extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('form_validation');
    $this->load->model('Zrucnost_model');
    $this->load->library('pagination');
  }
  public function index()
  {
    $data = array();
    $data['zrucnosti'] = $this->Zrucnost_model->getRows();
    $data['graf'] = json_encode($this->Zrucnost_model->getChartData()->result());
    $data['title'] = 'Zručnosti | PortalBrigad';

    $this->load->view('templates/header', $data);
    $this->load->view('templates/menu');
    $this->load->view('zrucnosti/index', $data);
    $this->load->view('templates/footer');
  }

  // pridanie zaznamu
  public function add()
  {
    $postData = array();

    $this->form_validation->set_error_delimiters('', '<br>');

    $this->form_validation->set_rules('zrucnost', 'zručnosť', 'trim|required|min_length[3]|max_length[25]');
    if ($this->form_validation->run() === TRUE) {
      $postData = array(
        'zrucnost' => $this->input->post('zrucnost'),
      );
      $insert = $this->Zrucnost_model->insert($postData);
      if ($insert) {
        echo json_encode(TRUE);
      }
    } else {
      echo json_encode(FALSE);
    }
  }

  // aktualizacia dat
  public function edit($id)
  {
    // TODO
  }

  // odstranenie dat
  public function delete($id)
  {
    //overenie, ci id nie je prazdne
    if ($id) {
      //odstranenie zaznamu
      $delete = $this->Zrucnost_model->delete($id);
      if ($delete) {
        $this->session->set_userdata('success_msg', 'Zručnosť bol vymazaná.');
      } else {
        $this->session->set_userdata('error_msg', 'Pri vymazávaní nastala chyba, skúste znova.');
      }
    }
    redirect('/zrucnosti');
  }
}
