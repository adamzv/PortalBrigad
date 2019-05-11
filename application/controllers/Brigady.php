<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brigady extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('form_validation');
    $this->load->model('Brigada_model');
    $this->load->model('Zamestnavatel_model');
    $this->load->model('Kategoria_model');
    $this->load->library('pagination');
  }
  public function index()
  {
    $data = array();
    $data['brigady'] = $this->Brigada_model->getRows();
    $data['title'] = 'Brigády | PortalBrigad';

    $this->load->view('templates/header', $data);
    $this->load->view('templates/menu');
    $this->load->view('brigady/index', $data);
    $this->load->view('templates/footer');
  }

  // Zobrazenie detailu o triede
  public function view($id)
  {
    $data = array();
    //kontrola, ci bolo zaslane id riadka
    if (!empty($id)) {
      $data['brigada'] = $this->Brigada_model->getRows($id);
      $data['title'] = $data['brigada']['nazov'] . ' | PortalBrigad';
      //nahratie detailu zaznamu
      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('brigady/view', $data);
      $this->load->view('templates/footer');
    } else {
      redirect('/brigady');
    }
  }
  // pridanie zaznamu
  public function add()
  {
    $data = array();
    $postData = array();

    $this->form_validation->set_error_delimiters('', '<br>');

    $this->form_validation->set_rules('nazov', 'názov ponuky', 'trim|required|min_length[5]|max_length[40]|alpha_international');
    $this->form_validation->set_rules('popis', 'popis ponuky', 'trim|required|min_length[10]');
    $this->form_validation->set_rules('hod_mzda', 'hodinová mzda', 'trim|numeric|required');
    $this->form_validation->set_rules('od', 'dátum nástupu', 'trim|required');
    $this->form_validation->set_rules('aktivna', 'stav ponuky', 'trim|required');
    // TODO pridať validáciu cudzích kľúčov

    $data['post'] = $postData;
    $data['title'] = 'Vytvoriť brigádu';
    $data['action'] = 'Pridať';
    $data['zamestnavatelia'] = $this->Zamestnavatel_model->getRows();
    $data['kategorie'] = $this->Kategoria_model->getRows();

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('brigady/add-edit', $data);
      $this->load->view('templates/footer');
    } else {
      $postData = array(
        'nazov' => $this->input->post('nazov'),
        'popis' => $this->input->post('popis'),
        'hod_mzda' => $this->input->post('hod_mzda'),
        'od' => $this->input->post('od'),
        'aktivna' => $this->input->post('aktivna'),
        'zamestnavatel' => $this->input->post('zamestnavatel'),
        'kategoria' => $this->input->post('kategoria')
      );
      $insert = $this->Brigada_model->insert($postData);

      if ($insert) {
        $this->session->set_userdata('success_msg', 'Brigáda bola úspešne vložená');
        redirect('/brigady');
      } else {
        $data['error_msg'] = 'Máme problém.';
      }
    }
  }

  // aktualizacia dat
  public function edit($id)
  {
    $data = array();
    //ziskanie dat z tabulky
    $postData = $this->Brigada_model->getRows($id);

    $this->form_validation->set_error_delimiters('', '<br>');
    //nastavenie validacie
    $this->form_validation->set_rules('nazov', 'názov ponuky', 'trim|required|min_length[5]|max_length[40]|alpha_international');
    $this->form_validation->set_rules('popis', 'popis ponuky', 'trim|required|min_length[10]');
    $this->form_validation->set_rules('hod_mzda', 'hodinová mzda', 'trim|numeric|required');
    $this->form_validation->set_rules('od', 'dátum nástupu', 'trim|required');
    $this->form_validation->set_rules('aktivna', 'stav ponuky', 'trim|required');
    // TODO pridať validáciu cudzích kľúčov

    $data['post'] = $postData;
    $data['title'] = 'Vytvoriť brigádu';
    $data['action'] = 'Editovať';
    $data['zamestnavatelia'] = $this->Zamestnavatel_model->getRows();
    $data['kategorie'] = $this->Kategoria_model->getRows();
    //zobrazenie formulara pre vlozenie a editaciu dat
    if ($this->form_validation->run() === FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('brigady/add-edit', $data);
      $this->load->view('templates/footer');
    } else {
      $postData = array(
        'nazov' => $this->input->post('nazov'),
        'popis' => $this->input->post('popis'),
        'hod_mzda' => $this->input->post('hod_mzda'),
        'od' => $this->input->post('od'),
        'aktivna' => $this->input->post('aktivna'),
        'idzamestnavatelia' => $this->input->post('zamestnavatel'),
        'idkategorie' => $this->input->post('kategoria')
      );
      $update = $this->Brigada_model->update($postData, $id);
      if ($update) {
        $this->session->set_userdata('success_msg', 'Bridáda bola aktualizovaná');
        redirect('/brigady');
      } else {
        $data['error_msg'] = 'Máme problém.';
      }
    }
  }

  // odstranenie dat
  public function delete($id)
  {
    //overenie, ci id nie je prazdne
    if ($id) {
      //odstranenie zaznamu
      $delete = $this->Brigada_model->delete($id);
      if ($delete) {
        $this->session->set_userdata('success_msg', 'Brigáda bola vymazaná.');
      } else {
        $this->session->set_userdata('error_msg', 'Pri vymazávaní nastala chyba, skúste znova.');
      }
    }
    redirect('/brigady');
  }
}
