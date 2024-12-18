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
        <title>Search Page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
        font-size: 1rem;}


   /* Search Section */
   .search-container {
  position: relative;
}

.search-container input[type="text"] {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px 0 0 5px;
  width: 400px;
  margin-left: 396px;
  margin-top: 23px;
}

.search-container button {
  top: 0;
  right: 0;
  padding: 10.5px;
  background: linear-gradient(45deg, #e74c3c, #8e44ad);
  color: white;
  border: none;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  margin-top: 23px;
  position: absolute;
  margin-right: 412px;
} 

/*Product*/
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
    margin-top: 0px;}

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

      <!-- Hero Section with Search -->
      <div class="search-container">
  <input type="text" placeholder="Cari produk">
  <button type="submit"><i class="fas fa-search"></i></button>
</div>

      <!--Produk-->
  <div class="product-grid">
    
    <!-- Barang 1 -->
    <div class="product-card" data-aos="zoom-in">
      <img src="IMG/Buku.png" alt="Buku" />
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
    </div>

    <!--Barang 2-->
    <div class="product-card" data-aos="zoom-in">
      <img src="IMG/Topi.jpg" alt="Topi" />
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
</div>

<!--Barang 3-->
    <div class="product-card" data-aos="zoom-in">
      <img src="IMG/Kemeja.jpg" alt="Kemeja" />
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
  </div>

  <!--Barang 4-->
    <div class="product-card" data-aos="zoom-in">
      <img src="IMG/Rok.jpg" alt="Rok" />
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
    </div>

   <!--Barang 5--> 
    <div class="product-card" data-aos="zoom-in">
      <img src="IMG/Kaos.jpg" alt="Kaos" />
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
    </div>
    <!--Barang 6-->
    <div class="product-card" data-aos="zoom-in">
      <img src="IMG/Sandal.jpg" alt="Sandal" />
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
    </div>

    <!--Barang 7-->
    <div class="product-card" data-aos="zoom-in">
      <img src="IMG/Pulpen.jpg" alt="Pulpen" />
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
    </div>
    <!--Barang 8-->
    <div class="product-card" data-aos="zoom-in">
      <img src="IMG/Handphone.jpeg" alt="HP" />
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
