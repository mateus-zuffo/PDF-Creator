<?php

function createContent(){
    $name = $_POST['name'];
    $turma = $_POST['turma'];
    $professora = $_POST['professora'];
    $primeiroParagrafo = $_POST['primeiroParagrafo'];
    $segundoParagrafo = $_POST['segundoParagrafo'];
    $terceiroParagrafo = $_POST['terceiroParagrafo'];
    $avanco = $_POST['avanco'];
    $mereceatencao = $_POST['mereceatencao'];
    $parecerfinal = $_POST['parecerfinal'];
    $table = createTable();


    $data = '';    
    $data .= '<h1> Relatório Individual Infantil</h1>';
    $data .= '<div class="row mb-2">';
    $data .= '<div class="col-md-6"><b> Nome:     </b>' . $name . '<br/></div>';
    $data .= '<div class="col-md-6"><b> Turma:     </b>' . $turma . '<br/></div>';
    $data .= '</div>';
    $data .= '<b> Professora: </b>' . $professora . '<br/>';
    if(isset($primeiroParagrafo)){
        $data .= '<p> &emsp;&emsp;' . $primeiroParagrafo . '<p>';
    }    
    if(isset($segundoParagrafo)){
        $data .= '<p> &emsp;&emsp;' . $segundoParagrafo . '<p>';
    }
    if(isset($terceiroParagrafo)){        
        $data .= '<p> &emsp;&emsp;' . $terceiroParagrafo . '<p>';
    }
    $data .= $table . '<br/>';
    $data .= '<p> Avanços: <p><br/>';
    $data .= '<p> Merece Atenção: <p><br/>';
    $data .= '<p> Parecer Final: <p><br/>';

    return $data;
}



function createTable(){
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
    $html = addTableRow($html,"1","Teste","1");

    $html = $html ."  
    </tbody>
    </table>";
}
function addTableRow($html, $numero, $objetivo, $resposta){
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
?>