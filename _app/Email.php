<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{

  private $mail = \stdClass::class;

  public function __construct()
  {
    $this->mail = new PHPMailer(true);
    $this->mail->SMTPDebug = 2;                      // Enable verbose debug output
    $this->mail->isSMTP();                                           // Send using SMTP
    $this->mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $this->mail->SMTPAuth = true;                                   // Enable SMTP authentication
    $this->mail->Username = 'testephp720@gmail.com';                     // SMTP username
    $this->mail->Password = '326932693269';                               // SMTP password
    $this->mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $this->mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $this->mail->CharSet = 'utf-8';
    $this->mail->setLanguage('br');
    $this->mail->isHTML(true);
    $this->mail->setFrom('testephp720@gmail.com', 'Testando WPJ09');
  }

  public function sendMail($subject, $body, $replyEmail, $replyName, $addressEmail, $addressName)
  {
    $this->mail->Subject = (string)$subject;
    $this->mail->Body = $body;

    $this->mail->addReplyTo($replyEmail, $replyName);
    $this->mail->addAddress($addressEmail, $addressName);

    try {
      $this->mail->send();
    } catch (Exception $e) {
      echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo} {$e->errorMessage()}";
    }
  }
}