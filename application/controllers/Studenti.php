<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Studenti extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('form_validation');
    $this->load->model('Student_model');
    $this->load->model('Brigada_student_model');
    $this->load->library('pagination');
  }
  public function index()
  {
    $data = array();
    $data['studenti'] = $this->Student_model->getRows();
    $data['brigady'] = $this->Brigada_student_model->getBrigadyStudentov();
    $data['title'] = 'Študenti | PortalBrigad';

    $this->load->view('templates/header', $data);
    $this->load->view('templates/menu');
    $this->load->view('studenti/index', $data);
    $this->load->view('templates/footer');
  }

  // Zobrazenie detailu o triede
  public function view($id)
  {
    if (isset($_GET['file'])) {
      $file = $_GET['file'];
      $filePath = dirname(__FILE__, 3) . '/assets/uploads/';
      if (file_exists($filePath . $file) && is_readable($filePath . $file) && preg_match('/\.pdf$/', $filePath . $file)) {
        header('Content-Type: application/pdf');
        header("Content-Disposition: attachment; filename=\"$file\"");
        readfile($filePath . $file);
      }
    }

    $data = array();
    //kontrola, ci bolo zaslane id riadka
    if (!empty($id)) {
      $data['student'] = $this->Student_model->getRows($id);
      $data['zrucnosti'] = $this->Student_model->getZrucnosti($id)->result();
      $data['title'] = $data['student']['meno'] . ' ' . $data['student']['priezvisko'] . ' | PortalBrigad';
      $data['brigady'] = $this->Brigada_student_model->getBrigadyStudenta($id);
      //nahratie detailu zaznamu
      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('studenti/view', $data);
      $this->load->view('templates/footer');
    } else {
      redirect('/studenti');
    }
  }
  // pridanie zaznamu
  public function add()
  {
    $data = array();
    $postData = array();

    $this->form_validation->set_error_delimiters('', '<br>');

    $this->form_validation->set_rules('meno', 'meno študenta', 'trim|required|min_length[3]|max_length[20]|alpha_international');
    $this->form_validation->set_rules('priezvisko', 'priezvisko študenta', 'trim|required|min_length[2]|max_length[20]|alpha_international');
    $this->form_validation->set_rules('email', 'email študenta', 'required');
    $this->form_validation->set_rules('telefon', 'tel. číslo študenta', 'required');
    $this->form_validation->set_rules('vzdelanie', 'vzdelanie študenta', 'trim|required|max_length[30]');

    $data['post'] = $postData;
    $data['title'] = 'Vytvoriť študenta';
    $data['action'] = 'Pridať';
    $data['zrucnosti'] = $this->Student_model->getZrucnosti();

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('studenti/add-edit', $data);
      $this->load->view('templates/footer');
    } else {
      $postData = array(
        'meno' => $this->input->post('meno'),
        'priezvisko' => $this->input->post('priezvisko'),
        'email' => $this->input->post('email'),
        'telefon' => $this->input->post('telefon'),
        'vzdelanie' => $this->input->post('vzdelanie')
      );
      $config['upload_path']          = './assets/uploads/';
      $config['allowed_types']        = 'pdf';
      $config['max_size']             = 10000;
      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('zivotopis')) {
        $data['error_msg'] = 'Máme problém';
      } else {
        $postData['zivotopis'] = $this->upload->data()['file_name'];
      }

      $postZrucnosti = $this->input->post('zrucnostiStudenta');
      $insert = $this->Student_model->insert($postData);
      $insertZrucnosti = $this->Student_model->insertZrucnosti($insert, $postZrucnosti);

      if ($insert) {
        $this->session->set_userdata('success_msg', 'Študent bol úspešne vložený');
        redirect('/studenti');
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
    $postData = $this->Student_model->getRows($id);

    $this->form_validation->set_error_delimiters('', '<br>');
    //nastavenie validacie
    $this->form_validation->set_rules('meno', 'meno študenta', 'trim|required|min_length[3]|max_length[20]|alpha_international');
    $this->form_validation->set_rules('priezvisko', 'priezvisko študenta', 'trim|required|min_length[2]|max_length[20]|alpha_international');
    $this->form_validation->set_rules('email', 'email študenta', 'required');
    $this->form_validation->set_rules('telefon', 'tel. číslo študenta', 'required');
    $this->form_validation->set_rules('vzdelanie', 'vzdelanie študenta', 'trim|required|max_length[30]');

    $data['post'] = $postData;
    $data['title'] = 'Úprava študenta';
    $data['action'] = 'Editovať';
    $data['zrucnosti'] = $this->Student_model->getZrucnosti();
    $data['zrucnosti_st'] = $this->Student_model->getZrucnosti($id)->result();
    //zobrazenie formulara pre vlozenie a editaciu dat
    if ($this->form_validation->run() === FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('studenti/add-edit', $data);
      $this->load->view('templates/footer');
    } else {
      $postData = array(
        'meno' => $this->input->post('meno'),
        'priezvisko' => $this->input->post('priezvisko'),
        'email' => $this->input->post('email'),
        'telefon' => $this->input->post('telefon'),
        'vzdelanie' => $this->input->post('vzdelanie')
      );

      $config['upload_path']          = './assets/uploads/';
      $config['allowed_types']        = 'pdf';
      $config['max_size']             = 10000;
      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('zivotopis')) {
        $data['error_msg'] = 'Máme problém';
      } else {
        $postData['zivotopis'] = $this->upload->data()['file_name'];
      }

      $postZrucnosti = $this->input->post('zrucnostiStudenta');
      $update = $this->Student_model->update($postData, $id);
      $updateZrucnosti = $this->Student_model->updateZrucnosti($id, $update, $postZrucnosti);
      if ($update) {
        $this->session->set_userdata('success_msg', 'Študent bol aktualizovaný');
        redirect('/studenti');
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
      $delete = $this->Student_model->delete($id);
      if ($delete) {
        $this->session->set_userdata('success_msg', 'Študent bol vymazaný.');
      } else {
        $this->session->set_userdata('error_msg', 'Pri vymazávaní nastala chyba, skúste znova.');
      }
    }
    redirect('/studenti');
  }
}
