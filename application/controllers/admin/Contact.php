<?php defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('general_model');
        $this->load->library('session');
    }

    // Show Edit Page
    public function index()
    {
        $data['contact'] = $this->general_model
            ->getOne('contact_page', ['id' => 1]);

        // LOAD FULL ADMIN LAYOUT
        $this->load->view('admin/header');
        $this->load->view('admin/contact_edit', $data);
        $this->load->view('admin/footer');
    }

    // Update Contact
    public function update()
    {
        $data = [
            'contact_email'  => $this->input->post('contact_email'),
            'contact_mobile' => $this->input->post('contact_mobile')
        ];

        $this->general_model->update('contact_page', ['id' => 1], $data);

        $this->session->set_flashdata('success', 'Updated Successfully!');
        redirect('admin/contact');
    }
}
