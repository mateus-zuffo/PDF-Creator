<?php
    require_once __DIR__ . '/vendor/autoload.php';

    // Variáveis
    $name = $_POST['name'];
    $turma = $_POST['turma'];
    $professora = $_POST['professora'];
    $message = $_POST['message'];
    $primeiroParagrafo = $_POST['primeiroParagrafo'];
    $segundoParagrafo = $_POST['segundoParagrafo'];
    $terceiroParagrafo = $_POST['terceiroParagrafo'];
    

    $html = "<table>
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Objetivos de Aprendizagem e Desenvolvimento</th>
                        <th>Sim</th>
                        <th>Não</th>
                        <th>Em Processo</th>
                        <th>Não Trabalhado</th>
                    </tr>
                </thead>
                <tbody>";
                $html = addLinha($html,"1","Teste","1");

                $html = $html ."  
                </tbody>
        </table>";



    function addLinha($html, $numero, $objetivo, $resposta){
        if($resposta == 1){
            $html = $html ."    
                <tr>
                    <td>".$numero."</td>
                    <td>".$objetivo."</td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>";   
        } else if( $resposta == 2){
            $html = $html ."    
                <tr>
                    <td>".$numero."</td>
                    <td>".$objetivo."</td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                </tr>";   
        } else if($resposta == 3){
            $html = $html ."    
                <tr>
                    <td>".$numero."</td>
                    <td>".$objetivo."</td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                </tr>";   
        } else if($resposta == 4){
            $html = $html ."    
                <tr>
                    <td>".$numero."</td>
                    <td>".$objetivo."</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                </tr>";   
        }

        return $html;
    }
//Create new PDF instance
    $mpdf = new \Mpdf\Mpdf();

    $data = '';

    $data .= '<h1> Relatório Individual Infantil</h1>';
    $data .= '<div class="row mb-2">';
    $data .= '<div class="col-md-6"><b> Nome:     </b>' . $name . '<br/></div>';
    $data .= '<div class="col-md-6"><b> Turma:     </b>' . $turma . '<br/></div>';
    $data .= '</div>';
    $data .= '<b> Professora: </b>' . $professora . '<br/>';
    $data .= '<p> &emsp;&emsp;' . $primeiroParagrafo . '<p>';
    $data .= '<p> &emsp;&emsp;' . $segundoParagrafo . '<p>';
    $data .= '<p> &emsp;&emsp;' . $terceiroParagrafo . '<p>';
    $data .= $html . '<br/>';
    $data .= '<p> Avanços: <p><br/>';
    $data .= '<p> Merece Atenção: <p><br/>';
    $data .= '<p> Parecer Final: <p><br/>';
    //ifs adicionar msg

    //Wrute PDF
    $mpdf->WriteHTML($data);
    //Output to browser
    $mpdf->Output($name.'.pdf', 'D');

?>