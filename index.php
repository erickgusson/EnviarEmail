<?php
// Comando para istalar a biblioteca do phpmailer
// composer require phpmailer/phpmailer

// Importando classe do PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Carregando arquivos do Composer
require 'vendor/autoload.php';

// Cria um instância do PHPMailer
$mail = new PHPMailer(true);

try {
    // Configurações do server
    $mail->isSMTP();                                            // Envia usando o sistema SMTP
    $mail->Host       = 'smtp-mail.outlook.com';                // Configura o servidor SMTP responsavelo pelo envio de email
    $mail->SMTPAuth   = true;                                   // Ativa autenticação SMTP
    $mail->Username   = 'docinhoslunares@outlook.com';          // Usuario SMTP
    $mail->Password   = 'Eri999@@';                             // Senha SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Protocolo de autenticação
    $mail->Port       = 587;                                    // Porta de entrada do servidor SMTP
    $mail->CharSet    = 'UTF-8';
    
    // Destinatários
    $mail->setFrom('docinhoslunares@outlook.com', 'Docinhos Lunares');
    $mail->addAddress('policebox2@hotmail.com', 'PoliceBox');               // Adiciona destinatário
    // $mail->addAddress('ellen@example.com');                              // Nome opcional
    // $mail->addReplyTo('info@example.com', 'Information');                // Replica do email
    // $mail->addCC('cc@example.com');                                      // Adiciona uma cópia escondida do email 
    // $mail->addBCC('bcc@example.com');                                    // Adiciona uma cópia escondida do email 
    
    // Conteudo
    $mail->isHTML(true);                                                        // Configura o corpo do email para HTML 
    $mail->Subject = 'Divida de 500 Bilhões';                                   // Assunto do email
    $mail->Body    = 'Venho avisar da sua divida de <strong>500 Bilhões!</strong> está atrasada e vai aumentar em 500% se não pagada em 1 dia';     // Corpo/mensagem do emails
    $mail->AltBody = 'Venho avisar da sua divida de 500 Bilhões! está atrasada e vai aumentar em 500% se não pagada em 1 dia';                      // Corpo/mensagem de emails que não possuem suport para html

    $mail->send();

    echo "Até agora tudo tranquilo";
} catch (Exception $e) {
    echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
}

// PHPMailer();