<?php
include "../Beranda/Koneksi.php";

$query = mysqli_query($conn, "SELECT * FROM users");
if ($query) {
    echo '<table>
        <tr>
            <th>UserID</th>
            <th>Username</th>
            <th>Email</th>
        </tr>';
    while ($data = mysqli_fetch_array($query)) {
        echo '<tr>
            <td>' . htmlspecialchars($data['UserID']) . '</td>
            <td>' . htmlspecialchars($data['Username']) . '</td>
            <td>' . htmlspecialchars($data['Email']) . '</td>
        </tr>';
    }
    echo '</table>';
} else {
    echo '<p>No data available</p>';
}
?>
