<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // inclui o arquivo de autoload do PHPMailer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Configurações do servidor SMTP
  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->SMTPDebug = 0; // desabilita o debug do PHPMailer
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = 'seu_email@gmail.com'; // substitua pelo seu email
  $mail->Password = 'sua_senha'; // substitua pela sua senha
  
  // Configurações do email
  $mail->setFrom($_POST['email'], $_POST['name']);
  $mail->addAddress('seu_email@gmail.com'); // substitua pelo email que receberá as mensagens
  $mail->Subject = 'Contato através do site All-STORE';
  $mail->Body = $_POST['message'];
  
  // Tenta enviar o email e verifica se houve sucesso ou não
  try {
    $mail->send();
    header('Location: contato.php?success=true');
    exit;
  } catch (Exception $e) {
    header('Location: contato.php?success=false');
    exit;
  }
  
} else {
  header('Location: contato.php');
  exit;
}
?>