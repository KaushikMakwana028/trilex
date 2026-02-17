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
                            About Page Settings
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- About Card -->
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit About Page</h5>
                <hr>

                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="<?= base_url('admin/about/update') ?>">

                                <!-- About Title -->
                                <div class="mb-3">
                                    <label class="form-label">About Title</label>
                                    <input type="text"
                                        name="title"
                                        class="form-control"
                                        value="<?= $about->title ?? '' ?>"
                                        placeholder="Enter About Page Title"
                                        required>
                                </div>

                                <!-- About Description -->
                                <div class="mb-3">
                                    <label class="form-label">About Description</label>
                                    <textarea name="description"
                                        class="form-control"
                                        id="aboutContent"
                                        rows="8">
<?= isset($about->description) ? html_entity_decode($about->description) : '' ?>
                                    </textarea>
                                </div>

                                <!-- Submit -->
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="bx bx-save me-1"></i> Update About Page
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

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script>
window.onload = function () {
    if (typeof CKEDITOR !== 'undefined') {
        CKEDITOR.replace('aboutContent', {
            height: 400
        });
    }
};
</script>
