<?php

function createContent(){
    $name = $_POST['aluno'];
    $turma = $_POST['turma'];
    $escola = $_POST['escola'];
    $professora = $_POST['professora'];
    $primeiroParagrafo = 'Durante esse ano procuramos a melhor forma de elaborar, propor e realizar diversas atividades que pudessem atrair a concentração das crianças, para que elas fossem capazes de aprender e desenvolver-se de acordo com seu ritmo, todas as formas de linguagem corporal, oral e visual. O desenvolvimento da escrita e da leitura foi acontecendo respeitando o tempo de cada um. Em Matemática trabalhamos assuntos com grande relevância para a vida da criança, acreditamos que muitos desses assuntos poderão ser consolidados na etapa seguinte.';
    $segundoParagrafo = 'A amizade, o companheirismo, a solidariedade e o carinho foram pontos positivos importantes para o crescimento pessoal e cognitivo durante todas as adaptações necessárias para a singularidade que este ano nos trouxe. Mais uma vez, queremos ressaltar e valorizar a importância do envolvimento da família durante as aulas. Prosseguimos na certeza de que Família e Escola caminham juntas para o pleno desenvolvimento das crianças.';
    $avancos = $_POST['avancos'];
    $mereceatencao = $_POST['mereceatencao'];
    $parecerfinal = $_POST['parecerfinal'];
    $data = '';    

    //Título
    $data .= "<div class='container'>";
    $data .= '<h1> Relatório Individual - Aulas Presenciais</h1>';
    $data .= '<h2> Educação Infantil </h2>';

    //Cabeçalho
    $data .= '<br/>';
    $data .= '<b> Escola: </b>' . $escola;
    $data .= '<br/>';
    $data .= "<b> Nome:  </b>" . $name;
    $data .= "<b> Turma: </b>" . $turma;
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
    $data .= "<br/>
    <style>
    table {
        border:1px solid black;
        border-collapse:collapse;
        width:100%;
    }
    td{
        border:1px solid black;
        text-align: center;
    }
    h1,h2,h3{
        text-align: center;
        line-height: 0.3;
    }
    .container{
        background-color:white;
        padding: 5%; 
        height: 29.7cm;
        width: 21.0cm;
    }
    .fundobranco{        
        background-color:white;
    }
    @page {
        background: url('/xampp/htdocs/mPDF/Relatorio-Infantil/backgrounds/7.jpg') no-repeat 0 0;
        background-image-resize: 6;
    }
    </style>";
    $data .= createIndexTable() . '<br/>';
    $data .= createTable('<b> O EU, O OUTRO E O NÓS </b>', 1). '<pagebreak>';
    $data .= createIndexTable() . '<br/>';
    $data .= createTable('<b> TRAÇOS, SONS CORES E FORMAS </b>', 2) . '<br/><br/><br/>';
    $data .= createIndexTable() . '<br/>';
    $data .= createTable('<b> ESPAÇOS, TEMPOS, QUANTIDADES, RELAÇÕES </b>', 3) . '<br/><br/>';

    //Final
    $data .= '<b> Avanços: </b><br/>  &emsp;&emsp;' . $avancos;
    $data .= '<br/><br/>';
    $data .= '<b> Merece Atenção: </b><br/>  &emsp;&emsp;' . $mereceatencao;
    $data .= '<br/><br/>';
    $data .= '<b> Parecer Final:  </b><br/>  &emsp;&emsp;' . $parecerfinal;
    $data .= '<br/><br/>';     
    $data .= '</div>';   
    return $data;
}

function createFooter(){
    $professora = $_POST['professora'];
    $data = '';
    $data .= "<div class='fundobranco'>";
    $data .= "<b> Professora: </b>" . $professora;
    $data .= '<b> &emsp;&emsp; Data: </b> '.date('d/m/y');
    $data .= "</div>";
    return $data;
}

function createIndexTable(){
    $html = "<table style='float:right;border:none;'>
        <tr>
            <td style='text-align:left;width:50%;border:none;'></td>
            <td style='width:10%;background:lightgray;text-color:white;font-size:11;border:1px solid;'>S-SIM </td>
            <td style='width:10%;background:lightgray;text-color:white;font-size:11;border:1px solid;'>N-NÃO </td>
            <td style='width:20%;background:lightgray;text-color:white;font-size:11;border:1px solid;'>EP-EM PROCESSO</td>
            <td style='width:20%;background:lightgray;text-color:white;font-size:11;border:1px solid;'>NT-NÃO TRABALHADO</td>
        </tr>
    </table>";
    return $html;
}
function createTable($titulo, $quadro){  
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
            <td style='text-align:left;width:80%;'>".$titulo."</td>
            <td style='width:5%;'>S </td>
            <td style='width:5%;'>N </td>
            <td style='width:5%;'>EP</td>
            <td style='width:5%;'>NT</td>
        </tr>";


    for($var = $varInicio; $var <= $varFinal; $var++){
        $linha = getLinha($var);
        $html .= addTableRow($linha['TITULO'],$linha['RESPOSTA']);   
    }

    $html .= "</table>";
    return $html;
}

function addTableRow($objetivo, $resposta){
    if($resposta == 'option1'){
        $html = "    
            <tr>
                <td style='text-align:left;width:80%;'>".$objetivo."</td>
                <td style='width:5%;'>X</td>
                <td style='width:5%;'></td>
                <td style='width:5%;'></td>
                <td style='width:5%;'></td>
            </tr>";   
    } else if( $resposta == 'option2'){
        $html = "    
            <tr>
            <td style='text-align:left;width:80%;'>".$objetivo."</td>
            <td style='width:5%;'></td>
            <td style='width:5%;'>X</td>
            <td style='width:5%;'></td>
            <td style='width:5%;'></td>
            </tr>";   
    } else if($resposta == 'option3'){
        $html = "    
            <tr>
                <td style='text-align:left;width:80%;'>".$objetivo."</td>
                <td style='width:5%;'></td>
                <td style='width:5%;'></td>
                <td style='width:5%;'>X</td>
                <td style='width:5%;'></td>
            </tr>";   
    } else if($resposta == 'option4'){
        $html = "    
            <tr>
                <td style='text-align:left;width:80%;'>".$objetivo."</td>
                <td style='width:5%;'></td>
                <td style='width:5%;'></td>
                <td style='width:5%;'></td>
                <td style='width:5%;'>X</td>    
            </tr>";   
    }

    return isset($html) ? $html: 'nao foi';
}
function getLinha($var){
    $topico = '';
    $valor = '';
    switch ($var) {
        case 1:
            $topico = "1. Age de maneira independente, com confiança em suas capacidades, reconhecendo suas conquistas e limitações:";
            $valor = $_POST['11'];
            break;
        case 2:
            $topico = "2. Comunica suas ideias e sentimentos a pessoas e grupos diversos:";
            $valor = $_POST['12'];
            break;
        case 3:
            $topico = "3. Manuseia a tesoura com segurança:";
            $valor = $_POST['13'];
            break;
        case 4:
            $topico = "4. Segura o lápis de forma correta, com firmeza:";
            $valor = $_POST['14'];
            break;
        case 5:
            $topico = "5. Realiza pinçamento de objetos:";
            $valor = $_POST['15'];
            break;
        case 6:
            $topico = "6. Rasga papel com segurança:";
            $valor = $_POST['16'];
            break;
        case 7:
            $topico = "7. Segue sequências:";
            $valor = $_POST['17'];
            break;
        case 8:
            $topico = "8. Dança:";
            $valor = $_POST['18'];
            break;
        case 9:
            $topico = "9. Canta as músicas propostas nas ativvalueades:";
            $valor = $_POST['19'];
            break;
        case 10:
            $topico = "1. Expressa-se com criativvalueade em seus desenhos:";
            $valor = $_POST['21'];
            break;    
        case 11:
            $topico = "2. Usa cores variadas ao colorir ou desenhar:";
            $valor = $_POST['22'];
            break;
        case 12:
            $topico = "3. Reconhece as letras que foram estudadas e seus traçados:";
            $valor = $_POST['23'];
            break;
        case 13:
            $topico = "4. Acrescenta detalhes as suas produções:";
            $valor = $_POST['24'];
            break;
        case 14:
            $topico = "5. Faz representações de esquemas corporais, atribuindo detalhes do corpo:";
            $valor = $_POST['25'];
            break;
        case 15:
            $topico = "1. Reconhece a representação os numerais estudados:";
            $valor = $_POST['31'];
            break;
        case 16:
            $topico = "2. Escreve os números no sentvalueo correto:";
            $valor = $_POST['32'];
            break;
        case 17:
            $topico = "3. Nomeia as cores primárias e secundárias:";
            $valor = $_POST['33'];
            break;     
        case 18:
            $topico = "4. Nomeia as formas geométricas estudadas:";
            $valor = $_POST['34'];
            break;    
        case 19:
            $topico = "5. Tem noções de: Dentro/fora:";
            $valor = $_POST['35'];
            break;    
        case 20:
            $topico = "6. Tem noções de cheio/vazio:";
            $valor = $_POST['36'];
            break;    
        case 21:
            $topico = "7. Tem noções de: Alto/baixo:";
            $valor = $_POST['37'];
            break;    
        case 22:
            $topico = "8. Tem noções de quantvalueade: mais ou menos:";
            $valor = $_POST['38'];
            break;    
        case 23:
            $topico = "9. Tem noções de tamanho pequeno/médio/grande:";
            $valor = $_POST['39'];
            break;    
        case 24:
            $topico = "10. Tem noções de: na frente/atrás:";
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