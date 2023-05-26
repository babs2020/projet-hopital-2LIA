<?php
class patient extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('projet_model');
    }

    function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           /* $libelle = $this->input->post('libelle');
            $commentaire = $this->input->post('commentaire');
            $d_date_debut = $this->input->post('d_date_debut');
            $d_date_fin = $this->input->post('d_date_fin');
            $prev_date_deb = $this->input->post('prev_date_debut');
            $prev_date_fin = $this->input->post('prev_date_fin');
            $etat = $this->input->post('etat');
            $budget_prev = $this->input->post('budget_prev');
            $budget_reel = $this->input->post('budget_reel');
            $responsable = $this->input->post('responsable');

            $data = array(
                'libelle' => $libelle,
                'commentaire' => $commentaire,
                'd_date_deb' => $d_date_debut,
                'd_date_fin' => $d_date_fin,
                'prev_date_deb' => $prev_date_deb,
                'prev_date_fin' => $prev_date_fin,
                'etat' => $etat,
                'budget_prev' => $budget_prev,
                'budget_reel' => $budget_reel,
                'responsable' => $responsable,
                'ip'         => $_SERVER['REMOTE_ADDR'],
                'date_crea'  =>date('Y-m-d')
            ); */

            $status =  $this->projet_model->insertPatient();
            if ($status == true) {
                $this->session->set_flashdata('success', 'successfully Added');
                redirect(base_url('user/add'));
            } else {
                $this->session->set_flashdata('error', 'Error');
                $this->load->view('patients/add_patient');
            }
        } else {
            $this->load->view('patients/add_patient');
        }
    }

    function index()
    {
       // $data['patient'] = $this->projet_model->getProjets();
        $this->load->view('patients/index');
    }

    function edit($id)
    {
        $data['projets'] = $this->projet_model->getProjet($id);
        $data['id']=$id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $libelle = $this->input->post('libelle');
            $commentaire = $this->input->post('commentaire');
            $d_date_debut = $this->input->post('d_date_debut');
            $d_date_fin = $this->input->post('d_date_fin');
            $prev_date_deb = $this->input->post('prev_date_debut');
            $prev_date_fin = $this->input->post('prev_date_fin');
            $etat = $this->input->post('etat');
            $budget_prev = $this->input->post('budget_prev');
            $budget_reel = $this->input->post('budget_reel');
            $responsable = $this->input->post('responsable');

            $data = array(
                'libelle' => $libelle,
                'commentaire' => $commentaire,
                'd_date_deb' => $d_date_debut,
                'd_date_fin' => $d_date_fin,
                'prev_date_deb' => $prev_date_deb,
                'prev_date_fin' => $prev_date_fin,
                'etat' => $etat,
                'budget_prev' => $budget_prev,
                'budget_reel' => $budget_reel,
                'responsable' => $responsable,
                'ip'         => $_SERVER['REMOTE_ADDR'],
                'date_crea'  =>date('Y-m-d')
            );

            $status =  $this->projet_model->updateProjet($data, $id);
            if ($status == true) {
                $this->session->set_flashdata('success', 'successfully Updated');
                redirect(base_url('projet/edit/'.$id));
            } else {
                $this->session->set_flashdata('error', 'Error');
                $this->load->view('projet/edit_projet');
            }
        }

        $this->load->view('projet/edit_projet',$data);
    }

    function delete($id)
    {
        if(is_numeric($id))
        {
            $status =$this->projet_model->deleteProjet($id);
            if ($status == true) {
                $this->session->set_flashdata('deleted', 'successfully Deleted');
                redirect(base_url('projet/index/'));
            } else {
                $this->session->set_flashdata('error', 'Error');
                redirect(base_url('projet/index/'));
            }
        }
    }
}
