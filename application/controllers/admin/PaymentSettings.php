<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PaymentSettings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('general_model');
        $this->load->database();

        if (!$this->session->userdata('admin')) {
            redirect('admin');
        }
    }

    public function index()
    {
        $data['payment'] = $this->db->get('payment_settings')->row();

        // IMPORTANT: wrap inside your admin theme
        $this->load->view('admin/header');
        $this->load->view('admin/payment_settings', $data);
        $this->load->view('admin/footer');
    }

    public function update_qr()
    {
        $data = [
            'upi_id' => $this->input->post('upi_id'),
            'qr_data' => $this->input->post('qr_data')
        ];

        $this->db->update('payment_settings', $data, ['id' => 1]);

        redirect('admin/paymentsettings');
    }

    public function update_bank()
    {
        $this->load->library('upload');

        $data = [
            'bank_name' => $this->input->post('bank_name'),
            'bank_account_number' => $this->input->post('bank_account_number'),
            'bank_holder_name' => $this->input->post('bank_holder_name'),
            'ifsc_code' => $this->input->post('ifsc_code'),
            'upi_id' => $this->input->post('upi_id')
        ];

        // Handle QR Image Upload
        if (!empty($_FILES['qr_image']['name'])) {
            $config['upload_path'] = 'uploads/qr/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048; // 2MB
            $config['file_name'] = 'qr_' . time() . '_' . pathinfo($_FILES['qr_image']['name'], PATHINFO_EXTENSION);

            $this->upload->initialize($config);

            if ($this->upload->do_upload('qr_image')) {
                $upload_data = $this->upload->data();
                $data['qr_image'] = $upload_data['file_name'];

                // Delete old QR image if exists
                $old_payment = $this->db->get('payment_settings')->row();
                if (!empty($old_payment->qr_image) && file_exists('uploads/qr/' . $old_payment->qr_image)) {
                    unlink('uploads/qr/' . $old_payment->qr_image);
                }
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/paymentsettings');
                return;
            }
        }

        $this->db->update('payment_settings', $data, ['id' => 1]);
        $this->session->set_flashdata('success', 'Bank payment settings updated successfully!');

        redirect('admin/paymentsettings');
    }
}
