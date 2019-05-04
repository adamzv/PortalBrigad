<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Zamestnavatelia extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Zamestnavatel_model');
        $this->load->library('pagination');
    }
    public function index()
    {
        $data = array();
        $data['zamestnavatelia'] = $this->Zamestnavatel_model->getRows();
        $data['title'] = 'Zamestnávatelia | PortalBrigad';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('zamestnavatelia/index', $data);
        $this->load->view('templates/footer');
    }

    // Zobrazenie detailu o triede
    public function view($id)
    {
        $data = array();
        //kontrola, ci bolo zaslane id riadka
        if (!empty($id)) {
            $data['zamestnavatel'] = $this->Zamestnavatel_model->getRows($id);
            $data['title'] = $data['zamestnavatel']['nazov'] . ' | PortalBrigad';
            //nahratie detailu zaznamu
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('zamestnavatelia/view', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('/zamestnavatelia');
        }
    }
    // pridanie zaznamu
    public function add()
    {
        $data = array();
        $postData = array();

        $this->form_validation->set_error_delimiters('', '<br>');

        $this->form_validation->set_rules('nazov', 'názov zamestnávateľa', 'required');
        $this->form_validation->set_rules('adresa', 'adresa zamestnávateľa', 'required');
        $this->form_validation->set_rules('email', 'email zamestnávateľa', 'required');
        $this->form_validation->set_rules('telefon', 'tel. číslo zamestnávateľa', 'required');

        $data['post'] = $postData;
        $data['title'] = 'Vytvoriť triedu';
        $data['action'] = 'Pridať';

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('zamestnavatelia/add-edit', $data);
            $this->load->view('templates/footer');
        } else {
            $postData = array(
                'nazov' => $this->input->post('nazov'),
                'adresa' => $this->input->post('adresa'),
                'email' => $this->input->post('email'),
                'telefon' => $this->input->post('telefon')
            );
            $insert = $this->Zamestnavatel_model->insert($postData);
            if ($insert) {
                $this->session->set_userdata('success_msg', 'Zamestnávateľ bol úspešne vložený');
                redirect('/zamestnavatelia');
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
        $postData = $this->Zamestnavatel_model->getRows($id);

        $this->form_validation->set_error_delimiters('', '<br>');
        //nastavenie validacie
        $this->form_validation->set_rules('nazov', 'názov zamestnávateľa', 'required');
        $this->form_validation->set_rules('adresa', 'adresa zamestnávateľa', 'required');
        $this->form_validation->set_rules('email', 'email zamestnávateľa', 'required');
        $this->form_validation->set_rules('telefon', 'tel. číslo zamestnávateľa', 'required');

        $data['post'] = $postData;
        $data['title'] = 'Úprava zamestnávateľa';
        $data['action'] = 'Editovať';
        //zobrazenie formulara pre vlozenie a editaciu dat
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('zamestnavatelia/add-edit', $data);
            $this->load->view('templates/footer');
        } else {
            $postData = array(
                'nazov' => $this->input->post('nazov'),
                'adresa' => $this->input->post('adresa'),
                'email' => $this->input->post('email'),
                'telefon' => $this->input->post('telefon')
            );
            $update = $this->Zamestnavatel_model->update($postData, $id);
            if ($update) {
                $this->session->set_userdata('success_msg', 'Zamestnávateľ bol aktualizovaný');
                redirect('/zamestnavatelia');
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
            $delete = $this->Zamestnavatel_model->delete($id);
            if ($delete) {
                $this->session->set_userdata('success_msg', 'Zamestnávateľ bol vymazaný.');
            } else {
                $this->session->set_userdata('error_msg', 'Pri vymazávaní nastala chyba, skúste znova.');
            }
        }
        redirect('/zamestnavatelia');
    }
}
