<?php
// Include koneksi ke database
include 'Koneksi.php';
session_start();

if (isset($_POST['signUp'])) {
    // Ambil data dari form
    $UserID = $_POST['user_id'];
    $Username = $_POST['username'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    // Hash password dengan algoritma bcrypt
    $HashedPassword = password_hash($Password, PASSWORD_BCRYPT);

    // Periksa apakah username atau email sudah ada
    $checkQuery = $conn->prepare("SELECT * FROM users WHERE Username = ? OR Email = ?");
    $checkQuery->bind_param("ss", $Username, $Email);
    $checkQuery->execute();
    $result = $checkQuery->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Username or Email already exists!');</script>";
    } else {
        // Insert data ke database
        $insertQuery = $conn->prepare("INSERT INTO users (UserID, Username, Email, Password) VALUES (?, ?, ?, ?)");
        $insertQuery->bind_param("isss", $UserID, $Username, $Email, $HashedPassword);

        if ($insertQuery->execute()) {
            echo "<script>alert('Registration successful!');</script>";
            header("Location: Login.php");
            exit();
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }

    // Tutup koneksi query
    $checkQuery->close();
    $insertQuery->close();
}

if (isset($_POST['signIn'])) {
    // Ambil data dari form login
    $Username = $_POST['username'];
    $Password = $_POST['password'];

    // Cek apakah username ada di database
    $loginQuery = $conn->prepare("SELECT * FROM users WHERE Username = ?");
    $loginQuery->bind_param("s", $Username);
    $loginQuery->execute();
    $result = $loginQuery->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($Password, $user['Password'])) {
            // Simpan informasi user ke session
            $_SESSION['UserID'] = $user['UserID'];
            $_SESSION['Username'] = $user['Username'];
            $_SESSION['Email'] = $user['Email'];

            echo "<script>alert('Login successful!');</script>";
            header("Location: homepage.php"); // Arahkan ke halaman utama
            exit();
        } else {
            echo "<script>alert('Incorrect password!');</script>";
        }
    } else {
        echo "<script>alert('Username not found!');</script>";
    }

    // Tutup koneksi query
    $loginQuery->close();
}
?>
