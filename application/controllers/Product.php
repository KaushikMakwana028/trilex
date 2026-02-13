<?php

class Product extends CI_Controller
{



    public function __construct()
    {

        parent::__construct();

        $this->load->library('session');

        $this->load->helper('url');

        $this->load->model('general_model');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('product_view');
        $this->load->view('footer');
    }

    public function fetch_products()
    {
        $page = $this->input->get('page') ?? 1;
        $limit = ($this->input->get('device') == 'mobile') ? 5 : 6;
        $offset = ($page - 1) * $limit;

        $this->db->where('isActive', 1);
        $total = $this->db->count_all_results('posts');

        $this->db->where('isActive', 1);
        $this->db->limit($limit, $offset);
        $products = $this->db->get('posts')->result();

        $html = '';

        foreach ($products as $product) {

            $ext = pathinfo($product->file_path, PATHINFO_EXTENSION);

            /* ===== MEDIA ===== */

            if ($ext === 'mp4') {
                $media = '
        <video autoplay muted loop playsinline class="w-100 h-100">
            <source src="' . base_url($product->file_path) . '" type="video/mp4">
        </video>';
            } else {
                $media = '
        <img src="' . base_url($product->file_path) . '" 
             alt="' . htmlspecialchars($product->title) . '" 
             class="w-100 h-100">';
            }

            $shortDesc = substr(strip_tags($product->description), 0, 90) . '…';

            /* ===== PRICE + BUTTON LOGIC ===== */

            $badge = ''; // always define

            if (strtolower(trim($product->post_type)) == 'free') {

                // FREE PRODUCT UI
                $price_ui = '
        <div class="product-card-price mb-3">
            <span class="badge bg-danger px-3 py-2">FREE</span>
        </div>';

                // If drive link exists → open directly
                if (!empty($product->drive_link)) {
                    $button_link = base_url('product/detail/' . $product->id);
                    $button_text = 'View Details <i class="bx bx-right-arrow-alt"></i>';
                    $target = '';

                } 
                // else {
                //     $button_link = base_url('product/detail/' . $product->id);
                //     $button_text = 'View Details';
                //     $target = '';
                // }

                // Small red badge on image
                // $badge = '<span class="free-badge">FREE</span>';

            } else {

                // PAID PRODUCT UI
                $price_ui = '
        <div class="product-card-price mb-3">
            ₹' . number_format($product->price, 2) . '
        </div>';

                $button_link = base_url('product/detail/' . $product->id);
                $button_text = 'View Details';
                $target = '';
            }

            /* ===== HTML OUTPUT ===== */

            $html .= '
    <div class="col-lg-4 col-md-6">
        <div class="product-card h-100">

            <div class="media position-relative">
                ' . $badge . '
                ' . $media . '
            </div>

            <div class="product-card-body text-start">

                <h5 class="product-card-title mb-2">
                    ' . htmlspecialchars($product->title) . '
                </h5>

                ' . $price_ui . '

                <p class="text-muted small mb-4">
                    ' . $shortDesc . '
                </p>

                <a href="' . $button_link . '" 
                   ' . $target . '
                   class="btn btn-primary w-100 fw-semibold">
                    ' . $button_text . '
                </a>

            </div>
        </div>
    </div>';
        }



        /* ---------- PAGINATION ---------- */
        $total_pages = ceil($total / $limit);
        $pagination = '<ul class="pagination justify-content-center mt-4">';

        if ($page > 1) {
            $pagination .= '
        <li class="page-item">
            <a class="page-link" href="#" data-page="' . ($page - 1) . '">‹ Prev</a>
        </li>';
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $page || ($i >= $page - 1 && $i <= $page + 1)) {
                $active = ($i == $page) ? 'active' : '';
                $pagination .= '
            <li class="page-item ' . $active . '">
                <a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a>
            </li>';
            }
        }

        if ($page < $total_pages) {
            $pagination .= '
        <li class="page-item">
            <a class="page-link" href="#" data-page="' . ($page + 1) . '">Next ›</a>
        </li>';
        }

        $pagination .= '</ul>';

        echo json_encode([
            'html' => $html,
            'pagination' => $pagination
        ]);
    }

    public function detail($id = null)
    {
        if (!$id) {
            show_404();
        }

        $data['product'] = $this->general_model->getOne('posts', ['id' => $id, 'isActive' => 1]);

        if (!$data['product']) {
            show_404();
        }
        // echo "<pre>";
        // print_r( $data['product']);
        // die;


        $this->load->view('header');
        $this->load->view('product_details', $data);
        $this->load->view('footer');
    }

    public function checkout($id)
    {
        $product = $this->general_model->getOne('posts', ['id' => $id]);

        if (!$product) {
            show_404();
        }

        // Block free products
        if (strtolower(trim($product->post_type)) == 'free') {
            if (!empty($product->drive_link)) {
                redirect($product->drive_link);
            }

            $this->session->set_flashdata('no_drive_link', true);
            redirect('product/detail/' . $product->id);
        }

        // 🔥 FETCH QR SETTINGS FROM DATABASE
        $qr = $this->db->get('payment_settings')->row(); // change table name if different

        $data['product'] = $product;
        $data['qr'] = $qr;   // VERY IMPORTANT

        $this->load->view('header');
        $this->load->view('payment_view', $data);
        $this->load->view('footer');
    }



    public function submit()
    {
        $this->load->helper('url');

        $product_title = $this->input->post('product_title');
        $product_price = $this->input->post('product_price');
        $email = $this->input->post('email');
        $transaction_ref = $this->input->post('transaction_ref');

        if (!empty($_FILES['payment_receipt']['name'])) {
            $config['upload_path'] = './uploads/receipts/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 3072;
            $config['file_name'] = time() . '_' . $_FILES['payment_receipt']['name'];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('payment_receipt')) {
                echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
                return;
            } else {
                $receipt_file = $this->upload->data('file_name');
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Please upload payment receipt.']);
            return;
        }
        $user_id = $this->session->userdata('user_id');


        // Insert into database
        $data = [
            'user_id' => $user_id,
            'product_title' => $product_title,
            'product_price' => $product_price,
            'email' => $email,
            'transaction_ref' => $transaction_ref,
            'payment_receipt' => $receipt_file,
            'created_on' => date('Y-m-d H:i:s')
        ];

        $this->db->insert('orders', $data);

        echo json_encode(['status' => 'success']);
    }
}
