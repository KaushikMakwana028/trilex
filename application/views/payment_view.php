<style>
    .payment-container {
        max-width: 600px;
        margin: 40px auto;
        padding: 0 15px;
    }

    .payment-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .product-section {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 30px 20px;
        text-align: center;
    }

    .product-title {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .product-price {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .product-meta {
        font-size: 14px;
        opacity: 0.95;
    }

    .form-section {
        padding: 30px 20px;
    }

    .form-section h5 {
        font-size: 16px;
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 20px;
        /* display: flex; */
        align-items: center;
        gap: 10px;
    }

    .section-divider {
        margin: 30px 0;
        border: none;
        border-top: 1px solid #e2e8f0;
    }

    .qr-code-container {
        text-align: center;
        margin-bottom: 20px;
    }

    .qr-code-image {
        width: 200px;
        height: 200px;
        border: 3px solid var(--primary-color);
        border-radius: 8px;
        padding: 8px;
        background: white;
        object-fit: contain;
    }

    .qr-instruction {
        font-size: 13px;
        color: #64748b;
        margin-top: 12px;
    }

    .form-label {
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 8px;
        font-size: 14px;
        display: block;
    }

    .form-control {
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        padding: 10px 14px;
        font-size: 14px;
        transition: all 0.3s ease;
        width: 100%;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
        outline: none;
    }

    .upload-container {
        position: relative;
        margin-bottom: 20px;
    }

    .file-input-wrapper {
        position: relative;
        overflow: hidden;
        width: 100%;
    }

    /* Hide actual input */
    #receiptInput {
        display: none;
    }

    /* Label looks like upload area/button */
    .file-input-label {
        display: block;
        width: 100%;
        padding: 12px 16px;
        background: #f1f5f9;
        border: 2px dashed var(--primary-color);
        border-radius: 8px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 14px;
        color: var(--primary-color);
        font-weight: 500;
    }

    .file-input-label:hover {
        background: #e0e7ff;
        border-color: var(--secondary-color);
    }

    /* File name after upload */
    .file-name {
        font-size: 13px;
        color: #475569;
        margin-top: 8px;
        padding: 8px;
        background: #f8fafc;
        border-radius: 6px;
        display: none;
        word-wrap: break-word;
    }

    .file-name.show {
        display: block;
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139, 92, 246, 0.3);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    .icon {
        font-size: 18px;
    }

    .success-message {
        display: none;
        padding: 12px;
        background: #dcfce7;
        color: #166534;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .success-message.show {
        display: block;
    }

    @media (max-width: 576px) {
        .payment-container {
            margin: 20px auto;
        }

        .product-section {
            padding: 25px 15px;
            border-radius: 16px;
        }

        .product-title {
            font-size: 20px;
        }

        .product-price {
            font-size: 28px;
        }

        .form-section {
            padding: 20px 15px;
        }

        .qr-code-image {
            width: 160px;
            height: 160px;
        }
    }

    .qr-section {
        margin-bottom: 30px;
    }

    .qr-title {
        font-size: 18px;
        font-weight: 700;
        text-align: center;
        color: var(--dark-color);
        margin-bottom: 20px;
    }

    .qr-code-container {
        text-align: center;
        margin-bottom: 20px;
    }

    .qr-instruction {
        font-size: 15px;
        color: #1e293b;
        margin-top: 12px;
        font-weight: 600;
    }

    .upi-icons {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 25px;
        margin-top: 15px;
    }

    .upi-icon {
        width: 25px;
        height: auto;
        filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.2));
        transition: transform 0.2s ease;
    }

    .upi-icon:hover {
        transform: scale(1.1);
    }

    /* Bank Details Modal Styles */
    .modal-backdrop {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        z-index: 9998;
        animation: fadeIn 0.3s ease;
    }

    .modal-backdrop.show {
        display: block;
    }

    .bank-details-modal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        z-index: 9999;
        max-width: 450px;
        width: 95%;
        max-height: 85vh;
        overflow-y: auto;
        animation: slideUp 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .bank-details-modal.show {
        display: block;
    }

    .modal-header {
        background: linear-gradient(135deg, #1e7a8c 0%, #0d5e6e 100%);
        color: white;
        padding: 25px 25px;
        border-radius: 16px 16px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .modal-header h5 {
        margin: 0;
        font-size: 22px;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .modal-close {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: white;
        font-size: 32px;
        cursor: pointer;
        padding: 0;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        transition: all 0.2s ease;
        line-height: 1;
    }

    .modal-close:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    .modal-body {
        padding: 30px 25px;
    }

    .detail-row {
        margin-bottom: 25px;
        padding-bottom: 0;
        border-bottom: none;
    }

    .detail-row:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .detail-label {
        font-size: 11px;
        color: #64748b;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 10px;
        display: block;
        letter-spacing: 0.5px;
    }

    .detail-value {
        font-size: 15px;
        font-weight: 600;
        color: #1e293b;
        word-break: break-all;
        padding: 12px 15px;
        background: #f8fafc;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
    }

    .detail-with-copy {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .detail-with-copy .detail-value {
        flex: 1;
    }

    .copy-btn {
        background: #1e7a8c;
        color: white;
        border: none;
        padding: 10px 14px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 12px;
        font-weight: 600;
        transition: all 0.2s ease;
        white-space: nowrap;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .copy-btn:hover {
        background: #0d5e6e;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(30, 122, 140, 0.3);
    }

    .copy-btn.success {
        background: #22c55e;
    }

    .upi-highlight {
        background: #f0fdf4 !important;
        border: 1px solid #dcfce7 !important;
    }

    .amount-highlight {
        background: linear-gradient(135deg, #f0f5ff 0%, #e7f0ff 100%) !important;
        border: 1px solid #dbeafe !important;
        color: #1e7a8c !important;
        font-size: 18px !important;
        font-weight: 700 !important;
    }

    .modal-footer {
        padding: 20px 25px;
        border-top: 1px solid #e2e8f0;
        text-align: center;
        background: #f8fafc;
        border-radius: 0 0 16px 16px;
        position: sticky;
        bottom: 0;
    }

    .modal-footer button {
        background: linear-gradient(135deg, #1e7a8c 0%, #0d5e6e 100%);
        color: white;
        border: none;
        padding: 12px 40px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 15px;
    }

    .modal-footer button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(30, 122, 140, 0.3);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            transform: translate(-50%, -30%);
            opacity: 0;
        }

        to {
            transform: translate(-50%, -50%);
            opacity: 1;
        }
    }

    .product-title {
        font-size: 18px;
        font-weight: 600;
        color: #ffffff;
    }

    .product-price {
        font-size: 22px;
        font-weight: 700;
        color: #ffd166;
    }

    .product-meta {
        font-size: 13px;
        color: rgba(255, 255, 255, 0.75);
    }

    @media (max-width: 768px) {

        .payment-container {
            padding: 10px;
        }

        .payment-card {
            max-width: 100%;
            padding: 15px;
            border-radius: 10px;
            box-shadow: none;
            margin-top: 2rem;
        }

        .product-title {
            font-size: 18px;
        }

        .product-price {
            font-size: 20px;
        }

        .qr-code-image {
            width: 180px;
            max-width: 100%;
            height: auto;
        }

        .upi-icons {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .upi-icon {
            width: 45px;
            height: auto;
        }
    }

    @media (max-width: 576px) {
        .bank-details-modal {
            width: 92%;
            max-height: 90vh;
        }

        .modal-header {
            padding: 20px;
        }

        .modal-header h5 {
            font-size: 18px;
        }

        .modal-body {
            padding: 20px;
        }

        .detail-with-copy {
            flex-direction: column;
        }

        .copy-btn {
            width: 100%;
            justify-content: center;
        }
    }

    /* Copy Toast Notification */
    .copy-toast {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        background: #22c55e;
        color: white;
        padding: 14px 24px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        font-size: 14px;
        font-weight: 600;
        z-index: 10001;
        animation: slideDown 0.3s ease;
        pointer-events: none;
    }

    .copy-toast.error {
        background: #ef4444;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateX(-50%) translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }
    }

    @keyframes slideOut {
        from {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }

        to {
            opacity: 0;
            transform: translateX(-50%) translateY(-20px);
        }
    }
</style>

<div class="payment-container">
    <div class="payment-card">
        <!-- Product Section -->
        <div class="product-section">
            <?php if (isset($product->title) && !empty($product->title)): ?>
                <div class="product-title text-light"><?= htmlspecialchars($product->title); ?></div>
            <?php else: ?>
                <div class="product-title text-muted">Untitled Product</div>
            <?php endif; ?>

            <?php if (isset($product->price) && !empty($product->price)): ?>
                <div class="product-price">₹<?= htmlspecialchars($product->price); ?></div>
            <?php else: ?>
                <div class="product-price text-muted">Price not available</div>
            <?php endif; ?>

            <div class="product-meta">One-time Payment</div>
        </div>

        <!-- Form Section -->
        <form id="paymentForm" class="form-section" enctype="multipart/form-data" novalidate>
            <div class="success-message" id="successMessage"></div>

            <!-- Bank Details Section -->
            <div class="qr-section">
                <h5 class="qr-title">
                    <span class="icon">🏦</span> Bank Details
                </h5>

                <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                    <div style="margin-bottom: 15px;">
                        <label
                            style="font-size: 12px; color: #64748b; font-weight: 600; text-transform: uppercase;">Bank
                            Name</label>
                        <div style="font-size: 16px; font-weight: 600; color: #1e293b;">
                            <?= htmlspecialchars($payment->bank_name ?? 'N/A'); ?>
                        </div>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label
                            style="font-size: 12px; color: #64748b; font-weight: 600; text-transform: uppercase;">Account
                            Holder Name</label>
                        <div style="font-size: 16px; font-weight: 600; color: #1e293b;">
                            <?= htmlspecialchars($payment->bank_holder_name ?? 'N/A'); ?>
                        </div>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label
                            style="font-size: 12px; color: #64748b; font-weight: 600; text-transform: uppercase;">Account
                            Number</label>
                        <div style="font-size: 16px; font-weight: 600; color: #1e293b; word-break: break-all;">
                            <?= htmlspecialchars($payment->bank_account_number ?? 'N/A'); ?>
                        </div>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label
                            style="font-size: 12px; color: #64748b; font-weight: 600; text-transform: uppercase;">IFSC
                            Code</label>
                        <div style="font-size: 16px; font-weight: 600; color: #1e293b;">
                            <?= htmlspecialchars($payment->ifsc_code ?? 'N/A'); ?>
                        </div>
                    </div>
                </div>

                <!-- QR Code Display -->
                <?php if (!empty($payment->qr_image)): ?>
                    <div class="qr-code-container">
                        <h6 style="font-size: 14px; color: #64748b; margin-bottom: 15px;">Scan QR Code</h6>
                        <img src="<?= base_url('uploads/qr/' . $payment->qr_image); ?>" alt="QR Code" class="qr-code-image"
                            style="cursor: pointer;" onclick="showBankDetailsModal()" title="Click to see bank details">
                        <div class="qr-instruction"><b>Use any Banking or UPI app to scan and complete payment</b></div>
                        <button type="button" class="btn btn-outline-primary btn-sm mt-2" onclick="showBankDetailsModal()"
                            style="border: 1px solid var(--primary-color); color: var(--primary-color); padding: 6px 12px; border-radius: 6px; font-size: 12px; font-weight: 600;">
                            📋 View Bank Details
                        </button>
                    </div>
                <?php endif; ?>

                <!-- Payment Method Icons -->
                <div class="upi-icons" style="margin-top: 25px;">
                    <img src="<?= base_url('assets/images/phonpay.png'); ?>" alt="PhonePe" class="upi-icon"
                        title="PhonePe">
                    <img src="<?= base_url('assets/images/gpay.png'); ?>" alt="Google Pay" class="upi-icon"
                        title="Google Pay">
                    <img src="<?= base_url('assets/images/paytm.png'); ?>" alt="Paytm" class="upi-icon" title="Paytm">
                    <img src="<?= base_url('assets/images/bhim.png'); ?>" alt="BHIM" class="upi-icon" title="BHIM">
                </div>
            </div>

            <!-- UPI Section -->
            <?php if (!empty($payment->upi_id)): ?>
                <div style="margin-top: 30px; padding-top: 30px; border-top: 1px solid #e2e8f0;">
                    <h5 class="qr-title">
                        <span class="icon">📱</span> Pay via UPI
                    </h5>

                    <div
                        style="background: #f0fdf4; padding: 20px; border-radius: 8px; border-left: 4px solid #22c55e; margin-bottom: 20px;">
                        <div style="margin-bottom: 15px;">
                            <label style="font-size: 12px; color: #48a868; font-weight: 600; text-transform: uppercase;">UPI
                                ID</label>
                            <div style="font-size: 16px; font-weight: 600; color: #166534;">
                                <?= htmlspecialchars($payment->upi_id ?? 'N/A'); ?>
                            </div>
                        </div>
                        <small style="color: #48a868;">Send payment directly to this UPI ID</small>
                    </div>

                    <button type="button" class="btn-submit"
                        style="background: linear-gradient(135deg, #22c55e, #16a34a); margin-bottom: 10px;"
                        onclick="openUPIApp('<?= htmlspecialchars($payment->upi_id); ?>', <?= htmlspecialchars($product->price); ?>)">
                        <span class="icon">📱</span> Pay with UPI
                    </button>

                    <small style="display: block; text-align: center; color: #64748b; margin-top: 10px;">
                        Click to open your preferred UPI app
                    </small>
                </div>
            <?php endif; ?>


            <hr class="section-divider">

            <!-- Upload Receipt -->
            <h5><span class="icon">📄</span> Upload Payment Receipt</h5>
            <label for="receiptInput" class="form-label">Receipt Image/Document</label>
            <div class="upload-container">
                <div class="file-input-wrapper">
                    <label for="receiptInput" class="file-input-label">📎 Click to upload or drag and drop</label>
                    <input type="file" id="receiptInput" name="payment_receipt" accept="image/*,.pdf" required>
                    <div class="file-name" id="fileName"></div>
                </div>
            </div>

            <!-- Email Section -->
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email Address</label>
                <?php if (isset($this->session) && $this->session->userdata('user_email')): ?>
                    <input type="email" class="form-control" id="emailInput" name="email"
                        value="<?= htmlspecialchars($this->session->userdata('user_email')); ?>" readonly>
                <?php else: ?>
                    <input type="email" class="form-control" id="emailInput" name="email" placeholder="your@email.com"
                        required>
                <?php endif; ?>
            </div>

            <!-- Transaction Reference -->
            <div class="mb-3">
                <label for="notesInput" class="form-label">Transaction Reference (Optional)</label>
                <input type="text" class="form-control" id="notesInput" name="transaction_ref"
                    placeholder="Enter UPI Transaction ID or reference">
            </div>

            <!-- Hidden Product Info -->
            <input type="hidden" name="product_title" value="<?= htmlspecialchars($product->title); ?>">
            <input type="hidden" name="product_price" value="<?= htmlspecialchars($product->price); ?>">

            <!-- Submit Button -->
            <button type="submit" class="btn-submit">Submit Payment</button>
        </form>
    </div>
</div>

<!-- Bank Details Modal -->
<div class="modal-backdrop" id="modalBackdrop" onclick="closeBankDetailsModal()"></div>

<div class="bank-details-modal" id="bankDetailsModal">
    <div class="modal-header">
        <h5>💳 Bank Account Details</h5>
        <button class="modal-close" onclick="closeBankDetailsModal()">×</button>
    </div>

    <div class="modal-body">
        <!-- Bank Name -->
        <div class="detail-row">
            <span class="detail-label">🏦 Bank Name</span>
            <div class="detail-value">
                <?= htmlspecialchars($payment->bank_name ?? 'N/A'); ?>
            </div>
        </div>

        <!-- Account Holder Name -->
        <div class="detail-row">
            <span class="detail-label">👤 Account Holder Name</span>
            <div class="detail-value">
                <?= htmlspecialchars($payment->bank_holder_name ?? 'N/A'); ?>
            </div>
        </div>

        <!-- Account Number -->
        <div class="detail-row">
            <span class="detail-label">🔢 Account Number</span>
            <div class="detail-with-copy">
                <div class="detail-value" style="flex: 1;">
                    <span
                        id="accountNumberDisplay"><?= htmlspecialchars($payment->bank_account_number ?? 'N/A'); ?></span>
                </div>
                <button class="copy-btn"
                    onclick="copyToClipboard('<?= htmlspecialchars($payment->bank_account_number ?? ''); ?>', 'Account Number')">
                    📋 Copy
                </button>
            </div>
        </div>

        <!-- IFSC Code -->
        <div class="detail-row">
            <span class="detail-label">📋 IFSC Code</span>
            <div class="detail-with-copy">
                <div class="detail-value" style="flex: 1;">
                    <span id="ifscDisplay"><?= htmlspecialchars($payment->ifsc_code ?? 'N/A'); ?></span>
                </div>
                <button class="copy-btn"
                    onclick="copyToClipboard('<?= htmlspecialchars($payment->ifsc_code ?? ''); ?>', 'IFSC Code')">
                    📋 Copy
                </button>
            </div>
        </div>

        <!-- UPI ID (if available) -->
        <?php if (!empty($payment->upi_id)): ?>
            <div class="detail-row">
                <span class="detail-label">📱 UPI ID</span>
                <div class="detail-with-copy">
                    <div class="detail-value upi-highlight" style="flex: 1;">
                        <span id="upiDisplay"><?= htmlspecialchars($payment->upi_id ?? 'N/A'); ?></span>
                    </div>
                    <button class="copy-btn" style="background: #22c55e;"
                        onclick="copyToClipboard('<?= htmlspecialchars($payment->upi_id ?? ''); ?>', 'UPI ID')">
                        📋 Copy
                    </button>
                </div>
            </div>
        <?php endif; ?>

        <!-- Amount -->
        <div class="detail-row">
            <span class="detail-label">💰 Transfer Amount</span>
            <div class="detail-value amount-highlight">
                ₹<?= htmlspecialchars($product->price ?? '0'); ?>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button onclick="closeBankDetailsModal()">Close</button>
    </div>
</div>

<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>


<script>
    document.getElementById('receiptInput').addEventListener('change', function () {
        const fileNameDiv = document.getElementById('fileName');
        if (this.files.length) {
            fileNameDiv.textContent = '📄 ' + this.files[0].name;
            fileNameDiv.classList.add('show');
        } else {
            fileNameDiv.textContent = '';
            fileNameDiv.classList.remove('show');
        }
    });
    $(document).ready(function () {
        $("#paymentForm").on("submit", function (e) {
            e.preventDefault();

            var fileInput = $("#receiptInput")[0].files.length;
            if (fileInput === 0) {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Please upload your payment receipt."
                });
                e.preventDefault();
                return false;
            }

            var formData = new FormData(this);

            $.ajax({
                url: "<?= base_url('product/submit'); ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                beforeSend: function () {
                    $(".btn-submit").prop("disabled", true).text("Processing...");
                },
                success: function (response) {
                    $(".btn-submit").prop("disabled", false).text("Submit Payment");

                    if (response.status === "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Payment Successful!",
                            text: "Payment successful. We will verify and give you access shortly."
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect to booking page
                                window.location.href = "<?= base_url('history'); ?>";
                            }
                        });

                        // Reset form
                        $("#paymentForm")[0].reset();
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: response.message
                        });
                    }
                },

                error: function () {
                    $(".btn-submit").prop("disabled", false).text("Submit Payment");
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Something went wrong. Please try again."
                    });
                }
            });
        });
    });

    // UPI Payment Function
    function openUPIApp(upiId, amount) {
        const productTitle = "<?= htmlspecialchars($product->title); ?>";
        const upiLink = `upi://pay?pa=${encodeURIComponent(upiId)}&pn=${encodeURIComponent(productTitle)}&am=${amount}&tr=` + Date.now();

        // Open UPI link
        window.location.href = upiLink;

        // Fallback: Show UPI ID for manual entry
        setTimeout(function () {
            Swal.fire({
                title: "Transfer Details",
                html: `
                    <div style="text-align: left; padding: 20px;">
                        <p><strong>If UPI app didn't open:</strong></p>
                        <p>Use the following details to complete payment:</p>
                        <div style="background: #f0f0f0; padding: 15px; border-radius: 8px; margin: 15px 0;">
                            <p><strong>UPI ID:</strong> <code>${upiId}</code></p>
                            <p><strong>Amount:</strong> ₹${amount}</p>
                        </div>
                        <p>After payment, upload receipt below and click Submit Payment.</p>
                    </div>
                `,
                icon: "info",
                confirmButtonText: "OK"
            });
        }, 1000);
    }

    // Bank Details Modal Functions
    function showBankDetailsModal() {
        document.getElementById('modalBackdrop').classList.add('show');
        document.getElementById('bankDetailsModal').classList.add('show');
    }

    function closeBankDetailsModal() {
        document.getElementById('modalBackdrop').classList.remove('show');
        document.getElementById('bankDetailsModal').classList.remove('show');
    }

    // Copy to Clipboard Function
    function copyToClipboard(text, label) {
        navigator.clipboard.writeText(text).then(() => {
            showCopyToast(label + ' copied!', 'success');
        }).catch(() => {
            // Fallback for older browsers
            try {
                const textarea = document.createElement('textarea');
                textarea.value = text;
                textarea.style.position = 'fixed';
                textarea.style.opacity = '0';
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);
                showCopyToast(label + ' copied!', 'success');
            } catch (err) {
                showCopyToast('Failed to copy', 'error');
            }
        });
    }

    // Show Copy Toast Notification
    function showCopyToast(message, type = 'success') {
        // Remove existing toast
        const existingToast = document.querySelector('.copy-toast');
        if (existingToast) {
            existingToast.remove();
        }

        // Create new toast
        const toast = document.createElement('div');
        toast.className = 'copy-toast' + (type === 'error' ? ' error' : '');
        toast.innerHTML = (type === 'success' ? '✓ ' : '✗ ') + message;
        document.body.appendChild(toast);

        // Auto-remove after 2 seconds
        setTimeout(() => {
            toast.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => toast.remove(), 300);
        }, 2000);
    }

    // Close modal when clicking outside
    document.addEventListener('click', function (event) {
        const modal = document.getElementById('bankDetailsModal');
        const backdrop = document.getElementById('modalBackdrop');
        if (event.target === backdrop) {
            closeBankDetailsModal();
        }
    });
</script>