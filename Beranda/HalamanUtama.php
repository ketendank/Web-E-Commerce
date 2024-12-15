<?php
// Data produk contoh
$recommended_products = [
["name" => "Kaos", "price" => 100000, "image" => "IMG/sepatu.jpeg"], 
["name" => "Sepatu", "price" => 110000, "image" => "IMG/sepatu.jpeg"], 
["name" => "Hoodie","price" => 120000, "image" => "IMG/sepatu.jpeg"], 
["name" => "Celana", "price" => 130000, "image" => "IMG/sepatu.jpeg"], 
["name" => "Tas", "price" => 140000, "image" => "IMG/sepatu.jpeg"], 
["name" => "Kacamata", "price" => 150000, "image" => "IMG/sepatu.jpeg"] ]; 
$all_products = [
["name" => "Baju","price" => 105000, "image" => "IMG/Baju.jpg"], 
["name" => "Celana","price" => 115000, "image" => "IMG/Baju.jpg"], 
["name" => "Baju","price" => 130000, "image" => "IMG/Baju.jpg"], 
["name" => "Celana","price" => 140000, "image" => "IMG/Baju.jpg"], 
]; ?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cihuy Store</title>
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />
    <!-- AOS CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css"
      rel="stylesheet"
    />
    <style>
      /* Global Styles */
      body {
        font-family: "Roboto", sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(to bottom, #f3f4f6, #ffffff);
        color: #333;
      }
      nav {
        background: linear-gradient(45deg, #e74c3c, #8e44ad);
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 0;
        z-index: 1000;
        animation: slideIn 1s ease-out;
      }
      nav a {
        color: white;
        text-decoration: none;
        margin: 0 10px;
        font-size: 1rem;
        transition: color 0.3s ease;
      }
      nav a:hover {
        color: #ffe5d9;
      }
      .carousel-item img {
        height: 500px;
        object-fit: cover;
        border-radius: 15px;
        filter: brightness(100%);
      }
      .carousel-item img:hover {
        filter: brightness(100%);
      }
      .carousel-caption {
        background: rgba(0, 0, 0, 0.6);
        padding: 20px;
        border-radius: 10px;
        animation: fadeIn 2s ease-in-out;
      }
      h2 {
        text-align: center;
        margin: 40px 0 20px;
        font-weight: bold;
        color: #333;
        animation: slideIn 1.2s ease-out;
      }
      .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 20px;
        margin-top: 20px;
      }
      .product-card {
        border: none;
        border-radius: 8px;
        padding: 10px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background: white;
        transition: transform 0.3s, box-shadow 0.3s;
        cursor: pointer;
      }
      .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
      }
      .product-card img {
        max-width: 100%;
        border-radius: 8px;
        margin-bottom: 10px;
      }
      .product-card h3 {
        font-size: 1.2rem;
        color: #333;
        margin: 10px 0;
      }
      .product-card p {
        color: #e74c3c;
        font-weight: bold;
      }
      .btn-buy {
        background: linear-gradient(45deg, #e74c3c, #8e44ad);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 10px 20px;
        font-weight: bold;
        text-transform: uppercase;
        transition: background 0.3s ease, transform 0.3s ease;
      }
      .btn-buy:hover {
        background: linear-gradient(45deg, #8e44ad, #e74c3c);
        transform: scale(1.1);
      }
      footer {
        background: linear-gradient(45deg, #2c3e50, #4ca1af);
        color: white;
        padding: 10px 5px;
      }
      footer .icons i {
        font-size: 2rem;
        margin: 0 15px;
        transition: transform 0.3s ease, color 0.3s ease;
      }
      footer .icons i:hover {
        color: #e74c3c;
        transform: scale(1.2);
      }
      .copy {
        text-align: center;
      }

      /* Responsive Styles */

    /* Mobile (up to 576px) */
    @media (max-width: 576px) {
      nav {
        flex-direction: column;
        padding: 10px;
      }
      nav a {
        margin: 5px 0;
      }
      .carousel-item img {
        height: 200px;
      }
      .product-grid {
        grid-template-columns: 1fr;
      }
      h2 {
        font-size: 1.5rem;
      }
      footer {
        text-align: center;
      }
    }

    /* Tablet (576px to 992px) */
    @media (min-width: 576px) and (max-width: 992px) {
      .product-grid {
        grid-template-columns: repeat(2,1fr);
      }
      .carousel-item img {
        height: 100px;
      }
    }

    </style>
  </head>
  <body>
    <nav>
      <div><b>Cihuy Store</b></div>
      <div>
        <a href="#home"><i class="fas fa-home"></i> Home</a>
        <a href="#recommendation"><i class="fas fa-star"></i> Rekomendasi</a>
        <a href="#all-products"><i class="fas fa-boxes"></i> Produk</a>
      </div>
      <div>
        <a href ="notification.html"><i class="fas fa-bell" data-bs-toggle="tooltip" title="Notification"></i></a>
        <a href ="search.html"><i class="fas fa-search" data-bs-toggle="tooltip" title="Search"></i></a>
        <a href="Login.php"><i class="fas fa-user"data-bs-toggle="tooltip" title="Login"></i></a>
      </div>
    </nav>

    <div class="container mt-4">
  <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-aos="fade-up">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="IMG/background.jpeg" class="d-block w-100" alt="Promo 1" />
        <div class="carousel-caption">
          <h3>Promo Spesial!</h3>
          <p>Diskon hingga 50%!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="IMG/background2.jpeg" class="d-block w-100" alt="Promo 2" />
        <div class="carousel-caption">
          <h3>Produk Terbaru Kami</h3>
          <p>Jangan lewatkan koleksi terbaru.</p>
        </div>
      </div>
    </div>
    <!-- Left Control -->
    <button
      class="carousel-control-prev"
      type="button"
      data-bs-target="#carouselExample"
      data-bs-slide="prev"
    >
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <!-- Right Control -->
    <button
      class="carousel-control-next"
      type="button"
      data-bs-target="#carouselExample"
      data-bs-slide="next"
    >
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>


    <div class="container">
      <section id="recommendation" data-aos="fade-up">
        <h2>Rekomendasi Produk</h2>
        <div class="product-grid">
          <?php foreach ($recommended_products as $product): ?>
          <div class="product-card">
            <img
              src="<?= $product['image']; ?>"
              alt="<?= $product['name']; ?>"
            />
            <h3><?= $product['name']; ?></h3>
            <p>Rp<?= number_format($product['price'], 0, ',', '.'); ?></p>
            <a href ="Login.php" class="btn btn-buy">Buy Now</a>
          </div>
          <?php endforeach; ?>
        </div>
      </section>
    </div>

    <div class="container">
      <section id="all-products">
        <h2>Semua Produk</h2>
        <div class="product-grid">
          <?php foreach ($all_products as $product): ?>
          <div class="product-card">
            <img
              src="<?= $product['image']; ?>"
              alt="<?= $product['name']; ?>"
            />
            <h3><?= $product['name']; ?></h3>
            <p>Rp<?= number_format($product['price'], 0, ',', '.'); ?></p>
            <a href ="Login.php" class="btn btn-buy">Buy Now</a>
          </div>
          <?php endforeach; ?>
        </div>
      </section>
    </div>

    <footer>
      <div
        class="footer d-flex flex-wrap justify-content-around align-items-start py-4"
      >
        <div class="toko">
          <h4>Cihuy Store</h4>
          <p>Belanja dengan harga murah, mudah, dan cepat.</p>
        </div>
        <div class="menu">
          <h4>Menu</h4>
          <ul class="list-unstyled">
            <li>Tentang Kami</li>
            <li>Hubungi Kami</li>
          </ul>
        </div>
        <div class="bantuan">
          <h4>Bantuan</h4>
          <ul class="list-unstyled">
            <li>FAQ</li>
            <li>Support</li>
          </ul>
        </div>
        <div class="contact">
          <h4>Hubungi Kami</h4>
          <ul class="list-unstyled">
            <li>Email: support@cihuy store.com</li>
            <li>Phone: +62 123 4567</li>
          </ul>
        </div>
        <div class="icons text-center">
          <i class="fab fa-google mx-2"></i>
          <i class="fab fa-instagram mx-2"></i>
          <i class="fab fa-facebook mx-2"></i>
          <i class="fab fa-twitter mx-2"></i>
        </div>
      </div>
      <div class="text-center py-2">
        <p class="m-0">&copy; 2024 Cihuy Store. All rights reserved.</p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      AOS.init({ duration: 1000, once: true });
    </script>
  </body>
</html>
