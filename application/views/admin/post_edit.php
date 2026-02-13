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
                        <li class="breadcrumb-item active">Edit Post</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Card -->
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit Post</h5>
                <hr>

                <form id="PostForm" method="post" enctype="multipart/form-data">

                    <!-- Hidden Fields -->
                    <input type="hidden" name="post_id" value="<?= $post_edit->id ?>">
                    <input type="hidden" name="old_file" value="<?= $post_edit->file_path ?>">

                    <!-- Title -->
                    <div class="mb-3">
                        <label class="form-label">Post Title</label>
                        <input type="text" name="post_title" class="form-control"
                            value="<?= htmlspecialchars($post_edit->title) ?>" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label">Post Description</label>
                        <textarea name="post_description" id="postDescription" class="form-control" rows="6">
                        <?= htmlspecialchars($post_edit->description) ?>
                        </textarea>
                    </div>

                    <!-- Post Type -->
                    <div class="mb-3">
                        <label class="form-label">Post Type</label>
                        <select name="post_type" id="postType" class="form-control" required>
                            <option value="free" <?= ($post_edit->post_type == 'free') ? 'selected' : '' ?>>Free</option>
                            <option value="paid" <?= ($post_edit->post_type == 'paid') ? 'selected' : '' ?>>Paid</option>
                        </select>
                    </div>


                    <!-- Price -->
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" id="postPrice"
                            value="<?= htmlspecialchars($post_edit->price) ?>">
                    </div>

                    <!-- Drive Link (Only for Free Posts) -->
                    <div class="mb-3" id="driveLinkWrapper">
                        <label class="form-label">Drive Download Link</label>
                        <input type="text" name="drive_link" id="driveLink" class="form-control"
                            value="<?= htmlspecialchars($post_edit->drive_link ?? '') ?>"
                            placeholder="https://drive.google.com/...">
                    </div>


                    <!-- Existing File Preview -->
                    <?php if (!empty($post_edit->file_path)): ?>
                        <div class="mb-3">
                            <label class="form-label">Current File</label><br>
                            <?php if (preg_match('/\.(mp4|avi|mov|mkv)$/i', $post_edit->file_path)): ?>
                                <video width="250" controls>
                                    <source src="<?= base_url($post_edit->file_path) ?>">
                                </video>
                            <?php else: ?>
                                <img src="<?= base_url($post_edit->file_path) ?>" width="150" class="rounded">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Upload New File -->
                    <div class="mb-3">
                        <label class="form-label">Change File (Optional)</label>
                        <input type="file" name="post_file" class="form-control" accept="image/*,video/*">
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary w-100">
                        Update Post
                    </button>

                </form>
            </div>
        </div>

    </div>
</div>

<!-- Scripts -->
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('postDescription');

    $('#PostForm').on('submit', function (e) {
        e.preventDefault();

        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }

        let formData = new FormData(this);

        $.ajax({
            url: "<?= base_url('admin/post/save'); ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            beforeSend: function () {
                Swal.fire({
                    title: 'Please wait...',
                    allowOutsideClick: false,
                    didOpen: () => Swal.showLoading()
                });
            },
            success: function (res) {
                Swal.close();
                if (res.status) {
                    Swal.fire('Success', res.message, 'success').then(() => {
                        window.location.href = "<?= base_url('admin/post'); ?>";
                    });
                } else {
                    Swal.fire('Error', res.message, 'error');
                }
            },
            error: function () {
                Swal.close();
                Swal.fire('Error', 'Something went wrong!', 'error');
            }
        });
    });

    // Enable / Disable price on dropdown change
    $('#postType').on('change', function () {

        if ($(this).val() === 'free') {

            $('#postPrice').val(0);
            $('#postPrice').prop('disabled', true);

            $('#driveLinkWrapper').show();
            $('#driveLink').prop('required', true);

        } else {

            $('#postPrice').prop('disabled', false);

            $('#driveLinkWrapper').hide();
            $('#driveLink').prop('required', false);
        }

    });

    // Trigger on page load
    $('#postType').trigger('change');

</script>