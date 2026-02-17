    <div class="page-wrapper">
        <div class="page-content">

            <!-- Breadcrumb -->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Table</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="<?= base_url('dashboard'); ?>">
                                    <i class="bx bx-home-alt"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active">All Expertise</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <hr>

            <div class="card">
                <div class="card-body">

                    <!-- Search -->
                    <div class="d-lg-flex align-items-center mb-4 gap-3">
                        <input type="text" id="search"
                            class="form-control w-25"
                            placeholder="Search expertise...">
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Index#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="expertise"></tbody>
                        </table>
                    </div>

                </div>
            </div>

            <!-- Pagination -->
            <nav>
                <ul class="pagination trilex-pagination" id="pagination"></ul>
            </nav>

        </div>
    </div>

    <style>
        .trilex-pagination {
            display: flex;
            justify-content: center;
            gap: 6px;
        }

        .trilex-pagination .page-item .page-link {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #007bff;
            color: #007bff;
            font-weight: 600;
            border-radius: 8px;
            background: white;
        }

        .trilex-pagination .active .page-link {
            background: #007bff;
            color: white;
        }

        .trilex-pagination .page-link:hover {
            background: #0056b3;
            color: white;
        }

        .toggle-status {
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }

        .toggle-status i {
            font-size: 14px;
        }
    </style>


    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {

            let currentPage = 1;

            loadExpertise(currentPage, '');

            function loadExpertise(page, search) {
                currentPage = page;

                $.ajax({
                    url: "<?= base_url('admin/expertise/get_ajax') ?>",
                    type: "GET",
                    data: {
                        page: page,
                        search: search
                    },
                    dataType: "json",
                    success: function(data) {

                        if (data.html !== undefined) {
                            $('#expertise').html(data.html);
                            $('#pagination').html(data.pagination);
                        } else {
                            $('#expertise').html(
                                '<tr><td colspan="5" class="text-center text-muted">No Expertise Found</td></tr>'
                            );
                        }
                    },
                    error: function() {
                        $('#expertise').html(
                            '<tr><td colspan="5" class="text-center text-danger">Error Loading Data</td></tr>'
                        );
                    }
                });
            }

            /* Pagination Click */
            $(document).on('click', '#pagination a', function(e) {
                e.preventDefault();

                let page = $(this).data('page');
                if (!page) return;

                let search = $('#search').val();
                loadExpertise(page, search);
            });

            /* Search */
            $('#search').on('keyup', function() {
                let search = $(this).val();
                loadExpertise(1, search);
            });

            /* Toggle Active / Inactive */
            $(document).on('click', '.toggle-status', function() {

                let id = $(this).data('id');

                $.ajax({
                    url: "<?= base_url('admin/expertise/toggle_status/') ?>" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(res) {

                        Swal.fire({
                            icon: res.status == 1 ? 'success' : 'warning',
                            title: res.status == 1 ? 'Activated' : 'Deactivated',
                            timer: 1200,
                            showConfirmButton: false
                        });

                        loadExpertise(currentPage, $('#search').val());
                    }
                });

            });


        });

        $(document).on('click', '.view-expertise', function() {

            let title = $(this).data('title');
            let description = $(this).data('description');

            Swal.fire({
                title: title,
                html: "<div style='text-align:left'>" + description + "</div>",
                width: 600
            });

        });
    </script>