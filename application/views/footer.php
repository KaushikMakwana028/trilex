<style>
    :root {
        --primary: #1f6f7f;
        --primary-dark: #185a66;
        --accent: #2bbbd8;
        --white: #ffffff;
    }

    /* ===== Footer Main ===== */
    footer {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: var(--white);
        padding: 55px 0 0;
    }

    /* Headings */
    footer h5 {
        font-size: 22px;
        font-weight: 700;
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    footer h6 {
        font-size: 17px;
        font-weight: 600;
        margin-bottom: 18px;
        position: relative;
        padding-bottom: 8px;
    }

    footer h6::after {
        content: "";
        width: 35px;
        height: 3px;
        background: var(--accent);
        position: absolute;
        left: 0;
        bottom: 0;
        border-radius: 2px;
    }

    /* Logo Box */
    .logo-container {
        width: 75px;
        height: 75px;
        background: #ffffff;
        border-radius: 6px;
        padding: 10px;
        margin-right: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logo-container img {
        max-width: 100%;
        height: auto;
    }

    /* Lists */
    footer ul {
        list-style: none;
        padding: 0;
    }

    footer ul li {
        margin-bottom: 9px;
    }

    footer ul li a {
        color: #e6f7fb;
        text-decoration: none;
        font-size: 14px;
        transition: 0.3s ease;
    }

    footer ul li a:hover {
        color: #ffffff;
        padding-left: 6px;
    }

    /* Social Icons */
    .social-links {
        margin-top: 18px;
    }

    .social-links a {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-right: 10px;
        color: #ffffff;
        transition: 0.3s;
    }

    .social-links a:hover {
        background: var(--accent);
        transform: translateY(-4px);
    }

    /* Contact Info */
    .contact-info-item {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
        font-size: 14px;
    }

    .contact-info-item i {
        width: 22px;
        color: var(--accent);
    }

    /* Divider */
    footer hr {
        border: none;
        height: 1px;
        background: rgba(255, 255, 255, 0.15);
        margin: 40px 0 20px;
    }

    /* Bottom Section */
    .footer-bottom {
        background: #1a5e6b;
        padding: 18px 0;
    }

    .footer-bottom p {
        margin: 0;
        font-size: 14px;
        color: #cceef5;
    }

    .footer-bottom a {
        color: #cceef5;
        text-decoration: none;
        transition: 0.3s;
    }

    .footer-bottom a:hover {
        color: #ffffff;
    }

    /* Responsive */
    @media (max-width:768px) {
        footer {
            text-align: center;
        }

        footer h5 {
            justify-content: center;
            flex-direction: column;
            gap: 10px;
        }

        footer h6::after {
            left: 50%;
            transform: translateX(-50%);
        }

        .contact-info-item {
            justify-content: center;
        }
    }
</style>



<footer>
    <div class="container">
        <!-- Main Footer Content -->
        <div class="row">
            <!-- Company Info -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="mb-3">
                    <div class="logo-container d-inline-flex me-3">
                        <img src="<?= base_url('assets/images/logo_new.png'); ?>" alt="Logo" class="img-fluid">
                    </div>
                    <span>Trilex Advisories</span>
                </h5>
                <!-- <p>Professional automation tools and comprehensive solutions designed for Chartered Accountants and Tax
                    Professionals to streamline their workflow.</p> -->
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h6>Quick Links</h6>
                <ul>
                    <li><a href="<?= base_url('home') ?>">Home</a></li>
                    <li><a href="<?= base_url('product') ?>">Products</a></li>
                    <li><a href="<?= base_url('service') ?>">Services</a></li>
                    <li><a href="<?= base_url('about') ?>">About Us</a></li>
                    <li><a href="<?= base_url('blog') ?>">Blog</a></li>
                    <li><a href="<?= base_url('contact') ?>">Contact</a></li>
                </ul>
            </div>

            <!-- Products -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h6>Our Products</h6>
                <ul>
                    <?php if (!empty($footer_products)) : ?>
                        <?php foreach ($footer_products as $product) : ?>
                            <li>
                                <a href="<?= base_url('product/detail/' . $product->id); ?>">
                                    <?php
                                    $title = strip_tags($product->title);
                                    echo (mb_strlen($title) > 35)
                                        ? mb_substr($title, 0, 35) . '...'
                                        : $title;
                                    ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <li>No Products Available</li>
                    <?php endif; ?>
                </ul>
            </div>


            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h6>Contact Us</h6>
                <div class="contact-info">
                    <!-- <div class="contact-info-item">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        <span>Ahmedabad, Gujarat,<br>India - 380001</span>
                    </div> -->
                    <!-- <div class="contact-info-item">
                        <i class="fas fa-phone me-2"></i>
                        <span>+91 98765 43210</span>
                    </div> -->
                    <div class="contact-info-item">
                        <i class="fas fa-envelope me-2"></i>
                        <span>trilexadvisory@gmail.com</span>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-clock me-2"></i>
                        <span>Mon - Sat: 9:00 AM - 6:00 PM</span>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <p>&copy; 2026 Trilex Advisories. All Rights Reserved.</p>
                </div>
                <div class="col-md-6">
                    <p>
                        <a href="#">Privacy Policy</a> |
                        <a href="#">Terms of Service</a> |
                        <a href="#">Sitemap</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--plugins-->

<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>

<!-- SweetAlert2 CDN -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Mobile sidebar toggle
    const menuToggle = document.getElementById('menuToggle');
    const sidebarClose = document.getElementById('sidebarClose');
    const mobileSidebar = document.getElementById('mobileSidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    function openSidebar() {
        mobileSidebar.classList.add('active');
        sidebarOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        mobileSidebar.classList.remove('active');
        sidebarOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    menuToggle.addEventListener('click', openSidebar);
    sidebarClose.addEventListener('click', closeSidebar);
    sidebarOverlay.addEventListener('click', closeSidebar);

    // Close sidebar when clicking a link
    const sidebarLinks = document.querySelectorAll('.sidebar-link');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', closeSidebar);
    });

    // Active link highlighting for bottom nav
    const bottomNavLinks = document.querySelectorAll('#bottomNav a');
    bottomNavLinks.forEach(link => {
        link.addEventListener('click', function() {
            bottomNavLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Active link highlighting for sidebar
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function() {
            sidebarLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const submenuLinks = document.querySelectorAll('.has-submenu > a');

        submenuLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const parent = this.parentElement;
                parent.classList.toggle('open');
                const submenu = parent.querySelector('.submenu');
                if (submenu) {
                    submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
                }
                // Rotate arrow
                const icon = this.querySelector('.toggle-icon');
                if (icon) icon.classList.toggle('rotated');
            });
        });
    });
</script>

</body>

</html>