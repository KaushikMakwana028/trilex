<div class="page-wrapper">
    <div class="page-content">

        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('admin/dashboard'); ?>">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Add Expertise</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Card -->
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add Expertise</h5>
                <hr>

                <form id="ExpertiseForm" novalidate>

                    <!-- Title -->
                    <div class="mb-3">
                        <label class="form-label">Expertise Title</label>
                        <input type="text"
                            name="title"
                            class="form-control"
                            placeholder="Enter expertise title"
                            required>
                        <div class="invalid-feedback">
                            Please enter expertise title.
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label">Expertise Description</label>
                        <textarea name="description"
                            class="form-control"
                            rows="5"
                            placeholder="Enter expertise description"
                            required></textarea>
                        <div class="invalid-feedback">
                            Please enter expertise description.
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="mb-3">
                        <button type="submit"
                            id="submitBtn"
                            class="btn btn-primary w-100">
                            Save Expertise
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {

        $("#ExpertiseForm").on("submit", function(e) {
            e.preventDefault();

            let form = this;

            // Bootstrap validation
            if (!form.checkValidity()) {
                $(form).addClass('was-validated');
                return;
            }

            $("#submitBtn").prop("disabled", true);

            $.ajax({
                url: "<?= base_url('admin/expertise/save') ?>",
                type: "POST",
                data: $(form).serialize(),
                dataType: "json",

                beforeSend: function() {
                    Swal.fire({
                        title: 'Please wait...',
                        text: 'Saving expertise details',
                        allowOutsideClick: false,
                        didOpen: () => Swal.showLoading()
                    });
                },

                success: function(res) {
                    Swal.close();

                    if (res.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Expertise saved successfully!',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = "<?= base_url('admin/expertise') ?>";
                        });
                    } else {
                        Swal.fire('Error', 'Something went wrong', 'error');
                        $("#submitBtn").prop("disabled", false);
                    }
                },

                error: function() {
                    Swal.close();
                    Swal.fire('Error', 'Server error occurred', 'error');
                    $("#submitBtn").prop("disabled", false);
                }
            });

        });

    });
</script>