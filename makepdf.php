<?php
    require_once __DIR__ . '/vendor/autoload.php';

    // Variáveis
    $name = $_POST['name'];
    $turma = $_POST['turma'];
    $professora = $_POST['professora'];
    $message = $_POST['message'];
    $primeiroParagrafo = "&emsp;&emsp; Durante esse ano procuramos a melhor forma de elaborar, propor e realizar diversas atividades que pudessem atrair a concentração das crianças, para que elas fossem capazes de aprender e desenvolver-se de acordo com seu ritmo, todas as formas de linguagem corporal, oral e visual. O desenvolvimento da escrita e da leitura foi acontecendo respeitando o tempo de cada um. Em Matemática trabalhamos assuntos com grande relevância para a vida da criança, acreditamos que muitos desses assuntos poderão ser consolidados na etapa seguinte.";
    $segundoParagrafo = "&emsp;&emsp; A amizade, o companheirismo, a solidariedade e o carinho foram pontos positivos importantes para o crescimento pessoal e cognitivo durante todas as adaptações necessárias para a singularidade que este ano nos trouxe. Mais uma vez, queremos ressaltar e valorizar a importância do envolvimento da família durante as aulas. Prosseguimos na certeza de que Família e Escola caminham juntas para o pleno desenvolvimento das crianças.";
    
    

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
    $data .= '<b> Nome:     </b>' . $name . '<br/>';
    $data .= '<b> Turma:     </b>' . $turma . '<br/>';
    $data .= '<b> Professora: </b>' . $professora . '<br/>';
    $data .= '<p>' . $primeiroParagrafo . '<p>';
    $data .= '<p>' . $segundoParagrafo . '<p>';
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