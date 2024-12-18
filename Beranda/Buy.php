<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_ecommerce";


$conn = mysqli_connect($servername, $username, $password, $dbname);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Buy1</title>
        <style>
        body {
        font-family: "Roboto", sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(to bottom, #f3f4f6, #ffffff);
        color: #333;
      }

      /*menu*/
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
        transition: color 0.3s ease;}

  /*Item Individu*/      
    .item {
        margin : 10px;
        display: flex;
        background-color: white;
        height: 470px;
        padding-right: 20px;
    }

    .container {
          display: flex;
          flex-direction: column;
          margin-left: 10px;
}

    .fa-shopping-cart{
    
      color: white;
      border: none;
      border-radius: 50px;
      padding: 10px 20px;
      font-weight: bold;
      text-transform: uppercase;
      transition: background 0.3s ease, transform 0.3s ease;
      text-decoration: none;
      font-size: 20px;
      margin-right: 10px;
      margin-top: 0px;
      background-color: #c0392b;
      
    }

    .fa-shopping-cart:hover{
      transform: translateY(-10px);
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    button {
    padding: 10px;
    padding-left: 15px;
    padding-right: 15px;
    font-size: 16px;
    margin: 20px;
    background:linear-gradient(45deg, #e74c3c, #8e44ad); ;
    border: none;
    color: white;
      }

/*Saran Produk*/
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

      /* Footer */
      .footer {
        background: linear-gradient(45deg, #2c3e50, #4ca1af);
        color: #fff;
        padding: 3rem 2rem;
        width: 1200px;
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
        </style>
    </head>
    <body>
      <!-- Menu -->
        <nav>
            <div><b>Cihuy Store</b></div>
            <div>
              <a href ="notification.php"><i class="fas fa-bell" data-bs-toggle="tooltip" title="Notification" style="margin-right: 10px;"></i></a>
              <a href ="#"><i class="fas fa-shopping-cart" data-bs-toggle="tooltip" title="cart" style="background-color: transparent; font-size: 15px;"></i></a>
              <a href="Login.php"><i class="fas fa-user"data-bs-toggle="tooltip" title="Login"></i></a>
            </div>
          </nav>
          

          <!-- Item Individu -->
          <div class="item">
    <img style="position: sticky; right: 100;" src="IMG/Topi.jpg" width="600" height="100%"/>
   
    <div class="container">
      <h2 style="font-size: 38px;"><?php
$sql = "SELECT productName FROM products WHERE productId = 2";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Output data
  $row = mysqli_fetch_assoc($result);
  echo $row["productName"];
} else {
  echo "Barang Kosong";
}
?></h2>
   
      <p style="vertical-align: top;"><b style="font-size: 20px;">Deskripsi:</b>
      </br>
      Celana jeans straight cut dengan potongan yang rapi dan elegan. Bahan denim tebal dan 
      kuat, cocok untuk acara semi-formal. Padukan dengan kemeja dan sepatu pantofel untuk 
      tampilan yang lebih profesional.</p>

    <!--Tambah Barang Button-->
    <div style="display: flex; margin-top: 70px; margin-left: 25px;">
      <button onclick="decrement()">-</button>
      <span id="jumlah" style="margin-top: 30px;">0</span>
      <button onclick="increment()">+</button>
      
      <script>
        function increment() {
            let jumlah = document.getElementById("jumlah");
            jumlah.textContent = parseInt(jumlah.textContent) + 1;
        }

        function decrement() {
            let jumlah = document.getElementById("jumlah");
            let nilaiSekarang = parseInt(jumlah.textContent);
            if (nilaiSekarang > 0) {
                jumlah.textContent = nilaiSekarang - 1;
            }
        }
    </script>
    </div>
    <!--Price-->
<h2 style="margin-top: 60px; margin-left: 600px; color: #e74c3c;"><?php
$sql = "SELECT productPrice FROM products WHERE productId = 2";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  echo "Rp " . number_format($row["productPrice"], 0, ',', '.');
} else {
  echo "Harga Tidak Ditemukan";
}
?></h2>
  </div>
</div>

   <!--Logo Buy & Cart-->
<div style="display: flex; justify-content: flex-end; margin-bottom: 10px; margin-right: 10px;">
 <div style="margin-right: 30px;">
    <a href=""><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <i class="fas fa-shopping-cart" style="margin-top: 9px;"></i></a>
</div>
<a href="Checkout.php" class="buy-now-btn">Buy Now</a>
</div>

<!-- saran produk -->
<!-- Products Section -->
<section class="featured" style="margin-top: 100px;">
  <h2 data-aos="fade-up">Produk Lainnya</h2>
  <div class="product-grid">
    
    <!-- Example Product Card -->
    <div class="product-card" data-aos="zoom-in">
      <img src="IMG/Buku.png" alt="Buku" />
      <span
        class="badge bg-success position-absolute"
        style="top: 10px; left: 10px"
        >New</span
      >
      <h3><?php
$sql = "SELECT productName FROM products WHERE productId = 9";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Output data
  $row = mysqli_fetch_assoc($result);
  echo $row["productName"];
} else {
  echo "Barang Kosong";
}
?></h3>
      <p><?php
$sql = "SELECT productPrice FROM products WHERE productId = 9";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  echo "Rp " . number_format($row["productPrice"], 0, ',', '.');
} else {
  echo "Harga Tidak Ditemukan";
}
?></p>
      <i
        class="fas fa-shopping-cart cart-icon"
        data-bs-toggle="tooltip"
        title="Add to Cart"
      ></i
      ><a href="Buy9.php" class="buy-now-btn">
        Buy Now </a>
    </div>
    <div class="product-card" data-aos="zoom-in">
      <img src="IMG/Topi.jpg" alt="Topi" />
      <span
        class="badge bg-success position-absolute"
        style="top: 10px; left: 10px"
        >New</span
      >
      <h3><?php
$sql = "SELECT productName FROM products WHERE productId = 2";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Output data
  $row = mysqli_fetch_assoc($result);
  echo $row["productName"];
} else {
  echo "Barang Kosong";
}
?></h3>
      <p><?php
$sql = "SELECT productPrice FROM products WHERE productId = 2";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  echo "Rp " . number_format($row["productPrice"], 0, ',', '.');
} else {
  echo "Harga Tidak Ditemukan";
}
?></p>
      <i
        class="fas fa-shopping-cart cart-icon"
        data-bs-toggle="tooltip"
        title="Add to Cart"
      ></i
      ><a href="Buy2.php" class="buy-now-btn">
        Buy Now </a>
    </div>
    <div class="product-card" data-aos="zoom-in">
      <img src="IMG/Kemeja.jpg" alt="Kemeja" />
      <span
        class="badge bg-success position-absolute"
        style="top: 10px; left: 10px"
        >New</span
      >
      <h3><?php
$sql = "SELECT productName FROM products WHERE productId = 3";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Output data
  $row = mysqli_fetch_assoc($result);
  echo $row["productName"];
} else {
  echo "Barang Kosong";
}
?></h3>
      <p><?php
$sql = "SELECT productPrice FROM products WHERE productId = 3";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  echo "Rp " . number_format($row["productPrice"], 0, ',', '.');
} else {
  echo "Harga Tidak Ditemukan";
}
?></p>
      <i
        class="fas fa-shopping-cart cart-icon"
        data-bs-toggle="tooltip"
        title="Add to Cart"
      ></i
      ><a href="Buy3.php" class="buy-now-btn">
        Buy Now </a>
    </div>
    <div class="product-card" data-aos="zoom-in">
      <img src="IMG/Rok.jpg" alt="Rok" />
      <span
        class="badge bg-success position-absolute"
        style="top: 10px; left: 10px"
        >New</span
      >
      <h3><?php
$sql = "SELECT productName FROM products WHERE productId = 4";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Output data
  $row = mysqli_fetch_assoc($result);
  echo $row["productName"];
} else {
  echo "Barang Kosong";
}
?></h3>
      <p><?php
$sql = "SELECT productPrice FROM products WHERE productId = 4";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  echo "Rp " . number_format($row["productPrice"], 0, ',', '.');
} else {
  echo "Harga Tidak Ditemukan";
}
?></p>
      <i
        class="fas fa-shopping-cart cart-icon"
        data-bs-toggle="tooltip"
        title="Add to Cart"
      ></i
      ><a href="Buy4.php" class="buy-now-btn">
        Buy Now </a>
    </div>
    <div class="product-card" data-aos="zoom-in">
      <img src="IMG/Kaos.jpg" alt="Kaos" />
      <span
        class="badge bg-success position-absolute"
        style="top: 10px; left: 10px"
        >New</span
      >
      <h3><?php
$sql = "SELECT productName FROM products WHERE productId = 5";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Output data
  $row = mysqli_fetch_assoc($result);
  echo $row["productName"];
} else {
  echo "Barang Kosong";
}
?></h3>
      <p><?php
$sql = "SELECT productPrice FROM products WHERE productId = 5";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  echo "Rp " . number_format($row["productPrice"], 0, ',', '.');
} else {
  echo "Harga Tidak Ditemukan";
}
?></p>
      <i
        class="fas fa-shopping-cart cart-icon"
        data-bs-toggle="tooltip"
        title="Add to Cart"
      ></i
      ><a href="Buy5.php" class="buy-now-btn">
        Buy Now </a>
    </div>
    <div class="product-card" data-aos="zoom-in">
      <img src="IMG/Sandal.jpg" alt="Sandal" />
      <span
        class="badge bg-success position-absolute"
        style="top: 10px; left: 10px"
        >New</span
      >
      <h3><?php
$sql = "SELECT productName FROM products WHERE productId = 7";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Output data
  $row = mysqli_fetch_assoc($result);
  echo $row["productName"];
} else {
  echo "Barang Kosong";
}
?></h3>
      <p><?php
$sql = "SELECT productPrice FROM products WHERE productId = 7";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  echo "Rp " . number_format($row["productPrice"], 0, ',', '.');
} else {
  echo "Harga Tidak Ditemukan";
}
?>
</p>
      <i
        class="fas fa-shopping-cart cart-icon"
        data-bs-toggle="tooltip"
        title="Add to Cart"
      ></i
      ><a href="Buy7.php" class="buy-now-btn">
        Buy Now </a>
    </div>
    <div class="product-card" data-aos="zoom-in">
      <img src="IMG/Pulpen.jpg" alt="Pulpen" />
      <span
        class="badge bg-success position-absolute"
        style="top: 10px; left: 10px"
        >New</span
      >
      <h3><?php
$sql = "SELECT productName FROM products WHERE productId = 10";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Output data
  $row = mysqli_fetch_assoc($result);
  echo $row["productName"];
} else {
  echo "Barang Kosong";
}
?></h3>
      <p><?php
$sql = "SELECT productPrice FROM products WHERE productId = 10";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  echo "Rp " . number_format($row["productPrice"], 0, ',', '.');
} else {
  echo "Harga Tidak Ditemukan";
}
?></p>
      <i
        class="fas fa-shopping-cart cart-icon"
        data-bs-toggle="tooltip"
        title="Add to Cart"
      ></i
      ><a href="Buy10.php" class="buy-now-btn">
        Buy Now </a>
    </div>
    <div class="product-card" data-aos="zoom-in">
      <img src="IMG/Handphone.jpeg" alt="HP" />
      <span
        class="badge bg-success position-absolute"
        style="top: 10px; left: 10px"
        >New</span
      >
      <h3><?php
$sql = "SELECT productName FROM products WHERE productId = 11";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Output data
  $row = mysqli_fetch_assoc($result);
  echo $row["productName"];
} else {
  echo "Barang Kosong";
}
?></h3>
      <p><?php
$sql = "SELECT productPrice FROM products WHERE productId = 11";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  echo "Rp " . number_format($row["productPrice"], 0, ',', '.');
} else {
  echo "Harga Tidak Ditemukan";
}
?></p>
      <i
        class="fas fa-shopping-cart cart-icon"
        data-bs-toggle="tooltip"
        title="Add to Cart"
      ></i
      ><a href="Buy11.php" class="buy-now-btn">
        Buy Now </a>
    </div>
  </div>

    <!-- Footer -->
    <footer class="footer" style="width: 100%;">
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
</body>
</html>
