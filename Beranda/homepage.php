<?php
session_start();
include 'Koneksi.php';
// Pastikan session untuk Username ada
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : 'Guest';
$Photo = isset($_SESSION['Photo']) ? $_SESSION['Photo'] : null;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beranda</title>

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-..."
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- Bootstrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />

    <!-- AOS CSS for Animations -->
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
        box-sizing: border-box;
        background-color: #f9f9f9;
      }

      /* Header */
      .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 3rem;
        background: linear-gradient(45deg, #e74c3c, #8e44ad);
        color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        position: sticky;
        top: 0;
        z-index: 1000;
      }

      .header .logo {
        font-size: 1.8rem;
        font-weight: bold;
        color: black;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
      }

      .header .profile i {
        font-size: 1.5rem;
        margin: 0 0.5rem;
        cursor: pointer;
        transition: transform 0.3s ease, color 0.3s ease;
      }

      .header .profile i:hover {
        color: #e74c3c;
        transform: scale(1.2);
      }

      /* Carousel Styles */
      .carousel-item img {
        height: 500px;
        object-fit: cover;
      }

      /* Search Section */
      .background {
        position: relative;
        text-align: center;
        color: white;
        height: 300px;
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
          url("") center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .input-container {
        position: relative;
        width: 100%;
        max-width: 500px;
      }

      .search-input {
        width: 100%;
        border-radius:none;
        padding: 1rem;
        padding-right: 300px; 
        border: 1px solid #ddd;
        font-size: 1rem;
      }

      .search-input:focus {
        outline: none;
        border-color: #cc4d3c;

      }

      .search-button {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        background-color: #e74c3c;
        border: none;
        color: white;
        padding: 0.5rem 1rem;
        cursor: pointer;
        font-size: 1rem;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease;
      }

      .search-button:hover {
        background-color: #c0392b;
      }

      .search-button i {
        font-size: 1.2rem;
      }

      /* Featured Products Section */
      .featured h2 {
        text-align: center;
        margin: 2rem 0;
        font-size: 2.5rem;
        color: #2c3e50;
        font-weight: bold;
      }

      .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        padding: 2rem;
      }

      .product-card {
        cursor: pointer;
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        background-color: #fff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        overflow: hidden;
      }

      .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
      }

      .product-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
      }

      .product-card h3 {
        font-size: 1.5rem;
        margin: 1rem;
        color: #2c3e50;
      }

      .product-card p {
        color: #e74c3c;
        font-size: 1.2rem;
        font-weight: bold;
        margin: 0 1rem 1rem 1rem;
      }

      .cart-icon {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: rgba(231, 76, 60, 0.8);
        color: #fff;
        padding: 0.5rem;
        border-radius: 50%;
        transition: background-color 0.3s ease;
      }

      .cart-icon:hover {
        background-color: #c0392b;
      }

      /* Tombol BuyNow yang menarik */
      .buy-now-btn {
        display: flex;
        justify-content: center;
        text-decoration: none;
        background: linear-gradient(45deg, #e74c3c,  #8e44ad);
        color: white;
        padding: 0.7rem 1.5rem;
        border-radius: 30px;
        font-size: 1.1rem;
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease,
        background 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);

      }
      

      .buy-now-btn:hover {
        background: linear-gradient(45deg, #8e44ad, #e74c3c);
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      }

      .buy-now-btn i {
        margin-left: 8px;
        transition: transform 0.3s ease;
      }

      .buy-now-btn:hover i {
        transform: translateX(5px);
      }

      /* Testimonials Section */
      .testimonials {
        background-color: #fff;
        padding: 4rem 2rem;
      }

      .testimonials h2 {
        text-align: center;
        margin-bottom: 2rem;
        font-size: 2.5rem;
        color: #2c3e50;
        font-weight: bold;
      }

      .testimonial-card {
        background-color: #f1f1f1;
        border-radius: 10px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
      }

      .testimonial-card:hover {
        transform: translateY(-5px);
      }

      .testimonial-card p {
        font-style: italic;
        color: #555;
        margin-bottom: 1rem;
      }

      .testimonial-card h5 {
        margin-top: 1rem;
        color: #e74c3c;
        font-weight: bold;
      }

      /* Footer */
      .footer {
        background: linear-gradient(45deg, #2c3e50, #4ca1af);
        color: #fff;
        padding: 3rem 2rem;
      }

      .footer .footer-content {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-bottom: 2rem;
      }

      .footer .footer-content div {
        flex: 1 1 200px;
        margin: 1rem;
      }

      .footer h4 {
        margin-bottom: 1rem;
        font-size: 1.5rem;
      }

      .footer p {
        margin: 0.5rem 0;
      }

      .footer .icons {
        text-align: center;
        margin-top: 1rem;
      }

      .footer .icons i {
        font-size: 2rem;
        margin: 0 0.5rem;
        cursor: pointer;
        transition: transform 0.3s ease, color 0.3s ease;
      }

      .footer .icons i:hover {
        color: #e74c3c;
        transform: scale(1.3);
      }

      .footer p.copy {
        text-align: center;
        margin-top: 1rem;
        font-size: 1rem;
      }

      /* Responsive Design with Media Queries */

      /* For smaller phones (portrait) */
      @media (max-width: 576px) {
        .header .logo {
          font-size: 1.2rem;
        }

        .header {
          padding: 0.5rem 1rem;
        }

        .background {
          height: 200px;
        }

        .product-card img {
          height: 150px;
        }
      }

      /* For tablets */
      @media (min-width: 577px) and (max-width: 768px) {
        .header {
          padding: 1rem 1.5rem;
        }

        .product-card img {
          height: 180px;
        }
      }

      /* For desktops */
      @media (min-width: 992px) {
        .header {
          padding: 1rem 3rem;
        }

        .product-card img {
          height: 200px;
        }

        .product-grid {
          grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
          gap: 2rem;
        }
      }
    </style>
  </head>
  <body>
    <!-- Header -->
    <header class="header">
      <div class="logo">Cihuy Store</div>
      <div class="profile">
        <i class="bi bi-cart" data-bs-toggle="tooltip" title="Cart"></i>
             
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
            <style>
            
                body {
                    font-family: Arial, sans-serif;
                }
        
                .notification-container {
                    position: relative;
                    display: inline-block;
                }
        
                .notification-dropdown-menu {
                    position: absolute;
                    top: 40px;
                    right: 0;
                    width: 300px;
                    display: none;
                    background: linear-gradient(to bottom, #ff5a5f, #9c5fd5); /* Gradient theme */
                    border-radius: 8px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
                }
        
                .notification-dropdown-menu.show {
                    display: block;
                }
        
                .notification-dropdown-menu .dropdown-item {
                    color: white;
                    padding: 10px;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                }
        
                .notification-dropdown-menu .dropdown-item:hover {
                    background-color: rgba(255, 255, 255, 0.1);
                }
        
                .tab-content {
                    margin-top: 10px;
                    padding: 10px;
                    background: #db247a;
                    border-radius: 8px;
                    display: none;
                }
        
                .tab-content.show {
                    display: block;
                }
        
                .tab-content ul {
                    list-style-type: none;
                    padding: 0;
                }
        
                .tab-content ul li {
                    margin: 5px 0;
                    padding: 5px 10px;
                    background: #db247a;
                    border-radius: 5px;
                    cursor: pointer;
                }
        
                .tab-content ul li:hover {
                    background: #db247a;
                }
            </style>
        </head>
        <body>
        
        <div class="notification-container">
            
            <i class="fas fa-bell" data-bs-toggle="tooltip" title="Notifications"></i>
        
        
            <div class="notification-dropdown-menu">
                <div class="dropdown-item" data-tab="tab1">Summer Sale Discount</div>
                <div class="dropdown-item" data-tab="tab2">New Added Product</div>
                <div class="dropdown-item" data-tab="tab3">Shipment Tracking</div>
            </div>
        </div>
        
       
        <div class="tab-content" id="tab1">
            <h3>Summer Sale Discounts</h3>
            <ul>
                <li>10% Off</li>
                <li>20% Off</li>
                <li>30% Off</li>
                <li>40% Off</li>
                <li>50% Off</li>
            </ul>
        </div>
        
        <div class="tab-content" id="tab2">
            <h3>New Added Products</h3>
            <ul>
                <li>Pakaian A</li>
                <li>pakaian B</li>
                <li>Pakaian C</li>
            </ul>
        </div>
        
        <div class="tab-content" id="tab3">
            <h3>Shipment Tracking</h3>
            <p>Melacak paket pesanan Anda.</p>
        </div>
        
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const bellIcon = document.querySelector('.fa-bell');
                const dropdownMenu = document.querySelector('.notification-dropdown-menu');
                const dropdownItems = document.querySelectorAll('.dropdown-item');
                const tabContents = document.querySelectorAll('.tab-content');
        
                
                bellIcon.addEventListener('click', function () {
                    dropdownMenu.classList.toggle('show');
                });
        
               
        dropdownItems.forEach(item => {
            item.addEventListener('click', function () {
                const tabId = this.getAttribute('data-tab');
                const tabContent = document.getElementById(tabId);

                if (tabContent.classList.contains('show')) {
                    tabContent.classList.remove('show');
                } else {
                  
                    tabContents.forEach(tab => tab.classList.remove('show'));
                    
                    tabContent.classList.add('show');
                }
            });
        });
    });
</script>
        </body> 
        <i class="bi bi-person"
          id="profileDropdown"
          data-bs-toggle="dropdown"
          aria-expanded="false"
          data-bs-toggle="tooltip"
          title="<?php echo $username; ?>" 
      <!-- Tooltip menampilkan email -->
        </i>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="profileDropdown"
        >
          <li><a class="dropdown-item" href="Profile.php">Akun Saya</a></li>
          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </header>

    <!-- Carousel Section -->
    <section id="carouselSection">
      <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="IMG/Hi.png"
              class="d-block w-100"
              alt="Slide 1"
            />
            <div class="carousel-caption d-none d-md-block">
              <h5>Welcome to Cihuy Store</h5>
              <p>Discover our latest products!</p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="IMG/background2.jpeg"
              class="d-block w-100"
              alt="Slide 2"
            />
            <div class="carousel-caption d-none d-md-block">
              <h5>Hot Deals</h5>
              <p>Hot deals for the summer season.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="IMG/background3.jpeg"
              class="d-block w-100"
              alt="Slide 3"
            />
            <div class="carousel-caption d-none d-md-block">
              <h5>Exclusive Offers</h5>
              <p>Don't miss out on our exclusive offers.</p>
            </div>
          </div>  
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#heroCarousel"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#heroCarousel"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>

    <!-- Hero Section with Search -->
    <section class="background">
      <div class="search-container" data-aos="fade-up">
        <form action="script.js" method="GET">
          <div class="input-container">
            <input
              type="text"
              class="search-input"
              placeholder="Search Here..."
              aria-label="Search"
            />
            <button type="submit" class="search-button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </form>
      </div>
    </section>

    <!-- Products Section -->
    <section class="featured">
      <h2 data-aos="fade-up">Produk Kami</h2>
      <div class="product-grid">
        <!-- Example Product Card -->
        <div class="product-card" data-aos="zoom-in">
          <img src="IMG/Baju.jpg" alt="Product 1" />
          <span
            class="badge bg-success position-absolute"
            style="top: 10px; left: 10px"
            >New</span
          >
          <h3>Product 1</h3>
          <p>Rp. 1,000,000</p>
          <i
            class="fas fa-shopping-cart cart-icon"
            data-bs-toggle="tooltip"
            title="Add to Cart"
          ></i
          ><a href="Buy1.html" class="buy-now-btn">
            Buy Now </a>
        </div>
        <div class="product-card" data-aos="zoom-in">
          <img src="IMG/Baju.jpg" alt="Product 1" />
          <span
            class="badge bg-success position-absolute"
            style="top: 10px; left: 10px"
            >New</span
          >
          <h3>Product 1</h3>
          <p>Rp. 1,000,000</p>
          <i
            class="fas fa-shopping-cart cart-icon"
            data-bs-toggle="tooltip"
            title="Add to Cart"
          ></i
          ><a href="Buy2.html" class="buy-now-btn">
            Buy Now </a>
        </div>
        <div class="product-card" data-aos="zoom-in">
          <img src="IMG/Baju.jpg" alt="Product 1" />
          <span
            class="badge bg-success position-absolute"
            style="top: 10px; left: 10px"
            >New</span
          >
          <h3>Product 1</h3>
          <p>Rp. 1,000,000</p>
          <i
            class="fas fa-shopping-cart cart-icon"
            data-bs-toggle="tooltip"
            title="Add to Cart"
          ></i
          ><a href="Buy3.html" class="buy-now-btn">
            Buy Now </a>
        </div>
        <div class="product-card" data-aos="zoom-in">
          <img src="IMG/Baju.jpg" alt="Product 1" />
          <span
            class="badge bg-success position-absolute"
            style="top: 10px; left: 10px"
            >New</span
          >
          <h3>Product 1</h3>
          <p>Rp. 1,000,000</p>
          <i
            class="fas fa-shopping-cart cart-icon"
            data-bs-toggle="tooltip"
            title="Add to Cart"
          ></i
          ><a href="Buy4.html" class="buy-now-btn">
            Buy Now </a>
        </div>
        <div class="product-card" data-aos="zoom-in">
          <img src="IMG/Baju.jpg" alt="Product 1" />
          <span
            class="badge bg-success position-absolute"
            style="top: 10px; left: 10px"
            >New</span
          >
          <h3>Product 1</h3>
          <p>Rp. 1,000,000</p>
          <i
            class="fas fa-shopping-cart cart-icon"
            data-bs-toggle="tooltip"
            title="Add to Cart"
          ></i
          ><a href="Buy5.html" class="buy-now-btn">
            Buy Now </a>
        </div>
        <div class="product-card" data-aos="zoom-in">
          <img src="IMG/Baju.jpg" alt="Product 1" />
          <span
            class="badge bg-success position-absolute"
            style="top: 10px; left: 10px"
            >New</span
          >
          <h3>Product 1</h3>
          <p>Rp. 1,000,000</p>
          <i
            class="fas fa-shopping-cart cart-icon"
            data-bs-toggle="tooltip"
            title="Add to Cart"
          ></i
          ><a href="Buy6.html" class="buy-now-btn">
            Buy Now </a>
        </div>
        <div class="product-card" data-aos="zoom-in">
          <img src="IMG/Baju.jpg" alt="Product 1" />
          <span
            class="badge bg-success position-absolute"
            style="top: 10px; left: 10px"
            >New</span
          >
          <h3>Product 1</h3>
          <p>Rp. 1,000,000</p>
          <i
            class="fas fa-shopping-cart cart-icon"
            data-bs-toggle="tooltip"
            title="Add to Cart"
          ></i
          ><a href="Buy7.html" class="buy-now-btn">
            Buy Now </a>
        </div>
        <div class="product-card" data-aos="zoom-in">
          <img src="IMG/Baju.jpg" alt="Product 1" />
          <span
            class="badge bg-success position-absolute"
            style="top: 10px; left: 10px"
            >New</span
          >
          <h3>Product 1</h3>
          <p>Rp. 1,000,000</p>
          <i
            class="fas fa-shopping-cart cart-icon"
            data-bs-toggle="tooltip"
            title="Add to Cart"
          ></i
          ><a href="Buy8.html" class="buy-now-btn">
            Buy Now </a>
        </div>
        <div class="product-card" data-aos="zoom-in">
          <img src="IMG/Baju.jpg" alt="Product 1" />
          <span
            class="badge bg-success position-absolute"
            style="top: 10px; left: 10px"
            >New</span
          >
          <h3>Product 1</h3>
          <p>Rp. 1,000,000</p>
          <i
            class="fas fa-shopping-cart cart-icon"
            data-bs-toggle="tooltip"
            title="Add to Cart"
          ></i
          ><a href="Buy9.html" class="buy-now-btn">
            Buy Now </a>
        </div>
        <div class="product-card" data-aos="zoom-in">
          <img src="IMG/Baju.jpg" alt="Product 1" />
          <span
            class="badge bg-success position-absolute"
            style="top: 10px; left: 10px"
            >New</span
          >
          <h3>Product 1</h3>
          <p>Rp. 1,000,000</p>
          <i
            class="fas fa-shopping-cart cart-icon"
            data-bs-toggle="tooltip"
            title="Add to Cart"
          ></i
          ><a href="Buy10.html" class="buy-now-btn">
            Buy Now </a>
        </div>
        <div class="product-card" data-aos="zoom-in">
          <img src="IMG/Baju.jpg" alt="Product 1" />
          <span
            class="badge bg-success position-absolute"
            style="top: 10px; left: 10px"
            >New</span
          >
          <h3>Product 1</h3>
          <p>Rp. 1,000,000</p>
          <i
            class="fas fa-shopping-cart cart-icon"
            data-bs-toggle="tooltip"
            title="Add to Cart"
          ></i
          ><a href="Buy11.html" class="buy-now-btn">
            Buy Now</a>
        </div>
        <div class="product-card" data-aos="zoom-in">
          <img src="IMG/Baju.jpg" alt="Product 1" />
          <span
            class="badge bg-success position-absolute"
            style="top: 10px; left: 10px"
            >New</span
          >
          <h3>Product 1</h3>
          <p>Rp. 1,000,000</p>
          <i
            class="fas fa-shopping-cart cart-icon"
            data-bs-toggle="tooltip"
            title="Add to Cart"
          ></i
          ><a href="Buy12.html" class="buy-now-btn">
            Buy Now</a>
        </div>
      </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
      <h2 data-aos="fade-up">Testimonials</h2>
      <div class="container">
        <div class="row">
          <div class="col-md-4" data-aos="zoom-in">
            <div class="testimonial-card">
              <p>
                "Cihuy Shop has the best products at the best prices. Highly
                recommend!"
              </p>
              <h5>- Nuaiman</h5>
            </div>
          </div>
          <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="testimonial-card">
              <p>
                "Fantastic customer service and quick delivery. Will shop
                again."
              </p>
              <h5>- Musa</h5>
            </div>
          </div>
          <div class="col-md-4" data-aos="zoom-in" data-aos-delay="400">
            <div class="testimonial-card">
              <p>"A seamless shopping experience from start to finish."</p>
              <h5>- Asyif</h5>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
      <div class="footer-content">
        <div class="toko" data-aos="fade-up">
          <h4>Cihuy Store</h4>
          <p>Belanja dengan harga murah, mudah, dan cepat</p>
        </div>
        <div class="menu" data-aos="fade-up" data-aos-delay="200">
          <h4>Menu</h4>
          <p>
            <a href="about.html" class="text-white text-decoration-none"
              >Tentang Kami</a
            >
          </p>
          <p>
            <a href="contact.html" class="text-white text-decoration-none"
              >Hubungi Kami</a
            >
          </p>
        </div>
        <div class="bantuan" data-aos="fade-up" data-aos-delay="400">
          <h4>Bantuan</h4>
          <p>
            <a href="faq.html" class="text-white text-decoration-none">FAQ</a>
          </p>
          <p>
            <a href="support.html" class="text-white text-decoration-none"
              >Support</a
            >
          </p>
        </div>
        <div class="contact" data-aos="fade-up" data-aos-delay="600">
          <h4>Contact</h4>
          <p>Email: support@cihuystore.com</p>
          <p>Phone: +62 123 4567</p>
        </div>
      </div>
      <div class="icons" data-aos="fade-up" data-aos-delay="800">
        <i class="fab fa-google"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-facebook"></i>
        <i class="fab fa-twitter"></i>
      </div>
      <p class="copy">&copy; 2024 Cihuy Store. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS JS for Animations -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <script>
      // Initialize AOS
      AOS.init({
        duration: 1000,
        once: true,
      });

      // Initialize Bootstrap tooltips
      var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
      );
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
      });

       // Variabel untuk menghitung jumlah produk di keranjang
      let cartCount = 0;

      // Fungsi untuk memperbarui jumlah di keranjang
      function updateCartCount() {
      const cartCountElement = document.getElementById('cart-count');
      cartCountElement.textContent = cartCount;
    }

      // Tambahkan event listener pada ikon produk
      document.querySelectorAll('.fas fa-shopping-cart cart-icon').forEach(icon => {
      icon.addEventListener('click', () => {
      cartCount++; // Tambahkan jumlah produk
      updateCartCount(); // Perbarui tampilan keranjang
      });
  });

    </script>
  </body>
</html>
