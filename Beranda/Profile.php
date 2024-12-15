<?php
// Include koneksi dan mulai sesi
include 'Koneksi.php';
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['UserID'])) {
    header("Location: Login.php");
    exit();
}

// Ambil data pengguna dari session
$UserID = $_SESSION['UserID'];
$Username = $_SESSION['Username'];
$Email = $_SESSION['Email'];
$Photo = null;  // Gambar akan disimpan dalam bentuk biner

// Ambil foto profil dari database
$query = "SELECT Photo FROM users WHERE UserID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $UserID);
$stmt->execute();
$stmt->bind_result($Photo);
$stmt->fetch();
$stmt->close();

// Update profil jika form di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateProfile'])) {
    $newUserID = htmlspecialchars(trim($_POST['user-id']));
    $newUsername = htmlspecialchars(trim($_POST['username']));
    $newEmail = htmlspecialchars(trim($_POST['email']));

    // Validasi input
    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.');</script>";
    } else {
        if (!empty($_FILES['photo']['name'])) {
            $imageData = file_get_contents($_FILES['photo']['tmp_name']);
            $Photo = $imageData;
        }

        $updateQuery = $conn->prepare("UPDATE users SET Username = ?, Email = ?, Photo = ? WHERE UserID = ?");
        $updateQuery->bind_param("sssi", $newUsername, $newEmail, $Photo, $UserID);

        if ($updateQuery->execute()) {
            $_SESSION['UserID'] = $newUserID;
            $_SESSION['Username'] = $newUsername;
            $_SESSION['Email'] = $newEmail;
            echo "<script>alert('Profile updated successfully!');</script>";
            header("Refresh:0");
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }

        $updateQuery->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(45deg, #8e44ad, #e74c3c);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .profile-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 800px;
            padding: 20px;
            overflow: hidden;
        }
        .profile-header {
            background-color: #8e44ad;
            color: white;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }
        .profile-content {
            padding: 20px;
        }
        .profile-content img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            border: 3px solid #e74c3c;
        }
        .profile-content .file-input {
            display: flex;
            align-items: center;
            margin-top: 10px;
            flex-wrap: wrap;
            gap: 10px;
        }
        .profile-content .file-input span {
            color: #6b7280;
            font-size: 12px;
        }
        .profile-content .section-title {
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
            color: #8e44ad;
        }
        .profile-content .form-group {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .profile-content .form-group .form-field {
            flex: 1;
            min-width: 200px;
        }
        .profile-content .form-group .form-field label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .profile-content .form-group .form-field input,
        .profile-content .form-group .form-field textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            margin-top: 5px;
        }
        .profile-content .form-group .form-field textarea {
            resize: none;
            height: 100px;
        }
        .profile-content .update-button {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }
        .profile-content .update-button button {
            background-color: #8e44ad;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }
        .profile-content .update-button button:hover {
            background-color: #e74c3c;
        }
        .profile-content input:focus, 
        .profile-content textarea:focus {
            border-color: #8e44ad;
            outline: none;
            box-shadow: 0 0 5px rgba(142, 68, 173, 0.5);
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">Profile</div>
        <div class="profile-content">
            <div class="file-input">
                <?php
                if ($Photo) {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($Photo) . '" alt="Profile Photo"/>';
                } else {
                    echo '<img src="default-photo.jpg" alt="Profile Photo"/>';
                }
                ?>
                <input id="file" name="photo" type="file" form="updateProfileForm"/>
                <span>No file chosen</span>
                <span>Maximum file size: 1 MB</span>
            </div>
            <form id="updateProfileForm" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                <div class="form-field">
                        <label for="user-id">ID<span style="color: red;">*</span></label>
                        <input id="user-id" name="user-id" type="text" value="<?php echo htmlspecialchars($UserID); ?>"readonly/>
                    </div>
                    <div class="form-field">
                        <label for="username">Username  <span style="color: red;">*</span></label>
                        <input id="username" name="username" type="text" value="<?php echo htmlspecialchars($Username); ?>"/>
                    </div>
                    <div class="form-field">
                        <label for="email">Email <span style="color: red;">*</span></label>
                        <input id="email" name="email" type="email" value="<?php echo htmlspecialchars($Email); ?>"readonly/>
                    </div>
                </div>
                <div class="form-group">
                <div class="form-field">
                    <label for="about-me">About me</label>
                    <textarea id="about-me" name="about-me" readonly></textarea>
                </div>
                </div>
                <div class="update-button">
                    <button type="submit" name="updateProfile">Update</button>
                </div>
            </form>
            <a href="homepage.php"><span class="icon">🏠</span> Back</a>
            <a href="logout.php"><span class="icon">🚪</span> Logout</a>
        </div>
    </div>
</body>
</html>
