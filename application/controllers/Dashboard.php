<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('form_validation');
    $this->load->model('Brigada_model');
    $this->load->model('Brigada_student_model');
    $this->load->model('Zamestnavatel_model');
    $this->load->model('Student_model');
    $this->load->library('pagination');
  }

  public function index()
  {
    $data = array();
    //$data['brigady'] = $this->Brigada_model->getRows();
    $data['title'] = 'Dashboard | PortalBrigad';
    $data['pocet_studentov'] = $this->Student_model->getPocetStudentov();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/menu');
    $this->load->view('dashboard/index', $data);
    $this->load->view('templates/footer');
  }
}
