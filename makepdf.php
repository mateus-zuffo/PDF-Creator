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

$data .= '<h1> Relatório Individual</h1>';
$data .= '<b> Nome:     </b>' . $fname . ' ' . $lname . '<br/>';
$data .= '<b> Email:    </b>' . $email . '<br/>';
$data .= '<b> Mensagem: </b>' . $message . '<br/>';
//ifs adicionar msg

//Wrute PDF
$mpdf->WriteHTML($data);
//Output to browser
$mpdf->Output($fname.'.pdf', 'D');

?>