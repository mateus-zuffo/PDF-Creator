<?php
    require "makecontent.php";

    require_once __DIR__ . '/vendor/autoload.php';
    $name = $_POST['name'];
    $data = createContent();

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($data);
    $mpdf->Output($name .'.pdf', 'D');
    
?>