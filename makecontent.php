<?php

function createContent(){
    $name = $_POST['name'];
    $turma = $_POST['turma'];
    $professora = $_POST['professora'];
    $primeiroParagrafo = 'Durante esse ano procuramos a melhor forma de elaborar, propor e realizar diversas atividades que pudessem atrair a concentração das crianças, para que elas fossem capazes de aprender e desenvolver-se de acordo com seu ritmo, todas as formas de linguagem corporal, oral e visual. O desenvolvimento da escrita e da leitura foi acontecendo respeitando o tempo de cada um. Em Matemática trabalhamos assuntos com grande relevância para a vida da criança, acreditamos que muitos desses assuntos poderão ser consolidados na etapa seguinte.';
    $segundoParagrafo = 'A amizade, o companheirismo, a solidariedade e o carinho foram pontos positivos importantes para o crescimento pessoal e cognitivo durante todas as adaptações necessárias para a singularidade que este ano nos trouxe. Mais uma vez, queremos ressaltar e valorizar a importância do envolvimento da família durante as aulas. Prosseguimos na certeza de que Família e Escola caminham juntas para o pleno desenvolvimento das crianças.';
    $terceiroParagrafo = $_POST['terceiroParagrafo'];
    $avancos = $_POST['avancos'];
    $mereceatencao = $_POST['mereceatencao'];
    $parecerfinal = $_POST['parecerfinal'];
    $table = createTable('O EU, O OUTRO E O NÓS');

    $data = '';    
    //Título
    $data .= '<h1> Relatório Individual Infantil</h1>';

    //Cabeçalho
    $data .= '<b> Nome:  </b>' . $name;
    $data .= '<b> Turma: </b>' . $turma;
    $data .= '<br/>';
    $data .= '<b> Professora: </b>' . $professora;
    $data .= '<br/>';

    //Texto
    if(isset($primeiroParagrafo)){
        $data .= '<p> &emsp;&emsp;' . $primeiroParagrafo . '<p>';
    }    
    if(isset($segundoParagrafo)){
        $data .= '<p> &emsp;&emsp;' . $segundoParagrafo . '<p>';
    }
    if(isset($terceiroParagrafo)){        
        $data .= '<p> &emsp;&emsp;' . $terceiroParagrafo . '<p>';
    }

    //Tabela
    $data .= $table . '<br/>';
    $data .= '<b> Avanços: </b><br/>' . $avancos;
    $data .= '<br/><br/>';
    $data .= '<b> Merece Atenção: </b><br/>' . $mereceatencao;
    $data .= '<br/><br/>';
    $data .= '<b> Parecer Final:  </b><br/>' . $parecerfinal;
    $data .= '<br/><br/>';

    return $data;
}



function createTable($titulo){
    $html = "<table>
    <thead>
        <tr>
            <th>Nº</th>
            <th>".$titulo."</th>
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