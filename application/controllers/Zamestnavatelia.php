<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Zamestnavatelia extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
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
        //zistenie, ci bola zaslana poziadavka na pridanie zazanmu
        if ($this->input->post('postSubmit')) {
            //definicia pravidiel validacie
            $this->form_validation->set_rules('nazov', 'názov', 'required');
            //priprava dat pre vlozenie
            $postData = array(
                'nazov' => $this->input->post('nazov'),
            );
            //validacia zaslanych dat
            if ($this->form_validation->run() == true) {
                //vlozenie dat
                $insert = $this->Zamestnavatel_model->insert($postData);
                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Zamestnávateľ bol úspešne vložený');
                    redirect('/zamestnavatelia');
                } else {
                    $data['error_msg'] = 'Máme problém.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Vytvoriť triedu';
        $data['action'] = 'Pridať';
        //zobrazenie formulara pre vlozenie a editaciu dat
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('zamestnavatelia/add-edit', $data);
        $this->load->view('templates/footer');
    }
    // aktualizacia dat
    public function edit($id)
    {
        $data = array();
        //ziskanie dat z tabulky
        $postData = $this->Zamestnavatel_model->getRows($id);
        //zistenie, ci bola zaslana poziadavka na aktualizaciu
        if ($this->input->post('postSubmit')) {
            //definicia pravidiel validacie
            $this->form_validation->set_rules('nazov', 'názov zamestnávateľa', 'required');
            $this->form_validation->set_rules('adresa', 'adresa zamestnávateľa', 'required');
            $this->form_validation->set_rules('email', 'email zamestnávateľa', 'required');
            $this->form_validation->set_rules('telefon', 'tel. číslo zamestnávateľa', 'required');
            // priprava dat pre aktualizaciu
            $postData = array(
                'nazov' => $this->input->post('nazov'),
                'adresa' => $this->input->post('adresa'),
                'email' => $this->input->post('email'),
                'telefon' => $this->input->post('telefon')
            );
            //validacia zaslanych dat
            if ($this->form_validation->run() == true) {
                //aktualizacia dat
                $update = $this->Zamestnavatel_model->update($postData, $id);
                if ($update) {
                    $this->session->set_userdata('success_msg', 'Zamestnavateľ bol aktualizovaný');
                    redirect('/zamestnavatelia');
                } else {
                    $data['error_msg'] = 'Máme problém.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Úprava zamestnávateľa';
        $data['action'] = 'Editovať';
        //zobrazenie formulara pre vlozenie a editaciu dat
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('zamestnavatelia/add-edit', $data);
        $this->load->view('templates/footer');
    }
    // odstranenie dat
    public function delete($id)
    {
        //overenie, ci id nie je prazdne
        if ($id) {
            //odstranenie zaznamu
            $delete = $this->Zamestnavatel_model->delete($id);
            if ($delete) {
                $this->session->set_userdata('success_msg', 'Student has been removed successfully.');
            } else {
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        redirect('/zamestnavatelia');
    }
}
