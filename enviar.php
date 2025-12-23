<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Cargar PHPMailer
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Obtener datos del formulario
$mensaje = htmlspecialchars(trim($_POST['mensaje']));
$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);

if ($mensaje && $email) {
    $mail = new PHPMailer(true);

    try {
        // Configuración SMTP para Gmail
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'juliocesarzapataaguilar12@gmail.com';  // Tu Gmail
        $mail->Password   = 'pqwiojxivtuqcpwf';                     // Tu contraseña de app
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Opciones de SSL para evitar errores en InfinityFree
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer'       => false,
                'verify_peer_name'  => false,
                'allow_self_signed' => true
            ]
        ];

        // Remitente y destinatario
        $mail->setFrom($mail->Username, 'Formulario Web');
        $mail->addAddress('juliocesarzapataaguilar12@gmail.com'); // Puedes usar el mismo correo

        // Contenido del correo
        $mail->isHTML(false);
        $mail->Subject = 'Nuevo mensaje desde el formulario web';
        $mail->Body    = "Mensaje:\n$mensaje\n\nCorreo del visitante:\n$email";

        $mail->send();
        echo "Mensaje enviado correctamente.";
    } catch (Exception $e) {
        echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
    }
} else {
    echo "Por favor complete todos los campos correctamente.";
}
