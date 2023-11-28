<?php
include('conexao.php');
include('protect.php');

// Variáveis para armazenar dados
$data_ocorrencia = $atendimento = $info_ocorrencia = $info_paciente = $situacao_paciente = "";

// Verifica se foi feita uma solicitação POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data_ocorrencia = $_POST["data_ocorrencia"];

    // Passo 3: Executar a consulta SQL
    $sql = "SELECT * FROM atendimento
            LEFT JOIN info_ocorrencia ON atendimento.data_ocorrencia = info_ocorrencia.data_ocorrencia
            LEFT JOIN info_paciente ON atendimento.data_ocorrencia = info_paciente.data_ocorrencia
            LEFT JOIN situacao_paciente ON atendimento.data_ocorrencia = situacao_paciente.data_ocorrencia
            WHERE atendimento.data_ocorrencia = '$data_ocorrencia'";

    $result = $conn->query($sql);

    if (!$result) {
        die("Erro na consulta: " . $conn->error);
    }

    // Passo 4: Exibir os resultados
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Apenas uma linha, já que estamos buscando por uma data específica

        // Atribuir valores às variáveis
        $data_ocorrencia = $row["data_ocorrencia"];
        $atendimento = $row; // Pode ser útil para utilizar diretamente os dados do atendimento
        $info_ocorrencia = $row; // Adapte conforme a estrutura real do seu banco de dados
        $info_paciente = $row; // Adapte conforme a estrutura real do seu banco de dados
        $situacao_paciente = $row; // Adapte conforme a estrutura real do seu banco de dados

        // Fechar a conexão
        $conn->close();
    } else {
        echo "Nenhum resultado encontrado para a data fornecida.";
        // Pode ser útil redirecionar para outra página ou realizar outra ação em caso de nenhum resultado
    }
}

// Agora você pode usar as variáveis em seu código HTML
?>

<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.0/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <!-- Seu código HTML para o head permanece o mesmo -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  /* Adicionado para melhorar o cálculo do tamanho */
}

body {
  width: 100%;
  min-height: 100vh;
  background-color: #E5E6E7;
  /* background-image: linear-gradient(to bottom, #001024, #001e44); */
  background-repeat: no-repeat;
  font-family: 'Open Sans', sans-serif;
  /* Definir uma fonte padrão */
}

@media (max-width: 768px) {
  /* Estilos para telas menores, como smartphones */
}
@media (min-width: 769px) {
  /* Estilos para telas maiores, como tablets e desktops */
}


p {
  font-size: 1em;
}

.hidden {
  display: none;
}


.navbar {
  width: 100%;
  margin: 0 auto;
  display: block;
  align-items: center;
  justify-content: space-between;
  /* background-color: #030060; */
  }

  .historico, .perfil, .inicio {
    position: absolute;
    top: 0;
    padding: 0.8rem;
    margin: 5px;
    background-color: #030060;
    color: #fff;
    border: none;
    border-radius: 0.8rem;
    cursor: pointer;
    transition: 0.5s ease-out;
    overflow: visible;
}

.historico a, .perfil a, .inicio a {
    color: #fff;
    text-decoration: none;
}

.historico:hover, .perfil:hover, .inicio:hover {
    background-color: #1b40af; /* Cor do fundo ao passar o mouse */
}

.historico {
    left: 0;
}

.perfil {
    right: 0;
}

.inicio {
    left: 50%;
    transform: translateX(-50%);
}
  
.form-caixa {
  background-color: #fff;
  width: 70%;
  margin: 0 auto;
  border-radius: 10px;
  box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.2);
  padding: 1rem;
}

/*titulo "Login"*/
.titulo {
    text-align: center;
    font-size: 2rem;
    line-height: 2rem;
    font-weight: 600;
    color: black;
    font-family: 'Poppins', sans-serif;
    color:#030060;
    margin-top: 5rem;
    margin-bottom: 3rem;
  }

  .classe {
    color: #030060;
    font-size: 1.2rem;
    display: flex; /* Use display flex para centralizar o conteúdo verticalmente */
    flex-direction: column; /* Para alinhar os elementos verticalmente */
    text-align: center; /* Alinhe o texto horizontalmente ao centro */
    margin: 0 auto;
    width: 60%;
    align-items: center;
}

  .classe p{
    width: 100%;
    font-weight: bold;
    font-size: 1.5rem;
  }

  #dado1{
    color: #030060;
    font-size: 1.2rem;
    margin-top: 1rem;
    font-weight: bold;
  }

#info{
  font-weight: normal;
}

  #dado2{
    color: #030060;
    font-size: 1.2rem;
    margin-top: 1rem;
    font-weight: bold;
  }

  button {
    border: none;
    display: flex;
    padding: 0.75rem 1.5rem;
    background-color: #030060;
    color: #ffffff;
    font-size: 1rem;
    line-height: 1rem;
    font-weight: 700;
    text-align: center;
    text-transform: uppercase;
    vertical-align: middle;
    align-items: center;
    border-radius: 0.5rem;
    user-select: none;
    gap: 0.75rem;
    box-shadow: 0 4px 6px -1px #5b58ff, 0 2px 4px -1px #5b58ff;
    transition: all .6s ease;
    margin: auto;
    margin-top: 3rem;
  }
  
  button:hover {
    box-shadow: 0 10px 15px -3px #5b58ff, 0 4px 6px -2px #5b58ff;
  }
  
  button:focus,
  button:active {
    opacity: .85;
    box-shadow: none;
  }

    </style>
</head>

<body>

    <header>
        <!-- Seu código HTML para o cabeçalho permanece o mesmo -->
    </header>

    <a href="historico.php"><div class="inicio">
        Voltar
    </div></a>

    <div id="relatorio">
        <p class="titulo">Relatório</p>

        <div class="form-caixa">
            <div class="classe">
                <p>Informações do paciente:</p>
            </div>

            <div id="dado1">
                <p>Nome do paciente:</p>
                <p id="info"><?php echo $info_paciente['nome_paciente']; ?></p>
            </div>
            <div id="dado2">
                <p>Idade do paciente:</p>
                <p id="info"><?php echo $info_paciente['idade_paciente']; ?></p>
            </div>

        <div id="dado2">
            <p>Sexo:</p>
            <p id="info"><?php echo $info_paciente['sexo_paciente']; ?></p>
        </div>

        <div id="dado2">
            <p>RG/CPF do paciente:</p>
            <p id="info"><?php echo $info_paciente['rg_cpf_paciente']; ?></p>
        </div>

        <div id="dado2">
            <p>Nome do acompanhante:</p>
            <p id="info"><?php echo $info_paciente['nome_acompanhante']; ?></p>
        </div>

        <div id="dado2">
            <p>Idade do acompanhante:</p>
            <p id="info"><?php echo $info_paciente['idade_acompanhante']; ?></p>
        </div>

        <div id="dado2">
            <p>Vítima era:</p>
            <p id="info"><?php echo $info_paciente['vitima_era']; ?></p>
        </div>

        <div id="dado2">
            <p>Forma de condução:</p>
            <p id="info"><?php echo $info_paciente['forma_conducao']; ?></p>
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
                <p id="info"><?php echo $info_ocorrencia['numero_usb']; ?></p>
            </div>

            <div id="dado2">
                <p>N° Ocorrência:</p>
                <p id="info"><?php echo $info_ocorrencia['numero_ocorrencia']; ?></p>
            </div>

            <div id="dado2">
                <p>Despacho:</p>
                <p id="info"><?php echo $info_ocorrencia['despacho']; ?></p>
            </div>

            <div id="dado2">
                <p>Hora de chegada:</p>
                <p id="info"><?php echo $info_ocorrencia['hora_chegada']; ?></p>
            </div>

            <div id="dado2">
                <p>Km final:</p>
                <p id="info"><?php echo $info_ocorrencia['km_final']; ?></p>
            </div>

            <div id="dado2">
                <p>CÓD. IR:</p>
                <p id="info"><?php echo $info_ocorrencia['codigo_ir']; ?></p>
            </div>

            <div id="dado2">
                <p>CÓD. PS:</p>
                <p id="info"><?php echo $info_ocorrencia['codigo_ps']; ?></p>
            </div>

            <div id="dado2">
                <p>CÓD. SIA/SUS:</p>
                <p id="info"><?php echo $info_ocorrencia['codigo_sia_sus']; ?></p>
            </div>

            <div id="dado2">
                <p>Tipo de ocorrência:</p>
                <p id="info"><?php echo $info_ocorrencia['tipo_ocorrencia']; ?></p>
            </div>

        </div>

        <br><br>

        <div class="form-caixa">
            <div class="classe">
                <p>Situação do paciente:</p>
            </div>

            <div id="dado1">
                <p>Medida pressão:</p>
                <p id="info"><?php echo $situacao_paciente['medida_pressao']; ?></p>
            </div>
            <div id="dado2">
                <p>Pulso:</p>
                <p id="info"><?php echo $situacao_paciente['pulso']; ?></p>
            </div>

            <div id="dado2">
                <p>Respiração:</p>
                <p id="info"><?php echo $situacao_paciente['respiracao']; ?></p>
            </div>

            <div id="dado2">
                <p>Saturação:</p>
                <p id="info"><?php echo $situacao_paciente['saturacao']; ?></p>
            </div>

            <div id="dado2">
                <p>HGT:</p>
                <p id="info"><?php echo $situacao_paciente['hgt']; ?></p>
            </div>

            <div id="dado2">
                <p>Temperatura:</p>
                <p id="info"><?php echo $situacao_paciente['temperatura']; ?></p>
            </div>

            <div id="dado2">
                <p>Perfusão:</p>
                <p id="info"><?php echo $situacao_paciente['perfusao']; ?></p>
            </div>

            <div id="dado2">
                <p>Situação:</p>
                <p id="info"><?php echo $situacao_paciente['normal_anormal']; ?></p>
            </div>

            <div id="dado2">
                <p>Total GCS:</p>
                <p id="info"><?php echo $situacao_paciente['total_gcs']; ?></p>
            </div>

            <div id="dado2">
                <p>Problemas encontrados:</p>
                <p id="info"><?php echo $situacao_paciente['problema_psiquiatrico']; ?></p>
            </div>

            <div id="dado2">
                <p>Objetos recolhidos:</p>
                <p id="info"><?php echo $situacao_paciente['problema_objetos_recolhidos']; ?></p>
            </div>

            <div id="dado2">
                <p>Localização dos traumas:</p>
                <p id="info"><?php echo $situacao_paciente['problema_transporte']; ?></p>
            </div>


            <div id="dado2">
                <p>Ferimentos / fraturas / entorses / luxação:</p>
                <p>Local:</p>
                <p id="info"><?php echo $situacao_paciente['tabela_traumas_local']; ?></p>
                
                <p>Lado:</p>
                <p id="info"><?php echo $situacao_paciente['tabela_traumas_lado']; ?></p>

                <p>Face:</p>
                <p id="info"><?php echo $situacao_paciente['tabela_traumas_face']; ?></p>

                <p>Tipo:</p>
                <p id="info"><?php echo $situacao_paciente['tabela_traumas_tipo']; ?></p>

            </div>

            <div id="dado1">
                <p>Queimaduras:</p>
                <p>Cabeça:</p>
                <p id="info"><?php echo $situacao_paciente['queimadura']; ?></p>

                <p>Pescoço:</p>
                <p id="info"><?php echo $situacao_paciente['queimadura']; ?></p>

                <p>Torso Pos.:</p>
                <p id="info"><?php echo $situacao_paciente['queimadura']; ?></p>

                <p>Torso Ant.:</p>
                <p id="info"><?php echo $situacao_paciente['queimadura']; ?></p>

                <p>Genitália:</p>
                <p id="info"><?php echo $situacao_paciente['queimadura']; ?></p>
                
                <p>M.I.D.:</p>
                <p id="info"><?php echo $situacao_paciente['queimadura']; ?></p>
                
                <p>M.I.E.:</p>
                <p id="info"><?php echo $situacao_paciente['queimadura']; ?></p>

                <p>M.S.D.:</p>
                <p id="info"><?php echo $situacao_paciente['queimadura']; ?></p>
                
                <p>M.S.E.:</p>
                <p id="info"><?php echo $situacao_paciente['queimadura']; ?></p>
            </div>

            <div id="dado2">
                <p>Decisão transporte:</p>
                <p id="info"><?php echo $situacao_paciente['decisao_transporte']; ?></p>
            </div>

            <div id="dado2">
                <p>Sinais e sintomas:</p>
                <p id="info"><?php echo $situacao_paciente['sinais_sintomas']; ?></p>
            </div>

            <div id="dado1">
                <p>Anamnese Emergencial:</p>
                <p>O que aconteceu? (Sinais e sintomas):</p>
                <p id="info"><?php echo $situacao_paciente['anamnese_emergencial_oque_aconteceu']; ?></p>

                <p>Aconteceu outras vezes?</p>
                <p id="info"><?php echo $situacao_paciente['anamnese_aconteceu_outras_vezes']; ?></p>

                <p>A quanto tempo aconteceu:</p>
                <p id="info"><?php echo $situacao_paciente['anamnese_quanto_tempo']; ?></p>

                <p>Faz uso de medicação?</p>
                <p id="info"><?php echo $situacao_paciente['anamnese_uso_medicacao']; ?></p>

                <p>Horário da última medicação?</p>
                <p id="info"><?php echo $situacao_paciente['anamnese_hora_ultima_medicacao']; ?></p>

                <p>Quais?</p>
                <p id="info"><?php echo $situacao_paciente['anamnese_qual_medicacao']; ?></p>

                <p>Alérgico a alguma coisa?</p>
                <p id="info"><?php echo $situacao_paciente['anamnese_alergico']; ?></p>

                <p>Se sim, especifique:</p>
                <p id="info"><?php echo $situacao_paciente['anamnese_qual_alergia']; ?></p>

                <p>Inseriu alimento ou líquido a 6 horas ou mais?</p>
                <p id="info"><?php echo $situacao_paciente['anamnese_alimento_6horas']; ?></p>

                <p>Se sim, especifique:</p>
                <p id="info"><?php echo $situacao_paciente['anamnese_especifique']; ?></p>
                <p>Horário da última medicação?</p>
                
                <p id="info"><?php echo $situacao_paciente['anamnese_que_horas']; ?></p>
                <br>
                
                <p>Anamnese Gestacional</p>
                <p>Período de gestação:</p>
                <p id="info"><?php echo $situacao_paciente['gestacional_periodo_gestacao']; ?></p>

                <p>Fez pré-natal?</p>
                <p id="info"><?php echo $situacao_paciente['gestacional_pre_natal']; ?></p>

                <p>Nome do médico:</p>
                <p id="info"><?php echo $situacao_paciente['gestacional_nome_medico']; ?></p>

                <p>Possibilidade de complicações?</p>
                <p id="info"><?php echo $situacao_paciente['gestacional_possibilidade_complicacao']; ?></p>

                <p>É o primeiro filho?</p>
                <p id="info"><?php echo $situacao_paciente['gestacional_primeiro_filho']; ?></p>

                <p>Quantos?</p>
                <p id="info"><?php echo $situacao_paciente['gestacional_quantos']; ?></p>

                <p>Que horas iniciaram as contrações?</p>
                <p id="info"><?php echo $situacao_paciente['gestacional_hora_contracao']; ?></p>

                <p>Tempo das contrações:</p>
                <p>Duração:</p>
                <p id="info"><?php echo $situacao_paciente['gestacional_duracao_contracao']; ?></p>

                <p>Intervalo:</p>
                <p id="info"><?php echo $situacao_paciente['gestacional_intervalo_contracao']; ?></p>

                <p>Sente pressão na região do quadril ou vontade de evacuar?</p>
                <p id="info"><?php echo $situacao_paciente['gestacional_pressao_quadril']; ?></p>

                <p>Já houve ruptura da bolsa?</p>
                <p id="info"><?php echo $situacao_paciente['gestacional_ruptura_bolsa']; ?></p>

                <p>Foi feito inspeção visual?</p>
                <p id="info"><?php echo $situacao_paciente['gestacional_inspecao_visual']; ?></p>

                <p>Parto realizado?</p>
                <p id="info"><?php echo $situacao_paciente['gestacional_parto_realizado']; ?></p>

                <p>Sexo do bebe:</p>
                <p id="info"><?php echo $situacao_paciente['gestacional_sexo_bebe']; ?></p>

                <p>Nome do bebe:</p>
                <p id="info"><?php echo $situacao_paciente['gestacional_nome_bebe']; ?></p>
            </div>
        </div>

        <br><br>

        <div class="form-caixa">
            <div class="classe">
                <p>Atendimento:</p>
            </div>

            <div id="dado1">
                <p>M:</p>
                <p id="info"><?php echo $atendimento['motorista']; ?></p>
            </div>
            <div id="dado2">
                <p>S1:</p>
                <p id="info"><?php echo $atendimento['socorrista_1']; ?></p>
            </div>

            <div id="dado2">
                <p>S2:</p>
                <p id="info"><?php echo $atendimento['socorrista_2']; ?></p>
            </div>

            <div id="dado2">
                <p>S3:</p>
                <p id="info"><?php echo $atendimento['socorrista_3']; ?></p>
            </div>

            <div id="dado2">
                <p>Demandante:</p>
                <p id="info"><?php echo $atendimento['demandante']; ?></p>
            </div>

            <div id="dado2">
                <p>Equipe:</p>
                <p id="info"><?php echo $atendimento['equipe']; ?></p>
            </div>

            <div id="dado2">
                <p>Procedimentos efetuados:</p>
                <p id="info"><?php echo $atendimento['procedimentos_efetuados1']; ?></p>
            </div>

            <div id="dado2">
                <p>Meios Auxiliares:</p>
                <p id="info"><?php echo $atendimento['procedimento_meios_auxiliares']; ?></p>
            </div>

            <div id="dado2">
                <p>Polícia:</p>
                <p id="info"><?php echo $atendimento['procedimento_policia']; ?></p>
            </div>

            <div id="dado2">
                <p>SAMU:</p>
                <p id="info"><?php echo $atendimento['procedimento_samu']; ?>
                </p>
            </div>

            <div id="dado2">
                <p>CIT:</p>
                <p id="info"><?php echo $atendimento['procedimento_cit']; ?></p>
            </div>

            <div id="dado2">
                <p>Materiais descartáveis utilizados:</p>
                <p id="info"><?php echo $atendimento['descartaveis_outros']; ?></p>
            </div>

            <div id="dado2">
                <p>Materiais utilizados deixados no hospital:</p>
                <p id="info"><?php echo $atendimento['descartaveis_outros']; ?></p>
            </div>

            <div id="dado2">
                <p>Observações importantes:</p>
                <p id="info"><?php echo $atendimento['observacoes']; ?></p>
            </div>
        </div>
    </div>

    <button onclick="imprimirPagina()">Gerar PDF</button>

    <br><br>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.0/html2pdf.bundle.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"
        integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs"
        crossorigin="anonymous"></script>

        <script>
        function imprimirPagina() {
            window.print();
        }
    </script>

    <!-- <script>
        function gerarPdf() {
            // Instanciar o jsPDF
            var doc = new jsPDF();

            // Conteúdo HTML que deve estar no PDF
            doc.fromHTML('<h1>Gerar PDF com conteúdo HTML</h1>', 15, 15);

            // Gerar PDF
            doc.save('relatorio_ocorrencia.pdf');
        }
    </script> -->

</body>

</html>