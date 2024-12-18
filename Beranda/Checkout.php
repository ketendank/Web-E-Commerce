<!DOCTYPE html>
<html>
    <head>
        <title>Check Out</title>
        <style>
      body {
        font-family: "Roboto", sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(to bottom, #f3f4f6, #ffffff);
        color: #333;}

   /*menu*/
      .header {
        background: linear-gradient(45deg, #e74c3c, #8e44ad);
        padding: 15px;
        font-size: 25px;
        text-align: center;
      }

   /*Item*/
     .product-card {
        margin: 10px;
        height: 180px;
        width: 1050px;
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        background-color: #fff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        overflow: hidden;
        display: flex;
      }

      .product-card img {
        width: 200px;
        height: 100%;
        object-fit: cover;
      }

      .product-card h3 {
        margin-left: 10px;
      }

      .product-card p{
        margin-left: 10px;
      }

      .price{
        margin-left: 20px;
        color: #e74c3c;
        font-size: 20px;
        font-weight: bold;
      }

      .Deskripsi {
          display: flex;
          flex-direction: column;
          margin-left: 10px;
      }

      button {
      padding: 10px;
      padding-left: 15px;
      padding-right: 15px;
      font-size: 16px;
      margin: 20px;
      margin-bottom: 80px;
      background:linear-gradient(45deg, #e74c3c, #8e44ad); ;
      border: none;
      color: white;
      }

    /*Input Alamat*/
    .alamat {
      display: block;
      margin: 20px;
      margin-bottom: 5px;
      background: linear-gradient(45deg, #e74c3c, #8e44ad);
      box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
      padding: 10px;
      color: white;
      height: 200px;
    }
    .alamat h2 {
      text-align: center;
    }

    form label {
    margin-left: 20px;
    font-weight: bold;
   
  }

    form input {
    margin-top: 20px;
  }

  /*Metode Pembayaran*/
    .bayar {
      background: linear-gradient(45deg, #e74c3c, #8e44ad);
      color: white;
      margin: 10px;
      box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
      height: 150px;
      width: 395px;
    }

    .bayar h2 {
      text-align: center;
    }

    .method {
      text-align: center;
    }


  /*Kode Promo*/
    .promo{
      background: linear-gradient(45deg, #e74c3c, #8e44ad);
      color: white;
      margin: 10px;
      margin-left: 20px;
      box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
      height: 150px;
      width: 395px;
    }

    .promo h2{
      text-align: center;
    }

      /*footer*/
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

      /* checkout container */
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
        width: 200px;
        height: 30px;
        float: right;
        padding-top: 20px;
        margin-left: 20px;
        margin-top: 10px;

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

      #checkout{
        height: 80px;
        background: rgb(231, 231, 231);
      box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
      padding: 10px;
      display: flex;
      }

        </style>
    </head>
    <body>

     <!-- Header -->

    <div class="header"><b>Cihuy Store</b></div>

     <!-- Item 1 -->
     <div style="display: flex;">
     <div class="product-card" data-aos="zoom-in">
      <img src="d:\GitHub\Web-E-Commerce\Beranda\IMG\Baju.jpg" alt="Product" />
      <div class="Deskripsi">
      <h3>Celana</h3>
      <p style="vertical-align: top; width: 650px;">Celana jeans straight cut dengan potongan yang rapi dan elegan. Bahan d
        enim tebal dan kuat, cocok untuk acara semi-formal. Padukan dengan kemeja dan 
        sepatu pantofel untuk tampilan yang lebih profesional.</p>
        </div>
      <p class="price" style="text-align: right; margin-top: 80px; margin-left: 30px; margin-right: 10px;">Rp. 130,000</p>
    </div>

    <!--Tambah Barang Button-->
  <div style="display: flex; margin-top: 70px; margin-left: 25px;">
  <button onclick="decrement1()" id="btnDecrement1">-</button>
  <span id="jumlah1" style="margin-top: 30px;">0</span>
  <button onclick="increment1()" id="btnIncrement1">+</button>
    
  <script>
      function increment1() {
    let jumlah1 = document.getElementById("jumlah1");
    jumlah1.textContent = parseInt(jumlah1.textContent) + 1;
}

function decrement1() {
    let jumlah1 = document.getElementById("jumlah1");
    let nilaiSekarang = parseInt(jumlah1.textContent);
    if (nilaiSekarang > 0) {
        jumlah1.textContent = nilaiSekarang - 1;
    }
}
  </script>
    
  </div>
  </div>

    <!-- Item 2 -->
     <div style="display: flex;">
    <div class="product-card" data-aos="zoom-in">
      <img src="d:\GitHub\Web-E-Commerce\Beranda\IMG\Baju.jpg" alt="Product" />
      <div class="Deskripsi">
      <h3>Baju</h3>
      <p style="vertical-align: top; width: 650px;">Dapatkan tampilan yang bersih dan elegan dengan kemeja polos terbaru kami. 
        Terbuat dari bahan katun premium yang lembut dan menyerap keringat. 
        Pilihan warna beragam, mulai dari putih klasik hingga warna-warna pastel 
        yang trendy. Desain timeless yang cocok dipadukan dengan berbagai gaya.</p>
    </div>
    <p class="price" style="text-align: right; margin-top: 80px; margin-left: 30px; margin-right: 10px;">Rp. 105,000</p>
  </div>

  <!--Tambah Barang Button-->
  <div style="display: flex; margin-top: 70px; margin-left: 25px;">
    <button onclick="decrement2()" id="btnDecrement2">-</button>
<span id="jumlah2" style="margin-top: 30px;">0</span>
<button onclick="increment2()" id="btnIncrement2">+</button>
    
    <script>
      function increment2() {
    let jumlah2 = document.getElementById("jumlah2");
    jumlah2.textContent = parseInt(jumlah2.textContent) + 1;
}

function decrement2() {
    let jumlah2 = document.getElementById("jumlah2");
    let nilaiSekarang = parseInt(jumlah2.textContent);
    if (nilaiSekarang > 0) {
        jumlah2.textContent = nilaiSekarang - 1;
    }
}
</script>
</div>
</div>

   <!-- Input Alamat -->
     <div class="alamat">
   <h2>Masukkan Alamat Anda</h2>
    <form>
      <label for="jalan">Jalan:</label>
      <input type="text" id="jalan" name="jalan" placeholder="Nama jalan, nomor rumah, RT/RW">
    
      <label for="komplek">Komplek/Perumahan (opsional):</label>
      <input type="text" id="komplek" name="komplek" placeholder="Nama komplek/perumahan">
    
      <label for="kota">Kota:</label>
      <input type="text" id="kota" name="kota" autocomplete="city">
    
      <label for="provinsi">Provinsi:</label>
      <input type="text" id="provinsi" name="provinsi" autocomplete="region">
    
      <label for="kodePos">Kode Pos:</label>
      <input type="text" id="kodePos" name="kodePos" pattern="[0-9]{5}" title="Masukkan 5 angka">
    
      <label for="negara">Negara:</label>
      <input type="text" id="negara" name="negara" autocomplete="country">
      <input type="submit" value="Kirim">
    </form>
  </div>
<div style="display: flex;">
  <!-- kode promo -->
 <div class="promo">
  <h2>Ingin Memakai Promo?</h2>
      <form>
      <label for="kodepromo" style="display: block;">Masukkan Kode Promo:</label>
      <input type="text" id="kodepromo" name="kodepromo" pattern="[0-9]{6}" title="Masukkan 6 angka" style="margin-left: 20px;">
      <input type="submit" value="Kirim">
      </form>
 </div>

 <!-- Ekspedisi -->
<div class="bayar">
  <h2>Pilih Ekspedisi</h2>
  <form action="" method="post" class="method">
    <select name="pilihan">
      <option value="JNE">JNE</option>
      <option value="TIKI">TIKI</option>
      <option value="J&T">J&T</option>
      <option value="WAHANA">WAHANA</option>
    </select>
    <input type="submit" value="Simpan">
  </form>
</div>

  <!-- Metode Pembayaran -->
<div class="bayar">
    <h2>Pilih Metode Pembayaran</h2>
    <form action="" method="post" class="method">
      <select name="pilihan">
        <option value="BCA">BCA</option>
        <option value="Mandiri">Mandiri</option>
        <option value="Dana">Dana</option>
        <option value="Ovo">Ovo</option>
        <option value="Gopay">Gopay</option>
      </select>
      <input type="submit" value="Simpan">
    </form>
</div>
</div>

<!--Checkout Container-->
<div id="checkout">
  <h2 class="price" style="font-size: 25px; margin-left: 730px; margin-top: 30px;">Total :</h2>
  <h2 class="price" style="font-size: 25px; margin-top: 30px;">Rp. 235,000</h2>
  <a href="#" class="buy-now-btn">
    Bayar Sekarang </a>
</div>
<!--Footer-->
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
    </body>
