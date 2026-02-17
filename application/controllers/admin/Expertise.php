<?php defined('BASEPATH') or exit('No direct script access allowed');

class Expertise extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('general_model');
        $this->load->database();
    }

    /* ================= VIEW PAGE ================= */
    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/expertise_view');
        $this->load->view('admin/footer');
    }

    /* ================= GET AJAX ================= */
    public function get_ajax()
    {
        $limit  = 5;
        $page   = $this->input->get('page') ? (int)$this->input->get('page') : 1;
        $search = $this->input->get('search');

        $offset = ($page - 1) * $limit;

        /* -------- COUNT QUERY -------- */
        if ($search) {
            $this->db->like('title', $search);
        }

        $total = $this->db->count_all_results('expertise');

        /* -------- DATA QUERY -------- */
        if ($search) {
            $this->db->like('title', $search);
        }

        $data = $this->db
            ->order_by('id', 'DESC')
            ->limit($limit, $offset)
            ->get('expertise')
            ->result();

        $html = '';
        $i = $offset + 1;

        foreach ($data as $row) {

            /* ===== EYE STATUS BUTTON ===== */
            if ($row->isActive == 1) {

                $eyeBtn = '
                    <a href="javascript:void(0);" 
                    class="btn btn-light btn-sm action-btn toggle-status"
                    data-id="' . $row->id . '"
                    title="Click to Deactivate">
                        <i class="bx bx-show text-success"></i>
                    </a>';

                    $statusText = '<span class="text-success">
                            <i class="bx bx-radio-circle-marked"></i> Active
                        </span>';
            } else {

                $eyeBtn = '
                    <a href="javascript:void(0);" 
                    class="btn btn-light btn-sm action-btn toggle-status"
                    data-id="' . $row->id . '"
                    title="Click to Activate">
                        <i class="bx bx-hide text-danger"></i>
                    </a>';

                        $statusText = '<span class="text-danger">
                                <i class="bx bx-radio-circle-marked"></i> Inactive
                            </span>';
            }

            $html .= "
                <tr>
                    <td>{$i}</td>
                    <td>" . htmlspecialchars($row->title) . "</td>
                    <td>" . substr(strip_tags($row->description), 0, 60) . "</td>
                    <td>{$statusText}</td>
                    <td>
                        <div class='d-flex align-items-center gap-2'>

                            {$eyeBtn}

                            <a href='" . base_url('admin/expertise/edit/' . $row->id) . "' 
                            class='btn btn-light btn-sm action-btn'>
                                <i class='bx bx-edit text-primary'></i>
                            </a>

                        </div>
                    </td>
                </tr>
            ";

            $i++;
        }


        echo json_encode([
            'html'       => $html,
            'pagination' => $this->pagination_links($total, $limit, $page)
        ]);
    }

    /* ================= PAGINATION ================= */
    private function pagination_links($total, $limit, $page)
    {
        $pages = ceil($total / $limit);
        $html  = '';

        for ($i = 1; $i <= $pages; $i++) {
            $active = ($i == $page) ? 'active' : '';
            $html .= "
                <li class='page-item {$active}'>
                    <a href='#' data-page='{$i}' class='page-link'>{$i}</a>
                </li>
            ";
        }

        return $html;
    }

    /* ================= ADD ================= */
    public function add()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/expertise_form');
        $this->load->view('admin/footer');
    }

    /* ================= SAVE ================= */
    public function save()
    {
        $data = [
            'title'       => $this->input->post('title', true),
            'description' => $this->input->post('description', true)
        ];

        if ($this->input->post('id')) {
            $this->general_model->update(
                'expertise',
                ['id' => $this->input->post('id')],
                $data
            );
        } else {
            $this->general_model->insert('expertise', $data);
        }

        echo json_encode(['status' => true]);
    }

    /* ================= EDIT ================= */
    public function edit($id)
    {
        $data['expertise_edit'] =
            $this->general_model->getOne('expertise', ['id' => $id]);

        $this->load->view('admin/header');
        $this->load->view('admin/expertise_edit', $data);
        $this->load->view('admin/footer');
    }

    /* ================= TOGGLE STATUS ================= */
    public function toggle_status($id)
    {
        $row = $this->general_model->getOne('expertise', ['id' => $id]);

        if (!$row) {
            echo json_encode(['status' => false]);
            return;
        }

        $newStatus = $row->isActive == 1 ? 0 : 1;

        $this->general_model->update(
            'expertise',
            ['id' => $id],
            ['isActive' => $newStatus]
        );

        echo json_encode(['status' => $newStatus]);
    }
}
