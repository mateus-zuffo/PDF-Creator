<?php
    require "makecontent.php";

    require_once __DIR__ . '/vendor/autoload.php';
    $name = $_POST['aluno'];
    $body = createContent();

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($body);
    //$mpdf->Output($name.'.pdf', 'D');
    $mpdf->Output('teste.pdf', 'D');
    
?>