<?php
require_once __DIR__ . '/vendor/autoload.php';

// Variáveis
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$message = $_POST['message'];

//Create new PDF instance
$mpdf = new \Mpdf\Mpdf();

$data = '';

$data .= '<h1> Relatório Individual';
$data .= '<strong> Nome: </strong> ' . $fname . ' ' . $lname . '<br/>';
$data .= '<strong> Email: </strong> ' . $email . '<br/>';
$data .= '<strong> Mensage: </strong> ' . $message . '<br/>';
//ifs adicionar msg

//Wrute PDF
$mpdf->WriteHTML($data);
//Output to browser
$mpdf->Output($fname.'.pdf', 'D');

?>