<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('general_model');
    }

    public function index()
    {
        $data['about'] = $this->general_model->getOne('about_page', ['id' => 1]);

        $this->load->view('admin/header');
        $this->load->view('admin/about_edit', $data);
        $this->load->view('admin/footer');
    }

    public function update()
    {
        $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description')
        ];

        $this->general_model->update('about_page', ['id' => 1], $data);

        $this->session->set_flashdata('success', 'Updated Successfully');
        redirect('admin/about');
    }
}
