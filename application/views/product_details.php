 <style>
     /* ----- RESET ----- */
     * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
     }

     :root {
         --primary: #1a8b9d;
         --primary-dark: #003d4d;
         --bg-light: #f5f7fa;
         --white: #ffffff;
         --text-dark: #111827;
         --text-muted: #6b7280;
         --border-light: #e5e7eb;
     }

     body {
         font-family: 'Poppins', sans-serif;
         background: var(--bg-light);
         color: var(--text-dark);
     }

     .product-page {
         max-width: 1320px;
         margin: 40px auto;
         padding: 0 25px;
     }

     /* ----- Breadcrumb ----- */
     .breadcrumb {
         font-size: 14px;
         margin-bottom: 25px;
         display: flex;
         flex-wrap: wrap;
         align-items: center;
         gap: 8px;
     }

     .breadcrumb a {
         color: var(--primary);
         text-decoration: none;
         font-weight: 500;
     }

     .breadcrumb a:hover {
         text-decoration: underline;
     }

     .breadcrumb i {
         font-size: 10px;
         color: #9ca3af;
     }

     .breadcrumb span {
         color: var(--text-muted);
     }

     /* ----- Main Layout ----- */
     .product-layout {
         display: grid;
         grid-template-columns: 1fr 1fr;
         gap: 50px;
     }

     /* ----- LEFT COLUMN (image) ----- */
     .product-image-section {
         background: var(--white);
         border-radius: 24px;
         padding: 25px;
         box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
         display: flex;
         flex-direction: column;
         gap: 25px;
     }

     .main-image-container {
         width: 100%;
         height: 500px;
         background: #f9fafb;
         border-radius: 20px;
         display: flex;
         align-items: center;
         justify-content: center;
         overflow: hidden;
         border: 1px solid #f0f2f5;
     }

     .main-image-container img,
     .main-image-container video {
         width: 100%;
         height: 100%;
         object-fit: contain;
     }

     /* ----- ENHANCED ACTION ROW (More Products & Share only) ----- */
     .action-row {
         display: flex;
         gap: 16px;
         margin-top: 5px;
     }

     .action-btn {
         flex: 1;
         background: white;
         border: 1.5px solid var(--border-light);
         border-radius: 14px;
         padding: 16px 10px;
         font-weight: 600;
         font-size: 16px;
         color: #2d3c4a;
         cursor: pointer;
         transition: all 0.25s ease;
         display: flex;
         align-items: center;
         justify-content: center;
         gap: 12px;
         background: #fafcfc;
     }

     .action-btn i {
         font-size: 20px;
         color: var(--primary);
         transition: transform 0.2s;
     }

     .action-btn:hover {
         background: #eef6f8;
         border-color: var(--primary);
         transform: translateY(-2px);
         box-shadow: 0 8px 16px rgba(26, 139, 157, 0.12);
     }

     .action-btn:hover i {
         transform: scale(1.1);
     }

     /* ----- RIGHT COLUMN (info) ----- */
     .product-info-section {
         display: flex;
         flex-direction: column;
         gap: 25px;
     }

     .info-card {
         background: var(--white);
         border-radius: 24px;
         padding: 35px;
         box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
     }

     .product-title {
         font-size: 32px;
         font-weight: 700;
         margin-bottom: 20px;
         line-height: 1.3;
         color: #0a2a33;
     }

     .product-meta {
         display: flex;
         justify-content: space-between;
         align-items: center;
         padding-bottom: 22px;
         border-bottom: 1px solid var(--border-light);
         margin-bottom: 28px;
         flex-wrap: wrap;
         gap: 15px;
     }

     .rating-display {
         display: flex;
         align-items: center;
         gap: 12px;
     }

     .stars {
         color: #fbbf24;
         font-size: 16px;
         letter-spacing: 2px;
     }

     .rating-count {
         font-size: 15px;
         color: var(--text-muted);
         background: #f2f4f7;
         padding: 6px 14px;
         border-radius: 50px;
         font-weight: 500;
     }

     .stock-indicator {
         color: #059669;
         font-weight: 600;
         font-size: 15px;
         background: #e0f2e9;
         padding: 8px 20px;
         border-radius: 50px;
         display: flex;
         align-items: center;
         gap: 8px;
     }

     /* ----- PRICE CONTAINER (clean) ----- */
     .price-container {
         background: #ecfdf5;
         border: 1px solid #bbf7d0;
         padding: 30px;
         border-radius: 24px;
     }

     .price-header {
         font-size: 13px;
         text-transform: uppercase;
         letter-spacing: 1.5px;
         color: #047857;
         font-weight: 600;
         margin-bottom: 10px;
     }

     .price-row {
         display: flex;
         align-items: baseline;
         flex-wrap: wrap;
         gap: 15px;
     }

     .current-price {
         font-size: 48px;
         font-weight: 800;
         color: var(--primary);
         line-height: 1;
     }

     .current-price.free {
         color: #dc2626;
     }

     .original-price {
         font-size: 22px;
         text-decoration: line-through;
         color: var(--text-muted);
     }

     /* ----- CTA BUTTON (Buy Now / Download) ----- */
     .cta-button {
         width: 100%;
         padding: 18px;
         margin-top: 25px;
         background: linear-gradient(135deg, var(--primary), var(--primary-dark));
         color: white;
         border: none;
         border-radius: 16px;
         font-size: 18px;
         font-weight: 700;
         cursor: pointer;
         transition: all 0.3s ease;
         display: flex;
         align-items: center;
         justify-content: center;
         gap: 12px;
         box-shadow: 0 8px 20px rgba(0, 61, 77, 0.2);
     }

     .cta-button i {
         font-size: 20px;
     }

     .cta-button:hover {
         transform: translateY(-3px);
         box-shadow: 0 15px 30px rgba(0, 61, 77, 0.3);
         background: linear-gradient(135deg, #0e6f81, #002f3b);
     }

     /* ----- DISCOUNT INFO ----- */
     .discount-label {
         display: inline-block;
         background: #dc2626;
         color: white;
         font-weight: 700;
         padding: 5px 16px;
         border-radius: 50px;
         font-size: 15px;
         margin-top: 20px;
     }

     .savings-amount {
         font-size: 16px;
         font-weight: 600;
         color: #065f46;
         margin-top: 8px;
     }

     /* ----- TRUST BADGES (redesigned - minimal & elegant) ----- */
     .trust-badges {
         display: grid;
         grid-template-columns: 1fr 1fr;
         gap: 20px;
         margin-top: 25px;
     }

     .badge {
         background: #f9fafb;
         border: 1.5px solid var(--border-light);
         border-radius: 18px;
         padding: 22px 15px;
         display: flex;
         flex-direction: column;
         align-items: center;
         justify-content: center;
         gap: 12px;
         text-align: center;
         transition: all 0.3s ease;
         min-height: 110px;
         /* same height */
     }

     .badge i {
         font-size: 26px;
         color: var(--primary);
     }

     .badge span {
         font-size: 15px;
         font-weight: 600;
         color: #374151;
         border: none;
     }

     .badge:hover {
         border-color: var(--primary);
         background: #eef6f8;
         transform: translateY(-3px);
         box-shadow: 0 10px 20px rgba(26, 139, 157, 0.12);
     }

     /* ----- DESCRIPTION SECTION ----- */
     .description-section {
         margin-top: 60px;
         background: var(--white);
         border-radius: 24px;
         padding: 50px;
         box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
     }

     .description-title {
         font-size: 26px;
         font-weight: 700;
         margin-bottom: 25px;
         border-bottom: 2px solid var(--border-light);
         padding-bottom: 15px;
         display: flex;
         align-items: center;
         gap: 10px;
     }

     .description-content {
         font-size: 16px;
         color: var(--text-muted);
         line-height: 1.8;
     }

     /* ----- RESPONSIVE ----- */
     @media (max-width: 1024px) {
         .product-layout {
             grid-template-columns: 1fr;
         }

         .main-image-container {
             height: 450px;
         }
     }

     @media (max-width: 768px) {
         .main-image-container {
             height: 350px;
         }

         .product-title {
             font-size: 26px;
         }

         .current-price {
             font-size: 36px;
         }

         .trust-badges {
             grid-template-columns: 1fr;
         }
     }
 </style>

 <div class="product-page">
     <!-- Breadcrumb -->
     <div class="breadcrumb">
         <a href="<?= base_url(); ?>">Home</a>
         <i class="fas fa-chevron-right"></i>
         <a href="<?= base_url('product'); ?>">Products</a>
         <i class="fas fa-chevron-right"></i>
         <span><?= isset($product->title) ? $product->title : 'Income Tax Saving Strategies for Salaried Professionals'; ?></span>
     </div>

     <!-- MAIN LAYOUT -->
     <div class="product-layout">
         <!-- LEFT COLUMN -->
         <div class="product-image-section">
             <div class="main-image-container">
                 <?php if (!empty($product->file_path)): ?>
                     <?php if (pathinfo($product->file_path, PATHINFO_EXTENSION) === 'mp4'): ?>
                         <video src="<?= base_url($product->file_path); ?>" controls></video>
                     <?php else: ?>
                         <img src="<?= base_url($product->file_path); ?>" alt="<?= $product->title; ?>">
                     <?php endif; ?>
                 <?php else: ?>
                     <!-- Clean placeholder with product theme -->
                     <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='600' height='500' viewBox='0 0 600 500'%3E%3Crect width='600' height='500' fill='%23e6f3f5'/%3E%3Ctext x='120' y='220' font-family='Poppins, Arial' font-size='32' fill='%231a8b9d' font-weight='bold'%3E📊 Income Tax%3C/text%3E%3Ctext x='120' y='290' font-family='Poppins, Arial' font-size='32' fill='%23003d4d' font-weight='bold'%3ESaving Strategies%3C/text%3E%3Ctext x='120' y='370' font-family='Poppins' font-size='20' fill='%236b7280'%3EFor Salaried Professionals%3C/text%3E%3C/svg%3E"
                         alt="Income Tax Saving Strategies">
                 <?php endif; ?>
             </div>

             <!-- ACTION ROW: ONLY More Products & Share (clean design) -->
             <div class="action-row">
                 <button class="action-btn" onclick="window.location.href='<?= base_url('product'); ?>'">
                     <i class="fas fa-heart"></i>
                     More Products
                 </button>
                 <button class="action-btn" id="shareBtn">
                     <i class="fas fa-share-nodes"></i>
                     Share
                 </button>
             </div>
         </div>

         <!-- RIGHT COLUMN -->
         <div class="product-info-section">
             <div class="info-card">
                 <h1 class="product-title"><?= isset($product->title) ? $product->title : 'Income Tax Saving Strategies for Salaried Professionals'; ?></h1>

                 <!-- Rating & Stock -->
                 <div class="product-meta">
                     <div class="stock-indicator">
                         <i class="fas fa-circle-check"></i>
                         In Stock
                     </div>
                 </div>

                 <!-- Price Container -->
                 <div class="price-container">
                     <div class="price-header">PRODUCT PRICE</div>

                     <?php if (isset($product->post_type) && strtolower(trim($product->post_type)) == 'free'): ?>
                         <div class="price-row">
                             <span class="current-price free">FREE</span>
                         </div>
                     <?php else: ?>
                         <div class="price-row">
                             <span class="current-price">
                                 ₹<?= isset($product->price) ? number_format($product->price, 2) : '0.00'; ?>
                             </span>
                             <?php if (!empty($product->original_price) && isset($product->price) && $product->original_price > $product->price): ?>
                                 <span class="original-price">
                                     ₹<?= number_format($product->original_price, 2); ?>
                                 </span>
                             <?php endif; ?>
                         </div>
                     <?php endif; ?>

                     <!-- CTA Button -->
                     <?php if (isset($product->post_type) && strtolower(trim($product->post_type)) == 'free'): ?>
                         <?php if (!empty($product->drive_link)): ?>
                             <button class="cta-button" onclick="window.open('<?= $product->drive_link; ?>', '_blank')">
                                 <i class="fas fa-download"></i>
                                 Download Free
                             </button>
                         <?php else: ?>
                             <button class="cta-button" onclick="showNoDriveAlert()">
                                 <i class="fas fa-exclamation-circle"></i>
                                 Download Free
                             </button>
                         <?php endif; ?>
                     <?php else: ?>
                         <button class="cta-button" onclick="window.location.href='<?= isset($product->id) ? base_url('product/checkout/' . $product->id) : '#'; ?>'">
                             <i class="fas fa-cart-shopping"></i>
                             Buy Now
                         </button>
                     <?php endif; ?>

                     <!-- Discount Info -->
                     <?php if (!empty($product->original_price) && isset($product->price) && $product->original_price > $product->price): ?>
                         <?php
                            $discount = round((($product->original_price - $product->price) / $product->original_price) * 100);
                            $savings = $product->original_price - $product->price;
                            ?>
                         <div class="discount-label"><?= $discount; ?>% OFF</div>
                         <div class="savings-amount">
                             You save ₹<?= number_format($savings, 2); ?>
                         </div>
                     <?php endif; ?>
                 </div>

                 <!-- REDESIGNED TRUST BADGES - Clean & minimal (Secure Payment & Easy Returns only) -->
                 <div class="trust-badges">
                     <div class="badge">
                         <i class="fas fa-shield-alt"></i>
                         <span>Secure Payment</span>
                     </div>
                     <div class="badge">
                         <i class="fas fa-rotate-left"></i>
                         <span>Easy Returns</span>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- DESCRIPTION SECTION -->
     <div class="description-section">
         <h2 class="description-title">
             <i class="fas fa-file-lines" style="color: var(--primary);"></i>
             Product Description
         </h2>
         <div class="description-content">
             <?= isset($product->description) ? $product->description : 'No description available.'; ?>
         </div>
     </div>
 </div>

 <!-- SweetAlert2 -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <?php if ($this->session->flashdata('no_drive_link')): ?>
     <script>
         Swal.fire({
             icon: 'warning',
             title: 'Drive Link Not Available',
             text: 'This free product does not have a download link yet.',
             confirmButtonColor: '#1a8b9d'
         });
     </script>
 <?php endif; ?>

 <script>
     function goToCheckout(productId) {
         window.location.href = "<?= base_url('checkout/'); ?>" + productId;
     }

     function showNoDriveAlert() {
         Swal.fire({
             icon: 'warning',
             title: 'Drive Link Not Available',
             text: 'This free product does not have a download link yet.',
             confirmButtonColor: '#1a8b9d'
         });
     }

     // Share button functionality
     document.addEventListener('DOMContentLoaded', function() {
         const shareBtn = document.getElementById('shareBtn');
         if (shareBtn) {
             shareBtn.addEventListener('click', function() {
                 Swal.fire({
                     icon: 'success',
                     title: 'Link Copied!',
                     text: 'Product link copied to clipboard',
                     timer: 2000,
                     showConfirmButton: false
                 });
             });
         }

         // Wishlist toggle (More Products heart)
         const wishlistBtn = document.querySelector('.action-btn:first-child');
         if (wishlistBtn) {
             wishlistBtn.addEventListener('click', function(e) {
                 e.preventDefault();
                 const icon = this.querySelector('i');
                 if (icon.classList.contains('fas')) {
                     icon.classList.remove('fas');
                     icon.classList.add('far');
                     this.style.borderColor = '';
                     this.style.color = '';
                 } else {
                     icon.classList.remove('far');
                     icon.classList.add('fas');
                     this.style.borderColor = '#f43f5e';
                     this.style.color = '#f43f5e';
                 }
             });
         }
     });

     document.addEventListener('DOMContentLoaded', function() {

         const shareBtn = document.getElementById('shareBtn');

         if (shareBtn) {
             shareBtn.addEventListener('click', async function() {

                 if (navigator.share) {
                     try {
                         await navigator.share({
                             title: document.title,
                             text: "Check out this product",
                             url: window.location.href
                         });
                     } catch (err) {
                         console.log("Share cancelled");
                     }
                 } else {
                     alert("Sharing not supported on this device.");
                 }

             });
         }

     });
 </script>