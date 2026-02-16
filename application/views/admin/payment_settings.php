<div class="page-wrapper">
    <div class="page-content">

        <div class="card shadow-sm">
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Bank Payment Settings</h5>
            </div>

            <div class="card-body">

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> <?= $this->session->flashdata('success'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> <?= $this->session->flashdata('error'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?= base_url('admin/paymentsettings/update_bank'); ?>" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Bank Account Number</label>
                                <input type="text"
                                    name="bank_account_number"
                                    class="form-control"
                                    value="<?= htmlspecialchars($payment->bank_account_number ?? ''); ?>"
                                    placeholder="e.g., 1234567890"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">IFSC Code</label>
                                <input type="text"
                                    name="ifsc_code"
                                    class="form-control"
                                    value="<?= htmlspecialchars($payment->ifsc_code ?? ''); ?>"
                                    placeholder="e.g., SBIN0001234"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Bank Holder Name</label>
                        <input type="text"
                            name="bank_holder_name"
                            class="form-control"
                            value="<?= htmlspecialchars($payment->bank_holder_name ?? ''); ?>"
                            placeholder="Account holder name"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Bank Name</label>
                        <input type="text"
                            name="bank_name"
                            class="form-control"
                            value="<?= htmlspecialchars($payment->bank_name ?? ''); ?>"
                            placeholder="e.g., State Bank of India"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">UPI ID</label>
                        <input type="text"
                            name="upi_id"
                            class="form-control"
                            value="<?= htmlspecialchars($payment->upi_id ?? ''); ?>"
                            placeholder="e.g., yourname@upi"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Upload QR Code Image</label>
                        <div class="input-group">
                            <input type="file"
                                name="qr_image"
                                class="form-control"
                                id="qrImageInput"
                                accept="image/*"
                                onchange="previewQRImage(event)">
                        </div>
                        <small class="text-muted d-block mt-2">Supported formats: JPG, PNG, GIF (Max size: 2MB)</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">QR Code Preview</label>
                        <div class="border p-3 text-center bg-white rounded" style="min-height: 220px;">
                            <?php if (!empty($payment->qr_image)): ?>
                                <img id="qrPreview"
                                    src="<?= base_url('uploads/qr/' . $payment->qr_image); ?>"
                                    class="img-fluid"
                                    style="max-width: 200px; max-height: 200px;">
                            <?php else: ?>
                                <img id="qrPreview"
                                    src=""
                                    class="img-fluid d-none"
                                    style="max-width: 200px; max-height: 200px;">
                                <p class="text-muted">No QR code uploaded yet</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Save Changes
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>

<script>
    function previewQRImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('qrPreview');
        const previewContainer = preview.parentElement;

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
                previewContainer.querySelector('p')?.remove();
            };
            reader.readAsDataURL(file);
        }
    }
</script>