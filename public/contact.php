<?php 
// Konfigurasi koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "portofolio";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    // Redirect ke halaman form dengan parameter status=success
    header("Location: index.php?status=success");
    exit();
} else {
    echo "Gagal menyimpan data: " . $conn->error;
}

$stmt->close();
$conn->close();
?>

