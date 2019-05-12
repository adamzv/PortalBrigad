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
    $this->load->model('Kategoria_model');
    $this->load->model('Student_model');
    $this->load->library('pagination');
  }

  public function index()
  {
    $data = array();
    //$data['brigady'] = $this->Brigada_model->getRows();
    $data['title'] = 'Dashboard | PortalBrigad';
    $data['pocet_studentov'] = $this->Student_model->getPocetStudentov();
    $data['pocet_zamestnavatelov'] = $this->Zamestnavatel_model->getPocetZamestnavatelov();
    $data['pocet_ponuk'] = $this->Brigada_model->getPocetBrigad();
    $data['graf_kategorie'] = json_encode($this->Kategoria_model->getPocetKategoriiZaRok(date('Y'))->result());

    $this->load->view('templates/header', $data);
    $this->load->view('templates/menu');
    $this->load->view('dashboard/index', $data);
    $this->load->view('templates/footer');
  }
}
