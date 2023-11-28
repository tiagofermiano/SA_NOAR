<?php
include('conexao.php');
include('protect.php');

if (isset($_SESSION['relatorio_data'])) {
    $row = $_SESSION['relatorio_data'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOAR</title>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap"
    rel="stylesheet">

<link rel="stylesheet" type="text/css" href="relatorio.css">
</head>

<body>

    <header>
        <div class="historico">
            <a href="historico.html">Histórico</a>
        </div>
        <div class="inicio">
            <a href="telahome.php">Início</a>
        </div>
        <div class="perfil">
            <a href="telaperfil.php">Perfil</a>
        </div>
        </div>
    </header>



    <div id="relatorio">
        <p class="titulo">Relatório</p>

        <div class="form-caixa">
            <div class="classe">
                <p>Informações do paciente:</p>
            </div>

            <div id="dado1">
                <p>Nome do paciente:</p>
                <p id="info"><?php echo $informacoesPaciente['nomePaciente']; ?></p>
            </div>
            <div id="dado2">
                <p>Idade do paciente:</p>
                <p id="info"><?php echo $informacoesPaciente['idadePaciente']; ?></p>
            </div>

        <div id="dado2">
            <p>Sexo:</p>
            <p id="info"><?php echo $informacoesPaciente['sexoPaciente']; ?></p>
        </div>

        <div id="dado2">
            <p>RG/CPF do paciente:</p>
            <p id="info"><?php echo $informacoesPaciente['rgcpfPaciente']; ?></p>
        </div>

        <div id="dado2">
            <p>Nome do acompanhante:</p>
            <p id="info"><?php echo $informacoesPaciente['nomeAcompanhante']; ?></p>
        </div>

        <div id="dado2">
            <p>Idade do acompanhante:</p>
            <p id="info"><?php echo $informacoesPaciente['idadeAcompanhante']; ?></p>
        </div>

        <div id="dado2">
            <p>Vítima era:</p>
            <p id="info"><?php echo $informacoesPaciente['vitimaEra']; ?></p>
        </div>

        <div id="dado2">
            <p>Forma de condução:</p>
            <p id="info"><?php echo $informacoesPaciente['formaConducao']; ?></p>
        </div>
    </div>

        <br><br>

        <div class="form-caixa">
            <div class="classe">
                <p>Informações da ocorrência:</p>
            </div>

            <div id="dado1">
                <p>Data:</p>
                <p id="info"><?php echo $info_ocorrencia['data_ocorrencia']; ?></p>
            </div>
            <div id="dado2">
                <p>Local da ocorrência:</p>
                <p id="info"><?php echo $info_ocorrencia['local_ocorrencia']; ?></p>
            </div>

            <div id="dado2">
                <p>N° USB:</p>
                <p id="info">157</p>
            </div>

            <div id="dado2">
                <p>N° Ocorrência:</p>
                <p id="info">2</p>
            </div>

            <div id="dado2">
                <p>Despacho:</p>
                <p id="info">Fer Bags</p>
            </div>

            <div id="dado2">
                <p>Hora de chegada:</p>
                <p id="info">24:99</p>
            </div>

            <div id="dado2">
                <p>Km final:</p>
                <p id="info">13 (L)</p>
            </div>

            <div id="dado2">
                <p>CÓD. IR:</p>
                <p id="info">02</p>
            </div>

            <div id="dado2">
                <p>CÓD. PS:</p>
                <p id="info">237</p>
            </div>

            <div id="dado2">
                <p>CÓD. SIA/SUS:</p>
                <p id="info">88</p>
            </div>

            <div id="dado2">
                <p>Tipo de ocorrência:</p>
                <p id="info">Afogamento, Agressão, Queda moto</p>
            </div>

            <div id="dado2">
                <p>Avaliação cinemática:</p>
                <p id="info">Distúrbio comportamental, Caminhando na cena</p>
            </div>

        </div>

        <br><br>

        <div class="form-caixa">
            <div class="classe">
                <p>Situação do paciente:</p>
            </div>

            <div id="dado1">
                <p>Medida pressão:</p>
                <p id="info">12x21mmHg</p>
            </div>
            <div id="dado2">
                <p>Pulso:</p>
                <p id="info">950 B.C.P.M.</p>
            </div>

            <div id="dado2">
                <p>Respiração:</p>
                <p id="info">33 M.R.M.</p>
            </div>

            <div id="dado2">
                <p>Saturação:</p>
                <p id="info">02 %</p>
            </div>

            <div id="dado2">
                <p>HGT:</p>
                <p id="info">223 mg/dL</p>
            </div>

            <div id="dado2">
                <p>Temperatura:</p>
                <p id="info">98 °C</p>
            </div>

            <div id="dado2">
                <p>Perfusão:</p>
                <p id="info">>2 SEG</p>
            </div>

            <div id="dado2">
                <p>Situação:</p>
                <p id="info">Normal</p>
            </div>

            <div id="dado2">
                <p>Total GCS:</p>
                <p id="info">15</p>
            </div>

            <div id="dado2">
                <p>Problemas encontrados:</p>
                <p id="info">Psiquiátrico, Diabetes (Hiperglicemia), Transporte (Aéreo)
                </p>
            </div>

            <div id="dado2">
                <p>Objetos recolhidos:</p>
                <p id="info">Aerofólio de Palio 2015</p>
            </div>

            <div id="dado2">
                <p>Localização dos traumas:</p>
                <p id="info">AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</p>
            </div>


            <div id="dado2">
                <p>Ferimentos / fraturas / entorses / luxação:</p>
                <p>Local:</p>
                <p id="info">Genitália</p>
                <p>Lado:</p>
                <p id="info">Esquerda (L)</p>
                <p>Face:</p>
                <p id="info">Frontal</p>
                <p>Tipo:</p>
                <p id="info">Fratura exposta</p>
            </div>

            <div id="dado2">
                <p>Queimaduras:</p>
                <p>Cabeça:</p>
                <p id="info">Não</p>
                <p>Pescoço:</p>
                <p id="info">Não</p>
                <p>Torso Pos.:</p>
                <p id="info">Não</p>
                <p>Torso Ant.:</p>
                <p id="info">Não</p>
                <p>Genitália:</p>
                <p id="info">Não</p>
                <p>M.I.D.:</p>
                <p id="info">Não</p>
                <p>M.I.E.:</p>
                <p id="info">Não</p>
                <p>M.S.D.:</p>
                <p id="info">Não</p>
                <p>M.S.E.:</p>
                <p id="info">Não</p>
            </div>

            <div id="dado2">
                <p>Decisão transporte:</p>
                <p id="info">Ruim</p>
            </div>

            <div id="dado2">
                <p>Sinais e sintomas:</p>
                <p id="info">Afundamento do crânio, Amnésia, Cefaléia, Hemorragia (Interna)</p>
            </div>

            <div id="dado2">
                <p>Anamnese Emergencial:</p>
                <p>O que aconteceu? (Sinais e sintomas):</p>
                <p id="info">Morreu</p>
                <p>Aconteceu outras vezes?</p>
                <p id="info">Sim</p>
                <p>A quanto tempo aconteceu:</p>
                <p id="info">Sim</p>
                <p>Faz uso de medicação?</p>
                <p id="info">Sim</p>
                <p>Horário da última medicação?</p>
                <p id="info">23:99</p>
                <p>Quais?</p>
                <p id="info">Alprazolam</p>
                <p>Alérgico a alguma coisa?</p>
                <p id="info">Sim</p>
                <p>Se sim, especifique:</p>
                <p id="info">Sardinha</p>
                <p>Inseriu alimento ou líquido a 6 horas ou mais?</p>
                <p id="info">Sim</p>
                <p>Se sim, especifique:</p>
                <p id="info">Sardinha</p>
                <p>Horário da última medicação?</p>
                <p id="info">23:99</p>
                <br>
                <p>Anamnese Gestacional</p>
                <p>Período de gestação:</p>
                <p id="info">90 meses</p>
                <p>Fez pré-natal?</p>
                <p id="info">Sim</p>
                <p>Nome do médico:</p>
                <p id="info">Carlos</p>
                <p>Possibilidade de complicações?</p>
                <p id="info">Não</p>
                <p>É o primeiro filho?</p>
                <p id="info">Não</p>
                <p>Quantos?</p>
                <p id="info">234</p>
                <p>Que horas iniciaram as contrações?</p>
                <p id="info">02:40</p>
                <p>Tempo das contrações:</p>
                <p>Duração:</p>
                <p id="info">3 minutos</p>
                <p>Intervalo:</p>
                <p id="info">10 minutos</p>
                <p>Sente pressão na região do quadril ou vontade de evacuar?</p>
                <p id="info">Sim</p>
                <p>Já houve ruptura da bolsa?</p>
                <p id="info">Sim</p>
                <p>Foi feito inspeção visual?</p>
                <p id="info">Sim</p>
                <p>Parto realizado?</p>
                <p id="info">Sim</p>
                <p>Sexo do bebe:</p>
                <p id="info">Fem</p>
                <p>Nome do bebe:</p>
                <p id="info">Adélcio Lovecraft</p>
            </div>
        </div>

        <br><br>

        <div class="form-caixa">
            <div class="classe">
                <p>Atendimento:</p>
            </div>

            <div id="dado1">
                <p>M:</p>
                <p id="info">Claudio Mussolini Silva</p>
            </div>
            <div id="dado2">
                <p>S1:</p>
                <p id="info">Matheus Brasileiro de Aguiar</p>
            </div>

            <div id="dado2">
                <p>S2:</p>
                <p id="info">Edson Arantes do Nascimento</p>
            </div>

            <div id="dado2">
                <p>S3:</p>
                <p id="info">Paulo Henrique Ganso</p>
            </div>

            <div id="dado2">
                <p>Demandante:</p>
                <p id="info">Jonas Whale</p>
            </div>

            <div id="dado2">
                <p>Equipe:</p>
                <p id="info">2345678</p>
            </div>

            <div id="dado2">
                <p>Procedimentos efetuados:</p>
                <p id="info">Curativos, Ponte, Maca rígida</p>
            </div>

            <div id="dado2">
                <p>Meios Auxiliares:</p>
                <p id="info">Não</p>
            </div>

            <div id="dado2">
                <p>Polícia:</p>
                <p id="info">PRF</p>
            </div>

            <div id="dado2">
                <p>SAMU:</p>
                <p id="info">USA
                </p>
            </div>

            <div id="dado2">
                <p>CIT:</p>
                <p id="info">Não</p>
            </div>

            <div id="dado2">
                <p>Materiais descartáveis utilizados:</p>
                <p id="info">Atadura 12 (5), Luvas Desc. (2)</p>
            </div>

            <div id="dado2">
                <p>Materiais utilizados deixados no hospital:</p>
                <p id="info">Colar G (1), Tirante de cabeça (1), Maca Rígida (1)</p>
            </div>

            <div id="dado2">
                <p>Observações importantes:</p>
                <p id="info">Mlk se caiu todo troncho e se quebrou inteiro kkk</p>
            </div>
        </div>
    </div>
    <div id="editor"></div>
    <button id="gerar-pdf">
        Gerar PDF
    </button>

    <br><br>
    <script>
            $(document).ready(function () {
                $("#gerar-pdf").click(function () {
                    abrirCaixaDeDialogoDeImpressao();
                });

                $(document).keydown(function (event) {
                    if (event.ctrlKey && event.key === 'p') {
                        abrirCaixaDeDialogoDeImpressao();
                    }
                });

                function abrirCaixaDeDialogoDeImpressao() {
                    window.print();
                }
            });
        </script>
</body>

</html>

<?php
} else {
    echo "Nenhum dado encontrado na sessão.";
}
?>