<?php

function createContent(){
    $name = $_POST['name'];
    $turma = $_POST['turma'];
    $professora = $_POST['professora'];
    $primeiroParagrafo = 'Durante esse ano procuramos a melhor forma de elaborar, propor e realizar diversas atividades que pudessem atrair a concentração das crianças, para que elas fossem capazes de aprender e desenvolver-se de acordo com seu ritmo, todas as formas de linguagem corporal, oral e visual. O desenvolvimento da escrita e da leitura foi acontecendo respeitando o tempo de cada um. Em Matemática trabalhamos assuntos com grande relevância para a vida da criança, acreditamos que muitos desses assuntos poderão ser consolidados na etapa seguinte.';
    $segundoParagrafo = 'A amizade, o companheirismo, a solidariedade e o carinho foram pontos positivos importantes para o crescimento pessoal e cognitivo durante todas as adaptações necessárias para a singularidade que este ano nos trouxe. Mais uma vez, queremos ressaltar e valorizar a importância do envolvimento da família durante as aulas. Prosseguimos na certeza de que Família e Escola caminham juntas para o pleno desenvolvimento das crianças.';
    $avancos = $_POST['avancos'];
    $mereceatencao = $_POST['mereceatencao'];
    $parecerfinal = $_POST['parecerfinal'];
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

    //Tabela
    $data .= '<br/>
    <style>
    table {
        border:1px solid black;
        border-collapse:collapse;
        width:100%;
    }
    th,td{
        border:1px solid;
        text-align: center;
    }
    </style>';
    $table = createTable('O EU, O OUTRO E O NÓS', 1);
    $data .= $table . '<br/><br/><br/>';
    $table = createTable('TRAÇOS, SONS CORES E FORMAS', 2);
    $data .= $table . '<br/><br/><br/>';
    $table = createTable('ESPAÇOS, TEMPOS, QUANTIDADES, RELAÇÕES', 3);
    $data .= $table . '<br/><br/>';

    //Final
    $data .= '<b> Avanços: </b><br/>  &emsp;&emsp;' . $avancos;
    $data .= '<br/><br/>';
    $data .= '<b> Merece Atenção: </b><br/>  &emsp;&emsp;' . $mereceatencao;
    $data .= '<br/><br/>';
    $data .= '<b> Parecer Final:  </b><br/>  &emsp;&emsp;' . $parecerfinal;
    $data .= '<br/><br/>';
    return $data;
}

function createTable($titulo, $quadro){    
    $contador = 1;
    if($quadro == 1){
        $varInicio = 1;
        $varFinal = 9;
    }
    else if($quadro == 2){
        $varInicio = 10;
        $varFinal = 14;
    }
    else if($quadro == 3){
        $varInicio = 15;
        $varFinal = 24;
    }

    $html = "<table>
        <tr>
            <td>Nº</td>
            <td style='text-align:left;'>".$titulo."</td>
            <td>Sim</td>
            <td>Não</td>
            <td>Em Processo</td>
            <td>Não Trabalhado</td>
        </tr>";


    for($var = $varInicio; $var <= $varFinal; $var++){
        $linha = getLinha($var);
        $html .= addTableRow($contador,$linha['TITULO'],$linha['RESPOSTA']);   
        $contador++; 
    }

    $html .= "</table>";
    return $html;
}

function addTableRow($numero, $objetivo, $resposta){
    if($resposta == 'option1'){
        $html = "    
            <tr>
                <td style='width:5%;'>".$numero."</td>
                <td style='text-align:left;width:63%;'>".$objetivo."</td>
                <td style='width:5%;'>X</td>
                <td style='width:5%;'></td>
                <td style='width:10%;'></td>
                <td style='width:12%;'></td>
            </tr>";   
    } else if( $resposta == 'option2'){
        $html = "    
            <tr>
            <td style='width:5%;'>".$numero."</td>
            <td style='text-align:left;width:63%;'>".$objetivo."</td>
            <td style='width:5%;'></td>
            <td style='width:5%;'>X</td>
            <td style='width:10%;'></td>
            <td style='width:12%;'></td>
            </tr>";   
    } else if($resposta == 'option3'){
        $html = "    
            <tr>
                <td style='width:5%;'>".$numero."</td>
                <td style='text-align:left;width:63%;'>".$objetivo."</td>
                <td style='width:5%;'></td>
                <td style='width:5%;'></td>
                <td style='width:10%;'>X</td>
                <td style='width:12%;'></td>
            </tr>";   
    } else if($resposta == 'option4'){
        $html = "    
            <tr>
                <td style='width:5%;'>".$numero."</td>
                <td style='text-align:left;width:63%;'>".$objetivo."</td>
                <td style='width:5%;'></td>
                <td style='width:5%;'></td>
                <td style='width:10%;'></td>
                <td style='width:12%;'>X</td>    
            </tr>";   
    }

    return isset($html) ? $html: 'nao foi';
}
function getLinha($var){
    $topico = '';
    $valor = '';
    switch ($var) {
        case 1:
            $topico = "Age de maneira independente, com confiança em suas capacidades, reconhecendo suas conquistas e limitações:";
            $valor = $_POST['11'];
            break;
        case 2:
            $topico = "Comunica suas ideias e sentimentos a pessoas e grupos diversos:";
            $valor = $_POST['12'];
            break;
        case 3:
            $topico = "Manuseia a tesoura com segurança:";
            $valor = $_POST['13'];
            break;
        case 4:
            $topico = "Segura o lápis de forma correta, com firmeza:";
            $valor = $_POST['14'];
            break;
        case 5:
            $topico = "Realiza pinçamento de objetos:";
            $valor = $_POST['15'];
            break;
        case 6:
            $topico = "Rasga papel com segurança:";
            $valor = $_POST['16'];
            break;
        case 7:
            $topico = "Segue sequências:";
            $valor = $_POST['17'];
            break;
        case 8:
            $topico = "Dança:";
            $valor = $_POST['18'];
            break;
        case 9:
            $topico = "Canta as músicas propostas nas ativvalueades:";
            $valor = $_POST['19'];
            break;
        case 10:
            $topico = "Expressa-se com criativvalueade em seus desenhos:";
            $valor = $_POST['21'];
            break;    
        case 11:
            $topico = "Usa cores variadas ao colorir ou desenhar:";
            $valor = $_POST['22'];
            break;
        case 12:
            $topico = "Reconhece as letras que foram estudadas e seus traçados:";
            $valor = $_POST['23'];
            break;
        case 13:
            $topico = "Acrescenta detalhes as suas produções:";
            $valor = $_POST['24'];
            break;
        case 14:
            $topico = "Faz representações de esquemas corporais, atribuindo detalhes do corpo:";
            $valor = $_POST['25'];
            break;
        case 15:
            $topico = "Reconhece a representação os numerais estudados:";
            $valor = $_POST['31'];
            break;
        case 16:
            $topico = "Escreve os números no sentvalueo correto:";
            $valor = $_POST['32'];
            break;
        case 17:
            $topico = "Nomeia as cores primárias e secundárias:";
            $valor = $_POST['33'];
            break;     
        case 18:
            $topico = "Nomeia as formas geométricas estudadas:";
            $valor = $_POST['34'];
            break;    
        case 19:
            $topico = "Tem noções de: Dentro/fora:";
            $valor = $_POST['35'];
            break;    
        case 20:
            $topico = "Tem noções de cheio/vazio:";
            $valor = $_POST['36'];
            break;    
        case 21:
            $topico = "Tem noções de: Alto/baixo:";
            $valor = $_POST['37'];
            break;    
        case 22:
            $topico = "Tem noções de quantvalueade: mais ou menos:";
            $valor = $_POST['38'];
            break;    
        case 23:
            $topico = "Tem noções de tamanho pequeno/médio/grande:";
            $valor = $_POST['39'];
            break;    
        case 24:
            $topico = "Tem noções de: na frente/atrás:";
            $valor = $_POST['310'];
            break;     
    }

    $linha = array(
        "TITULO" => $topico,
        "RESPOSTA" => $valor
    );
    return $linha;
}
?>