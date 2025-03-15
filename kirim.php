<?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti jika Anda menggunakan username lain
$password = ""; // Ganti jika Anda menggunakan password
$dbname = "kontak_db"; // Nama database yang telah Anda buat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Koneksi gagal: " . $conn->connect_error]));
}

// Mengambil data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

// Menyiapkan dan mengeksekusi query
$sql = "INSERT INTO pesan (nama, email, pesan) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nama, $email, $pesan);

$response = [];
if ($stmt->execute()) {
    $response = ["status" => "success", "message" => "Pesan berhasil dikirim!"];
} else {
    $response = ["status" => "error", "message" => "Error: " . $stmt->error];
}

// Menutup koneksi
$stmt->close();
$conn->close();

// Mengembalikan respons dalam format JSON
header('Content-Type: application/json');
echo json_encode($response);
?>