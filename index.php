<?php

require __DIR__ . '/lib_ext/autoload.php';

use Notification\Email;

$novoEmail = new Email;
$novoEmail->sendMail("Assunto de teste", "<p> Esse é um Email de <strong>Teste</strong> </p>", "testephp720@gmail.com", "WILL", "wpjwpj09@gmail.com", "Willian");

var_dump($novoEmail);