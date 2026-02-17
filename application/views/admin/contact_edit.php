<div class="page-wrapper">
    <div class="page-content">

        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('dashboard'); ?>">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Contact Page Settings
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Contact Card -->
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit Contact Details</h5>
                <hr>

                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="<?= base_url('admin/contact/update') ?>">

                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label">Contact Email</label>
                                    <input type="email"
                                        name="contact_email"
                                        class="form-control"
                                        value="<?= $contact->contact_email ?? '' ?>"
                                        placeholder="Enter Contact Email"
                                        required>
                                </div>

                                <!-- Mobile -->
                                <div class="mb-3">
                                    <label class="form-label">Contact Mobile</label>
                                    <input type="text"
                                        name="contact_mobile"
                                        class="form-control"
                                        value="<?= $contact->contact_mobile ?? '' ?>"
                                        placeholder="Enter Contact Mobile"
                                        required>
                                </div>

                                <!-- Submit -->
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="bx bx-save me-1"></i> Update Contact
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>