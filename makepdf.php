<?php
    require "makecontent.php";

    require_once __DIR__ . '/vendor/autoload.php';
    $name = $_POST['aluno'];
    $body = createContent();
    $footer = createFooter();

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($body);
    $mpdf->SetFooter($footer);
    $mpdf->Output($name.'.pdf', 'D');
    
?>